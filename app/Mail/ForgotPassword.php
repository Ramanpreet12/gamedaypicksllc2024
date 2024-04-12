<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from_email = env('MAIL_FROM_NAME');
        return $this->from($from_email)->view('mail.forgotpassword')->with([
            'name'=>$this->user['user_name'],
            'email'=>$this->user['email'],
            'token' =>$this->user['token']
        ]);
    }
}
