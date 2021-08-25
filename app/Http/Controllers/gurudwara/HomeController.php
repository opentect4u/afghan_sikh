<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('is_gurudwara');
    }

    public function Show(){
        return view('gurudwara.dashboard');
    }
}
