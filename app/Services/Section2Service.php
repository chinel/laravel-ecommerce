<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 8:33 AM
 */

namespace App\Services;
use App\Repositories\Section2Repository;


class Section2Service
{

    protected $section2Repository;

    public function __construct(Section2Repository $section2Repository)
    {
        $this->section2Repository = $section2Repository;
    }


    public function index(){

        return $this->section2Repository->index();
    }


    public function add ($attributes){

        return $this->section2Repository->add($attributes);
    }

    public  function  delete(){

        return $this->section2Repository->delete();
    }



}
