<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordUserEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $surname;
    public $givenname;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($surname,$givenname,$url)
    {
        $this->surname=$surname;
        $this->givenname=$givenname;
        $this->url=$url;
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
                    ->subject('Afghan Sikh - User Recovery Password Link')
                    ->view('emails.user-recover');
    }
}
