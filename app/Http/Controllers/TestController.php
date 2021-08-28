<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\MdUserLogin;

class TestController extends Controller
{
    public function Test(){

        $data=DB::table('mytest')->get();
        return $data;
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
