<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use DB;
use App\Models\TdGurudwaraDetails;
use App\Models\MdCountry;
use App\Models\MdUserLogin;
use Session;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('is_gurudwara');
    }

    public function Show(){
        $id=Session::get('gurudwara')[0]['id'];
        // $data=TdGurudwaraDetails::where('id',$id)->get();
        $data=DB::table('md_user_login')
        ->leftJoin('td_gurudwara_details', 'md_user_login.id', '=', 'td_gurudwara_details.id')
        ->select('md_user_login.*', 'td_gurudwara_details.*') 
        ->where('md_user_login.id',$id)
        ->get();
        $country=MdCountry::get();
        // return $gurudwara;
        return view('gurudwara.dashboard',['data'=>$data,'country'=>$country]);
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

    public function EditStage1(Request $request){
        // return $request;
        $id=Session::get('gurudwara')[0]['id'];
        $data=TdGurudwaraDetails::find($id);
        $data->gurudwara_name=$request->gurudwara_name;
        $data->gurudwara_email=Session::get('gurudwara')[0]['user_id'];
        $data->website=$request->website;
        $data->gurudwara_phone_no=$request->gurudwara_phone_no;
        $data->save();
        return redirect()->route('gurudwara.home');
    }

    public function EditStage2(Request $request){
        // return $request;
        $id=Session::get('gurudwara')[0]['id'];
        $data=TdGurudwaraDetails::find($id);
        $data->gurudwara_address=$request->gurudwara_address;
        $data->gurudwara_address_2=$request->gurudwara_address_2;
        $data->city=$request->city;
        $data->post_code=$request->post_code;
        $data->country=$request->country;
        $data->save();
        return redirect()->route('gurudwara.home');
    }

    public function EditStage3(Request $request){
        // return $request;
        $id=Session::get('gurudwara')[0]['id'];
        $data=TdGurudwaraDetails::find($id);
        $data->gurudwara_head_name=$request->gurudwara_head_name;
        $data->gurudwara_head_address=$request->gurudwara_head_address;
        $data->gurudwara_head_phone_no=$request->gurudwara_head_phone_no;
        $data->gurudwara_head_email=$request->gurudwara_head_email;
        $data->save();
        return redirect()->route('gurudwara.home');
    }

    public function EditStage4(Request $request){
        // return $request;
        $id=Session::get('gurudwara')[0]['id'];
        $data=TdGurudwaraDetails::find($id);
        if ($request->hasFile('doc_1')) {
            $profile_pic_path1 = $request->file('doc_1');
            $doc_1=date('YmdHis') .'_'.$id. 'doc_1.' . $profile_pic_path1->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath1 = public_path('user-doc/');
            $profile_pic_path1->move($destinationPath1,$doc_1);

            if($data->doc_1!=null){
                $filesc = public_path('user-doc/') . $data->doc_1;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_1=$data->doc_1;
        }

        if ($request->hasFile('doc_2')) {
            $profile_pic_path2 = $request->file('doc_2');
            $doc_2=date('YmdHis') .'_'.$id. 'doc_2.' . $profile_pic_path2->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath2 = public_path('user-doc/');
            $profile_pic_path2->move($destinationPath2,$doc_2);

            if($data->doc_2!=null){
                $filesc = public_path('user-doc/') . $data->doc_2;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $doc_2=$data->doc_2;
        }

        if ($request->hasFile('doc_3')) {
            $profile_pic_path3 = $request->file('doc_3');
            $doc_3=date('YmdHis') .'_'.$id. 'doc_3.' . $profile_pic_path3->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath3 = public_path('user-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_3);

            if($data->doc_3!=null){
                $filesc = public_path('user-doc/') . $data->doc_3;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_3=$data->doc_3;
        }

        if ($request->hasFile('doc_4')) {
            $profile_pic_path4 = $request->file('doc_4');
            $doc_4=date('YmdHis') .'_'.$id. 'doc_4.' . $profile_pic_path4->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath4 = public_path('user-doc/');
            $profile_pic_path4->move($destinationPath4,$doc_4);

            if($data->doc_4!=null){
                $filesc = public_path('user-doc/') . $data->doc_4;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_4=$data->doc_4;
        }
        $data->other_doc=$request->other_doc;
        $data->doc_1=$doc_1;
        $data->doc_2=$doc_2;
        $data->doc_3=$doc_3;
        $data->doc_4=$doc_4;
        $data->save();
        return redirect()->route('gurudwara.home');
    }

    public function ChangePass(Request $request){
        // return $request;
        $id=Session::get('gurudwara')[0]['id'];
        $data=MdUserLogin::find($id);
        $data->password=Hash::make($request->new_pass);
        $data->save();
        return redirect()->route('gurudwara.home');
    }
}
