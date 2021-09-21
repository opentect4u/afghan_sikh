<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\TdGurudwaraDetails;
use App\Models\TdGurudwaraMember;
use App\Models\MdCountry;
use App\Models\TdServiceDetails;
use Session;
use Illuminate\Support\Facades\Crypt;
use App\Models\TdUserDetails;
use App\Models\TdUserFamilyDetails;

class ServiceController extends Controller
{
    public function __construct() {
        $this->middleware('is_gurudwara');
    }

    public function Show(){
        // return "hii";
        $id=Session::get('gurudwara')[0]['id'];
        $country=MdCountry::get();
        // $data=TdServiceDetails::where('active','A')->where('gurudwara_id',$id)
        //     ->orderBy('application_date','desc')
        //     ->get();
        $data=DB::table('td_service_details')
            ->leftJoin('td_user_details', 'td_service_details.self_id', '=', 'td_user_details.id')
            ->leftJoin('md_user_login', 'td_service_details.self_id', '=', 'md_user_login.id')
            ->leftJoin('td_gurudwara_details', 'td_service_details.gurudwara_id', '=', 'td_gurudwara_details.id')
            ->leftJoin('td_user_family_details', 'td_service_details.family_details_id', '=', 'td_user_family_details.id')
            ->select('td_user_details.*','td_user_family_details.*','td_service_details.*','md_user_login.user_id as user_id', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
            // ->select('td_service_details.*','td_user_details.*','md_user_login.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
            // ->Where('td_service_details.active','I')               
            ->Where('td_service_details.gurudwara_id',$id)               
            ->orderBy('td_service_details.application_date', 'desc')
            ->get();
        // return $data;
        return view('gurudwara.services-manage',['gurudwara'=>$data]);
    }

    public function ShowEdit($id){
        $id=Crypt::decryptString($id);
        // return $id;
        // $data=TdServiceDetails::find($id);
        $country=MdCountry::get();
        $user_details = TdServiceDetails::find($id);
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
        return view('gurudwara.services-edit',['user_details'=>$user_details,'user_details1'=>$user_details1,'family_details'=>$family_details,'country'=>$country]);
    }
}
