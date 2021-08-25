<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function Test(){
        // $invID=10;
        // return $invID = str_pad($invID, 4, '0', STR_PAD_LEFT);

        // return md5(uniqid(rand(), true));
        $d=1234;
        return Hash::make($d);
    }
}
