<?php

namespace App\Http\Controllers\gurudwara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use DB;
use App\Models\TdGurudwaraDetails;
use App\Models\TdGurudwaraMember;
use App\Models\MdCountry;
use Session;
use Illuminate\Support\Facades\Crypt;

class MemberController extends Controller
{
    public function __construct() {
        $this->middleware('is_gurudwara');
    }

    public function Show(Request $request){
        // return "hii";
        $gurudwara_id=Session::get('gurudwara')[0]['id'];
        $gurudwara=TdGurudwaraMember::where('gurudwara_id',$gurudwara_id)->get();
        // $gurudwara=DB::table('td_gurudwara_member')
        //             ->join('td_gurudwara_details', 'td_gurudwara_member.gurudwara_id', '=', 'td_gurudwara_details.id')
        //             ->select('td_gurudwara_member.*', 'td_gurudwara_details.*') 
        //             // ->Where('md_user_login.user_type','G')               
        //             // ->Where('md_user_login.active','A')               
        //             // ->orderBy('td_user_details.updated_at', 'desc')
        //             ->get();
        // return $gurudwara;
        return view('gurudwara.member-manage',['gurudwara'=>$gurudwara]);
    }

    public function ShowAdd(){
        $country=MdCountry::orderBy('name','asc')->get();
        return view('gurudwara.member-add',['country'=>$country]);
    }

    public function Add(Request $request){
        // return $request;
        $id=Session::get('gurudwara')[0]['id'];
        $gurudwara_name=DB::table('td_gurudwara_details')->where('id',$id)->value('gurudwara_name');
        $profilepicname="";
    	if ($request->hasFile('photo')) {
            $profile_pic_path = $request->file('photo');
            $profilepicname=date('YmdHis') .'_'.$id. '_memberlogo.' . $profile_pic_path->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath = public_path('gurudwara-member-image/');
            $profile_pic_path->move($destinationPath,$profilepicname);
        }
        TdGurudwaraMember::create(array(
            'gurudwara_id'=>$id,
            'name'=>$request->name,
            'dob'=>$request->dob,
            'email'=>$request->email,
            'phone'=>$request->phone ,
            'designation'=>$request->designation,
            'current_nationality' =>$request->current_nationality,
            'previous_nationality'=>$request->previous_nationality,
            'address'=>$request->address,
            'photo' =>$profilepicname,
            'created_by'=>$gurudwara_name,
        ));
        return redirect()->route('gurudwara.member');
    }

    public function ShowEdit($id){
        $id=Crypt::decryptString($id);
        $member_details=TdGurudwaraMember::find($id);
        $country=MdCountry::orderBy('name','asc')->get();
        return view('gurudwara.member-edit',['member_details'=>$member_details,'country'=>$country]);
    }

    public function Edit(Request $request){
        // return $request;
        $id=$request->id;
        $member_details=TdGurudwaraMember::find($id);

        $gurudwara_id=Session::get('gurudwara')[0]['id'];
        $gurudwara_name=DB::table('td_gurudwara_details')->where('id',$gurudwara_id)->value('gurudwara_name');
        $profilepicname="";
    	if ($request->hasFile('photo')) {
            $profile_pic_path = $request->file('photo');
            $profilepicname=date('YmdHis') .'_'.$gurudwara_id. '_memberlogo.' . $profile_pic_path->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath = public_path('gurudwara-member-image/');
            $profile_pic_path->move($destinationPath,$profilepicname);
            if($member_details->photo!=null){
                $filesc = public_path('gurudwara-member-image/') . $member_details->photo;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 
        }else{
            $profilepicname=$member_details->photo;
        }
        $member_details->name=$request->name;
        $member_details->dob=$request->dob;
        $member_details->email=$request->email;
        $member_details->phone=$request->phone;
        $member_details->designation=$request->designation;
        $member_details->address=$request->address;
        $member_details->current_nationality=$request->current_nationality;
        $member_details->previous_nationality=$request->previous_nationality;
        $member_details->photo=$profilepicname;
        $member_details->save();
        return redirect()->route('gurudwara.member');
    }

}
