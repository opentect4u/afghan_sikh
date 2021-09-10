<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\MdUserLogin;
use App\Models\TdUserDetails;
use Illuminate\Support\Facades\Crypt;

class TestController extends Controller
{
    public function Test(){

        // $data=DB::table('mytest')->get();
        // return $data;
        // return "hh";
        // $email='';
        // $email='cmaity905@gmail.com';
        // $mobile='161654';
        // $has_email=TdUserDetails::where('email',$email)->orWhere('mobile',$mobile)->get();
        // return $has_email;
        // $name= env('APP_URL');
        $id=24;
        $user_id="testsc04@gmail.com";
        $url='http://afghansikh.com/user?id='.Crypt::encryptString($id).'&email='.Crypt::encryptString($user_id);

        return $url;
        return  asset('public/img/phon.jpg');
        // $invID=10;
        // return $invID = str_pad($invID, 4, '0', STR_PAD_LEFT);

        // return md5(uniqid(rand(), true));
        // $d=1234;
        // return Hash::make($d);
        // $gurudwara_email='testsc04@gmail.com';
        // $is_user=MdUserLogin::where('user_id',$gurudwara_email)->get();
        // return count($is_user);
    }
    
}
