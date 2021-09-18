<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use DB;
use App\Models\TdUserDetails;
use App\Models\TdCertificate;
use App\Models\MdCertificateType;
use Session;
use Illuminate\Support\Facades\Crypt;

class CertificateController extends Controller
{
    public function __construct() {
        $this->middleware('is_user');
    }

    public function Manage(){
        $id=Session::get('user')[0]['id'];
        // return $id;
        $data=DB::table('td_certificate')
            ->leftJoin('md_certificate_type', 'td_certificate.certificates_type_id', '=', 'md_certificate_type.id')
            ->select('td_certificate.*', 'md_certificate_type.*') 
            ->where('td_certificate.user_id',$id)
            ->orderBy('td_certificate.application_date', 'desc')
            ->get();
        // return $data;
        return view('user.certificate-manage',['data'=>$data]);
    }

    public function ShowAdd(){
        $certificate=MdCertificateType::get();
        // return $certificate;
        return view('user.certificate-add',['certificate'=>$certificate]);
    }

    public function Add(Request $request){
        // return $request;
        $id=Session::get('user')[0]['id'];
        if ($request->hasFile('doc_1')) {
            $profile_pic_path1 = $request->file('doc_1');
            $doc_1=date('YmdHis') .'_'.$id. 'doc_1.' . $profile_pic_path1->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath1 = public_path('certificate-doc/');
            $profile_pic_path1->move($destinationPath1,$doc_1);

            
        }

        if ($request->hasFile('doc_2')) {
            $profile_pic_path2 = $request->file('doc_2');
            $doc_2=date('YmdHis') .'_'.$id. 'doc_2.' . $profile_pic_path2->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath2 = public_path('certificate-doc/');
            $profile_pic_path2->move($destinationPath2,$doc_2);

           
        }
        $doc_3='';
        if ($request->hasFile('doc_3')) {
            $profile_pic_path3 = $request->file('doc_3');
            $doc_3=date('YmdHis') .'_'.$id. 'doc_3.' . $profile_pic_path3->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath3 = public_path('certificate-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_3);

            
        }
        $doc_4='';
        if ($request->hasFile('doc_4')) {
            $profile_pic_path4 = $request->file('doc_4');
            $doc_4=date('YmdHis') .'_'.$id. 'doc_4.' . $profile_pic_path4->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath4 = public_path('certificate-doc/');
            $profile_pic_path4->move($destinationPath4,$doc_4);

           

        }
        TdCertificate::create(array(
            'user_id'=>$id,
            'certificates_type_id'=>$request->certificates_type_id,
            'application_date'=>date('Y-m-d'),
            'doc_1'=>$doc_1,
            'doc_2' =>$doc_2,
            'doc_3' =>$doc_3,
            'doc_4 ' =>$doc_4,
            'approved'=>"I",
        ));
        return redirect()->route('user.managecertificate');
    }

    public function ShowEdit($id){
        $id=Crypt::decryptString($id);
        // return $id;
        $certificate=MdCertificateType::get();
        $editdata=TdCertificate::find($id);
        return view('user.certificate-add',['editdata'=>$editdata,'certificate'=>$certificate]);
    }
}
