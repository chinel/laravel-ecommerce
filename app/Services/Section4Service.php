<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 14/46/4018
 * Time: 8:34 AM
 */

namespace App\Services;
use App\Repositories\Section4Repository;


class Section4Service
{
    protected $section4Repository;

    public function __construct(Section4Repository $section4Repository)
    {
        $this->section4Repository = $section4Repository;
    }


    public function index(){

        return $this->section4Repository->index();
    }


    public function add ($attributes){

        return $this->section4Repository->add($attributes);
    }

    public  function  delete(){

        return $this->section4Repository->delete();
    }


}
