<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdUserLogin;
use App\Models\TdUserDetails;
use App\Models\TdServiceDetails;
use App\Models\MdCountry;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;

class ServicesController extends Controller
{
    public function __construct() {
        $this->middleware('is_admin');
    }

    public function Show(Request $equest){
        $status_details=$equest->status;
        // $data=TdUserDetails::orderBy('updated_at','desc')->get();
        if($status_details=='I'){
            $data=DB::table('td_service_details')
                    ->leftJoin('td_gurudwara_details', 'td_service_details.gurudwara_id', '=', 'td_gurudwara_details.id')
                    ->select('td_service_details.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                    ->Where('td_service_details.active','I')               
                    ->orderBy('td_service_details.updated_at', 'desc')
                    ->get();
        }else if($status_details=='A'){
            $data=DB::table('td_service_details')
                    ->leftJoin('td_gurudwara_details', 'td_service_details.gurudwara_id', '=', 'td_gurudwara_details.id')
                    ->select('td_service_details.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                    ->Where('td_service_details.active','A')               
                    ->orderBy('td_service_details.updated_at', 'desc')
                    ->get();
        }else if($status_details=='R'){
            $data=DB::table('td_service_details')
                    ->leftJoin('td_gurudwara_details', 'td_service_details.gurudwara_id', '=', 'td_gurudwara_details.id')
                    ->select('td_service_details.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                    ->Where('td_service_details.active','R')               
                    ->orderBy('td_service_details.updated_at', 'desc')
                    ->get();
        }else{
            $data=DB::table('td_service_details')
                    ->leftJoin('td_gurudwara_details', 'td_service_details.gurudwara_id', '=', 'td_gurudwara_details.id')
                    ->select('td_service_details.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                    ->Where('td_service_details.active','I')               
                    ->orderBy('td_service_details.updated_at', 'desc')
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
        return view('admin.user-services-edit',['user_details'=>$user_details,'country'=>$country,'gurudwara'=>$gurudwara]);
        
    }

    public function EditConfirm(Request $request){
        // return $request;
        $id=$request->id;
        $user_details = TdServiceDetails::find($id);
        $user_details->gurudwara_id=$request->gurudwara_id;
        $user_details->active=$request->active;
        $user_details->update();
        return redirect()->route('admin.services');
    }
}
