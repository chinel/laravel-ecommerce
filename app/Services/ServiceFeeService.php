<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 1/8/2019
 * Time: 7:47 PM
 */

namespace App\Services;
use App\Repositories\ServiceFeeRepository;
use App\Http\Requests;


class ServiceFeeService
{
    protected $serviceFeeRepository;
    public function __construct(ServiceFeeRepository $serviceFeeRepository)
    {
        $this->serviceFeeRepository = $serviceFeeRepository;
    }

    public function index(){

        return $this->serviceFeeRepository->index();
    }

    public function create($attributes){

        return $this->serviceFeeRepository->create($attributes);
    }

    public function delete(){
        return $this->serviceFeeRepository->delete();
    }
}
