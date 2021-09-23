<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use DB;
use App\Models\TdUserDetails;
use App\Models\MdCountry;
use App\Models\MdUserLogin;
use Session;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('is_user');
    }

    public function show(){
        // return "hii";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $data=DB::table('md_user_login')
            ->leftJoin('td_user_details', 'md_user_login.id', '=', 'td_user_details.id')
            ->select('md_user_login.*', 'td_user_details.*') 
            ->where('md_user_login.id',$id)
            ->get();
        // return $data;
        $country=MdCountry::get();
        return view('user.dashboard',['data'=>$data,'country'=>$country]);
    }

    public function Profile(){
        return view('user.profile');
    }

    public function Homeajax(Request $request){
        $id=Session::get('user')[0]['id'];
        $gurudwara=TdUserDetails::where('id',$id)->get();
        foreach($gurudwara as $gurudwaras){
            $gurudwara_name=$gurudwaras->surname;
            $gurudwara_photo=$gurudwaras->user_logo;
            // $gurudwara_letter_head=$gurudwaras->gurudwara_letter_head;
        }
       
        $arrNewResult = array();
        $arrNewResult['msg'] = "success";
        $arrNewResult['gurudwara_name'] = $gurudwara_name;
        $arrNewResult['gurudwara_photo'] = $gurudwara_photo;
        // $arrNewResult['gurudwara_letter_head'] = $gurudwara_letter_head;
        $status_json = json_encode($arrNewResult);
        echo $status_json;
    }

    public function EditStage1(Request $request){
        // return $request;
        $id=Session::get('user')[0]['id'];
        $data=TdUserDetails::find($id);
        if($data==''){
            TdUserDetails::create(array(
                'id'=>$id,
            )); 
        }
        $data=TdUserDetails::find($id);
        $data->surname=$request->surname;
        $data->givenname=$request->givenname;
        $data->gender=$request->gender;
        $data->email=Session::get('user')[0]['user_id'];
        $data->date_of_birth=date('Y-m-d', strtotime($request->date_of_birth));
        $data->afghan_id=$request->afghan_id;
        $data->save();
        return redirect()->route('user.home');
    }

    public function EditStage2(Request $request){
        // return $request;
        $id=Session::get('user')[0]['id'];
        $data=TdUserDetails::find($id);
        if($data==''){
            TdUserDetails::create(array(
                'id'=>$id,
            )); 
        }
        $data=TdUserDetails::find($id);
        $data->birth_place=$request->birth_place;
        $data->birth_country=$request->birth_country;
        $data->nationality=$request->nationality;
        $data->previous_nationality=$request->previous_nationality;
        $data->save();
        return redirect()->route('user.home');
    }

    public function EditStage3(Request $request){
        // return $request;
        $id=Session::get('user')[0]['id'];
        $data=TdUserDetails::find($id);
        if($data==''){
            TdUserDetails::create(array(
                'id'=>$id,
            )); 
        }
        $data=TdUserDetails::find($id);
        $data->add_1=$request->add_1;
        $data->add_2=$request->add_2;
        $data->city=$request->city;
        $data->postcode=$request->postcode;
        $data->phone=$request->phone;
        $data->save();
        return redirect()->route('user.home');
    }

    public function EditStage4(Request $request){
        // return $request;
        $id=Session::get('user')[0]['id'];
        $data=TdUserDetails::find($id);
        if($data==''){
            TdUserDetails::create(array(
                'id'=>$id,
            )); 
        }
        $data=TdUserDetails::find($id);
        $data->marital_status=$request->marital_status;
        $data->religion=$request->religion;
        $data->profession=$request->profession;
        $data->save();
        return redirect()->route('user.home');
    }

    public function EditStage5(Request $request){
        // return $request;
        $id=Session::get('user')[0]['id'];
        $data=TdUserDetails::find($id);
        if($data==''){
            TdUserDetails::create(array(
                'id'=>$id,
            )); 
        }
        $data=TdUserDetails::find($id);
        $data->father_name=$request->father_name;
        $data->father_nationality=$request->father_nationality;
        $data->father_prev_nationality=$request->father_prev_nationality;
        $data->father_birth_country=$request->father_birth_country;
        $data->save();
        return redirect()->route('user.home');
    }
    public function EditStage6(Request $request){
        // return $request;
        $id=Session::get('user')[0]['id'];
        $data=TdUserDetails::find($id);
        if($data==''){
            TdUserDetails::create(array(
                'id'=>$id,
            )); 
        }
        $data=TdUserDetails::find($id);
        $data->mother_name=$request->mother_name;
        $data->mother_nationality=$request->mother_nationality;
        $data->mother_prev_nationality=$request->mother_prev_nationality;
        $data->mother_birth_country=$request->mother_birth_country;
        $data->save();
        return redirect()->route('user.home');
    }

    public function EditStage7(Request $request){
        // return $request;
        $id=Session::get('user')[0]['id'];
        $data=TdUserDetails::find($id);
        if($data==''){
            TdUserDetails::create(array(
                'id'=>$id,
            )); 
        }
        $data=TdUserDetails::find($id);
        $data->other_info=$request->other_info;
        $data->save();
        return redirect()->route('user.home');
    }

    public function EditStage8(Request $request){
        // return $request;
        $id=Session::get('user')[0]['id'];
        $data=TdUserDetails::find($id);
        if($data==''){
            TdUserDetails::create(array(
                'id'=>$id,
            )); 
        }
        $data=TdUserDetails::find($id);
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

        $data->doc_1=$doc_1;
        $data->doc_2=$doc_2;
        $data->doc_3=$doc_3;
        $data->doc_4=$doc_4;
        $data->save();
        return redirect()->route('user.home');
    }

    public function ChangePass(Request $request){
        // return $request;
        $id=Session::get('user')[0]['id'];
        $data=MdUserLogin::find($id);
        $data->password=Hash::make($request->new_pass);
        $data->save();
        return redirect()->route('user.home');
    }

    public function LogoUpload(Request $request){
        // return $request;
        $id=Session::get('user')[0]['id'];
        $data=TdUserDetails::find($id);
        if($data==''){
            TdUserDetails::create(array(
                'id'=>$id,
            )); 
        }
        $data=TdUserDetails::find($id);
        if ($request->hasFile('user_logo')) {
            $profile_pic_path1 = $request->file('user_logo');
            $user_logo=date('YmdHis') .'_'.$id. 'user_logo.' . $profile_pic_path1->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath1 = public_path('user-image/');
            $profile_pic_path1->move($destinationPath1,$user_logo);

            if($data->user_logo!=null){
                $filesc = public_path('user-image/') . $data->user_logo;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $user_logo=$data->user_logo;
        }
        $data->user_logo=$user_logo;
        $data->save();
        return redirect()->route('user.home');
    }
}
