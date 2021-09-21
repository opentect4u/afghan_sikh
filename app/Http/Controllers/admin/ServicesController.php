<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdUserLogin;
use App\Models\TdUserDetails;
use App\Models\TdServiceDetails;
use App\Models\TdUserFamilyDetails;
use App\Models\MdCountry;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class ServicesController extends Controller
{
    public function __construct() {
        $this->middleware('is_admin');
    }

    public function Show(Request $equest){
        $status_details=$equest->status;
        $date=$equest->date;
        // $data=TdUserDetails::orderBy('updated_at','desc')->get();
        // return $equest->startDate;

        if(isset($equest->startDate) && isset($equest->endDate)){
            // $startDate=Carbon::parse($request->startDate)->format('Y-m-d');
            // return $request->startDate;

            $startDate=date("Y-m-d", strtotime($equest->startDate));
            $endDate=date("Y-m-d", strtotime($equest->endDate));
            // return $startDate;
            $data=DB::table('td_service_details')
            ->leftJoin('td_user_details', 'td_service_details.self_id', '=', 'td_user_details.id')
                    ->leftJoin('md_user_login', 'td_service_details.self_id', '=', 'md_user_login.id')
                    ->leftJoin('td_gurudwara_details', 'td_service_details.gurudwara_id', '=', 'td_gurudwara_details.id')
                    ->leftJoin('td_user_family_details', 'td_service_details.family_details_id', '=', 'td_user_family_details.id')
                    ->select('td_user_details.*','td_user_family_details.*','td_service_details.*','md_user_login.user_id as user_id', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                ->Where('td_service_details.active',$status_details)  
                ->whereBetween('td_service_details.application_date', [$startDate, $endDate])
                ->orderBy('td_service_details.application_date', 'desc')
                ->get();
            
            return view('admin.user-services-manage',['gurudwara'=>$data,'status_details'=>$status_details,'startDate'=>$equest->startDate,'endDate'=>$equest->endDate]);
        }


        if($status_details=='I'){
            $data=DB::table('td_service_details')
            ->leftJoin('td_user_details', 'td_service_details.self_id', '=', 'td_user_details.id')
                    ->leftJoin('md_user_login', 'td_service_details.self_id', '=', 'md_user_login.id')
                    ->leftJoin('td_gurudwara_details', 'td_service_details.gurudwara_id', '=', 'td_gurudwara_details.id')
                    ->leftJoin('td_user_family_details', 'td_service_details.family_details_id', '=', 'td_user_family_details.id')
                    ->select('td_user_details.*','td_user_family_details.*','td_service_details.*','md_user_login.user_id as user_id', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                    ->Where('td_service_details.active','I')               
                    ->orderBy('td_service_details.updated_at', 'desc')
                    ->get();
        }else if($status_details=='A'){
            $data=DB::table('td_service_details')
            ->leftJoin('td_user_details', 'td_service_details.self_id', '=', 'td_user_details.id')
                    ->leftJoin('md_user_login', 'td_service_details.self_id', '=', 'md_user_login.id')
                    ->leftJoin('td_gurudwara_details', 'td_service_details.gurudwara_id', '=', 'td_gurudwara_details.id')
                    ->leftJoin('td_user_family_details', 'td_service_details.family_details_id', '=', 'td_user_family_details.id')
                    ->select('td_user_details.*','td_user_family_details.*','td_service_details.*','md_user_login.user_id as user_id', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                    ->Where('td_service_details.active','A')               
                    ->orderBy('td_service_details.updated_at', 'desc')
                    ->get();
        }else if($status_details=='R'){
            $data=DB::table('td_service_details')
            ->leftJoin('td_user_details', 'td_service_details.self_id', '=', 'td_user_details.id')
                    ->leftJoin('md_user_login', 'td_service_details.self_id', '=', 'md_user_login.id')
                    ->leftJoin('td_gurudwara_details', 'td_service_details.gurudwara_id', '=', 'td_gurudwara_details.id')
                    ->leftJoin('td_user_family_details', 'td_service_details.family_details_id', '=', 'td_user_family_details.id')
                    ->select('td_user_details.*','td_user_family_details.*','td_service_details.*','md_user_login.user_id as user_id', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                    ->Where('td_service_details.active','R')               
                    ->orderBy('td_service_details.updated_at', 'desc')
                    ->get();
        }else if($status_details=='OH'){
            $data=DB::table('td_service_details')
            ->leftJoin('td_user_details', 'td_service_details.self_id', '=', 'td_user_details.id')
                    ->leftJoin('md_user_login', 'td_service_details.self_id', '=', 'md_user_login.id')
                    ->leftJoin('td_gurudwara_details', 'td_service_details.gurudwara_id', '=', 'td_gurudwara_details.id')
                    ->leftJoin('td_user_family_details', 'td_service_details.family_details_id', '=', 'td_user_family_details.id')
                    ->select('td_user_details.*','td_user_family_details.*','td_service_details.*','md_user_login.user_id as user_id', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                    ->Where('td_service_details.active','OH')               
                    ->orderBy('td_service_details.updated_at', 'desc')
                    ->get();
        }else if($status_details=='AD'){
            $data=DB::table('td_service_details')
            ->leftJoin('td_user_details', 'td_service_details.self_id', '=', 'td_user_details.id')
                    ->leftJoin('md_user_login', 'td_service_details.self_id', '=', 'md_user_login.id')
                    ->leftJoin('td_gurudwara_details', 'td_service_details.gurudwara_id', '=', 'td_gurudwara_details.id')
                    ->leftJoin('td_user_family_details', 'td_service_details.family_details_id', '=', 'td_user_family_details.id')
                    ->select('td_user_details.*','td_user_family_details.*','td_service_details.*','md_user_login.user_id as user_id', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                    ->Where('td_service_details.active','AD')               
                    ->orderBy('td_service_details.updated_at', 'desc')
                    ->get();
        }else if($status_details=='AR'){
            $data=DB::table('td_service_details')
            ->leftJoin('td_user_details', 'td_service_details.self_id', '=', 'td_user_details.id')
                    ->leftJoin('md_user_login', 'td_service_details.self_id', '=', 'md_user_login.id')
                    ->leftJoin('td_gurudwara_details', 'td_service_details.gurudwara_id', '=', 'td_gurudwara_details.id')
                    ->leftJoin('td_user_family_details', 'td_service_details.family_details_id', '=', 'td_user_family_details.id')
                    ->select('td_user_details.*','td_user_family_details.*','td_service_details.*','md_user_login.user_id as user_id', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                    ->Where('td_service_details.active','AR')               
                    ->orderBy('td_service_details.updated_at', 'desc')
                    ->get();
        }else{
            $data=DB::table('td_service_details')
                    ->leftJoin('td_user_details', 'td_service_details.self_id', '=', 'td_user_details.id')
                    ->leftJoin('md_user_login', 'td_service_details.self_id', '=', 'md_user_login.id')
                    ->leftJoin('td_gurudwara_details', 'td_service_details.gurudwara_id', '=', 'td_gurudwara_details.id')
                    ->leftJoin('td_user_family_details', 'td_service_details.family_details_id', '=', 'td_user_family_details.id')
                    ->select('td_user_details.*','td_user_family_details.*','td_service_details.*','md_user_login.user_id as user_id', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                    // ->select('td_service_details.*','td_user_details.*','md_user_login.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                    ->Where('td_service_details.active','I')               
                    ->orderBy('td_service_details.application_date', 'desc')
                    ->get();
            $status_details="I";
            // $data=DB::table('td_user_details')
            //         ->leftJoin('md_user_login', 'td_user_details.gurudwara_id', '=', 'md_user_login.id')
            //         ->select('td_user_details.*', 'md_user_login.name as gurudwaras_name')                
            //         ->orderBy('td_user_details.updated_at', 'desc')
            //         ->get();
        }
        // return $data;
        // return Session::get('admin')[0]['name'];
        return view('admin.user-services-manage',['gurudwara'=>$data,'status_details'=>$status_details]);
    }

    public function Edit($id){
        // return "hii";
        $user_details = TdServiceDetails::find(Crypt::decryptString($id));
        // return $user_details;
        $user_details1 = TdUserDetails::find($user_details->self_id);
        $family_details=TdUserFamilyDetails::find($user_details->family_details_id);
        // family_details_id
        // return $family_details;
        $country=MdCountry::get();
        // $gurudwara=MdUserLogin::where('user_type','G')->where('active','A')->get();
        $gurudwara=DB::table('md_user_login')
                    ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                    ->select('md_user_login.*', 'td_gurudwara_details.*') 
                    ->Where('md_user_login.user_type','G')               
                    ->Where('md_user_login.active','A')               
                    // ->orderBy('td_user_details.updated_at', 'desc')
                    ->get();
        // return $gurudwara;
        return view('admin.user-services-edit',['user_details'=>$user_details,'user_details1'=>$user_details1,'country'=>$country,'gurudwara'=>$gurudwara,'family_details'=>$family_details]);
        
    }

    public function EditConfirm(Request $request){
        // return $request;
        $id=$request->id;
        $user_details = TdServiceDetails::find($id);
        $user_details->gurudwara_id=$request->gurudwara_id;
        $user_details->active=$request->status;
        $user_details->admin_remark=$request->admin_remark;
        $user_details->save();
        return redirect()->route('admin.services');
    }
}
