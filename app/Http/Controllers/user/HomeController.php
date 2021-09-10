<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('is_user');
    }

    public function show(){
        // return "hii";
        return view('user.dashboard');
    }

    public function Profile(){
        return view('user.profile');
    }
}
