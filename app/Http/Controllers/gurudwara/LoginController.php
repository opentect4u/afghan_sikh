<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdCountry;
use App\Models\TdUserDetails;
use App\Models\TdGurudwaraDetails;

use App\Models\MdUserLogin;
use DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordGurdwaraEmail;
use App\Mail\ResetPasswordConfirmUserEmail;

class LoginController extends Controller
{
    public function Show(){
        return view('gurudwara.login');
    }

    public function Login(Request $request){
        $user_id=$request->uname;
        $password=$request->pwd;
        if(filter_var($user_id, FILTER_VALIDATE_EMAIL)!=false){
            // return $user_id;
            $id=TdGurudwaraDetails::where('gurudwara_email',$user_id)->value('id');
            $users=MdUserLogin::where('id',$id)->whereIn('user_type',array('G','C','O'))->get();
            // return $users;
        }else{
            // return "else";
            $users=MdUserLogin::where('user_id',$user_id)->whereIn('user_type',array('G','C','O'))->get();
        }

        if (count($users)>0) {
            foreach($users as $user){
                $db_password=$user->password;
                $active=$user->active;
            }
            if (Hash::check($password, $db_password)) {
                // return view('gurudwara.dashboard');
	  	        Session::put('gurudwara', $users); 
                return redirect()->route('gurudwara.home');
            }else{
                return redirect()->back()->with('error', 'error');
            }
        }else{
            return redirect()->back()->with('notregister', 'notregister');
        }

        // return redirect()->back()->with('error')
        // return redirect()->back()->with('error', 'error');

        // MdUserLogin
    }

    public function Logout(){
        session()->flush();
        return redirect()->route('gurudwara.login');
    }

    public function ShowForgot(){
        return view('gurudwara.forgot-show');
    }

    public function Forgot(Request $request){
        // return $request;
        $is_email=MdUserLogin::where('user_id',$request->uname)->whereIn('user_type',array('G','O','C'))->get();
        // return $is_email;
        if(count($is_email)>0){
            // return $is_email;
            foreach($is_email as $user){
                $id=$user->id;
                $email_id=$user->user_id;
            }
            $data=TdGurudwaraDetails::find($id);
            // return $data;
            $surname=$data->gurudwara_name;
            $givenname='';
            
            $mainurl=app('App\Http\Controllers\HomeController')->MainURL();
            // return $mainurl;
            $url=$mainurl.'user/recoverpassword/'.Crypt::encryptString($id);
            // return $url;
            $email=$request->uname;
            Mail::to($email)->send(new ResetPasswordGurdwaraEmail($surname,$givenname,$url));
            return redirect()->back()->with('success','success');
        }else{
            return redirect()->back()->with('error','error');
        }
    }
}
