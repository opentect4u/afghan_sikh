<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsAdminEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $subject1;
    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$subject1,$message)
    {
        $this->name=$name;
        $this->email=$email;
        $this->subject1=$subject1;
        $this->message=$message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email_id=app('App\Http\Controllers\HomeController')->EmailSendAddress();
        // $from_email=DB::table('md_params')->where('sl_no','6')->value('param_value');
        return $this->from($email_id)
                    ->subject('Afghan Sikh - Contact Us')
                    ->view('emails.contact-us-admin');
    }
}
