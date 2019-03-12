<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAdminUserEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $userFirstname;
    private $userEmail;
    private $userPassword;
    private $logo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userFirstname,$userEmail,$userPassword, $logo)
    {
        $this->userFirstname = $userFirstname;
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
        $this->logo = $logo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("no-reply@ecommerce.com",'Ecommerce')
            ->subject("Welcome Onboard")
            ->with('userFirstname', $this->userFirstname)
            ->with('userEmail', $this->userEmail)
            ->with('userPassword', $this->userPassword)
            ->with('logo', $this->logo)
            ->view('emails.send-adminWelcome');
    }
}
