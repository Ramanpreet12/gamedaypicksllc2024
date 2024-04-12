<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PreSignupMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     protected $user;

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
        // return $this->view('mail.pre_sign_up_mail');
        $from_email = env('MAIL_FROM_NAME') ;
        return $this->from($from_email)->view('mail.pre_sign_up_mail')->with([
            'name' => $this->user->name,
            'email' => $this->user->email,
            'random_password' => $this->user->random_password,
        ]);

    }
}
