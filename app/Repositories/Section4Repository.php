<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 14/46/4018
 * Time: 7:54 AM
 */

namespace App\Repositories;
use App\Section4;


class Section4Repository
{
    protected $section4;

    public function __construct(Section4 $section4)
    {
        $this->section4 = $section4;
    }


    public function index(){

        return $this->section4->first();
    }


    public function add($attributes){

        return $this->section4->create($attributes);
    }

    public  function  delete(){

        return $this->section4->whereNotNull('id')->delete();
    }
}
