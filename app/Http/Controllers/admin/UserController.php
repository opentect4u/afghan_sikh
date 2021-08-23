<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdUserLogin;
use App\Models\TdUserDetails;
use DB;
use Session;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('is_admin');
    }

    public function Show(){
        $data=TdUserDetails::get();
        // return $data;
        // return Session::get('admin')[0]['name'];
        return view('admin.user-manage',['gurudwara'=>$data]);
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
}
