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
        // return "info@afghansikh.com";
        return "info@afghansikh.org";
        // return "info@puriurbanruralcoop.com";
    }

    public function MainURL(){
        // return "https://sssprojects.co.in/afgan/";
        return "https://afghansikh.org/";
    }

    public function Contact(Request $request){
        // return $request;
        $name=$request->name;
        $email=$request->email;
        $subject1=$request->subject;
        $message1=$request->message;
        // return $message;
        $email_id=app('App\Http\Controllers\HomeController')->EmailSendAddress();
        // return $email_id;
        Mail::to($email_id)->send(new ContactUsAdminEmail($name,$email,$subject1,$message1));
        Mail::to($request->email)->send(new ContactUsEmail($name,$subject1,$message1));
        return redirect()->to('/index#contact')->with('success','success');
    }
}
