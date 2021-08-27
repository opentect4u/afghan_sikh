<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\TdGurudwaraDetails;
use App\Models\TdGurudwaraMember;
use App\Models\MdCountry;
use App\Models\TdServiceDetails;
use Session;
use Illuminate\Support\Facades\Crypt;

class ServiceController extends Controller
{
    public function __construct() {
        $this->middleware('is_gurudwara');
    }

    public function Show(){
        // return "hii";
        $id=Session::get('gurudwara')[0]['id'];
        $country=MdCountry::get();
        $data=TdServiceDetails::where('active','A')->where('gurudwara_id',$id)
            ->orderBy('application_date','desc')
            ->get();
        // return $data;
        return view('gurudwara.services-manage',['gurudwara'=>$data]);
    }

    public function ShowEdit($id){
        $id=Crypt::decryptString($id);
        // return $id;
        $data=TdServiceDetails::find($id);
        $country=MdCountry::get();
        return view('gurudwara.services-edit',['user_details'=>$data,'country'=>$country]);
    }
}
