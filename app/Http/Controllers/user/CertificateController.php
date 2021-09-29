<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use DB;
use App\Models\TdUserDetails;
use App\Models\TdCertificate;
use App\Models\MdCertificateType;
use App\Models\TdUserFamily;
use Session;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class CertificateController extends Controller
{
    public function __construct() {
        $this->middleware('is_user');
    }

    public function Manage(){
        $id=Session::get('user')[0]['id'];
        // return $id;
        $data=DB::table('td_certificate')
            ->leftJoin('td_gurudwara_details', 'td_gurudwara_details.id', '=', 'td_certificate.gurdwara_id')
            ->leftJoin('md_certificate_type', 'td_certificate.certificates_type_id', '=', 'md_certificate_type.id')
            ->select( 'md_certificate_type.*','td_certificate.*','td_gurudwara_details.gurudwara_name as gurudwara_name') 
            ->where('td_certificate.user_id',$id)
            ->orderBy('td_certificate.application_date', 'desc')
            ->get();
        // return $data;
        return view('user.certificate-manage',['data'=>$data]);
    }

    public function ShowAdd(){
        $certificate=MdCertificateType::where('active','A')->get();
        // return $certificate;
        $id=Session::get('user')[0]['id'];
        // return $id;
        $family_details=TdUserFamily::where('user_details_id',$id)->get();
        return view('user.certificate-add',['certificate'=>$certificate,'family_details'=>$family_details]);
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
            'family_details_id'=>$request->family_details,
            'certificates_type_id'=>$request->certificates_type_id,
            'remark'=>$request->remark,
            'application_date'=>date('Y-m-d'),
            'ceremony_of_shri' =>$request->ceremony_of_shri,
            'son_of_shri'=>$request->son_of_shri,
            'with_shrimati'=>$request->with_shrimati,
            'daughter_of_shri'=>$request->daughter_of_shri,
            'date_of_marriage'=>Carbon::parse($request->date_of_marriage)->format('Y-m-d'),
            'doc_1'=>$doc_1,
            'doc_2' =>$doc_2,
            'doc_3' =>$doc_3,
            'doc_4' =>$doc_4,
            'doc_1_name'=>$request->doc_1_name,
            'doc_2_name'=>$request->doc_2_name,
            'doc_3_name'=>$request->doc_3_name,
            'doc_4_name'=>$request->doc_4_name,
            'approved'=>"I",
        ));
        return redirect()->route('user.managecertificate');
    }

    public function ShowEdit($id){
        $id=Crypt::decryptString($id);
        // return $id;
        $certificate=MdCertificateType::where('active','A')->get();
        $editdata=TdCertificate::find($id);
        $id=Session::get('user')[0]['id'];
        // return $id;
        $family_details=TdUserFamily::where('user_details_id',$id)->get();
        return view('user.certificate-add',['editdata'=>$editdata,'certificate'=>$certificate,'family_details'=>$family_details]);
    }

    public function Edit(Request $request){
        // return $request;
        $id=$request->id;
        $data=TdCertificate::find($id);

        if ($request->hasFile('doc_1')) {
            $profile_pic_path1 = $request->file('doc_1');
            $doc_1=date('YmdHis') .'_'.$id. 'doc_1.' . $profile_pic_path1->getClientOriginalExtension();
            // $image_resize=$this->resizeSCImageLarge($profile_pic_path);
            // $image_resize->save(public_path('gurudwara-image/' . $profilepicname));

            $destinationPath1 = public_path('certificate-doc/');
            $profile_pic_path1->move($destinationPath1,$doc_1);

            if($data->doc_1!=null){
                $filesc = public_path('certificate-doc/') . $data->doc_1;
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

            $destinationPath2 = public_path('certificate-doc/');
            $profile_pic_path2->move($destinationPath2,$doc_2);

            if($data->doc_2!=null){
                $filesc = public_path('certificate-doc/') . $data->doc_2;
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

            $destinationPath3 = public_path('certificate-doc/');
            $profile_pic_path3->move($destinationPath3,$doc_3);

            if($data->doc_3!=null){
                $filesc = public_path('certificate-doc/') . $data->doc_3;
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

            $destinationPath4 = public_path('certificate-doc/');
            $profile_pic_path4->move($destinationPath4,$doc_4);

            if($data->doc_4!=null){
                $filesc = public_path('certificate-doc/') . $data->doc_4;
                if (file_exists($filesc) != null) {
                    unlink($filesc);
                }
            } 

        }else{
            $doc_4=$data->doc_4;
        }
        $data->family_details_id=$request->family_details;
        $data->certificates_type_id=$request->certificates_type_id;
        $data->remark=$request->remark;;
        $data->doc_1=$doc_1;
        $data->doc_2=$doc_2;
        $data->doc_3=$doc_3;
        $data->doc_4=$doc_4;
        $data->doc_1_name=$request->doc_1_name;;
        $data->doc_2_name=$request->doc_2_name;;
        $data->doc_3_name=$request->doc_3_name;;
        $data->doc_4_name=$request->doc_4_name;;
        $data->save();
        // return $data;
        return redirect()->route('user.managecertificate');

    }

    public function ShowReport($id){
        $id=Crypt::decryptString($id);
        // return $id;
        $data=DB::table('td_certificate')
            // ->leftJoin('td_user_details', 'td_user_details.id', '=', 'td_certificate.user_id')
            ->leftJoin('td_user_family_details', 'td_user_family_details.id', '=', 'td_certificate.family_details_id')
            ->leftJoin('td_gurudwara_details', 'td_gurudwara_details.id', '=', 'td_certificate.gurdwara_id')
            ->leftJoin('md_certificate_type', 'td_certificate.certificates_type_id', '=', 'md_certificate_type.id')
            ->leftJoin('md_country', 'td_gurudwara_details.country', '=', 'md_country.id')
            // ->select('td_certificate.*','md_certificate_type.name as certificate_name','md_country.name as gurdwara_country') 
            ->select('td_user_family_details.*','td_gurudwara_details.*' ,'td_certificate.*','md_certificate_type.name as certificate_name','md_country.name as gurdwara_country') 
            ->where('td_certificate.id',$id)
            // ->orderBy('td_certificate.application_date', 'desc')
            ->get();
        // return $data;
        // $data=[];
        foreach($data as $datas){
            $certificate_name=$datas->certificate_name; 
        }
        if($certificate_name=='Marraige Certificate'){
            return view('user.marriage-report',['data'=>$data]);
        }
    }
}
