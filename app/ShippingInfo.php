<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingInfo extends Model
{
    protected $fillable = [
        'user_id',
        'billing_address',
        'billing_city',
        'billing_phone',
        'billing_firstname',
        'billing_lastname',
        'billing_email',
        'billing_state',
        'order_code',
        'delivery_type_id',
        'delivery_fee',
        'service_fee',
        'product_total',
        'payment_method',
        'delivery_date',
        'online_ref_code'

    ];

    public function getUserName($userId){

        $userDetails = User::find($userId);

        return $userDetails->firstname ." " . $userDetails->lastname;
    }

    public function getUserContactDetails($userId){
        $userDetails = User::find($userId);

        return $userDetails->phone;

    }

    public function getUserDetails($userId){
      return User::find($userId);
    }
}
