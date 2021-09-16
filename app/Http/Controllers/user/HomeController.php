<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use DB;
use App\Models\TdUserDetails;
use Session;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('is_user');
    }

    public function show(){
        // return "hii";
        return view('user.dashboard');
    }

    public function Profile(){
        return view('user.profile');
    }

    public function Homeajax(Request $request){
        $id=Session::get('user')[0]['id'];
        $gurudwara=TdUserDetails::where('id',$id)->get();
        foreach($gurudwara as $gurudwaras){
            $gurudwara_name=$gurudwaras->surname;
            $gurudwara_photo=$gurudwaras->user_logo;
            // $gurudwara_letter_head=$gurudwaras->gurudwara_letter_head;
        }
       
        $arrNewResult = array();
        $arrNewResult['msg'] = "success";
        $arrNewResult['gurudwara_name'] = $gurudwara_name;
        $arrNewResult['gurudwara_photo'] = $gurudwara_photo;
        // $arrNewResult['gurudwara_letter_head'] = $gurudwara_letter_head;
        $status_json = json_encode($arrNewResult);
        echo $status_json;
    }
}
