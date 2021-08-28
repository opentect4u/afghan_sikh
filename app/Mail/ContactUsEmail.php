<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use DB;

class ContactUsEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $subject1;
    public $message1;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$subject1,$message1)
    {
        $this->name=$name;
        $this->subject1=$subject1;
        $this->message1=$message1;
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
                    ->view('emails.contact-us');
    }
}
