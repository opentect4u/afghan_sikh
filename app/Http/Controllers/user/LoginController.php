<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\MdCountry;
use App\Models\TdUserDetails;
use App\Models\MdUserLogin;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function Show(){
        return view('user.login');
    }

    public function Login(Request $request){
        // return $request; 
        $user_id=$request->uname;
        $password=$request->pwd;
        $is_email=MdUserLogin::where('user_id',$request->uname)->where('user_type','U')->get();
        if(count($is_email)>0){
            // return $is_email;
            foreach($is_email as $user){
                $db_password=$user->password;
                $active=$user->active;
            }
            if (Hash::check($password, $db_password)) {
                // return view('gurudwara.dashboard');
                if($active=="A"){
                    Session::put('user', $is_email); 
                    return redirect()->route('user.home');
                }else{
                    return redirect()->back()->with('approvederror', 'approvederror');
                }
            }else{
                return redirect()->back()->with('error', 'error');
            }
            
        }else{
            return redirect()->back()->with('notregister','notregister');
        }
    }

    public function Logout(){
        session()->flush();
        return redirect()->route('user.login');
    }
}
