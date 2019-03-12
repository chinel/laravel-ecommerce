<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 7:53 AM
 */

namespace App\Repositories;
use App\Section2;


class Section2Repository
{
    protected $section2;

    public function __construct(Section2 $section2)
    {
        $this->section2 = $section2;
    }


    public function index(){

        return $this->section2->first();
    }


    public function add($attributes){

        return $this->section2->create($attributes);
    }

    public  function  delete(){

        return $this->section2->whereNotNull('id')->delete();
    }


}
