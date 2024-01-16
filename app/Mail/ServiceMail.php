<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $serviceMailData;

    public function __construct($serviceMailData)
    {
        $this->serviceMailData = $serviceMailData;
    }

    public function build()
    {
        return  $this->subject("Service Request")->view('emails.servicedetails');
    }
}