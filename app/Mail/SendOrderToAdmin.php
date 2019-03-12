<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderToAdmin extends Mailable
{
    use Queueable, SerializesModels;
    private $orderCode;
    private $logo;
    private $userCart;
    private $deliveryFee;
    private $serviceFee;
    private $shippingDetails;
    private $deliveryTime;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderCode,$logo, $userCart,$deliveryFee,$serviceFee,$shippingDetails,$deliveryTime)
    {
        $this->orderCode = $orderCode;
        $this->logo = $logo;
        $this->userCart = $userCart;
        $this->deliveryFee = $deliveryFee;
        $this->serviceFee = $serviceFee;
        $this->shippingDetails = $shippingDetails;
        $this->deliveryTime = $deliveryTime;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("notifications@ecommerce.com",'Ecommerce')
            ->subject("A Order has been made")
            ->with('orderCode', $this->orderCode)
            ->with('logo', $this->logo)
            ->with('userCart', $this->userCart)
            ->with('deliveryFee', $this->deliveryFee)
            ->with('serviceFee', $this->serviceFee)
            ->with('shippingDetails', $this->shippingDetails)
            ->with('deliveryTime', $this->deliveryTime)
            ->view('emails.send-orderAdmin');
    }
}
