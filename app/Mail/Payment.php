<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Payment extends Mailable
{
    use Queueable, SerializesModels;
protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail_data = [
            'user_name' =>  $this->data->name,
            'season_name'=>$this->data->season_name,
            'id'=>$this->data->id,
            'transaction_ID'=>$this->data->transaction_id,
            'amount'=>$this->data->amount,
            'address'=>$this->data->address,
            'city'=>$this->data->city,
            'country'=>$this->data->country,
            'payment_method'=>$this->data->payment_method,
            'currency'=>$this->data->currency,
            'zip_code'=>$this->data->zip,
            'payment_date'=>$this->data->created_at,
        ];
        return $this->from(env('MAIL_FROM_NAME'))->view('mail.payment')->with($mail_data);
    }
}