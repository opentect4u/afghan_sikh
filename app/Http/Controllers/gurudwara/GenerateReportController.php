<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\TdMarriageDetails;
use Illuminate\Support\Facades\Crypt;

class GenerateReportController extends Controller
{
    public function __construct() {
        $this->middleware('is_gurudwara');
    }

    public function ShowNewBron(){
        return view('gurudwara.new-born');
    }
    

    public function Show(){
        $id=Session::get('gurudwara')[0]['id'];
        $data=TdMarriageDetails::where('at_gurdwara',$id)
            ->orderBy('created_date','desc')
            ->get();
        // return $data;
        return view('gurudwara.marriage-manage',['gurudwara'=>$data]);
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
        // return $data;
        return redirect()->route('gurudwara.marriagereport',['id' => Crypt::encryptString($data->id)]);
    }

    public function ShowEdit($id){
        $id=Crypt::decryptString($id);
        // return $id;
        $data=TdMarriageDetails::find($id);
        $g_id=Session::get('gurudwara')[0]['id'];
        $gurdwara_name=DB::table('td_gurudwara_details')->where('id',$g_id)->value('gurudwara_name');
        return view('gurudwara.marriage',['gurdwara_name'=>$gurdwara_name,'user_data'=>$data]);
    }

    public function Edit(Request $request){
        // return $request;
        $user_data=TdMarriageDetails::find($request->id);
        // return $shri_photo= $user_data->shri_photo;
             
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

        }else{
            $shri_photo= $user_data->shri_photo;
        }

        if ($request->hasFile('shrimati_photo')) {
            $profile_pic_path1 = $request->file('shrimati_photo');
            $shrimati_photo=date('YmdHis') .'_'.$at_gurdwara. '_shrimati_photo.' . $profile_pic_path1->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath1 = public_path('marriage-image/');
            $profile_pic_path1->move($destinationPath1,$shrimati_photo);

        }else{
            $shrimati_photo=$user_data->shrimati_photo;
        }
        // $user_data->generate_number=    $request->
        $user_data->ceremony_of_shri=$request->shri_name;
        $user_data->son_of_shri=$request->son_shri_name;
        $user_data->with_shrimati=$request->shrimati_name;
        $user_data->daughter_of_shri=$request->daughter_shrimati_name;
        // $user_data->at_gurdwara=$request->gurdwara_sahib_settled;
        $user_data->date_of_marriage=$request->date_of_marriage;
        $user_data->shri_photo=$shri_photo;
        $user_data->shrimati_photo=$shrimati_photo;
        $user_data->save();

        return redirect()->route('gurudwara.marriagereport',['id' => Crypt::encryptString($user_data->id)]);
    }

    public function Report($id,Request $request){
        $duplicate=$request->duplicate;
        // return $duplicate;
        $id=Crypt::decryptString($id);
        // return $id;
        $data=DB::table('td_marriage_details')
                ->leftJoin('td_gurudwara_details', 'td_marriage_details.at_gurdwara', '=', 'td_gurudwara_details.id')
                ->leftJoin('md_country', 'td_gurudwara_details.country', '=', 'md_country.id')
                ->select('td_marriage_details.*', 'td_gurudwara_details.*','md_country.name as country_name') 
                // ->Where('td_marriage_details.user_type','G')               
                ->Where('td_marriage_details.id',$id)               
                // ->orderBy('td_marriage_details.updated_at', 'desc')
                ->get();
        // return $data;
        return view('gurudwara.marriage-report',['data'=>$data,'duplicate'=>$duplicate]);
    }
}
