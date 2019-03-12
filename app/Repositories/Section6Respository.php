<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 7:56 AM
 */

namespace App\Repositories;
use App\Section6;


class Section6Respository
{

    protected $section6;
    public function __construct(Section6 $section6)
    {
     $this->section6 = $section6;
    }



    public function index(){

        return $this->section6->first();
    }


    public function add($attributes){

        return $this->section6->create($attributes);
    }

    public  function  delete(){

        return $this->section6->whereNotNull('id')->delete();
    }
}
