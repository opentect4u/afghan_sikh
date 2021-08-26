<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdCountry;
use App\Models\TdUserDetails;
use App\Models\TdUserFamilyDetails;
use App\Models\TdServiceDetails;
use DB;

class ServicesRegisterController extends Controller
{
    public function Show(Request $request){
        // return $request;
        // return $b = random_str(8, 'QWERTYUIOPLKJHGFDSAZXCVBNM1234567890');
        // return string(32);
        $purpose=$request->purpose;
        $country=MdCountry::get();

        return view('user.services-register',['purpose'=>$purpose,'country'=>$country]);
    }

    public function RegisterAjax(Request $request){
        $email=$request->input('email');
        $registration_no=$request->input('registration_no');
        // $gender=$request->input('gender');

        $generate_user_id='';
        $surname='';
        $givenname='';
        $gender='';
        $date_of_birth='';
        $birth_place='';
        $birth_country='';
        $nationality='';
        $previous_nationality='';
        $marital_status='';
        $religion='';
        $present_address='';
        $profession='';
        $father_name='';
        $father_nationality='';
        $father_prev_nationality='';
        $father_birth_country='';
        $mobile='';
        $emaild='';
        $other_info='';
        $active='';
        $purpose='';
        $gurudwara_id='';

        $data=TdUserDetails::where('active','A')->where('email',$email)->orWhere('mobile',$email)->get();
        // $data=TdUserDetails::where('active','A')->where('email',$email)->orWhere('generate_user_id',$registration_no)->get();
        foreach($data as $datas){
            $id=$datas->id;
            $generate_user_id=$datas->generate_user_id;
            $surname=$datas->surname;
            $givenname=$datas->givenname;
            $gender=$datas->gender;
            $date_of_birth=$datas->date_of_birth;
            $birth_place=$datas->birth_place;
            $birth_country=$datas->birth_country;
            $nationality=$datas->nationality;
            $previous_nationality=$datas->previous_nationality;
            $marital_status=$datas->marital_status;
            $religion=$datas->religion;
            $present_address=$datas->present_address;
            $profession=$datas->profession;
            $father_name=$datas->father_name;
            $father_nationality=$datas->father_nationality;
            $father_prev_nationality=$datas->father_prev_nationality;
            $father_birth_country=$datas->father_birth_country;
            $mobile=$datas->mobile;
            $emaild=$datas->email;
            $other_info=$datas->other_info;
            $active=$datas->active;
            $purpose=$datas->purpose;
            $gurudwara_id=$datas->gurudwara_id;
            // $remark==$datas->remark;
            // 'surname'=>$surname,
            // 'givenname' => $givenname,
            // 'gender' => $gender,
            // 'date_of_birth' => $date_of_birth,
            // 'birth_place' => $birth_place,
            // 'birth_country' => $birth_country,
            // 'nationality' => $nationality,
            // 'previous_nationality' => $previous_nationality,
            // 'marital_status' => $marital_status,
            // 'religion' => $religion,
            // 'present_address' => $present_address,
            // 'profession' => $profession,
            // 'father_name' => $father_name,
            // 'father_nationality' => $father_nationality,
            // 'father_prev_nationality' => $father_prev_nationality,
            // 'father_birth_country' => $father_birth_country,
            // 'mobile' => $mobile,
            // 'email' => $email,
            // 'other_info' => $other_info,
            // 'active' => 'I',
        }

        $arrNewResult = array();
        $arrNewResult['user_details'] = $data;
        $arrNewResult['generate_user_id'] = $generate_user_id;

        $arrNewResult['surname'] = $surname;
        $arrNewResult['givenname'] = $givenname;
        $arrNewResult['gender'] = $gender;
        $arrNewResult['date_of_birth'] = $date_of_birth;
        $arrNewResult['birth_place'] = $birth_place;
        $arrNewResult['birth_country'] = $birth_country;
        $arrNewResult['nationality'] = $nationality;
        $arrNewResult['previous_nationality'] = $previous_nationality;
        $arrNewResult['marital_status'] = $marital_status;
        $arrNewResult['religion'] = $religion;
        $arrNewResult['present_address'] = $present_address;
        $arrNewResult['profession'] = $profession;
        $arrNewResult['father_name'] = $father_name;
        $arrNewResult['father_nationality'] = $father_nationality;
        $arrNewResult['father_prev_nationality'] = $father_prev_nationality;
        $arrNewResult['father_birth_country'] = $father_birth_country;
        $arrNewResult['mobile'] = $mobile;
        $arrNewResult['email'] = $emaild;
        $arrNewResult['other_info'] = $other_info;
        $arrNewResult['active'] = $active;
        $arrNewResult['purpose'] = $purpose;
        $arrNewResult['gurudwara_id'] = $gurudwara_id;
        // $arrNewResult['remark'] = $remark;
        
        // $arrNewResult['generate_user_id'] = $generate_user_id;
        // $arrNewResult['payment_type'] = $val[3];
        $status_json = json_encode($arrNewResult);
        echo $status_json;

    }

    public function Register(Request $request){
        // return $request ;
        $email=$request->email;
        $registration_no=$request->registration_no;
        $surname=$request->surname;
        $givenname=$request->givenname;
        $gender=$request->gender;
        $date=$request->date;
        $birth_place=$request->birth_place;
        $birth_country=$request->birth_country;
        $nationality=$request->nationality;
        $previous_nationality=$request->previous_nationality;
        $marital_status=$request->marital_status;

        $religion=$request->religion;
        $present_address=$request->present_address;
        $profession=$request->profession;
        $father_name=$request->father_name;
        $father_nationality=$request->father_nationality;
        $father_prev_nationality=$request->father_prev_nationality;
        $father_birth_country=$request->father_birth_country;
        $mobile=$request->mobile;
        $message=$request->message;
        $other_info=$request->other_info;
        $gurudwara_id=$request->gurudwara_id;
        $generate_user_id=$request->generate_user_id;
        
        if($request->register_by=="Self"){
        $data=TdServiceDetails::create(array(
            'generate_user_id'=>$generate_user_id,
            'surname'=>$surname,
            'givenname' => $givenname,
            'gender' => $gender,
            'date_of_birth' => $date,
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
            'gurudwara_id'=>$gurudwara_id,
        ));
        }
        if($request->register_by=="Family"){
            $data=[];
            // $data=TdUserFamilyDetails::create(array(
            //     'user_details_id'=>,
            //     'first_name',
            //     'middle_name',
            //     'last_name',
            //     'gender',
            //     'relation',
            //     'current_citizenship' ,
            //     'previous_citizenship' ,
            //     'passport_no' ,
            //     'passport_date_of_issue',
            //     'passport_date_of_expiry' ,
            //     'other_doc_1' ,
            //     'other_doc_2' ,
            //     'created_by' ,
                
            // ));
        }
        // return $data;
        if( $data!=''){
            return redirect()->back()->with("success","success");
        }else{
            return redirect()->back()->with("error","error");
        }
    }

    public function RegisterFamily(Request $request){
        $family_email=$request->family_email;
        $user_id=DB::table('td_user_details')->where('email',$family_email)->value('id');

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

        if($first_name1!='' && $last_name1!='' && $relation1!='' && $current_citizenship1!='' ){
            $data=TdUserFamilyDetails::create(array(
                'user_details_id'=>$user_id,
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
                // 'created_by'=> $givenname,
            ));
        }

        if( $data!=''){
            return redirect()->back()->with("success","success");
        }else{
            return redirect()->back()->with("error","error");
        }
    }
}
