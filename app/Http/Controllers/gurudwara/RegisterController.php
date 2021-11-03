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
        $country=MdCountry::orderBy('name','asc')->get();
        return view('gurudwara.register',['country'=>$country]);
    }

    public function Register1(Request $request){
        // return $request;
        $email=$request->email;
        $is_has=TdGurudwaraDetails::where('gurudwara_email',$email)->get();
        // return $is_has;
        if (count($is_has)>0) {
            return redirect()->back()->with('already','already');
        }else{
            $con_otp=rand(100000,999999);
            $url="";
            $surname=$request->gurudwara_name;
            $givenname="";
            if(filter_var($email, FILTER_VALIDATE_EMAIL)!=false){
                // Mail::to($email)->send(new UserRegisterOTPEmail($surname,$givenname,$url,$con_otp));
            }else{
                // SMS send HERE
            }
            return redirect()->route('gurudwara.otp')->with([
                'organisation'=>$request->type_of_organisation,
                'gurudwara_name'=>$request->gurudwara_name,
                'country'=>$request->country,
                'email'=>$email,
                'country_code'=>$request->country_code,
                'phone'=>$request->phone,
                'password'=>$request->password,
                'con_otp'=>$con_otp
            ]);
            // return view('user.register-confirm',['searched'=>$request,'con_otp'=>$con_otp]);
        }
    }
    public function OTPShow(Request $request){
        return view('gurudwara.register-confirm');
    }
    
    public function ConfirmRegister1(Request $request){
        // return $request;
        session()->flush();
        $email=$request->email;
        $con_otp=$request->con_otp ;
        $otp=$request->otp ;
        $organisation=$request->organisation ;
        // if($con_otp==''){
        //     $error="Something wrong please try again";
        //     return redirect()->route('gurudwara.otp')->with(['email_mobile'=>$email,'password'=>$request->password,'con_otp'=>$con_otp,'otp'=>$otp,'error'=>$error,'organisation'=>$organisation]); 
        // }
        if ($con_otp==$otp) {
            // return $request;
            $country=$request->country;
            $organisation=$request->organisation;
            $country_code=MdCountry::where('id',$country)->value('code');
            // return $country_code;
            if($organisation=="G"){
                $latest = MdUserLogin::where('user_type','G')->orderBy('user_id','desc')->take(1)->get();
            }elseif($organisation=="C"){
                $latest = MdUserLogin::where('user_type','C')->orderBy('user_id','desc')->take(1)->get();
            }elseif($organisation=="O"){
                $latest = MdUserLogin::where('user_type','O')->orderBy('user_id','desc')->take(1)->get();
            }
            // return $latest;
            if ($latest->count()>0) {
                // return $latest;
                // $latest = client::orderBy('id','desc')->take(1)->get();
                $client_prev_no = $latest[0]->user_id;
                // return $client_prev_no;
                // return substr($client_prev_no,9,13);
                if($organisation=="G"){
                    $user_id = 'AFS-G-'.$country_code.'-0000'.(substr($client_prev_no,9,13)+1);
                }elseif($organisation=="C"){
                    $user_id = 'AFS-C-'.$country_code.'-0000'.(substr($client_prev_no,9,13)+1);
                }elseif($organisation=="O"){
                    $user_id = 'AFS-O-'.$country_code.'-0000'.(substr($client_prev_no,9,13)+1);
                }
            }else{
                if($organisation=="G"){
                    $user_id = 'AFS-G-'.$country_code.'-00001';
                }elseif($organisation=="C"){
                    $user_id = 'AFS-C-'.$country_code.'-00001';
                }elseif($organisation=="O"){
                    $user_id = 'AFS-O-'.$country_code.'-00001';
                }
            }
            // return $user_id;

            $data=MdUserLogin::create(array(
                'user_id'=>$user_id,
                'password'=>Hash::make($request->password),
                'user_type'=>$organisation,
                'active' =>'I',
            ));

            TdGurudwaraDetails::create(array(
                'id'=>$data->id,
                'gurudwara_name'=>$request->gurudwara_name,
                'country'=>$request->country,
                'gurudwara_email'=>$request->email,
                'gurudwara_dial_code'=>$request->country_code,
                'gurudwara_phone_no'=>$request->phone,
            ));
            // Session::forget('onoff_flag');
            Session::put(['id' => $data->id]);
            Session::put(['email_mobile' => $data->user_id]);
            // return $data;
            // return $data->id;
            // return $data->user_id;
            $mainurl=app('App\Http\Controllers\HomeController')->MainURL();
            $url=$mainurl.'user/emaillink?id='.Crypt::encryptString($data->id).'&email='.Crypt::encryptString($data->user_id);
            $surname=$request->gurudwara_name;
            $givenname="";
            if(filter_var($email, FILTER_VALIDATE_EMAIL)!=false){
                // Mail::to($email)->send(new UserRegisterEmail($surname,$givenname,$user_id,$password,$url));
            }else{
                // sms send here
            }
            return redirect()->route('gurudwara.registerstep2');
            // return view('user.register-stage-2',['id'=>$data->id,'email_mobile'=>$data->user_id]);
        
        }else{
            $error="OTP did not match";
            return redirect()->route('gurudwara.otp')->with([
                'organisation'=>$request->organisation,
                'gurudwara_name'=>$request->gurudwara_name,
                'country'=>$request->country,
                'email'=>$email,
                'country_code'=>$request->country_code,
                'phone'=>$request->phone,
                'password'=>$request->password,
                'con_otp'=>$con_otp,
                'otp'=>$otp,
                'error'=>$error
            ]);
            // return view('user.register-confirm',['searched'=>$request,'con_otp'=>$con_otp,'otp'=>$otp,'error'=>$error,'token'=>csrf_token()]);
        }
    }

    public function Register2()
    {
        // return Session::get('id');
        // return Session::get('email_mobile');
        $id=Session::get('id');
        $editdata=TdGurudwaraDetails::find($id);
        return view('gurudwara.register-stage-2',['editdata'=>$editdata]);
    }

    public function Register2Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdGurudwaraDetails::find($id);
        // return $data;
        if($data==null){
            TdGurudwaraDetails::create(array(
                'id'=>$id,
                // 'generate_user_id'=>$generate_user_id,
                'gurudwara_name'=>$request->surname,
                // 'givenname' => $request->givenname,
                'website' => $request->website,
                // 'date_of_birth' => Carbon::parse($request->dob)->format('Y-m-d'),
                'gurudwara_phone_no' => $request->phone_no,
                'register_stage'=>$request->register_stage,
            ));
        }else{
            $data->gurudwara_charity_reg_no=$request->gurudwara_charity_reg_no;
            // $data->date_of_birth=Carbon::parse($request->dob)->format('Y-m-d');
            // $data->afghan_id=$request->afghan_id;
            $data->website=$request->website;
            $data->save();
        }
        // return $data;
        return redirect()->route('gurudwara.registerstep3');
    }

    public function Register3(){
        $id=Session::get('id');
        $editdata=TdGurudwaraDetails::find($id);
        $country=MdCountry::orderBy('name','asc')->get();
        return view('gurudwara.register-stage-3',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register3Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdGurudwaraDetails::find($id);
        $data->gurudwara_address=$request->gurudwara_address;
        $data->gurudwara_address_2=$request->gurudwara_address_2;
        $data->city=$request->city;
        $data->county=$request->county;
        $data->post_code=$request->post_code;
        // $data->country=$request->country;
        $data->register_stage=$request->register_stage;
        $data->save();
        // return $data;
        return redirect()->route('gurudwara.registerstep31');
    }

    public function Register31(){
        $id=Session::get('id');
        $editdata=TdGurudwaraDetails::find($id);
        $country=MdCountry::orderBy('name','asc')->get();
        return view('gurudwara.register-stage-3-1',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register31Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdGurudwaraDetails::find($id);

        if ($request->hasFile('gurudwara_doc_1')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_1');
            $gurudwara_doc_1=date('YmdHis') .'_'.$id. 'doc_1.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_1);

            if($data->gurudwara_doc_1!=null){
                $filesc = public_path('gurudwara-doc/') . $data->gurudwara_doc_1;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_1=$data->gurudwara_doc_1;
        }
        if ($request->hasFile('gurudwara_doc_2')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_2');
            $gurudwara_doc_2=date('YmdHis') .'_'.$id. 'doc_2.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_2);

            if($data->gurudwara_doc_2!=null){
                $filesc = public_path('gurudwara-doc/') . $data->gurudwara_doc_2;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_2=$data->gurudwara_doc_2;
        }

        if ($request->hasFile('gurudwara_doc_3')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_3');
            $gurudwara_doc_3=date('YmdHis') .'_'.$id. 'doc_3.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_3);

            if($data->gurudwara_doc_3!=null){
                $filesc = public_path('gurudwara-doc/') . $data->gurudwara_doc_3;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_3=$data->gurudwara_doc_3;
        }


        if ($request->hasFile('gurudwara_doc_4')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_4');
            $gurudwara_doc_4=date('YmdHis') .'_'.$id. 'doc_4.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_4);

            if($data->gurudwara_doc_4!=null){
                $filesc = public_path('gurudwara-doc/') . $data->gurudwara_doc_4;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_4=$data->gurudwara_doc_4;
        }

        if ($request->hasFile('gurudwara_doc_5')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_5');
            $gurudwara_doc_5=date('YmdHis') .'_'.$id. 'doc_5.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_5);

            if($data->gurudwara_doc_5!=null){
                $filesc = public_path('gurudwara-doc/') . $data->gurudwara_doc_5;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_5=$data->gurudwara_doc_5;
        }

        if ($request->hasFile('gurudwara_doc_6')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_6');
            $gurudwara_doc_6=date('YmdHis') .'_'.$id. 'doc_6.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_6);

            if($data->gurudwara_doc_6!=null){
                $filesc = public_path('gurudwara-doc/') . $data->gurudwara_doc_6;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_6=$data->gurudwara_doc_6;
        }

        if ($request->hasFile('gurudwara_doc_7')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_7');
            $gurudwara_doc_7=date('YmdHis') .'_'.$id. 'doc_7.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_7);

            if($data->gurudwara_doc_7!=null){
                $filesc = public_path('gurudwara-doc/') . $data->gurudwara_doc_7;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_7=$data->gurudwara_doc_7;
        }

        if ($request->hasFile('gurudwara_doc_8')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_8');
            $gurudwara_doc_8=date('YmdHis') .'_'.$id. 'doc_8.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_8);

            if($data->gurudwara_doc_8!=null){
                $filesc = public_path('gurudwara-doc/') . $data->gurudwara_doc_8;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_8=$data->gurudwara_doc_8;
        }

        if ($request->hasFile('gurudwara_doc_9')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_9');
            $gurudwara_doc_9=date('YmdHis') .'_'.$id. 'doc_9.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_9);

            if($data->gurudwara_doc_9!=null){
                $filesc = public_path('gurudwara-doc/') . $data->gurudwara_doc_9;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_9=$data->gurudwara_doc_9;
        }

        if ($request->hasFile('gurudwara_doc_10')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_10');
            $gurudwara_doc_10=date('YmdHis') .'_'.$id. 'doc_10.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_10);

            if($data->gurudwara_doc_10!=null){
                $filesc = public_path('gurudwara-doc/') . $data->gurudwara_doc_10;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_10=$data->gurudwara_doc_10;
        }

        $data->gurudwara_doc_1=$gurudwara_doc_1;
        $data->gurudwara_doc_1_name=$request->gurudwara_doc_1_name;
        $data->gurudwara_doc_2=$gurudwara_doc_2;
        $data->gurudwara_doc_2_name=$request->gurudwara_doc_2_name;
        $data->gurudwara_doc_3=$gurudwara_doc_3;
        $data->gurudwara_doc_3_name=$request->gurudwara_doc_3_name;
        $data->gurudwara_doc_4=$gurudwara_doc_4;
        $data->gurudwara_doc_4_name=$request->gurudwara_doc_4_name;
        $data->gurudwara_doc_5=$gurudwara_doc_5;
        $data->gurudwara_doc_5_name=$request->gurudwara_doc_5_name;
        $data->gurudwara_doc_6=$gurudwara_doc_6;
        $data->gurudwara_doc_6_name=$request->gurudwara_doc_6_name;
        $data->gurudwara_doc_7=$gurudwara_doc_7;
        $data->gurudwara_doc_7_name=$request->gurudwara_doc_7_name;
        $data->gurudwara_doc_8=$gurudwara_doc_8;
        $data->gurudwara_doc_8_name=$request->gurudwara_doc_8_name;
        $data->gurudwara_doc_9=$gurudwara_doc_9;
        $data->gurudwara_doc_9_name=$request->gurudwara_doc_9_name;
        $data->gurudwara_doc_10=$gurudwara_doc_10;
        $data->gurudwara_doc_10_name=$request->gurudwara_doc_10_name;

        $data->register_stage=$request->register_stage;
        $data->save();
        // return $data;
        return redirect()->route('gurudwara.registerstep4');
    }

    public function Register4(){
        $id=Session::get('id');
        $editdata=TdGurudwaraDetails::find($id);
        $country=MdCountry::orderBy('name','asc')->get();
        return view('gurudwara.register-stage-4',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register4Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdGurudwaraDetails::find($id);
        $data->gurudwara_head_name=$request->gurudwara_head_name;

        $data->gurudwara_head_name=$request->gurudwara_head_name;
        $data->gurudwara_head_dob=$request->gurudwara_head_dob;
        $data->nationality=$request->nationality;
        $data->place_of_birth=$request->place_of_birth;
        $data->previous_nationality=$request->previous_nationality;
        $data->religion=$request->religion;
        $data->passport_no=$request->passport_no;
        $data->passport_date_of_issue=$request->passport_date_of_issue;
        $data->passport_date_of_expiry=$request->passport_date_of_expiry;



        // $data->gurudwara_head_address=$request->gurudwara_head_address;
        // $data->gurudwara_head_phone_no=$request->gurudwara_head_phone_no;
        // $data->gurudwara_head_email=$request->gurudwara_head_email;
        // $data->phone=$request->phone;
        $data->register_stage=$request->register_stage;
        $data->save();
        // return $data;
        return redirect()->route('gurudwara.registerstep41');
    }

    public function Register41(Type $var = null)
    {
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $country=MdCountry::orderBy('name','asc')->get();
        $editdata=TdGurudwaraDetails::find($id);
        return view('gurudwara.register-stage-4-1',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register41Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdGurudwaraDetails::find($id);
        $data->gurudwara_head_name=$request->gurudwara_head_name;
        $data->gurudwara_head_home_address=$request->gurudwara_head_home_address;
        $data->gurudwara_head_job_address=$request->gurudwara_head_job_address;
        $data->gurudwara_head_position=$request->gurudwara_head_position;
        $data->gurudwara_head_phone_no=$request->gurudwara_head_phone_no;
        $data->gurudwara_head_email=$request->gurudwara_head_email;
        $data->register_stage=$request->register_stage;
        $data->save();
        // return $data;
        return redirect()->route('gurudwara.registerstep5');
    }

    public function Register5(){
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $country=MdCountry::orderBy('name','asc')->get();
        $editdata=TdGurudwaraDetails::find($id);
        return view('gurudwara.register-stage-5',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register5Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdGurudwaraDetails::find($id);


        if ($request->hasFile('gurudwara_doc_1')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_1');
            $gurudwara_doc_1=date('YmdHis') .'_'.$id. 'doc_1.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-head-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_1);

            if($data->gurudwara_doc_1!=null){
                $filesc = public_path('gurudwara-head-doc/') . $data->gurudwara_doc_1;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_1=$data->gurudwara_doc_1;
        }
        if ($request->hasFile('gurudwara_doc_2')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_2');
            $gurudwara_doc_2=date('YmdHis') .'_'.$id. 'doc_2.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-head-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_2);

            if($data->gurudwara_doc_2!=null){
                $filesc = public_path('gurudwara-head-doc/') . $data->gurudwara_doc_2;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_2=$data->gurudwara_doc_2;
        }

        if ($request->hasFile('gurudwara_doc_3')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_3');
            $gurudwara_doc_3=date('YmdHis') .'_'.$id. 'doc_3.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-head-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_3);

            if($data->gurudwara_doc_3!=null){
                $filesc = public_path('gurudwara-head-doc/') . $data->gurudwara_doc_3;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_3=$data->gurudwara_doc_3;
        }


        if ($request->hasFile('gurudwara_doc_4')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_4');
            $gurudwara_doc_4=date('YmdHis') .'_'.$id. 'doc_4.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-head-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_4);

            if($data->gurudwara_doc_4!=null){
                $filesc = public_path('gurudwara-head-doc/') . $data->gurudwara_doc_4;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_4=$data->gurudwara_doc_4;
        }

        if ($request->hasFile('gurudwara_doc_5')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_5');
            $gurudwara_doc_5=date('YmdHis') .'_'.$id. 'doc_5.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-head-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_5);

            if($data->gurudwara_doc_5!=null){
                $filesc = public_path('gurudwara-head-doc/') . $data->gurudwara_doc_5;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_5=$data->gurudwara_doc_5;
        }

        if ($request->hasFile('gurudwara_doc_6')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_6');
            $gurudwara_doc_6=date('YmdHis') .'_'.$id. 'doc_6.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-head-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_6);

            if($data->gurudwara_doc_6!=null){
                $filesc = public_path('gurudwara-head-doc/') . $data->gurudwara_doc_6;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_6=$data->gurudwara_doc_6;
        }

        if ($request->hasFile('gurudwara_doc_7')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_7');
            $gurudwara_doc_7=date('YmdHis') .'_'.$id. 'doc_7.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-head-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_7);

            if($data->gurudwara_doc_7!=null){
                $filesc = public_path('gurudwara-head-doc/') . $data->gurudwara_doc_7;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_7=$data->gurudwara_doc_7;
        }

        if ($request->hasFile('gurudwara_doc_8')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_8');
            $gurudwara_doc_8=date('YmdHis') .'_'.$id. 'doc_8.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-head-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_8);

            if($data->gurudwara_doc_8!=null){
                $filesc = public_path('gurudwara-head-doc/') . $data->gurudwara_doc_8;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_8=$data->gurudwara_doc_8;
        }

        if ($request->hasFile('gurudwara_doc_9')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_9');
            $gurudwara_doc_9=date('YmdHis') .'_'.$id. 'doc_9.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-head-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_9);

            if($data->gurudwara_doc_9!=null){
                $filesc = public_path('gurudwara-head-doc/') . $data->gurudwara_doc_9;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_9=$data->gurudwara_doc_9;
        }

        if ($request->hasFile('gurudwara_doc_10')) {
            $profile_pic_path1 = $request->file('gurudwara_doc_10');
            $gurudwara_doc_10=date('YmdHis') .'_'.$id. 'doc_10.' . $profile_pic_path1->getClientOriginalExtension();
            $destinationPath1 = public_path('gurudwara-head-doc/');
            $profile_pic_path1->move($destinationPath1,$gurudwara_doc_10);

            if($data->gurudwara_doc_10!=null){
                $filesc = public_path('gurudwara-head-doc/') . $data->gurudwara_doc_10;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $gurudwara_doc_10=$data->gurudwara_doc_10;
        }



        
        $data->other_doc=$request->other_doc;

        $data->gud_head_doc_1=$gurudwara_doc_1;
        $data->gud_head_doc_1_name=$request->gurudwara_doc_1_name;
        $data->gud_head_doc_2    =$gurudwara_doc_2;
        $data->gud_head_doc_2_name=$request->gurudwara_doc_2_name;
        $data->gud_head_doc_3   =$gurudwara_doc_3;
        $data->gud_head_doc_3_name=$request->gurudwara_doc_3_name;
        $data->gud_head_doc_4=$gurudwara_doc_4;
        $data->gud_head_doc_4_name    =$request->gurudwara_doc_4_name;
        $data->gud_head_doc_5    =$gurudwara_doc_5;
        $data->gud_head_doc_5_name        =$request->gurudwara_doc_5_name;
        $data->gud_head_doc_6    =$gurudwara_doc_6;
        $data->gud_head_doc_6_name        =$request->gurudwara_doc_6_name;
        $data->gud_head_doc_7    =$gurudwara_doc_7;
        $data->gud_head_doc_7_name    =$request->gurudwara_doc_7_name;
        $data->gud_head_doc_8    =$gurudwara_doc_8;
        $data->gud_head_doc_8_name    =$request->gurudwara_doc_8_name;
        $data->gud_head_doc_9    =$gurudwara_doc_9;
        $data->gud_head_doc_9_name        =$request->gurudwara_doc_9_name;
        $data->gud_head_doc_10    =$gurudwara_doc_10;
        $data->gud_head_doc_10_name    =$request->gurudwara_doc_10_name;

        $data->register_stage=$request->register_stage;
        $data->save();
        // return $data;
        // return $data;
        return redirect()->route('gurudwara.registerstep6');
    }

    public function Register6(){
        $country=MdCountry::orderBy('name','asc')->get();
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
