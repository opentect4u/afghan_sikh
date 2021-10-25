<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use App\Models\MdCountry;
use App\Models\TdDonation;
use App\Models\MdUserLogin;
use App\Models\TdUserDetails;
use App\Models\TdUserFamily;

class DonationController extends Controller
{
    public function __construct() {
        $this->middleware('is_gurudwara');
    }

    public function Show(){
        $id=Session::get('gurudwara')[0]['id'];
        $gurudwara=TdDonation::where('gurdwara_id',$id)->orderBy('created_at','desc')->get();
        return view('gurudwara.donation-manage',['gurudwara'=>$gurudwara]);
    }

    public function ShowAdd(){
        return view('gurudwara.donation-add');
    }

    public function Add(Request $request){
        // return $request;
        $id=Session::get('gurudwara')[0]['id'];
        TdDonation::create(array(
            'gurdwara_id'    => $id  ,
            'name'           =>$request->name   ,
            'family_name'    =>$request->family_name   ,
            'type_of_amount' =>$request-> type_of_amount  ,
            'amount'         =>$request-> amount  ,
            'date_of_payment'=>$request-> date_of_payment  ,
            'remark'         =>$request-> remark  ,
        ));
        return redirect()->back()->with('success','success');
    }

    public function GetDetails(Request $request){
        $user_id=$request->input('user_id');
        // $user_id='AFS-U-IN-00003';
        // $user_id='testu03@gmail.com';
        $family=[];
        $name='';
        $data=MdUserLogin::where('user_id',$user_id)->get();
        if(count($data)>0){
            // return $data;
            foreach($data as $datas){
                $id=$datas->id;
            }
            // return $id;
            // TdUserDetails
            // TdUserFamily
            $data1=TdUserFamily::where('user_details_id',$id)->get();
            if(count($data1)>0){
                // return $data1;
                foreach($data1 as $data1s){
                    $first_name=$data1s->first_name;
                    $middle_name=$data1s->middle_name;
                    $last_name=$data1s->last_name;
                    $familyname=$first_name.' '.$middle_name.' '.$last_name;
                    array_push($family,$familyname);
                }
            }else{
                $data2=TdUserDetails::where('id',$id)->get();
                // return $data2;
                foreach($data2 as $data2s){
                    $surname=$data2s->surname;
                    $givenname=$data2s->givenname;
                }
                $name=$surname.' '.$givenname;
            }

        }else{
            $data2=TdUserDetails::where('phone',$user_id)->orWhere('email',$user_id)->get();
            // return $data2;
            if(count($data2)>0){
                foreach($data2 as $data2s){
                    $id=$data2s->id;
                    $surname=$data2s->surname;
                    $givenname=$data2s->givenname;
                }
                $data1=TdUserFamily::where('user_details_id',$id)->get();
                if(count($data1)>0){
                    // return $data1;
                    foreach($data1 as $data1s){
                        $first_name=$data1s->first_name;
                        $middle_name=$data1s->middle_name;
                        $last_name=$data1s->last_name;
                        $familyname=$first_name.' '.$middle_name.' '.$last_name;
                        array_push($family,$familyname);
                    }
                }else{
                    $name=$surname.' '.$givenname;
                }

            }
        }

        $msg="Success";
        $arrNewResult = array();
        $arrNewResult['name'] = $name;
        $arrNewResult['family'] = $family;
        $arrNewResult['msg'] = $msg;
        // $arrNewResult['payment_type'] = $val[3];
        $status_json = json_encode($arrNewResult);
        echo $status_json;
    }

    public function View($id){
        $id=Crypt::decryptString($id);
        // return $id;
        $data=TdDonation::find($id);
        return view('gurudwara.donation-view',['data'=>$data]);
    }

}
