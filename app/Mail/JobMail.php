<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $jobMailData;

    public function __construct($jobMailData)
    {
        $this->jobMailData = $jobMailData;
    }

    public function build()
    {
        return  $this->subject("Job Request")->view('emails.jobdetails');
    }
}
