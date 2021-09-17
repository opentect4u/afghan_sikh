<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdUserLogin;
use App\Models\TdUserDetails;
use App\Models\MdCountry;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('is_admin');
    }

    public function Show(Request $equest){
        $status_details=$equest->status;
        // $data=TdUserDetails::orderBy('updated_at','desc')->get();
        if($status_details=='I'){
            $data=DB::table('md_user_login')
            ->leftJoin('td_user_details','md_user_login.id','=','td_user_details.id')
            ->leftJoin('td_gurudwara_details', 'td_user_details.gurudwara_id', '=', 'td_gurudwara_details.id')
            ->select('md_user_login.*','td_user_details.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
            ->Where('md_user_login.user_type','U')               
            ->Where('md_user_login.active','I')               
            ->orderBy('md_user_login.created_at', 'desc')
            ->get();
        }else if($status_details=='A'){
            $data=DB::table('md_user_login')
            ->leftJoin('td_user_details','md_user_login.id','=','td_user_details.id')
            ->leftJoin('td_gurudwara_details', 'td_user_details.gurudwara_id', '=', 'td_gurudwara_details.id')
            ->select('md_user_login.*','td_user_details.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
            ->Where('md_user_login.user_type','U')               
            ->Where('md_user_login.active','A')               
            ->orderBy('md_user_login.created_at', 'desc')
            ->get();
        }else if($status_details=='R'){
            $data=DB::table('md_user_login')
            ->leftJoin('td_user_details','md_user_login.id','=','td_user_details.id')
            ->leftJoin('td_gurudwara_details', 'td_user_details.gurudwara_id', '=', 'td_gurudwara_details.id')
            ->select('md_user_login.*','td_user_details.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
            ->Where('md_user_login.user_type','U')               
            ->Where('md_user_login.active','R')               
            ->orderBy('md_user_login.created_at', 'desc')
            ->get();
        }else{
            $data=DB::table('md_user_login')
                    ->leftJoin('td_user_details','md_user_login.id','=','td_user_details.id')
                    ->leftJoin('td_gurudwara_details', 'td_user_details.gurudwara_id', '=', 'td_gurudwara_details.id')
                    ->select('md_user_login.*','td_user_details.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                    ->Where('md_user_login.user_type','U')               
                    ->Where('md_user_login.active','I')               
                    ->orderBy('md_user_login.created_at', 'desc')
                    ->get();
            // $data=DB::table('td_user_details')
            //         ->leftJoin('td_gurudwara_details', 'td_user_details.gurudwara_id', '=', 'td_gurudwara_details.id')
            //         ->select('td_user_details.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
            //         ->Where('td_user_details.active','I')               
            //         ->orderBy('td_user_details.updated_at', 'desc')
            //         ->get();
            $status_details="I";
            // $data=DB::table('td_user_details')
            //         ->leftJoin('md_user_login', 'td_user_details.gurudwara_id', '=', 'md_user_login.id')
            //         ->select('td_user_details.*', 'md_user_login.name as gurudwaras_name')                
            //         ->orderBy('td_user_details.updated_at', 'desc')
            //         ->get();
        }
        // return $data;
        // return Session::get('admin')[0]['name'];
        return view('admin.user-manage',['gurudwara'=>$data,'status_details'=>$status_details]);
    }

    public function Acept(Request $request){
        $id=$request->input('id');
        $user_id=$request->input('user_id'); 

        $membe=DB::table('td_user_details')
            ->where(['id' => $id,'email' => $user_id])
            ->update(["active" => "A",
                "updated_by" => Session::get('admin')[0]['name'],
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        if ($membe != "") {
            $msg="success";
            $active="A";
        }else{
            $msg="error";
            $active="I";
        }
        $arrNewResult = array();
        $arrNewResult['msg'] = $msg;
        $arrNewResult['active'] = $active;
        $status_json = json_encode($arrNewResult);
        echo $status_json;
    }


    public function Reject(Request $request){
        $id=$request->input('id');
        $user_id=$request->input('user_id');

        $membe=DB::table('td_user_details')
            ->where(['id' => $id,'email' => $user_id])
            ->update(["active" => "R",
                "updated_by" => Session::get('admin')[0]['name'],
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        if ($membe != "") {
            $msg="success";
            $active="R";
        }else{
            $msg="error";
            $active="I";
        }
        $arrNewResult = array();
        $arrNewResult['msg'] = $msg;
        $arrNewResult['active'] = $active;
        $status_json = json_encode($arrNewResult);
        echo $status_json;
    }

    public function Edit($id){
        // return "hii";
        $id=Crypt::decryptString($id);
        // return $id;
        $user_details = TdUserDetails::find($id);
        $country=MdCountry::get();
        $gurudwara=MdUserLogin::where('user_type','G')->where('active','A')->get();
        $gurudwara=DB::table('md_user_login')
                    ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                    ->select('md_user_login.*', 'td_gurudwara_details.*') 
                    ->Where('md_user_login.user_type','G')               
                    ->Where('md_user_login.active','A')               
                    // ->orderBy('td_user_details.updated_at', 'desc')
                    ->get();
        // return $gurudwara;
        return view('admin.user-edit',['user_details'=>$user_details,'country'=>$country,'gurudwara'=>$gurudwara]);
        
    }
    public function EditConfirm(Request $request){
        // return $request;
        $id=$request->id;
        $user_details = TdUserDetails::find($id);
        $user_details->gurudwara_id=$request->gurudwara_id;
        $user_details->active=$request->active;
        $user_details->update();
        return redirect()->route('admin.user');
    }
}
