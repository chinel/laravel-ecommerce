<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 1/8/2019
 * Time: 7:47 PM
 */

namespace App\Repositories;
use App\ServiceFee;


class ServiceFeeRepository
{
   protected $serviceFee;

   public function __construct(ServiceFee $serviceFee)
   {
       $this->serviceFee = $serviceFee;
   }


   public function index(){

       return $this->serviceFee->first();
   }


   public function create($attributes){

       return $this->serviceFee->create($attributes);
   }

   public function delete(){
       return $this->serviceFee->whereNotNull('id')->delete();
   }
}
