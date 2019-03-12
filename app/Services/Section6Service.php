<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 8:35 AM
 */

namespace App\Services;
use App\Repositories\Section6Respository;


class Section6Service
{
    protected $section6Repository;

    public function __construct(Section6Respository $section6Repository)
    {
        $this->section6Repository = $section6Repository;
    }


    public function index(){

        return $this->section6Repository->index();
    }


    public function add ($attributes){

        return $this->section6Repository->add($attributes);
    }

    public  function  delete(){

        return $this->section6Repository->delete();
    }



}
