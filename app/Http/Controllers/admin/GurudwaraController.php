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
        // return $request->startDate;
        if(isset($request->startDate) && isset($request->endDate)){
            // $startDate=Carbon::parse($request->startDate)->format('Y-m-d');
            // return $request->startDate;

            $startDate=date("Y-m-d", strtotime($request->startDate));
            $endDate=date("Y-m-d", strtotime($request->endDate));
            // return $startDate;
            $data=DB::table('md_user_login')
                ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                ->select('md_user_login.*', 'td_gurudwara_details.*') 
                ->whereIn('md_user_login.user_type', array('G', 'O', 'C'))     
                ->Where('md_user_login.active',$status_details)  
                ->whereBetween('md_user_login.created_at', [$startDate, $endDate])
                ->orderBy('md_user_login.updated_at', 'desc')
                ->get();
            return view('admin.gurudwara-manage',['gurudwara'=>$data,'status_details'=>$status_details,'startDate'=>$request->startDate,'endDate'=>$request->endDate]);
        }
        
        if($status_details=='I'){
            $data=DB::table('md_user_login')
                ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                ->select('md_user_login.*', 'td_gurudwara_details.*') 
                ->whereIn('md_user_login.user_type', array('G', 'O', 'C'))     
                ->Where('md_user_login.active','I')               
                ->orderBy('md_user_login.updated_at', 'desc')
                ->get();
        }else if($status_details=='A'){
            $data=DB::table('md_user_login')
                ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                ->select('md_user_login.*', 'td_gurudwara_details.*') 
                ->whereIn('md_user_login.user_type', array('G', 'O', 'C'))     
                ->Where('md_user_login.active','A')               
                ->orderBy('md_user_login.updated_at', 'desc')
                ->get();
        }else if($status_details=='OH'){
            $data=DB::table('md_user_login')
                ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                ->select('md_user_login.*', 'td_gurudwara_details.*') 
                ->whereIn('md_user_login.user_type', array('G', 'O', 'C'))     
                ->Where('md_user_login.active','OH')               
                ->orderBy('md_user_login.updated_at', 'desc')
                ->get();
        }else if($status_details=='AD'){
            $data=DB::table('md_user_login')
                ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                ->select('md_user_login.*', 'td_gurudwara_details.*') 
                ->whereIn('md_user_login.user_type', array('G', 'O', 'C'))     
                ->Where('md_user_login.active','AD')               
                ->orderBy('md_user_login.updated_at', 'desc')
                ->get();
        }else if($status_details=='AR'){
            $data=DB::table('md_user_login')
                ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                ->select('md_user_login.*', 'td_gurudwara_details.*') 
                ->whereIn('md_user_login.user_type', array('G', 'O', 'C'))     
                ->Where('md_user_login.active','AR')               
                ->orderBy('md_user_login.updated_at', 'desc')
                ->get();
        }else if($status_details=='R'){
            $data=DB::table('md_user_login')
                ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                ->select('md_user_login.*', 'td_gurudwara_details.*') 
                ->whereIn('md_user_login.user_type', array('G', 'O', 'C'))     
                ->Where('md_user_login.active','R')               
                ->orderBy('md_user_login.updated_at', 'desc')
                ->get();
        }else{
            // return "hii";
            // $data=TdGurudwaraDetails::where('user_type','G')->get();
            $data=DB::table('md_user_login')
                ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                ->select('md_user_login.*', 'td_gurudwara_details.*') 
                ->whereIn('md_user_login.user_type', array('G', 'O', 'C'))     
                ->Where('md_user_login.active','I')               
                ->orderBy('md_user_login.updated_at', 'desc')
                ->get();
            $status_details="I";
        }
        // return $status_details;
        // return Session::get('admin')[0]['name'];
        return view('admin.gurudwara-manage',['gurudwara'=>$data,'status_details'=>$status_details,'startDate'=>$request->startDate,'endDate'=>$request->endDate]);
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
        $user_details1 = MdUserLogin::find($id);
        $country=MdCountry::get();
        // $gurudwara=MdUserLogin::where('user_type','G')->where('active','A')->get();
        $gurudwara=DB::table('md_user_login')
                    ->join('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                    ->select('md_user_login.*', 'td_gurudwara_details.*') 
                    ->whereIn('md_user_login.user_type', array('G', 'O', 'C'))     
                    ->Where('md_user_login.active','A')               
                    // ->orderBy('td_user_details.updated_at', 'desc')
                    ->get();
        // return $user_details;
        return view('admin.gurudwara-edit',['user_details'=>$user_details,'user_details1'=>$user_details1,'country'=>$country,'gurudwara'=>$gurudwara]);
        
    }
    public function EditConfirm(Request $request){
        // return $request;
        $id=$request->id;
        $user_details = MdUserLogin::find($id);
        // $user_details->gurudwara_id=$request->gurudwara_id;
        $user_details->active=$request->status;
        $user_details->save();
        $data=TdGurudwaraDetails::find($id);
        $data->remark=$request->remark;
        $data->save();
        return redirect()->route('admin.gurudwara');
    }
}
