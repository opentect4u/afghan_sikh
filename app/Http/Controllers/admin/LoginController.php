<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdUserLogin;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function Show(){
        return view('admin.login');
    }

    public function Login(Request $request){
        // $password=1234;
        // return Hash::make($password);
        $user_id=$request->user_id;
        $password=$request->password;
        // return $user_id;

        // if (Hash::check($password, $db_password) && $active=="A") {
        $db_password=DB::table('md_user_login')->where(['user_id' => $request->user_id,'user_type'=>'A'])->value('password');
        // $match= password_verify($request->user_pass,$userpass);

	    if(Hash::check($password, $db_password)){
	  	    $admin = MdUserLogin::where(['user_id' => $request->user_id])->get();
	  	    Session::put('admin', $admin); 
            return redirect()->route('admin.home');
        }else{
            // return redirect()->route('admin');
            return redirect()->back()->with('error','error');
        }

    }

    public function Logout(){
        session()->flush();
        return redirect()->route('admin.login');
    }
}
