<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GurdwaraRegisterEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $gurudwara_name;
    public $gurudwara_email;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($gurudwara_name,$gurudwara_email,$password)
    {
        $this->gurudwara_name=$gurudwara_name;
        $this->gurudwara_email=$gurudwara_email;
        $this->password=$password;
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
                    ->subject('Afghan Sikh - Gurdwara Registration Successfull')
                    ->view('emails.register-gurdwara');
    }
}
