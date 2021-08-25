<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdUserLogin;
use App\Models\TdGurudwaraDetails;
use App\Models\MdCountry;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;

class GurudwaraController extends Controller
{
    public function __construct() {
        $this->middleware('is_admin');
    }

    public function Show(Request $request){
        $status_details=$request->status;
        if($status_details=='I'){
            $data=DB::table('md_user_login')
                ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                ->select('md_user_login.*', 'td_gurudwara_details.*') 
                ->Where('md_user_login.user_type','G')               
                ->Where('md_user_login.active','I')               
                ->orderBy('md_user_login.updated_at', 'desc')
                ->get();
        }else if($status_details=='A'){
            $data=DB::table('md_user_login')
                ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                ->select('md_user_login.*', 'td_gurudwara_details.*') 
                ->Where('md_user_login.user_type','G')               
                ->Where('md_user_login.active','A')               
                ->orderBy('md_user_login.updated_at', 'desc')
                ->get();
        }else if($status_details=='R'){
            $data=DB::table('md_user_login')
                ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                ->select('md_user_login.*', 'td_gurudwara_details.*') 
                ->Where('md_user_login.user_type','G')               
                ->Where('md_user_login.active','R')               
                ->orderBy('md_user_login.updated_at', 'desc')
                ->get();
        }else{
        // $data=TdGurudwaraDetails::where('user_type','G')->get();
            $data=DB::table('md_user_login')
                ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                ->select('md_user_login.*', 'td_gurudwara_details.*') 
                ->Where('md_user_login.user_type','G')               
                ->Where('md_user_login.active','I')               
                ->orderBy('md_user_login.updated_at', 'desc')
                ->get();
            $status_details="I";
        }
        // return $data;
        // return Session::get('admin')[0]['name'];
        return view('admin.gurudwara-manage',['gurudwara'=>$data,'status_details'=>$status_details]);
    }

    public function Acept(Request $request){
        $id=$request->input('id');
        $user_id=$request->input('user_id'); 

        $membe=DB::table('md_user_login')
            ->where(['id' => $id,'user_id' => $user_id])
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

        $membe=DB::table('md_user_login')
            ->where(['id' => $id,'user_id' => $user_id])
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
        $user_details = TdGurudwaraDetails::find(Crypt::decryptString($id));
        $country=MdCountry::get();
        // $gurudwara=MdUserLogin::where('user_type','G')->where('active','A')->get();
        $gurudwara=DB::table('md_user_login')
                    ->join('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                    ->select('md_user_login.*', 'td_gurudwara_details.*') 
                    ->Where('md_user_login.user_type','G')               
                    ->Where('md_user_login.active','A')               
                    // ->orderBy('td_user_details.updated_at', 'desc')
                    ->get();
        // return $user_details;
        return view('admin.gurudwara-edit',['user_details'=>$user_details,'country'=>$country,'gurudwara'=>$gurudwara]);
        
    }
    public function EditConfirm(Request $request){
        // return $request;
        $id=$request->id;
        $user_details = MdUserLogin::find($id);
        // $user_details->gurudwara_id=$request->gurudwara_id;
        $user_details->active=$request->active;
        $user_details->update();
        return redirect()->route('admin.gurudwara');
    }
}
