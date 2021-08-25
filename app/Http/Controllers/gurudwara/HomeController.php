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

    public function ShowUpload(){
        return view('gurudwara.upload');
    }

    public function Upload(Request $request){
        // return $request;
        $id=$request->id;
        $user_details = TdGurudwaraDetails::find($id);

        $profilepicname="";
    	if ($request->hasFile('logo')) {
            $profile_pic_path = $request->file('logo');
            $profilepicname=date('YmdHis') .'_'.$id. '_logo.' . $profile_pic_path->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));
            $path = public_path('gurudwara-image/'.$profilepicname);
            file_put_contents($path, $profile_pic_path);

            if($user_details->gurudwara_photo!=null){
                $filesc = public_path('gurudwara-image/') . $user_details->gurudwara_photo;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
          $profilepicname=$user_details->gurudwara_photo;
        }

        $letterhead="";
    	if ($request->hasFile('letter_head')) {
            $profile_pic_path = $request->file('letter_head');
            $letterhead=date('YmdHis') .'_'.$id. '_letter.' . $profile_pic_path->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));
            $path = public_path('gurudwara-letter-head/'.$letterhead);
            file_put_contents($path, $profile_pic_path);

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
