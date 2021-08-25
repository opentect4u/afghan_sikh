<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use DB;
use App\Models\TdGurudwaraDetails;
use Session;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('is_gurudwara');
    }

    public function Show(){
        $id=Session::get('gurudwara')[0]['id'];
        $gurudwara=TdGurudwaraDetails::where('id',$id)->get();
        // return $gurudwara;
        return view('gurudwara.dashboard',['gurudwara'=>$gurudwara]);
    }

    public function Homeajax(Request $request){
        $id=Session::get('gurudwara')[0]['id'];
        $gurudwara=TdGurudwaraDetails::where('id',$id)->get();
        foreach($gurudwara as $gurudwaras){
            $gurudwara_name=$gurudwaras->gurudwara_name;
            $gurudwara_photo=$gurudwaras->gurudwara_photo;
            $gurudwara_letter_head=$gurudwaras->gurudwara_letter_head;
        }
       
        $arrNewResult = array();
        $arrNewResult['msg'] = "success";
        $arrNewResult['gurudwara_name'] = $gurudwara_name;
        $arrNewResult['gurudwara_photo'] = $gurudwara_photo;
        $arrNewResult['gurudwara_letter_head'] = $gurudwara_letter_head;
        $status_json = json_encode($arrNewResult);
        echo $status_json;
    }

    public function ShowUpload(){
        return view('gurudwara.upload');
    }

    public function Upload(Request $request){
        // return $request;
        $id=$request->id;
        $user_details = TdGurudwaraDetails::find($id);
        // return $request->file('logo');
        // return $user_details->gurudwara_photo;
        $profilepicname="";
    	if ($request->hasFile('logo')) {
            $profile_pic_path = $request->file('logo');
            $profilepicname=date('YmdHis') .'_'.$id. '_logo.' . $profile_pic_path->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath = public_path('gurudwara-image/');
            $profile_pic_path->move($destinationPath,$profilepicname);

            if($user_details->gurudwara_photo!=null){
                $filesc = public_path('gurudwara-image/') . $user_details->gurudwara_photo;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
          $profilepicname=$user_details->gurudwara_photo;
        }
        // return $request;

        $letterhead="";
    	if ($request->hasFile('letter_head')) {
            $letter_pic_path = $request->file('letter_head');
            $letterhead=date('YmdHis') .'_'.$id. '_letter.' . $letter_pic_path->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));
            $destinationPath1 = public_path('gurudwara-letter-head/');
            $letter_pic_path->move($destinationPath1,$letterhead);

            if($user_details->gurudwara_letter_head!=null){
                $filesc = public_path('gurudwara-letter-head/') . $user_details->gurudwara_letter_head;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
          $letterhead=$user_details->gurudwara_letter_head;
        }

        // return $request;
        // $user_details->gurudwara_id=$request->gurudwara_id;
        // $user_details->active=$request->active;
        $user_details->gurudwara_photo=$profilepicname;
        $user_details->gurudwara_letter_head=$letterhead;
        $user_details->update();
        return redirect()->route('gurudwara.home');
    }
}
