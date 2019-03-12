<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 8:33 AM
 */

namespace App\Services;
use App\Repositories\Section1Repository;


class Section1Service
{

    protected $section1Repository;

    public function __construct(Section1Repository $section1Repository)
    {
        $this->section1Repository =  $section1Repository;
    }


    public function index(){

        return $this->section1Repository->index();
    }

    public function add($attributes){

        return $this->section1Repository->add($attributes);
    }

    public function delete(){

        return $this->section1Repository->delete();
    }

}
