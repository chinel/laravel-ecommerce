<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/15/2018
 * Time: 12:49 PM
 */

namespace App\Repositories;
use App\ShippingInfo;


class ShippingRepository
{
    protected $shippingInfo;
    public function __construct(ShippingInfo $shippingInfo)
    {
        $this->shippingInfo = $shippingInfo;
    }


    public function findShippingInfoByDeliveryType($id){

        return $this->shippingInfo->where('delivery_type_id', $id)->first();
    }


    public function create($attributes){

        return $this->shippingInfo->create($attributes);
    }

    public function getOrderByUserId($id){
        return $this->shippingInfo->where('user_id', $id)->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function getShippingDetailByCode($code){

        return $this->shippingInfo->where('order_code', $code)->first();

    }

    public function getAllOrders(){

        return $this->shippingInfo->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function getUniqueOrders(){

        return $this->shippingInfo->distinct()->count('user_id');
    }
}
