<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use DB;
use App\Models\TdUserFamily;
use App\Models\MdCountry;
use Session;
use Illuminate\Support\Facades\Crypt;

class FamilyController extends Controller
{
    public function __construct() {
        $this->middleware('is_user');
    }
    
    public function Show(){
        // return "hii";
        $id=Session::get('user')[0]['id'];
        // return $id;
        $gurudwara =TdUserFamily::where('user_details_id',$id)->orderBy('created_at','desc')->get();
        return view('user.family-manage',['gurudwara'=>$gurudwara]);
    }

    public function Add(){
        return view('user.register-family');
    }

    public function AddConfirm(Request $request){
        // return $request;
        $user_id=Session::get('user')[0]['id'];
        TdUserFamily::create(array(
            'user_details_id'=>$user_id,
            'first_name'     =>$request->first_name ,
            'middle_name'    =>$request->middle_name ,
            'last_name'      =>$request->last_name ,
            'gender'         =>$request->gender ,
            'relation'       =>$request->relation,
        ));
        return redirect()->route('user.addfamilymember2');
    }

    public function Add2(){
        $country=MdCountry::orderBy('name','asc')->get();
        return view('user.register-family2',['country'=> $country]);
    }

    public function AddConfirm2(Request $request){
        if(isset($request->id)){
            $id=$request->id;
        }else{
            $user_id=Session::get('user')[0]['id'];
            $id= DB::table('td_user_family_details')->where('user_details_id',$user_id)->value('id');
        }
        // return $id;
        // return $request;
        $data=TdUserFamily::find($id);
        $data->current_citizenship =$request->current_citizenship;
        $data->previous_citizenship =$request->previous_citizenship;
        $data->passport_no =$request->passport_no;
        $data->passport_date_of_issue =$request->passport_date_of_issue;
        $data->passport_date_of_expiry =$request->passport_date_of_expiry;
        $data->save();
        // return $data;
        if(isset($request->id)){
            return redirect()->route('user.editfamilymember3',['id' => Crypt::encryptString($data->id)]);
        }
        return redirect()->route('user.addfamilymember3');
        
    }

    public function Add3(){
        $country=MdCountry::orderBy('name','asc')->get();
        return view('user.register-family3',['country'=> $country]);
    }

    public function AddConfirm3(Request $request){
        if(isset($request->id)){
            $id=$request->id;
        }else{
            $user_id=Session::get('user')[0]['id'];
            $id= DB::table('td_user_family_details')->where('user_details_id',$user_id)->value('id');
        }// return $id;
        // return $request;
        $data=TdUserFamily::find($id);
        $data->afghan_id =$request->afghan_id;
        $data->email =$request->email;
        $data->phone =$request->phone;
        $data->save();
        // return $data;
        if(isset($request->id)){
            return redirect()->route('user.editfamilymember4',['id' => Crypt::encryptString($data->id)]);
        }
        return redirect()->route('user.addfamilymember4');
        
    }

    public function Add4(){
        $country=MdCountry::orderBy('name','asc')->get();
        return view('user.register-family4',['country'=> $country]);
    }

