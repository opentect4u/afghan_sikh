<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdUserLogin;
use App\Models\TdServiceDetails;
use App\Models\TdCertificate;
use Session;
use DB;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('is_admin');
    }
    
    public function Show(){
        $total_no_gurdwara=MdUserLogin::whereIn('user_type',array('G','O','C'))->count();
        $total_no_user=MdUserLogin::where('user_type','U')->count();
        $total_no_help=TdServiceDetails::count();
        $total_no_certificate=TdCertificate::count();
        // return $total_no_certificate;
        return view('admin.index',['total_no_gurdwara'=>$total_no_gurdwara,'total_no_user'=>$total_no_user,'total_no_help'=>$total_no_help,'total_no_certificate'=>$total_no_certificate]);
    }
}
