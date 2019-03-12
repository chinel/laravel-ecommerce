<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 8:34 AM
 */

namespace App\Services;
use App\Repositories\Section3Repository;



class Section3Service
{

    protected $section3Repository;
    public function __construct(Section3Repository $section3Repository)
    {
        $this->section3Repository = $section3Repository;
    }


    public function index(){

         return $this->section3Repository->index();

    }


    public function  add($attributes){

        return $this->section3Repository->add($attributes);

    }


    public  function  delete(){
        return $this->section3Repository->delete();
    }



}
