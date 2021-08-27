<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\TdDeathDetails;

class DeathReportController extends Controller
{
    public function __construct() {
        $this->middleware('is_gurudwara');
    }

    public function ShowAdd(){
        // return "hii";
        $id=Session::get('gurudwara')[0]['id'];
        $gurdwara_name=DB::table('td_gurudwara_details')->where('id',$id)->value('gurudwara_name');
        return view('gurudwara.death-add',['gurdwara_name'=>$gurdwara_name]);
    }

    public function Add(Request $request){
        // return $request;
        $name=$request->name;
        $gender_of_baby=$request->gender_of_baby;
        $sex=$request->sex;
        $age=$request->age;
        $date_of_death=$request->date_of_death;
        $cause_of_death=$request->cause_of_death;
        $spouse_husband_son_daughter=$request->spouse_husband_son_daughter;

        $at_gurdwara=Session::get('gurudwara')[0]['id'];
        $created_by=DB::table('td_gurudwara_details')->where('id',$at_gurdwara)->value('gurudwara_name');
        $generate_number=rand(10000,99999);

        $data=TdDeathDetails::create(array(
            'generate_number' =>$generate_number,
            'name'=>$name,
            'date_of_death'=>$date_of_death,
            'age'=>$age,
            'sex' =>$sex,
            'cause_of_death'=>$cause_of_death ,
            'name_of_gurdwara'=>$at_gurdwara ,
            'spouse_husband_son_daughter' =>$spouse_husband_son_daughter,
            'date_of_issue'=>date('Y-m-d') ,
            'created_by' =>$created_by,
        ));
        return $data;
    }
}
