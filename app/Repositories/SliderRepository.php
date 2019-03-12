<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 7:44 AM
 */

namespace App\Repositories;
use App\Slider;

class SliderRepository
{

    protected $slider;
    public function __construct(Slider $slider)
    {
      $this->slider =  $slider;
    }

    public function index(){
        return $this->slider->first();
    }

    public function add($attributes){
        return $this->slider->create($attributes);
    }

    public function delete(){

        return $this->slider->whereNotNull('id')->delete();
    }

}
