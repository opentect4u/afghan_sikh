<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\TdGurudwaraDetails;
use App\Models\TdUserDetails;
use App\Models\MdCountry;
use App\Models\TdServiceDetails;
use Session;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('is_gurudwara');
    }

    public function Show(){
        // return "hii";
        $id=Session::get('gurudwara')[0]['id'];
        $country=MdCountry::get();
        $data=TdUserDetails::where('gurudwara_id',$id)
            ->orderBy('created_at','desc')
            ->get();
        // return $data;
        return view('gurudwara.user-manage',['gurudwara'=>$data]);
    }

    public function ShowEdit($id){
        $id=Crypt::decryptString($id);
        // return $id;
        $data=TdUserDetails::find($id);
        $country=MdCountry::get();
        return view('gurudwara.user-edit',['user_details'=>$data,'country'=>$country]);
    }

    public function Edit(Request $request)
    {
        // return $request;
        $id=$request->id;
        $data=TdUserDetails::find($id);
        $data->add_1=$request->add_1;
        $data->add_2=$request->add_2;
        $data->city=$request->city;
        $data->county=$request->county;
        $data->postcode=$request->postcode;
        $data->country=$request->country;
        $data->phone=$request->phone;
        $data->email=$request->email;
        $data->save();
        return redirect()->back()->with('success','success');
    }

    public function View($id){
        $id=Crypt::decryptString($id);
        // return $id;
        $data=TdUserDetails::find($id);
        $country=MdCountry::get();
        return view('gurudwara.user-view',['user_details'=>$data,'country'=>$country]);
  
    }
}
