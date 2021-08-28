<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsEmail;
use App\Mail\ContactUsAdminEmail;

class HomeController extends Controller
{
    public function Index(){
        return view('index');
    }
    public function EmailSendAddress(){
        return "info@afghansikh.com";
    }

    public function Contact(Request $request){
        // return $request;
        $name=$request->name;
        $email=$request->email;
        $subject=$request->subject;
        $message=$request->message;
        return $message;
        $email_id=app('App\Http\Controllers\HomeController')->EmailSendAddress();
        // return $email_id;
        Mail::to($email_id)->send(new ContactUsAdminEmail($name,$email,$subject, $message));
        Mail::to($request->email)->send(new ContactUsEmail($name,$subject, $message));
        return redirect()->route('index')->with('success','success');
    }
}
