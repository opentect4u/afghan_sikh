<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdCountry;
use App\Models\TdUserDetails;
use App\Models\TdUserFamilyDetails;
use App\Models\TdServiceDetails;
use App\Models\TdUserFamily;
use App\Models\TdGurudwaraDetails;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;

class ServicesRegisterController extends Controller
{
    public function __construct() {
        $this->middleware('is_user');
    }

    public function Show(Request $request){
        // return $request;
        // return $b = random_str(8, 'QWERTYUIOPLKJHGFDSAZXCVBNM1234567890');
        // return string(32);
        $purpose=$request->purpose;
        $country=MdCountry::orderBy('name','asc')->get();

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

    public function Registerold(Request $request){
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
        $purpose=$request->purpose;

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
            'purpose'=>$purpose,
            'application_date'=>date('Y-m-d'),
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

    public function ManageFinance(){
        $service_type="FINANCE";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $data=TdServiceDetails::where('self_id',$id)->where('service_type',$service_type)->orderBy('application_date','desc')->get();
        // return $data;
        return view('user.service-manage',['data'=>$data,'service_type'=>$service_type]);
    }

    public function ManageFAMILY(){
        $service_type="FAMILY DISPUTES";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $data=TdServiceDetails::where('self_id',$id)->where('service_type',$service_type)->orderBy('application_date','desc')->get();
        // return $data;
        return view('user.service-manage',['data'=>$data,'service_type'=>$service_type]); 
    }

    public function ManageMARRIAGES(){
        $service_type="MARRIAGES ISSUES";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $data=TdServiceDetails::where('self_id',$id)->where('service_type',$service_type)->orderBy('application_date','desc')->get();
        // return $data;
        return view('user.service-manage',['data'=>$data,'service_type'=>$service_type]); 
    }

    public function ManageRELIGIOUS(){
        $service_type="RELIGIOUS ISSUE";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $data=TdServiceDetails::where('self_id',$id)->where('service_type',$service_type)->orderBy('application_date','desc')->get();
        // return $data;
        return view('user.service-manage',['data'=>$data,'service_type'=>$service_type]); 
    }

    public function ManageREUNION(){
        $service_type="REUNION FAMILY";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $data=TdServiceDetails::where('self_id',$id)->where('service_type',$service_type)->orderBy('application_date','desc')->get();
        // return $data;
        return view('user.service-manage',['data'=>$data,'service_type'=>$service_type]); 
    }

    public function ManagePROPERTY(){
        $service_type="PROPERTY DISPUTE";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $data=TdServiceDetails::where('self_id',$id)->where('service_type',$service_type)->orderBy('application_date','desc')->get();
        // return $data;
        return view('user.service-manage',['data'=>$data,'service_type'=>$service_type]); 
    }

    public function ManageDIVORCE(){
        $service_type="DIVORCE DISPUTE";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $data=TdServiceDetails::where('self_id',$id)->where('service_type',$service_type)->orderBy('application_date','desc')->get();
        // return $data;
        return view('user.service-manage',['data'=>$data,'service_type'=>$service_type]); 
    }

    public function ManageOTHER(){
        $service_type="OTHER";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $data=TdServiceDetails::where('self_id',$id)->where('service_type',$service_type)->orderBy('application_date','desc')->get();
        // return $data;
        return view('user.service-manage',['data'=>$data,'service_type'=>$service_type]); 
    }

    public function ShowFinance(){
        // return "hii";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $family_details=TdUserFamily::where('user_details_id',$id)->get();
        // return $family_details;
        $service_type="FINANCE";
        return view('user.services-register',['service_type'=>$service_type,'family_details'=>$family_details]);
    }

    public function ShowFAMILY(){
        // return "hii";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $family_details=TdUserFamily::where('user_details_id',$id)->get();
        $service_type="FAMILY DISPUTES";
        return view('user.services-register',['service_type'=>$service_type,'family_details'=>$family_details]);
    }

    public function ShowMARRIAGES(){
        // return "hii";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $family_details=TdUserFamily::where('user_details_id',$id)->get();
        
        $service_type="MARRIAGES ISSUES";
        return view('user.services-register',['service_type'=>$service_type,'family_details'=>$family_details]);
    }
    public function ShowRELIGIOUS(){
        // return "hii";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $family_details=TdUserFamily::where('user_details_id',$id)->get();
        
        $service_type="RELIGIOUS ISSUE";
        return view('user.services-register',['service_type'=>$service_type,'family_details'=>$family_details]);
    }
    public function ShowREUNION(){
        // return "hii";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $family_details=TdUserFamily::where('user_details_id',$id)->get();
        
        $service_type="REUNION FAMILY";
        return view('user.services-register',['service_type'=>$service_type,'family_details'=>$family_details]);
    }

    public function ShowPROPERTY(){
        // return "hii";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $family_details=TdUserFamily::where('user_details_id',$id)->get();
        
        $service_type="PROPERTY DISPUTE";
        return view('user.services-register',['service_type'=>$service_type,'family_details'=>$family_details]);
    }
    public function ShowDIVORCE(){
        // return "hii";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $family_details=TdUserFamily::where('user_details_id',$id)->get();
        
        $service_type="DIVORCE DISPUTE";
        return view('user.services-register',['service_type'=>$service_type,'family_details'=>$family_details]);
    }
    public function ShowOTHER(){
        // return "hii";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $family_details=TdUserFamily::where('user_details_id',$id)->get();
        
        $service_type="OTHER";
        return view('user.services-register',['service_type'=>$service_type,'family_details'=>$family_details]);
    }

    public function Register(Request $request){
        // return $request;
        $id=Session::get('user')[0]['id'];
        // return $id;
        $doc_1='';
        $doc_2='';
        $doc_3='';
        $doc_4='';
        $doc_5='';
        $doc_6='';
        $doc_7='';
        $doc_8='';
        $doc_9='';
        $doc_10='';
        if ($request->hasFile('doc_1')) {
            $profile_pic_path1 = $request->file('doc_1');
            $doc_1=date('YmdHis') .'_'.$id. 'doc_1.' . $profile_pic_path1->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath1 = public_path('service-doc/');
            $profile_pic_path1->move($destinationPath1,$doc_1);

            

        }

        if ($request->hasFile('doc_2')) {
            $profile_pic_path2 = $request->file('doc_2');
            $doc_2=date('YmdHis') .'_'.$id. 'doc_2.' . $profile_pic_path2->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath2 = public_path('service-doc/');
            $profile_pic_path2->move($destinationPath2,$doc_2);

            
        }

        if ($request->hasFile('doc_3')) {
            $profile_pic_path3 = $request->file('doc_3');
            $doc_3=date('YmdHis') .'_'.$id. 'doc_3.' . $profile_pic_path3->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath3 = public_path('service-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_3);

            

        }

        if ($request->hasFile('doc_4')) {
            $profile_pic_path4 = $request->file('doc_4');
            $doc_4=date('YmdHis') .'_'.$id. 'doc_4.' . $profile_pic_path4->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath4 = public_path('service-doc/');
            $profile_pic_path4->move($destinationPath4,$doc_4);

           

        }
        if ($request->hasFile('doc_5')) {
            $profile_pic_path3 = $request->file('doc_5');
            $doc_5=date('YmdHis') .'_'.$id. 'doc_5.' . $profile_pic_path3->getClientOriginalExtension();

            $destinationPath3 = public_path('service-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_5);

            

        }

        if ($request->hasFile('doc_6')) {
            $profile_pic_path3 = $request->file('doc_6');
            $doc_6=date('YmdHis') .'_'.$id. 'doc_6.' . $profile_pic_path3->getClientOriginalExtension();

            $destinationPath3 = public_path('service-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_6);

           

        }

        if ($request->hasFile('doc_7')) {
            $profile_pic_path4 = $request->file('doc_7');
            $doc_7=date('YmdHis') .'_'.$id. 'doc_7.' . $profile_pic_path4->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath4 = public_path('service-doc/');
            $profile_pic_path4->move($destinationPath4,$doc_7);

           

        }
        if ($request->hasFile('doc_8')) {
            $profile_pic_path3 = $request->file('doc_8');
            $doc_8=date('YmdHis') .'_'.$id. 'doc_8.' . $profile_pic_path3->getClientOriginalExtension();

            $destinationPath3 = public_path('service-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_8);

            

        }

        if ($request->hasFile('doc_9')) {
            $profile_pic_path3 = $request->file('doc_9');
            $doc_9=date('YmdHis') .'_'.$id. 'doc_9.' . $profile_pic_path3->getClientOriginalExtension();

            $destinationPath3 = public_path('service-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_9);

           

        }

        if ($request->hasFile('doc_10')) {
            $profile_pic_path3 = $request->file('doc_10');
            $doc_10=date('YmdHis') .'_'.$id. 'doc_10.' . $profile_pic_path3->getClientOriginalExtension();

            $destinationPath3 = public_path('service-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_10);

            

        }
        // if ($request->hasFile('doc_4')) {
        //     $profile_pic_path4 = $request->file('doc_4');
        //     $doc_4=date('YmdHis') .'_'.$id. 'doc_4.' . $profile_pic_path4->getClientOriginalExtension();
        //     // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
        //     // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

        //     $destinationPath4 = public_path('service-doc/');
        //     $profile_pic_path4->move($destinationPath4,$doc_4);

            
        // }

        
        TdServiceDetails::create(array(
            'self_id' =>$id,
            'other_info'        =>$request->user_info, 
            'self_or_family'    =>$request->fav_language, 
            'family_details_id' =>$request->family_details,
            'active'            =>"I",
            'service_type'      =>$request->service_type,
            'application_date'  =>date('Y-m-d'),
            'doc_1'=>$doc_1,
            'doc_2'=>$doc_2,
            'doc_3'=>$doc_3,
            'doc_4'=>$doc_4,
            'doc_1_name'=>$request->doc_1_name,
            'doc_2_name'=>$request->doc_2_name,
            'doc_3_name'=>$request->doc_3_name,
            'doc_4_name'=>$request->doc_4_name,
            'doc_5'=>$doc_5,
            'doc_5_name'=>$request->doc_5_name,
            'doc_6'=>$doc_6,
            'doc_6_name'=>$request->doc_6_name,
            'doc_7'=>$doc_7,
            'doc_7_name'=>$request->doc_7_name,
            'doc_8'=>$doc_8,
            'doc_8_name'=>$request->doc_8_name,
            'doc_9'=>$doc_9,
            'doc_9_name'=>$request->doc_9_name,
            'doc_10'=>$doc_10,
            'doc_10_name'=>$request->doc_10_name,
        ));
        $service_type=$request->service_type;

        if($service_type=='FINANCE'){
            return redirect()-> route('user.servicesmanagefinance');
        }elseif($service_type=='FAMILY DISPUTES'){
            return redirect()-> route('user.servicesmanagefamily');
        }elseif($service_type=='MARRIAGES ISSUES'){
            return redirect()-> route('user.servicesmanagemarriages');
        }elseif($service_type=='RELIGIOUS ISSUE'){
            return redirect()-> route('user.servicesmanagereligious');
        }elseif($service_type=='REUNION FAMILY'){
            return redirect()-> route('user.servicesmanagereunion');
        }elseif($service_type=='PROPERTY DISPUTE'){
            return redirect()-> route('user.servicesmanageproperty');
        }elseif($service_type=='DIVORCE DISPUTE'){
            return redirect()-> route('user.servicesmanagedivorce');
        }elseif($service_type=='OTHER'){
            return redirect()-> route('user.servicesmanageother');
        }
        // return redirect()->back()->with('success','success');
    }

    public function ViewService($id){
        // return "hii";
        $id=Crypt::decryptString($id);
        $ses_id=Session::get('user')[0]['id'];
        // return $id;
        $data=TdServiceDetails::find($id);
        $family_details=TdUserFamily::where('user_details_id',$ses_id)->get();
        // return $data;
        $gurdwara_details=TdGurudwaraDetails::find($data->gurudwara_id);
        // return $gurdwara_details;
        return view('user.services-view',['family_details'=>$family_details,'data'=>$data,'gurdwara_details'=>$gurdwara_details]);
    }

    public function EditService($id){
        // return "hii";
        $id=Crypt::decryptString($id);
        $ses_id=Session::get('user')[0]['id'];
        // return $id;
        $data=TdServiceDetails::find($id);
        $family_details=TdUserFamily::where('user_details_id',$ses_id)->get();
        // return $data;
        $gurdwara_details=TdGurudwaraDetails::find($data->gurudwara_id);
        // return $gurdwara_details;
        return view('user.services-edit',['family_details'=>$family_details,'data'=>$data,'gurdwara_details'=>$gurdwara_details]);
    }

    public function EditServiceConfirm(Request $request){
        // return $request;
        $id=$request->id;
        $data=TdServiceDetails::find($id);
        // return $data;
        $self_id=Session::get('user')[0]['id'];
        // return $id;
        if ($request->hasFile('doc_1')) {
            $profile_pic_path1 = $request->file('doc_1');
            $doc_1=date('YmdHis') .'_'.$id. 'doc_1.' . $profile_pic_path1->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath1 = public_path('service-doc/');
            $profile_pic_path1->move($destinationPath1,$doc_1);

            if($data->doc_1!=null){
                $filesc = public_path('service-doc/') . $data->doc_1;
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

            $destinationPath2 = public_path('service-doc/');
            $profile_pic_path2->move($destinationPath2,$doc_2);

            if($data->doc_2!=null){
                $filesc = public_path('service-doc/') . $data->doc_2;
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

            $destinationPath3 = public_path('service-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_3);

            if($data->doc_3!=null){
                $filesc = public_path('service-doc/') . $data->doc_3;
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

            $destinationPath4 = public_path('service-doc/');
            $profile_pic_path4->move($destinationPath4,$doc_4);

            if($data->doc_4!=null){
                $filesc = public_path('service-doc/') . $data->doc_4;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_4=$data->doc_4;
        }

        if ($request->hasFile('doc_5')) {
            $profile_pic_path3 = $request->file('doc_5');
            $doc_5=date('YmdHis') .'_'.$id. 'doc_5.' . $profile_pic_path3->getClientOriginalExtension();

            $destinationPath3 = public_path('service-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_5);

            if($data->doc_5!=null){
                $filesc = public_path('service-doc/') . $data->doc_5;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_5=$data->doc_5;
        }

        if ($request->hasFile('doc_6')) {
            $profile_pic_path3 = $request->file('doc_6');
            $doc_6=date('YmdHis') .'_'.$id. 'doc_6.' . $profile_pic_path3->getClientOriginalExtension();

            $destinationPath3 = public_path('service-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_6);

            if($data->doc_6!=null){
                $filesc = public_path('service-doc/') . $data->doc_6;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_6=$data->doc_6;
        }

        if ($request->hasFile('doc_7')) {
            $profile_pic_path4 = $request->file('doc_7');
            $doc_7=date('YmdHis') .'_'.$id. 'doc_7.' . $profile_pic_path4->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath4 = public_path('service-doc/');
            $profile_pic_path4->move($destinationPath4,$doc_7);

            if($data->doc_7!=null){
                $filesc = public_path('service-doc/') . $data->doc_7;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_7=$data->doc_7;
        }

        if ($request->hasFile('doc_8')) {
            $profile_pic_path3 = $request->file('doc_8');
            $doc_8=date('YmdHis') .'_'.$id. 'doc_8.' . $profile_pic_path3->getClientOriginalExtension();

            $destinationPath3 = public_path('service-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_8);

            if($data->doc_8!=null){
                $filesc = public_path('service-doc/') . $data->doc_8;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_8=$data->doc_8;
        }

        if ($request->hasFile('doc_9')) {
            $profile_pic_path3 = $request->file('doc_9');
            $doc_9=date('YmdHis') .'_'.$id. 'doc_9.' . $profile_pic_path3->getClientOriginalExtension();

            $destinationPath3 = public_path('service-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_9);

            if($data->doc_9!=null){
                $filesc = public_path('service-doc/') . $data->doc_9;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_9=$data->doc_9;
        }

        if ($request->hasFile('doc_10')) {
            $profile_pic_path3 = $request->file('doc_10');
            $doc_10=date('YmdHis') .'_'.$id. 'doc_10.' . $profile_pic_path3->getClientOriginalExtension();

            $destinationPath3 = public_path('service-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_10);

            if($data->doc_10!=null){
                $filesc = public_path('service-doc/') . $data->doc_10;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_10=$data->doc_10;
        }


        // if ($request->hasFile('doc_4')) {
        //     $profile_pic_path4 = $request->file('doc_4');
        //     $doc_4=date('YmdHis') .'_'.$self_id. 'doc_4.' . $profile_pic_path4->getClientOriginalExtension();
        //     // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
        //     // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

        //     $destinationPath4 = public_path('service-doc/');
        //     $profile_pic_path4->move($destinationPath4,$doc_4);

        //     if($data->doc_4!=null){
        //         $filesc = public_path('service-doc/') . $data->doc_4;
        //         if (file_exists($filesc) != null) {
        //             unlink($filesc);
        //         }
        //     } 
        // }else{
        //     $doc_4=$data->doc_4;
        // }


        $data->doc_1=$doc_1;
        $data->doc_2=$doc_2;
        $data->doc_3=$doc_3;
        $data->doc_4=$doc_4;
        $data->doc_1_name=$request->doc_1_name;
        $data->doc_2_name=$request->doc_2_name;
        $data->doc_3_name=$request->doc_3_name;
        $data->doc_4_name=$request->doc_4_name;
        $data->doc_5=$doc_5;
        $data->doc_5_name=$request->doc_5_name;
        $data->doc_6=$doc_6;
        $data->doc_6_name=$request->doc_6_name;
        $data->doc_7=$doc_7;
        $data->doc_7_name=$request->doc_7_name;
        $data->doc_8=$doc_8;
        $data->doc_8_name=$request->doc_8_name;
        $data->doc_9=$doc_9;
        $data->doc_9_name=$request->doc_9_name;
        $data->doc_10=$doc_10;
        $data->doc_10_name=$request->doc_10_name;

        $data->self_or_family=$request->fav_language;
        $data->service_type=$request->service_type;
        $data->family_details_id=$request->family_details;
        $data->other_info=$request->user_info;
        $data->save();

        $service_type=$request->service_type;

        if($service_type=='FINANCE'){
            return redirect()-> route('user.servicesmanagefinance');
        }elseif($service_type=='FAMILY DISPUTES'){
            return redirect()-> route('user.servicesmanagefamily');
        }elseif($service_type=='MARRIAGES ISSUES'){
            return redirect()-> route('user.servicesmanagemarriages');
        }elseif($service_type=='RELIGIOUS ISSUE'){
            return redirect()-> route('user.servicesmanagereligious');
        }elseif($service_type=='REUNION FAMILY'){
            return redirect()-> route('user.servicesmanagereunion');
        }elseif($service_type=='PROPERTY DISPUTE'){
            return redirect()-> route('user.servicesmanageproperty');
        }elseif($service_type=='DIVORCE DISPUTE'){
            return redirect()-> route('user.servicesmanagedivorce');
        }elseif($service_type=='OTHER'){
            return redirect()-> route('user.servicesmanageother');
        }
    }

    public function DeleteService($id){
        // $id=$request->id;
        $id=Crypt::decryptString($id);
        // return $id;
        $data=TdServiceDetails::find($id);
        // return $data;
        $service_type=$data->service_type;
        if($data->doc_1!=null){
            $filesc = public_path('service-doc/') . $data->doc_1;
            if (file_exists($filesc) != null) {
                unlink($filesc);
            }
        } 
        if($data->doc_2!=null){
            $filesc = public_path('service-doc/') . $data->doc_2;
            if (file_exists($filesc) != null) {
                unlink($filesc);
            }
        } 
        if($data->doc_3!=null){
            $filesc = public_path('service-doc/') . $data->doc_3;
            if (file_exists($filesc) != null) {
                unlink($filesc);
            }
        } 
        if($data->doc_4!=null){
            $filesc = public_path('service-doc/') . $data->doc_4;
            if (file_exists($filesc) != null) {
                unlink($filesc);
            }
        } 
        TdServiceDetails::find($id)->delete();
        if($service_type=='FINANCE'){
            return redirect()-> route('user.servicesmanagefinance');
        }elseif($service_type=='FAMILY DISPUTES'){
            return redirect()-> route('user.servicesmanagefamily');
        }elseif($service_type=='MARRIAGES ISSUES'){
            return redirect()-> route('user.servicesmanagemarriages');
        }elseif($service_type=='RELIGIOUS ISSUE'){
            return redirect()-> route('user.servicesmanagereligious');
        }elseif($service_type=='REUNION FAMILY'){
            return redirect()-> route('user.servicesmanagereunion');
        }elseif($service_type=='PROPERTY DISPUTE'){
            return redirect()-> route('user.servicesmanageproperty');
        }elseif($service_type=='DIVORCE DISPUTE'){
            return redirect()-> route('user.servicesmanagedivorce');
        }elseif($service_type=='OTHER'){
            return redirect()-> route('user.servicesmanageother');
        }
    }
}
