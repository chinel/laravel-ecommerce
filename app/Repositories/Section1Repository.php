<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 7:48 AM
 */

namespace App\Repositories;
use App\Section1;


class Section1Repository
{

    protected $section1;
    public function __construct(Section1 $section1)
    {
        $this->section1 =  $section1;

    }

    public function index(){
        return $this->section1->first();
    }


    public function add($attributes){

        return $this->section1->create($attributes);
    }

    public  function  delete(){

        return $this->section1->whereNotNull('id')->delete();
    }
}
