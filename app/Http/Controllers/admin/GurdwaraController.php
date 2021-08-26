<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdUserLogin;
use Session;
use DB;

class GurdwaraController extends Controller
{
    
    public function GurdwaraLogin(Request $request){
        // return "hii";
        session()->flush();
        $user_id=$request->email;
        $users=MdUserLogin::where('user_id',$user_id)->where('user_type','G')->get();
        Session::put('gurudwara', $users); 
        return redirect()->route('gurudwara.home');
    }
}
