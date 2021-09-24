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
use Illuminate\Support\Facades\Mail;
use App\Mail\GurdwaraRegisterEmail;
use App\Mail\UserRegisterEmail;
use App\Mail\UserRegisterOTPEmail;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends Controller
{
    public function Show(){
        $country=MdCountry::get();
        return view('gurudwara.register',['country'=>$country]);
    }

    public function Register1(Request $request){
        // return $request;
        $email=$request->email_mobile;
        $is_has=MdUserLogin::where('user_id',$email)->get();
        // return $is_has;
        if (count($is_has)>0) {
            return redirect()->back()->with('already','already');
        }else{
            $con_otp=rand(100000,999999);
            $url="";
            $surname="Dear";
            $givenname="";
            // Mail::to($email)->send(new UserRegisterOTPEmail($surname,$givenname,$url,$con_otp));
            return redirect()->route('gurudwara.otp')->with(['email_mobile'=>$email,'password'=>$request->password,'con_otp'=>$con_otp,'organisation'=>$request->type_of_organisation]);
            // return view('user.register-confirm',['searched'=>$request,'con_otp'=>$con_otp]);
        }
    }
    public function OTPShow(Request $request){
        return view('gurudwara.register-confirm');
    }
    
    public function ConfirmRegister1(Request $request){
        // return $request;
        session()->flush();
        $email=$request->email_mobile;
        $con_otp=$request->con_otp ;
        $otp=$request->otp ;
        $organisation=$request->organisation ;
        // if($con_otp==''){
        //     $error="Something wrong please try again";
        //     return redirect()->route('gurudwara.otp')->with(['email_mobile'=>$email,'password'=>$request->password,'con_otp'=>$con_otp,'otp'=>$otp,'error'=>$error,'organisation'=>$organisation]); 
        // }
        if ($con_otp==$otp) {
            // return $request;
            $data=MdUserLogin::create(array(
                'user_id'=>$request->email_mobile,
                'password'=>Hash::make($request->password),
                'user_type'=>$organisation,
                'active' =>'I',
            ));
            // Session::forget('onoff_flag');
            Session::put(['id' => $data->id]);
            Session::put(['email_mobile' => $data->user_id]);
            // return $data;
            // return $data->id;
            // return $data->user_id;
            $url='http://afghansikh.com/user/emaillink?id='.Crypt::encryptString($data->id).'&email='.Crypt::encryptString($data->user_id);
            $surname='Dear';
            $givenname="";
            Mail::to($email)->send(new UserRegisterEmail($surname,$givenname,$url));
            return redirect()->route('gurudwara.registerstep2');
            // return view('user.register-stage-2',['id'=>$data->id,'email_mobile'=>$data->user_id]);
        
        }else{
            $error="otp did not match";
            return redirect()->route('gurudwara.otp')->with(['email_mobile'=>$email,'password'=>$request->password,'con_otp'=>$con_otp,'otp'=>$otp,'error'=>$error,'organisation'=>$organisation]);
            // return view('user.register-confirm',['searched'=>$request,'con_otp'=>$con_otp,'otp'=>$otp,'error'=>$error,'token'=>csrf_token()]);
        }
    }

    public function Register2()
    {
        // return Session::get('id');
        // return Session::get('email_mobile');
        return view('gurudwara.register-stage-2');
    }

    public function Register2Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdGurudwaraDetails::create(array(
            'id'=>$id,
            // 'generate_user_id'=>$generate_user_id,
            'gurudwara_name'=>$request->surname,
            // 'givenname' => $request->givenname,
            'website' => $request->website,
            // 'date_of_birth' => Carbon::parse($request->dob)->format('Y-m-d'),
            'gurudwara_phone_no' => $request->phone_no,
            'register_stage'=>$request->register_stage,
        ));
        // return $data;
        return redirect()->route('gurudwara.registerstep3');
    }

    public function Register3(){
        $country=MdCountry::get();
        return view('gurudwara.register-stage-3',['country'=>$country]);
    }

    public function Register3Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdGurudwaraDetails::find($id);
        $data->city=$request->city;
        $data->post_code=$request->post_code;
        $data->country=$request->country;
        $data->gurudwara_address=$request->gurudwara_address;
        $data->gurudwara_address_2=$request->previous_nationality;
        $data->register_stage=$request->register_stage;
        $data->save();
        // return $data;
        return redirect()->route('gurudwara.registerstep4');
    }

    public function Register4(){
        $country=MdCountry::get();
        return view('gurudwara.register-stage-4',['country'=>$country]);
    }

    public function Register4Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdGurudwaraDetails::find($id);
        $data->gurudwara_head_name=$request->gurudwara_head_name;
        $data->gurudwara_head_address=$request->gurudwara_head_address;
        $data->gurudwara_head_phone_no=$request->gurudwara_head_phone_no;
        $data->gurudwara_head_email=$request->gurudwara_head_email;
        // $data->phone=$request->phone;
        $data->register_stage=$request->register_stage;
        $data->save();
        // return $data;
        return redirect()->route('gurudwara.registerstep5');
    }

    public function Register5(){
        $country=MdCountry::get();
        return view('gurudwara.register-stage-5',['country'=>$country]);
    }

    public function Register5Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdGurudwaraDetails::find($id);

        if ($request->hasFile('doc_1')) {
            $profile_pic_path1 = $request->file('doc_1');
            $doc_1=date('YmdHis') .'_'.$id. 'doc_1.' . $profile_pic_path1->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath1 = public_path('user-doc/');
            $profile_pic_path1->move($destinationPath1,$doc_1);

            if($data->doc_1!=null){
                $filesc = public_path('user-doc/') . $data->doc_1;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_1=$data->doc_1;
        }

        if ($request->hasFile('doc_2')) {
            $profile_pic_path2 = $request->file('doc_2');
            $doc_2=date('YmdHis') .'_'.$id. 'doc_2.' . $profile_pic_path2->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath2 = public_path('user-doc/');
            $profile_pic_path2->move($destinationPath2,$doc_2);

            if($data->doc_2!=null){
                $filesc = public_path('user-doc/') . $data->doc_2;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $doc_2=$data->doc_2;
        }

        if ($request->hasFile('doc_3')) {
            $profile_pic_path3 = $request->file('doc_3');
            $doc_3=date('YmdHis') .'_'.$id. 'doc_3.' . $profile_pic_path3->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath3 = public_path('user-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_3);

            if($data->doc_3!=null){
                $filesc = public_path('user-doc/') . $data->doc_3;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_3=$data->doc_3;
        }

        if ($request->hasFile('doc_4')) {
            $profile_pic_path4 = $request->file('doc_4');
            $doc_4=date('YmdHis') .'_'.$id. 'doc_4.' . $profile_pic_path4->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath4 = public_path('user-doc/');
            $profile_pic_path4->move($destinationPath4,$doc_4);

            if($data->doc_4!=null){
                $filesc = public_path('user-doc/') . $data->doc_4;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_4=$data->doc_4;
        }

        $data->other_doc=$request->other_doc;
        $data->doc_1=$doc_1;
        $data->doc_2=$doc_2;
        $data->doc_3=$doc_3;
        $data->doc_4=$doc_4;
        $data->register_stage=$request->register_stage;
        $data->save();
        // return $data;
        // return $data;
        return redirect()->route('gurudwara.registerstep6');
    }

    public function Register6(){
        $country=MdCountry::get();
        // return "hii";
        return view('gurudwara.register-stage-6',['country'=>$country]);
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
        // Mail::to($gurudwara_email)->send(new GurdwaraRegisterEmail($gurudwara_name,$gurudwara_email,$password));
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
