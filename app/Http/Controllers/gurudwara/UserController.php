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
}
