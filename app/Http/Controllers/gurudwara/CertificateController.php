<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdUserLogin;
use App\Models\TdUserDetails;
use App\Models\TdServiceDetails;
use App\Models\TdUserFamilyDetails;
use App\Models\MdCountry;
use App\Models\TdCertificate;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class CertificateController extends Controller
{
    public function __construct() {
        $this->middleware('is_gurudwara');
    }

    public function Manage(){
        // return "hii";
        $id=Session::get('gurudwara')[0]['id'];
        $data=DB::table('td_certificate')
                    ->leftJoin('td_user_details', 'td_user_details.id', '=', 'td_certificate.user_id')
                    ->leftJoin('td_user_family_details', 'td_user_family_details.id', '=', 'td_certificate.family_details_id')
                    ->leftJoin('md_user_login', 'td_certificate.user_id', '=', 'md_user_login.id')
                    ->leftJoin('md_certificate_type', 'md_certificate_type.id', '=', 'td_certificate.certificates_type_id')
                    // ->leftJoin('td_user_family_details', 'td_service_details.family_details_id', '=', 'td_user_family_details.id')
                    ->select('td_user_details.*','td_user_family_details.*','td_certificate.*','md_user_login.user_id as user_id','md_certificate_type.name as name') 
                    // ->select('td_service_details.*','td_user_details.*','md_user_login.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                    ->Where('td_certificate.approved','A')               
                    ->Where('td_certificate.gurdwara_id',$id)               
                    ->orderBy('td_certificate.application_date', 'desc')
                    ->get();
        $status_details='I';
        // return $data;
        return view('gurudwara.certificate-manage',['gurudwara'=>$data,'status_details'=>$status_details]);
    }

    public function ShowEdit($id){
        $user_details = TdCertificate::find(Crypt::decryptString($id));
        // return $user_details;
        $user_details1 = TdUserDetails::find($user_details->user_id);
        $family_details=TdUserFamilyDetails::find($user_details->family_details_id);
        // family_details_id
        // return $family_details;
        $country=MdCountry::get();
        // $gurudwara=MdUserLogin::where('user_type','G')->where('active','A')->get();
        $gurudwara=DB::table('md_user_login')
                    ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                    ->select('md_user_login.*', 'td_gurudwara_details.*') 
                    ->WhereIn('md_user_login.user_type',array('G','C','O'))               
                    ->Where('md_user_login.active','A')               
                    // ->orderBy('td_user_details.updated_at', 'desc')
                    ->get();
        // return $gurudwara;
        return view('gurudwara.certificate-edit',['user_details'=>$user_details,'user_details1'=>$user_details1,'country'=>$country,'gurudwara'=>$gurudwara,'family_details'=>$family_details]);
    }

    public function Edit(Request $request){
        // return $request;
        $id=$request->id;
        

        $user_details = TdCertificate::find($id);
        
        if($request->status=='Y'){
            $user_id=MdUserLogin::where('id',$user_details->user_id)->value('user_id') ;
            $gurudwara_id=Session::get('gurudwara')[0]['user_id'];

            $certificates_type_id=$user_details->certificates_type_id;
            if ($certificates_type_id==2) {
                $latest = TdCertificate::where('certificates_type_id',$certificates_type_id)->where('generate_number','!=','')->orderBy('generate_number','desc')->take(1)->get();
                // return $latest;
                if ($latest->count()>0) {
                    // return $latest;
                    $client_prev_no = $latest[0]->generate_number;
                    // return $client_prev_no;
                    $val=explode("MIR",$client_prev_no);
                    $update_number=($val[1]+1);
                    $date=date('Y-m-d');
                    $generate_number = $user_id.'|'.$gurudwara_id.'|MIR0000'.$update_number;
                     
                }else{
                    $date=date('Y-m-d');
                    $generate_number = $user_id.'|'.$gurudwara_id.'|MIR00001';
                // return $generate_number;
                }
            }
        }else{
            $date=NULL;
            $generate_number='';
        }

        $user_details->date_of_issue =$date;
        $user_details->generate_number =$generate_number;
        $user_details->save();
        return redirect()->route('gurudwara.certificate');
    }
}
