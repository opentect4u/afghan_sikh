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
use Illuminate\Support\Facades\Response;
use Image;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('is_admin');
    }

    public function Show(Request $equest){
        $status_details=$equest->status;
        // $data=TdUserDetails::orderBy('updated_at','desc')->get();
        if(isset($request->startDate) && isset($request->endDate)){
            // $startDate=Carbon::parse($request->startDate)->format('Y-m-d');
            // return $request->startDate;

            $startDate=date("Y-m-d", strtotime($request->startDate));
            $endDate=date("Y-m-d", strtotime($request->endDate));
            // return $startDate;
            $data=DB::table('md_user_login')
                ->leftJoin('td_user_details','md_user_login.id','=','td_user_details.id')
                ->leftJoin('td_gurudwara_details', 'td_user_details.gurudwara_id', '=', 'td_gurudwara_details.id')
                ->select('md_user_login.*','td_user_details.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
                ->Where('md_user_login.user_type','U')               
                ->Where('md_user_login.active',$status_details)  
                ->whereBetween('md_user_login.created_at', [$startDate, $endDate])
                ->orderBy('md_user_login.created_at', 'desc')
                ->get();
            
            return view('admin.user-manage',['gurudwara'=>$data,'status_details'=>$status_details,'startDate'=>$request->startDate,'endDate'=>$request->endDate]);
        }


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
        }else if($status_details=='OH'){
            $data=DB::table('md_user_login')
            ->leftJoin('td_user_details','md_user_login.id','=','td_user_details.id')
            ->leftJoin('td_gurudwara_details', 'td_user_details.gurudwara_id', '=', 'td_gurudwara_details.id')
            ->select('md_user_login.*','td_user_details.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
            ->Where('md_user_login.user_type','U')               
            ->Where('md_user_login.active','OH')               
            ->orderBy('md_user_login.created_at', 'desc')
            ->get();
        }else if($status_details=='AD'){
            $data=DB::table('md_user_login')
            ->leftJoin('td_user_details','md_user_login.id','=','td_user_details.id')
            ->leftJoin('td_gurudwara_details', 'td_user_details.gurudwara_id', '=', 'td_gurudwara_details.id')
            ->select('md_user_login.*','td_user_details.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
            ->Where('md_user_login.user_type','U')               
            ->Where('md_user_login.active','AD')               
            ->orderBy('md_user_login.created_at', 'desc')
            ->get();
        }else if($status_details=='AR'){
            $data=DB::table('md_user_login')
            ->leftJoin('td_user_details','md_user_login.id','=','td_user_details.id')
            ->leftJoin('td_gurudwara_details', 'td_user_details.gurudwara_id', '=', 'td_gurudwara_details.id')
            ->select('md_user_login.*','td_user_details.*', 'td_gurudwara_details.gurudwara_name as gurudwaras_name') 
            ->Where('md_user_login.user_type','U')               
            ->Where('md_user_login.active','AR')               
            ->orderBy('md_user_login.created_at', 'desc')
            ->get();
        }else{
            $data=DB::table('md_user_login')
                    ->leftJoin('td_user_details','md_user_login.id','=','td_user_details.id')
                    ->select('md_user_login.*','td_user_details.*') 
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
        // whereBetween
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
        $user_details1 = MdUserLogin::find($id);
        $country=MdCountry::get();
        // $gurudwara=MdUserLogin::where('user_type','G')->where('active','A')->get();
        $gurudwara=DB::table('md_user_login')
                    ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
                    ->select( 'td_gurudwara_details.*') 
                    // ->Where('md_user_login.user_type','=','G')               
                    ->whereIn('md_user_login.user_type', array('G', 'O', 'C'))
                              
                    ->Where('md_user_login.active','A')   
                    // ->orWhere('md_user_login.user_type','=','C')               
                    // ->orWhere('md_user_login.user_type','=','O')                 
                    // ->orderBy('td_user_details.updated_at', 'desc')CO
                    ->get();
        // return $gurudwara;
        return view('admin.user-edit',['user_details'=>$user_details,'user_details1'=>$user_details1,'country'=>$country,'gurudwara'=>$gurudwara]);
        
    }
    public function EditConfirm(Request $request){
        // return $request;
        $id=$request->id;
        $data=MdUserLogin::find($id);
        $data->active=$request->status;
        $data->save();
        $user_details = TdUserDetails::find($id);
        $user_details->gurudwara_id=$request->gurudwara_id;
        $user_details->remark=$request->remark;
        $user_details->save();
        return redirect()->route('admin.user');
    }

    public function Download($link){
        $url=asset('public/user-doc').'/'.$link;
        // return $url;
        // return Response::download($url);
        // return Image::make($url)->save('download/'.$link);
        // return \Storage::download($url);
        // $headers = array(
        //     'Content-Disposition' => 'inline',
        // );
        
        // return \Storage::download($url, $link, $headers);
    }
}
