<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 8:36 AM
 */

namespace App\Services;
use App\Repositories\Section8Repository;


class Section8Service
{

    protected $section8Repository;
    public function __construct(Section8Repository $section8Repository)
    {
        $this->section8Repository = $section8Repository;
    }


    public function index(){

        return $this->section8Repository->index();
    }


    public function add ($attributes){

        return $this->section8Repository->add($attributes);
    }


    public function delete(){

        return $this->section8Repository->delete();
    }



}
