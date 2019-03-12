<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 8:32 AM
 */

namespace App\Services;
use App\Repositories\SliderRepository;



class SliderService
{

    protected $sliderRepository;
    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function index(){
        return $this->sliderRepository->index();
    }

    public function add($attributes){

        return $this->sliderRepository->add($attributes);
    }

    public function delete(){

        return $this->sliderRepository->delete();
    }
}
