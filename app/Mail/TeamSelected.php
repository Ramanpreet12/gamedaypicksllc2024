<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeamSelected extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        // echo "<pre>";
        // print_r($this->data);die();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $from_email = env('MAIL_FROM_NAME');
        return $this->from($from_email)->view('mail.team-selected')->with([
            'week' => $this->data->weekNumber,
            'leagueName'=>$this->data->leagueName,
            'teamName' => $this->data->teamName,
            'teanLogo' => $this->data->teamLogo,
            'username'=>$this->data->UserName,
            'regionName' =>$this->data->regionName,
            'seasonName' =>$this->data->SeasonName,
        ]);
    }
}
