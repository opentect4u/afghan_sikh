<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdUserLogin;
use Session;
use DB;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('is_admin');
    }
    
    public function Show(){
        return view('admin.index');
    }
}
