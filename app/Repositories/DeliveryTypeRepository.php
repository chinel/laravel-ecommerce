<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/4/2018
 * Time: 6:37 PM
 */

namespace App\Repositories;

use App\DeliveryType;

class DeliveryTypeRepository
{

    protected $deliveryType;

    public function __construct(DeliveryType $deliveryType)
    {
     $this->deliveryType = $deliveryType;
    }

    public function create($attributes){
        return $this->deliveryType->create($attributes);
    }

    public function all(){
        return $this->deliveryType->orderBy('created_at','DESC')->get();
    }


    public function find($id){

        return $this->deliveryType->find($id);
    }

    public function update($id, array $attributes){

        return $this->deliveryType->find($id)->update($attributes);
    }


    public function delete($id){
        return $this->deliveryType->find($id)->delete();
    }

}
