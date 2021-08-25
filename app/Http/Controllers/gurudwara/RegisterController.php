<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdCountry;
use App\Models\TdUserDetails;
use App\Models\TdUserFamilyDetails;
use DB;
use Image;
use App\Models\MdUserLogin;
use App\Models\TdGurudwaraDetails;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function Show(){
        $country=MdCountry::get();
        return view('gurudwara.register',['country'=>$country]);
    }

    public function Register(Request $request){
        // $id=$request->input('');
        $gurudwara_name=$request->input('gurudwara_name');
        $gurudwara_email=$request->input('gurudwara_email');
        $password=$request->input('password');
        $gurudwara_phone_no=$request->input('gurudwara_phone_no');
        $website=$request->input('website');
        $gurudwara_address=$request->input('gurudwara_address');
        $city=$request->input('city');
        $state=$request->input('state');
        $country=$request->input('country');
        $gurudwara_photo=$request->input('gurudwara_photo');
        $gurudwara_head_name=$request->input('gurudwara_head_name');
        $gurudwara_head_address=$request->input('gurudwara_head_address');
        $gurudwara_head_phone_no =$request->input('gurudwara_head_phone_no'); 
        $gurudwara_head_email=$request->input('gurudwara_head_email');
        $gurudwara_head_photo=$request->input('gurudwara_head_photo');

        $is_user=MdUserLogin::where('user_id',$gurudwara_email)->get();

        if(count($is_user) > 0){  
            $success='error';
        }else{
        MdUserLogin::create(array(
            'user_id'=>$gurudwara_email,
            'password'=>Hash::make($password),
            'user_type'=>'G',
            'name'=>$gurudwara_name,
            'active'=> 'I',
            'created_by'=>$gurudwara_name,
        ));
        $id=DB::table('md_user_login')->where('user_id',$gurudwara_email)->value('id');

        // if ($request->hasFile('gurudwara_photo')) {
        //     $profile_pic_path = $request->file('gurudwara_photo');
        //     $gurudwara_profilepicname=date('YmdHis') .'_G_'.$id. '.' . $profile_pic_path->getClientOriginalExtension();
        //     // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
        //     // $image_resize->save(public_path('gurudwara-images/' . $gurudwara_profilepicname));
        //     $profile_pic_path->move(public_path('gurudwara-images/'),$gurudwara_profilepicname);

        // }
        // if ($request->hasFile('gurudwara_head_photo')) {
        //     $profile_pic_path1 = $request->file('gurudwara_head_photo');
        //     $gurudwara_head_profilepicname=date('YmdHis') .'_GH_'.$id. '.' . $profile_pic_path1->getClientOriginalExtension();
        //     // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
        //     // $image_resize->save(public_path('gurudwara-images/' . $gurudwara_profilepicname));
        //     $profile_pic_path->move(public_path('gurudwara-images/'),$gurudwara_head_profilepicname);

        // }

        TdGurudwaraDetails::create(array(
            'id'=>$id,
            'gurudwara_name'=>$gurudwara_name,
            'gurudwara_email'=>$gurudwara_email,
            'gurudwara_phone_no'=>$gurudwara_phone_no,
            'website'=>$website ,
            'gurudwara_address'=>$gurudwara_address,
            'city' =>$city,
            'state'=>$state,
            'country'=>$country,
            // 'gurudwara_photo'=>$gurudwara_profilepicname,
            'gurudwara_head_name' =>$gurudwara_head_name,
            'gurudwara_head_address'=>$gurudwara_head_address,
            'gurudwara_head_phone_no' =>$gurudwara_head_phone_no,   
            'gurudwara_head_email'=>$gurudwara_head_email,
            // 'gurudwara_head_photo'=>$gurudwara_head_profilepicname,
            'created_by'=>$gurudwara_name,
        ));
        $success='success';
        }

        $arrNewResult = array();
        $arrNewResult['gurudwara_name'] = $gurudwara_name;
        $arrNewResult['success'] = $success;
        // $arrNewResult['payment_type'] = $val[3];
        $status_json = json_encode($arrNewResult);
        echo $status_json;
    }
}
