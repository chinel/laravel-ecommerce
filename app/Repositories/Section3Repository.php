<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 7:54 AM
 */

namespace App\Repositories;
use App\Section3;


class Section3Repository
{

    protected $section3;
    public function __construct(Section3 $section3)
    {
        $this->section3 = $section3;
    }

    public function  index(){

        return $this->section3->first();
    }

    public function add($attributes){

      return $this->section3->create($attributes);
    }

    public function delete(){

        return $this->section3->whereNotNull('id')->delete();
    }
}
