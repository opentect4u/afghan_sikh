<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdCountry;
use App\Models\TdUserDetails;
use App\Models\MdUserLogin;
use DB;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
{
    public function Show(){
        return view('gurudwara.login');
    }

    public function Login(Request $request){
        $user_id=$request->uname;
        $password=$request->pwd;
        $users=MdUserLogin::where('user_id',$user_id)->where('user_type','G')->get();
        if (count($users)>0) {
            foreach($users as $user){
                $db_password=$user->password;
                $active=$user->active;
            }
            if (Hash::check($password, $db_password) && $active=="A") {
                // return view('gurudwara.dashboard');
	  	        // Session::put('gurudwara', $users); 
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
}
