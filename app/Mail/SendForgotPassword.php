<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    private $userFirstname;
    private $userKey;
    private $logo;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userFirstname, $userKey, $logo)
    {
        $this->userFirstname = $userFirstname;
        $this->userKey = $userKey;
        $this->logo =  $logo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("no-reply@ecommerce.com",'Ecommerce')
            ->subject("Reset your password")
            ->with('userFirstname', $this->userFirstname)
            ->with('userKey', $this->userKey)
            ->with('logo', $this->logo)
            ->view('emails.reset-password');
    }
}
