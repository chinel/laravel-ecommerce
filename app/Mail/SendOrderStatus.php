<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderStatus extends Mailable
{
    use Queueable, SerializesModels;
    use Queueable, SerializesModels;
    private $userFirstname;
    private $logo;
    private $shippingDetails;
    private $orderDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userFirstname, $logo, $shippingDetails, $orderDetails)
    {
        $this->userFirstname = $userFirstname;
        $this->logo = $logo;
        $this->shippingDetails = $shippingDetails;
        $this->orderDetails =  $orderDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("no-reply@ecommerce.com",'Ecommerce')
            ->subject("Order Details")
            ->with('userFirstname', $this->userFirstname)
            ->with('logo', $this->logo)
            ->with('orderDetails', $this->orderDetails)
            ->with('shippingDetails', $this->shippingDetails)
            ->view('emails.send-orderStatus');
    }
}
