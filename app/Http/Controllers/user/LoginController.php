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
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordUserEmail;
use App\Mail\ResetPasswordConfirmUserEmail;

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
                // if($active=="A"){
                    Session::put('user', $is_email); 
                    return redirect()->route('user.home');
                // }else{
                //     return redirect()->back()->with('approvederror', 'approvederror');
                // }
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

    
    public function ShowForgot(){
        return view('user.forgot-show');
    }

    public function Forgot(Request $request){
        // return $request;
        $is_email=MdUserLogin::where('user_id',$request->uname)->where('user_type','U')->get();
        if(count($is_email)>0){
            // return $is_email;
            foreach($is_email as $user){
                $id=$user->id;
                $email_id=$user->user_id;
            }
            $data=TdUserDetails::find($id);
            // return $data;
            $surname=$data->surname;
            $givenname=$data->givenname;
            
            $mainurl=app('App\Http\Controllers\HomeController')->MainURL();
            // return $mainurl;
            $url=$mainurl.'user/recoverpassword/'.Crypt::encryptString($id);
            // return $url;
            $email=$request->uname;
            Mail::to($email)->send(new ResetPasswordUserEmail($surname,$givenname,$url));
            return redirect()->back()->with('success','success');
        }else{
            return redirect()->back()->with('error','error');
        }
    }

    public function ShowRecover($id){
        $id=Crypt::decryptString($id);
        // return $id;
        return view('user.recovery-password',['id'=>$id]);
    }

    public function Recovery(Request $request){
        // return $request;
        $id=$request->id;
        $data=MdUserLogin::find($id);
        $data->password=Hash::make($request->password);
        $data->save();
        // return $data;
        
        if($data->user_type=="U"){
            $email=$data->user_id;
            $data1=TdUserDetails::find($id);
            $surname=$data1->surname;
            $givenname=$data1->givenname;
                
            Mail::to($email)->send(new ResetPasswordConfirmUserEmail($surname,$givenname));

            return redirect()->route('user.login')->with('recoverypassword','recoverypassword');
        }else{
            $email=$data->user_id;
            $data1=TdGurudwaraDetails::find($id);
            $surname=$data1->gurudwara_name;
            $givenname='';
                
            Mail::to($email)->send(new ResetPasswordConfirmUserEmail($surname,$givenname));

            return redirect()->route('gurudwara.login')->with('recoverypassword','recoverypassword');
        }
    }
}
