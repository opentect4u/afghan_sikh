<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\TdBirthDetails;

class BirthReportController extends Controller
{
    public function __construct() {
        $this->middleware('is_gurudwara');
    }

    public function ShowAdd(){
        // return "hii";
        $id=Session::get('gurudwara')[0]['id'];
        $gurdwara_name=DB::table('td_gurudwara_details')->where('id',$id)->value('gurudwara_name');
        return view('gurudwara.birth-add',['gurdwara_name'=>$gurdwara_name]);
    }

    public function Add(Request $request){
        // return $request;
        $name_of_baby=$request->name_of_baby;
        $gender_of_baby=$request->gender_of_baby;
        $place_of_birth=$request->place_of_birth;
        $date_of_birth=$request->date_of_birth;
        $baby_of_shri=$request->baby_of_shri;
        $baby_of_shrimati=$request->baby_of_shrimati;

        $at_gurdwara=Session::get('gurudwara')[0]['id'];
        $created_by=DB::table('td_gurudwara_details')->where('id',$at_gurdwara)->value('gurudwara_name');
        $generate_number=rand(10000,99999);

        $data=TdBirthDetails::create(array(
            'generate_number'=>$generate_number,
            'name_of_baby'=>$name_of_baby,
            'gender_of_baby'=>$gender_of_baby,
            'place_of_birth'=>$date_of_birth,
            'date_of_birth' =>$date_of_birth,
            'baby_of_shri'=>$baby_of_shri ,
            'baby_of_shrimati'=>$baby_of_shrimati ,
            'name_of_gurdwara'=>$at_gurdwara ,
            'date_of_issue'=>date('Y-m-d') ,
            'created_by' =>$created_by,
        ));
        return $data;
    }
}
