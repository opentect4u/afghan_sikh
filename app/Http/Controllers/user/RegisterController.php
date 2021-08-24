<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdCountry;
use App\Models\TdUserDetails;
use App\Models\TdUserFamilyDetails;
use DB;

class RegisterController extends Controller
{
    public function Show(){
        $country=MdCountry::get();
        return view('user.register',['country'=>$country]);
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
            TdUserFamilyDetails::create(array(
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
                'created_by'=> $givenname,
            ));
        }
        $arrNewResult = array();
        $arrNewResult['surname'] = $surname;
        $arrNewResult['succes'] = "success";
        // $arrNewResult['payment_type'] = $val[3];
        $status_json = json_encode($arrNewResult);
        echo $status_json;

    }
}
