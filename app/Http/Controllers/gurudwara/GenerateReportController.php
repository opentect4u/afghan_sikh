<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\TdMarriageDetails;

class GenerateReportController extends Controller
{
    public function __construct() {
        $this->middleware('is_gurudwara');
    }

    public function ShowNewBron(){
        return view('gurudwara.new-born');
    }

    public function ShowMarriage(){
        $id=Session::get('gurudwara')[0]['id'];
        $gurdwara_name=DB::table('td_gurudwara_details')->where('id',$id)->value('gurudwara_name');
        return view('gurudwara.marriage',['gurdwara_name'=>$gurdwara_name]);
    }

    public function ShowMarriageConfirm(Request $request){
        // return $request;
        // return rand(10000,99999);
        $ceremony_of_shri=$request->shri_name;
        $son_shri_name=$request->son_shri_name;
        $with_shrimati=$request->shrimati_name;
        $daughter_of_shri=$request->daughter_shrimati_name;
        $date_of_marriage=$request->date_of_marriage;
        
        $at_gurdwara=Session::get('gurudwara')[0]['id'];
        $generate_number=rand(10000,99999);
        $created_by=DB::table('td_gurudwara_details')->where('id',$at_gurdwara)->value('gurudwara_name');
        $shri_photo='';
        $shrimati_photo='';
        // marriage-image
        if ($request->hasFile('shri_photo')) {
            $profile_pic_path = $request->file('shri_photo');
            $shri_photo=date('YmdHis') .'_'.$at_gurdwara. '_shri_photo.' . $profile_pic_path->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath = public_path('marriage-image/');
            $profile_pic_path->move($destinationPath,$shri_photo);

        }

        if ($request->hasFile('shrimati_photo')) {
            $profile_pic_path1 = $request->file('shrimati_photo');
            $shrimati_photo=date('YmdHis') .'_'.$at_gurdwara. '_shrimati_photo.' . $profile_pic_path1->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath1 = public_path('marriage-image/');
            $profile_pic_path1->move($destinationPath1,$shrimati_photo);

        }


        $data=TdMarriageDetails::create(array(
            'generate_number'=>$generate_number,
            'ceremony_of_shri'=>$ceremony_of_shri,
            'son_of_shri'=>$son_shri_name,
            'with_shrimati'=>$with_shrimati,
            'daughter_of_shri' =>$daughter_of_shri,
            'at_gurdwara'=> $at_gurdwara,
            'date_of_marriage'=>$date_of_marriage ,
            'shri_photo' => $shri_photo,
            'shrimati_photo'=> $shrimati_photo,
            'created_date' =>date('Y-m-d'),
            'created_by'=>$created_by,
        ));
        return $data;
    }

    public function Report(){
        return view('gurudwara.report');
    }
}