    public function AddConfirm4(Request $request){
        if(isset($request->id)){
            $id=$request->id;
        }else{
            $user_id=Session::get('user')[0]['id'];
            $id= DB::table('td_user_family_details')->where('user_details_id',$user_id)->value('id');
        }// return $id;
        // return $request;
        $data=TdUserFamily::find($id);

        if ($request->hasFile('doc_1')) {
            $profile_pic_path1 = $request->file('doc_1');
            $doc_1=date('YmdHis') .'_'.$id. 'doc_1.' . $profile_pic_path1->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath1 = public_path('user-family-doc/');
            $profile_pic_path1->move($destinationPath1,$doc_1);

            if($data->doc_1!=null){
                $filesc = public_path('user-family-doc/') . $data->doc_1;
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

            $destinationPath2 = public_path('user-family-doc/');
            $profile_pic_path2->move($destinationPath2,$doc_2);

            if($data->doc_2!=null){
                $filesc = public_path('user-family-doc/') . $data->doc_2;
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

            $destinationPath3 = public_path('user-family-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_3);

            if($data->doc_3!=null){
                $filesc = public_path('user-family-doc/') . $data->doc_3;
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

            $destinationPath4 = public_path('user-family-doc/');
            $profile_pic_path4->move($destinationPath4,$doc_4);

            if($data->doc_4!=null){
                $filesc = public_path('user-family-doc/') . $data->doc_4;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_4=$data->doc_4;
        }

        if ($request->hasFile('doc_5')) {
            $profile_pic_path3 = $request->file('doc_5');
            $doc_5=date('YmdHis') .'_'.$id. 'doc_5.' . $profile_pic_path3->getClientOriginalExtension();

            $destinationPath3 = public_path('user-family-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_5);

            if($data->doc_5!=null){
                $filesc = public_path('user-family-doc/') . $data->doc_5;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_5=$data->doc_5;
        }

        if ($request->hasFile('doc_6')) {
            $profile_pic_path3 = $request->file('doc_6');
            $doc_6=date('YmdHis') .'_'.$id. 'doc_6.' . $profile_pic_path3->getClientOriginalExtension();

            $destinationPath3 = public_path('user-family-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_6);

            if($data->doc_6!=null){
                $filesc = public_path('user-family-doc/') . $data->doc_6;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_6=$data->doc_6;
        }

        if ($request->hasFile('doc_7')) {
            $profile_pic_path4 = $request->file('doc_7');
            $doc_7=date('YmdHis') .'_'.$id. 'doc_7.' . $profile_pic_path4->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath4 = public_path('user-family-doc/');
            $profile_pic_path4->move($destinationPath4,$doc_7);

            if($data->doc_7!=null){
                $filesc = public_path('user-family-doc/') . $data->doc_7;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_7=$data->doc_7;
        }

        if ($request->hasFile('doc_8')) {
            $profile_pic_path3 = $request->file('doc_8');
            $doc_8=date('YmdHis') .'_'.$id. 'doc_8.' . $profile_pic_path3->getClientOriginalExtension();

            $destinationPath3 = public_path('user-family-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_8);

            if($data->doc_8!=null){
                $filesc = public_path('user-family-doc/') . $data->doc_8;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_8=$data->doc_8;
        }

        if ($request->hasFile('doc_9')) {
            $profile_pic_path3 = $request->file('doc_9');
            $doc_9=date('YmdHis') .'_'.$id. 'doc_9.' . $profile_pic_path3->getClientOriginalExtension();

            $destinationPath3 = public_path('user-family-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_9);

            if($data->doc_9!=null){
                $filesc = public_path('user-family-doc/') . $data->doc_9;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_9=$data->doc_9;
        }

        if ($request->hasFile('doc_10')) {
            $profile_pic_path3 = $request->file('doc_10');
            $doc_10=date('YmdHis') .'_'.$id. 'doc_10.' . $profile_pic_path3->getClientOriginalExtension();

            $destinationPath3 = public_path('user-family-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_10);

            if($data->doc_10!=null){
                $filesc = public_path('user-family-doc/') . $data->doc_10;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_10=$data->doc_10;
        }

        

        $data->doc_1=$doc_1;
        $data->doc_1_name=$request->doc_1_name;
        $data->doc_2=$doc_2;
        $data->doc_2_name=$request->doc_2_name;
        $data->doc_3=$doc_3;
        $data->doc_3_name=$request->doc_3_name;
        $data->doc_4=$doc_4;
        $data->doc_4_name=$request->doc_4_name;
        $data->doc_5=$doc_5;
        $data->doc_5_name=$request->doc_5_name;
        $data->doc_6=$doc_6;
        $data->doc_6_name=$request->doc_6_name;
        $data->doc_7=$doc_7;
        $data->doc_7_name=$request->doc_7_name;
        $data->doc_8=$doc_8;
        $data->doc_8_name=$request->doc_8_name;
        $data->doc_9=$doc_9;
        $data->doc_9_name=$request->doc_9_name;
        $data->doc_10=$doc_10;
        $data->doc_10_name=$request->doc_10_name;
        $data->save();
        // return $data;
        
        return redirect()->route('user.managefamily');
        
    }

    public function EditShow($id){
        // return $id;
        $id=Crypt::decryptString($id);
        // return $id;
        $editdata=TdUserFamily::find($id);
        return view('user.register-family',['editdata'=>$editdata]);

    }

    public function Edit(Request $request){
        // return $request;
        $id=$request->id;
        $data=TdUserFamily::find($id);
        $data->first_name =$request->first_name;
        $data->middle_name =$request->middle_name;
        $data->last_name =$request->last_name;
        $data->gender =$request->gender;
        $data->relation =$request->relation;
        $data->save();
        return redirect()->route('user.editfamilymember2',['id' => Crypt::encryptString($data->id)]);
    }

    public function EditShow2($id){
        $id=Crypt::decryptString($id);
        // return $id;
        $country=MdCountry::orderBy('name','asc')->get();
        $editdata=TdUserFamily::find($id);
        return view('user.register-family2',['editdata'=>$editdata,'country'=>$country]);
    }

    public function EditShow3($id){
        $id=Crypt::decryptString($id);
        // return $id;
        $country=MdCountry::orderBy('name','asc')->get();
        $editdata=TdUserFamily::find($id);
        return view('user.register-family3',['editdata'=>$editdata,'country'=>$country]);
    }

    public function EditShow4($id){
        $id=Crypt::decryptString($id);
        // return $id;
        $country=MdCountry::orderBy('name','asc')->get();
        $editdata=TdUserFamily::find($id);
        return view('user.register-family4',['editdata'=>$editdata,'country'=>$country]);
    }

    public function ShowFamily($id){
        // return $id;
        $id=Crypt::decryptString($id);
        // return $id;
        $country=MdCountry::orderBy('name','asc')->get();
        $editdata=TdUserFamily::find($id);
        return view('user.register-family-view',['editdata'=>$editdata,'country'=>$country]);

    }


}
