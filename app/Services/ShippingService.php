<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/15/2018
 * Time: 12:50 PM
 */

namespace App\Services;
use illuminate\Http\Request;
use App\Repositories\ShippingRepository;


class ShippingService
{

    protected $shippingRepository;
    public function __construct(ShippingRepository$shippingRepository)
    {
        $this->shippingRepository = $shippingRepository;
    }

    public function findShippingInfoByDeliveryType($id){

        return $this->shippingRepository->findShippingInfoByDeliveryType($id);
    }


    public function create($attributes){
        return $this->shippingRepository->create($attributes);
    }

    public function getOrderByUserId($userId){

        return $this->shippingRepository->getOrderByUserId($userId);
    }

    public function getShippingDetailByCode($code){

        return $this->shippingRepository->getShippingDetailByCode($code);
    }

    public function getAllOrders(){

        return $this->shippingRepository->getAllOrders();
    }

    public function getUniqueOrders(){
        return $this->shippingRepository->getUniqueOrders();
    }
}
