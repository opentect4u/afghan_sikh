<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdCountry;
use App\Models\TdUserDetails;
use App\Models\TdUserFamily;
use App\Models\TdUserFamilyDetails;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegisterEmail;
use App\Mail\UserRegisterOTPEmail;
use App\Models\MdUserLogin;
use Illuminate\Support\Facades\Hash;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends Controller
{
    public function Show(){
        $country=MdCountry::orderBy('name','asc')->get();
        return view('user.register',['country'=>$country]);
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
            // if(filter_var($email, FILTER_VALIDATE_EMAIL)!=false){
            //     return $email;
            // }else{
            //     return $email;
            // }
            Mail::to($email)->send(new UserRegisterOTPEmail($surname,$givenname,$url,$con_otp));
            return redirect()->route('user.otp')->with(['email_mobile'=>$email,'password'=>$request->password,'con_otp'=>$con_otp]);
            // return view('user.register-confirm',['searched'=>$request,'con_otp'=>$con_otp]);
        }
    }
    public function OTPShow(Request $request){
        return view('user.register-confirm');
    }
    
    public function ConfirmRegister1(Request $request){
        // return $request;
        session()->flush();
        $email=$request->email_mobile;
        $con_otp=$request->con_otp ;
        $otp=$request->otp ;
        // if($con_otp==''){
        //     $error="Something wrong please try again";
        //     return redirect()->route('user.otp')->with(['email_mobile'=>$email,'password'=>$request->password,'con_otp'=>$con_otp,'otp'=>$otp,'error'=>$error]); 
        // }
        if ($con_otp==$otp) {
            // return $request;
            $data=MdUserLogin::create(array(
                'user_id'=>$request->email_mobile,
                'password'=>Hash::make($request->password),
                'user_type'=>'U',
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
            return redirect()->route('user.registerstep2');
            // return view('user.register-stage-2',['id'=>$data->id,'email_mobile'=>$data->user_id]);
        
        }else{
            $error="otp did not match";
            return redirect()->route('user.otp')->with(['email_mobile'=>$email,'password'=>$request->password,'con_otp'=>$con_otp,'otp'=>$otp,'error'=>$error]);
            // return view('user.register-confirm',['searched'=>$request,'con_otp'=>$con_otp,'otp'=>$otp,'error'=>$error,'token'=>csrf_token()]);
        }
    }

    public function Register2()
    {
        // return Session::get('id');
        // return Session::get('email_mobile');
        $id=Session::get('id');
        $editdata=TdUserDetails::find($id);
        return view('user.register-stage-2',['editdata'=>$editdata]);
    }

    public function Register2Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdUserDetails::find($id);
        // return $data;
        if($data==null){
            $data1=TdUserDetails::create(array(
                'id'=>$id,
                // 'generate_user_id'=>$generate_user_id,
                'surname'=>$request->surname,
                'givenname' => $request->givenname,
                'gender' => $request->gender,
                'date_of_birth' => Carbon::parse($request->dob)->format('Y-m-d'),
                'afghan_id' => $request->afghan_id,
                'register_stage'=>$request->register_stage,
                'email'=>$email,
            ));
        }else{
            // return $data;
            $data->surname=$request->surname;
            $data->givenname=$request->givenname;
            $data->gender=$request->gender;
            $data->date_of_birth=Carbon::parse($request->dob)->format('Y-m-d');
            $data->afghan_id=$request->afghan_id;
            $data->register_stage=$request->register_stage;
            $data->save();

        }
        // return $data;
        return redirect()->route('user.registerstep21');
    }
    public function Register21()
    {
        // return Session::get('id');
        // return Session::get('email_mobile');
        $id=Session::get('id');
        $editdata=TdUserDetails::find($id);
        // return $editdata;
        return view('user.register-stage-2-1',['editdata'=>$editdata]);
    }

    public function Register21Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdUserDetails::find($id);

        if ($request->hasFile('user_logo')) {
            $profile_pic_path1 = $request->file('user_logo');
            $user_logo=date('YmdHis') .'_'.$id.$profile_pic_path1->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath1 = public_path('user-image/');
            $profile_pic_path1->move($destinationPath1,$user_logo);

            // if($data->user_logo!=null){
            //     $filesc = public_path('user-image/') . $data->user_logo;
            //     if (file_exists($filesc) != null) {
            //         unlink($filesc);
            //     }
            // } 

        }else{
            $user_logo=$data->user_logo;
        }
        $data->user_logo=$user_logo;
        $data->register_stage=$request->register_stage;
        $data->save();
        return redirect()->route('user.registerstep3');
        
    }

    public function Register3(){
        $country=MdCountry::orderBy('name','asc')->get();
        // return $country;
        $id=Session::get('id');
        $editdata=TdUserDetails::find($id);
        return view('user.register-stage-3',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register3Confirm(Request $request){
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdUserDetails::find($id);
        $data->birth_place=$request->birth_place;
        $data->birth_country=$request->birth_country;
        $data->nationality=$request->nationality;
        $data->previous_nationality=$request->previous_nationality;
        $data->register_stage=$request->register_stage;
        $data->save();
        // return $data;
        return redirect()->route('user.registerstep4');
    }

    public function Register4(){
        $country=MdCountry::orderBy('name','asc')->get();
        $id=Session::get('id');
        $editdata=TdUserDetails::find($id);
        return view('user.register-stage-4',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register4Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdUserDetails::find($id);
        $data->add_1=$request->add_1;
        $data->add_2=$request->add_2;
        $data->city=$request->city;
        $data->county=$request->county;
        $data->postcode=$request->postcode;
        $data->country=$request->country;
        $data->country_code=$request->country_code;
        $data->phone=$request->phone;
        $data->register_stage=$request->register_stage;
        $data->save();
        // return $data;
        return redirect()->route('user.registerstep5');
    }

    public function Register5(){
        $country=MdCountry::orderBy('name','asc')->get();
        $id=Session::get('id');
        $editdata=TdUserDetails::find($id);
        return view('user.register-stage-5',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register5Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdUserDetails::find($id);
        $data->marital_status=$request->marital_status;
        $data->religion=$request->religion;
        $data->profession=$request->profession;
        $data->register_stage=$request->register_stage;
        $data->save();
        // return $data;
        return redirect()->route('user.registerstep6');
    }

    public function Register6(){
        $country=MdCountry::orderBy('name','asc')->get();
        $id=Session::get('id');
        $editdata=TdUserDetails::find($id);
        return view('user.register-stage-6',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register6Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdUserDetails::find($id);
        $data->father_name=$request->father_name;
        $data->father_nationality=$request->father_nationality;
        $data->father_prev_nationality=$request->father_prev_nationality;
        $data->father_place_birth=$request->father_place_birth;
        $data->father_birth_country=$request->father_birth_country;
        $data->register_stage=$request->register_stage;
        $data->save();
        // return $data;
        return redirect()->route('user.registerstep7');
    }

    public function Register7(){
        $country=MdCountry::orderBy('name','asc')->get();
        $id=Session::get('id');
        $editdata=TdUserDetails::find($id);
        return view('user.register-stage-7',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register7Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdUserDetails::find($id);
        $data->mother_name=$request->mother_name;
        $data->mother_nationality=$request->mother_nationality;
        $data->mother_prev_nationality=$request->mother_prev_nationality;
        $data->mother_place_birth=$request->mother_place_birth;
        $data->mother_birth_country=$request->mother_birth_country;
        $data->register_stage=$request->register_stage;
        $data->save();
        // return $data;
        return redirect()->route('user.registerstep8');
    }

    public function Register8(){
        $country=MdCountry::orderBy('name','asc')->get();
        $id=Session::get('id');
        $editdata=TdUserDetails::find($id);
        return view('user.register-stage-8',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register8Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdUserDetails::find($id);
        $data->other_info=$request->other_info;
        $data->register_stage=$request->register_stage;
        $data->save();
        // return $data;
        return redirect()->route('user.registerstep9');
    }

    public function Register9(){
        // $id=Session::get('id');
        // return $id;
        $country=MdCountry::orderBy('name','asc')->get();
        $id=Session::get('id');
        $editdata=TdUserDetails::find($id);
        return view('user.register-stage-9',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register9Confirm(Request $request){
        // return $request;
        $id=Session::get('id');
        $email=Session::get('email_mobile');
        $data=TdUserDetails::find($id);

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

        $data->doc_1=$doc_1;
        $data->doc_1_name=$request->doc_1_name;
        $data->doc_2=$doc_2;
        $data->doc_2_name=$request->doc_2_name;
        $data->doc_3=$doc_3;
        $data->doc_3_name=$request->doc_3_name;
        $data->doc_4=$doc_4;
        $data->doc_4_name=$request->doc_4_name;
        $data->register_stage=$request->register_stage;
        $data->save();
        // return $data;
        return redirect()->route('user.registerstep91');
    }

    public function Register91(){
        $country=MdCountry::orderBy('name','asc')->get();
        // return Session::get('family_id');
        $id=Session::get('family_id');
        $editdata=TdUserFamily::find($id);
        return view('user.register-stage-9-1',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register91Confirm(Request $request){
        // return $request;
        $user_id=Session::get('id');
        $email=Session::get('email_mobile');
        // Session::forget('family_id');
        // return $user_id;
        $id=Session::get('family_id');
        $data=TdUserFamily::find($id);
        if($data==null){
            $data1=TdUserFamily::create(array(
                'user_details_id'=>$user_id,
                'first_name'     => $request->first_name ,
                'middle_name'    =>$request ->middle_name ,
                'last_name'      => $request->last_name ,
                'gender'         => $request->gender ,
                'relation'       => $request->relation ,
            ));

            Session::put(['family_id' => $data1->id]);

        }else{
            // return $data;
            $data->first_name=$request->first_name;
            $data->middle_name=$request->middle_name;
            $data->last_name=$request->last_name;
            $data->gender=$request->gender;
            $data->relation=$request->relation;
            $data->save();
            
        }
        // return $data;
        // $data->id;
        // return Session::get('family_id');
        return redirect()->route('user.registerstep92');
    }

    public function Register92(){
        $country=MdCountry::orderBy('name','asc')->get();
        $id=Session::get('family_id');
        $editdata=TdUserFamily::find($id);
        return view('user.register-stage-9-2',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register92Confirm(Request $request){
        // return $request;
        $user_id=Session::get('id');
        $email=Session::get('email_mobile');
        $id=Session::get('family_id');
        // return $family_id;
        $data=TdUserFamily::find($id);
        $data->current_citizenship=$request->current_citizenship;
        $data->previous_citizenship=$request->previous_citizenship;
        $data->passport_no=$request->passport_no;
        $data->passport_date_of_issue=date('Y-m-d',strtotime($request->passport_date_of_issue));
        $data->passport_date_of_expiry=date('Y-m-d',strtotime($request->passport_date_of_expiry));
        $data->save();
        return redirect()->route('user.registerstep93');
    }

    public function Register93(){
        $country=MdCountry::orderBy('name','asc')->get();
        $id=Session::get('family_id');
        $editdata=TdUserFamily::find($id);
        return view('user.register-stage-9-3',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register93Confirm(Request $request){
        // return $request;
        $user_id=Session::get('id');
        $email=Session::get('email_mobile');
        $id=Session::get('family_id');
        // return $family_id;
        $data=TdUserFamily::find($id);
        $data->afghan_id=$request->afghan_id;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->save();
        return redirect()->route('user.registerstep94');
    }
    public function Register94(){
        $country=MdCountry::orderBy('name','asc')->get();
        $id=Session::get('family_id');
        $editdata=TdUserFamily::find($id);
        return view('user.register-stage-9-4',['country'=>$country,'editdata'=>$editdata]);
    }

    public function Register94Confirm(Request $request){
        // return $request;
        $user_id=Session::get('id');
        $email=Session::get('email_mobile');
        $id=Session::get('family_id');
        // return $family_id;
        $data=TdUserFamily::find($id);

        if ($request->hasFile('other_doc_1')) {
            $profile_pic_path1 = $request->file('other_doc_1');
            $other_doc_1=date('YmdHis') .'_'.$id. 'other_doc_1.' . $profile_pic_path1->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath1 = public_path('user-family-doc/');
            $profile_pic_path1->move($destinationPath1,$other_doc_1);

            if($data->other_doc_1!=null){
                $filesc = public_path('user-family-doc/') . $data->other_doc_1;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $other_doc_1=$data->other_doc_1;
        }

        if ($request->hasFile('other_doc_2')) {
            $profile_pic_path2 = $request->file('other_doc_2');
            $other_doc_2=date('YmdHis') .'_'.$id. 'other_doc_2.' . $profile_pic_path2->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath2 = public_path('user-family-doc/');
            $profile_pic_path2->move($destinationPath2,$other_doc_2);

            if($data->other_doc_2!=null){
                $filesc = public_path('user-family-doc/') . $data->other_doc_2;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $other_doc_2=$data->other_doc_2;
        }

        if ($request->hasFile('other_doc_3')) {
            $profile_pic_path3 = $request->file('other_doc_3');
            $other_doc_3=date('YmdHis') .'_'.$id. 'other_doc_3.' . $profile_pic_path3->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath3 = public_path('user-family-doc/');
            $profile_pic_path3->move($destinationPath3,$other_doc_3);

            if($data->other_doc_3!=null){
                $filesc = public_path('user-family-doc/') . $data->other_doc_3;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $other_doc_3=$data->other_doc_3;
        }

        if ($request->hasFile('other_doc_4')) {
            $profile_pic_path4 = $request->file('other_doc_4');
            $other_doc_4=date('YmdHis') .'_'.$id. 'other_doc_4.' . $profile_pic_path4->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath4 = public_path('user-family-doc/');
            $profile_pic_path4->move($destinationPath4,$other_doc_4);

            if($data->other_doc_4!=null){
                $filesc = public_path('user-family-doc/') . $data->other_doc_4;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $other_doc_4=$data->other_doc_4;
        }

        $data->other_doc_1=$other_doc_1;
        $data->other_doc_1_name=$request->other_doc_1_name;
        $data->other_doc_2=$other_doc_2;
        $data->other_doc_2_name=$request->other_doc_2_name;
        $data->other_doc_3=$other_doc_3;
        $data->other_doc_3_name=$request->other_doc_3_name;
        $data->other_doc_4=$other_doc_4;
        $data->other_doc_4_name=$request->other_doc_4_name;
        $data->save();
        return redirect()->route('user.registerstep95');
    }

    public function Register95(){
        $country=MdCountry::orderBy('name','asc')->get();
        return view('user.register-stage-9-5',['country'=>$country]);
    }

    public function AddAnather(){
        Session::forget('family_id');
        return redirect()->route('user.registerstep91');
    }

    public function Register95Confirm(){
        return redirect()->route('user.registerstep10');
    }
    

    public function Register10(){
        // $id=Session::get('id');
        // return $id;
        $country=MdCountry::orderBy('name','asc')->get();
        return view('user.register-stage-10',['country'=>$country]);
    }

    public function EmailLink(Request $request){
        // return $request;
        $id=Crypt::decryptString($request->id);
        $email=Crypt::decryptString($request->email);
        // return $id;
        $register_stage=TdUserDetails::where('id',$id)->value('register_stage');
        // return $register_stage;
        // session()->flush();
        // Session::put(['id' => $data->id]);
        // Session::put(['email_mobile' => $data->user_id]);
        if ($register_stage!='') {
            // return $register_stage;
            $url='user.registerstep'.($register_stage+1);
            session()->flush();
            Session::put(['id' => $id]);
            Session::put(['email_mobile' => $email]);
            return redirect()->route($url);
        }else{
            $data=MdUserLogin::where('id',$id)->get();
            if(count($data)>0){
                session()->flush();
                Session::put(['id' => $id]);
                Session::put(['email_mobile' => $email]);
                return redirect()->route('user.registerstep2');
                // return "hello";
            }else{
                return "somthing wrong";
            }
            // return "hello";
        }
    }

    public function Register(Request $request){
        $surname=$request->input('surname');
        $givenname=$request->input('givenname');
        $gender=$request->input('gender');
        $date_of_birth=$request->input('date_of_birth');
        $birth_place=$request->input('birth_place');
        $birth_country=$request->input('birth_country');
        $nationality=$request->input('nationality');
        $previous_nationality=$request->input('previous_nationality');
        $marital_status=$request->input('marital_status');
        $religion=$request->input('religion');
        $present_address=$request->input('present_address');
        $profession=$request->input('profession');
        $father_name=$request->input('father_name');
        $father_nationality=$request->input('father_nationality');
        $father_prev_nationality=$request->input('father_prev_nationality');
        $father_birth_country=$request->input('father_birth_country');
        $mobile=$request->input('mobile');
        $email=$request->input('email');
        $other_info=$request->input('other_info');
        
        $generate_user_id=md5(uniqid(rand(), true));
        // $invID=10;
        // return $invID = str_pad($invID, 6, '0', STR_PAD_LEFT);
        $has_email=TdUserDetails::where('email',$email)->orWhere('mobile',$mobile)->get();

        if(count($has_email)>0){
            $msg="already";
        }else{

            $email1=$request->input('email1');
            $first_name1=$request->input('first_name1');
            $middle_name1=$request->input('middle_name1');
            $last_name1=$request->input('last_name1');
            $gender1=$request->input('gender1');
            $relation1=$request->input('relation1');
            $current_citizenship1=$request->input('current_citizenship1');
            $previous_citizenship1=$request->input('previous_citizenship1');
            $passport_no1=$request->input('passport_no1');
            $passport_date_of_issue1=$request->input('passport_date_of_issue1');
            $passport_date_of_expiry1=$request->input('passport_date_of_expiry1');
            $other_doc_1_1=$request->input('other_doc_1_1');
            $other_doc_2_1=$request->input('other_doc_2_1');
            if($first_name1=='' && $last_name1=='' && $email1==''){
            TdUserDetails::create(array(
                // 'generate_user_id'=>$generate_user_id,
                'surname'=>$surname,
                'givenname' => $givenname,
                'gender' => $gender,
                'date_of_birth' => $date_of_birth,
                'birth_place' => $birth_place,
                'birth_country' => $birth_country,
                'nationality' => $nationality,
                'previous_nationality' => $previous_nationality,
                'marital_status' => $marital_status,
                'religion' => $religion,
                'present_address' => $present_address,
                'profession' => $profession,
                'father_name' => $father_name,
                'father_nationality' => $father_nationality,
                'father_prev_nationality' => $father_prev_nationality,
                'father_birth_country' => $father_birth_country,
                'mobile' => $mobile,
                'email' => $email,
                'other_info' => $other_info,
                'active' => 'I',
            ));

            $user_id=DB::table('td_user_details')->where('email',$email)->value('id');
            // $invID=10;
            $invIDs = str_pad($user_id, 6, '0', STR_PAD_LEFT);
            DB::table('td_user_details')->where('id',$user_id)
            ->update([
                'generate_user_id'=>$invIDs,
            ]);
            // Mail::to($email)->send(new UserRegisterEmail($surname,$givenname));
            $msg="success";
            }else{
                $has_email1=TdUserFamilyDetails::where('email',$email1)->orWhere('mobile',$mobile)->get();
                
                if(count($has_email)>0 && count($$has_email1)>0){
                    $msg="already";
                }else{
                TdUserDetails::create(array(
                    // 'generate_user_id'=>$generate_user_id,
                    'surname'=>$surname,
                    'givenname' => $givenname,
                    'gender' => $gender,
                    'date_of_birth' => $date_of_birth,
                    'birth_place' => $birth_place,
                    'birth_country' => $birth_country,
                    'nationality' => $nationality,
                    'previous_nationality' => $previous_nationality,
                    'marital_status' => $marital_status,
                    'religion' => $religion,
                    'present_address' => $present_address,
                    'profession' => $profession,
                    'father_name' => $father_name,
                    'father_nationality' => $father_nationality,
                    'father_prev_nationality' => $father_prev_nationality,
                    'father_birth_country' => $father_birth_country,
                    'mobile' => $mobile,
                    'email' => $email,
                    'other_info' => $other_info,
                    'active' => 'I',
                ));
    
                $user_id=DB::table('td_user_details')->where('email',$email)->value('id');
                // $invID=10;
                $invIDs = str_pad($user_id, 6, '0', STR_PAD_LEFT);
                DB::table('td_user_details')->where('id',$user_id)
                ->update([
                    'generate_user_id'=>$invIDs,
                ]);
            // $email1=$request->input('email1');
            // $first_name1=$request->input('first_name1');
            // $middle_name1=$request->input('middle_name1');
            // $last_name1=$request->input('last_name1');
            // $gender1=$request->input('gender1');
            // $relation1=$request->input('relation1');
            // $current_citizenship1=$request->input('current_citizenship1');
            // $previous_citizenship1=$request->input('previous_citizenship1');
            // $passport_no1=$request->input('passport_no1');
            // $passport_date_of_issue1=$request->input('passport_date_of_issue1');
            // $passport_date_of_expiry1=$request->input('passport_date_of_expiry1');
            // $other_doc_1_1=$request->input('other_doc_1_1');
            // $other_doc_2_1=$request->input('other_doc_2_1');

            // if($first_name1!='' && $last_name1!='' && $email1!=''){
                TdUserFamilyDetails::create(array(
                    'user_details_id'=>$user_id,
                    'email'=>$email1,
                    'first_name'=>$first_name1,
                    'middle_name'=>$middle_name1,
                    'last_name'=>$last_name1,
                    'gender'=>$gender1,
                    'relation'=>$relation1,
                    'current_citizenship'=> $current_citizenship1,
                    'previous_citizenship'=>$previous_citizenship1 ,
                    'passport_no'=> $passport_no1,
                    'passport_date_of_issue'=>$passport_date_of_issue1,
                    'passport_date_of_expiry'=> $passport_date_of_expiry1,
                    'other_doc_1'=> $other_doc_1_1,
                    'other_doc_2' =>$other_doc_2_1,
                    'created_by'=> $givenname,
                ));
                // Mail::to($email)->send(new UserRegisterEmail($surname,$givenname));
                $msg="success";
                }
            }
            
        }

        $arrNewResult = array();
        $arrNewResult['surname'] = $surname;
        $arrNewResult['msg'] = $msg;
        // $arrNewResult['payment_type'] = $val[3];
        $status_json = json_encode($arrNewResult);
        echo $status_json;

    }
}
