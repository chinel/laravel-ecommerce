<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 8:35 AM
 */

namespace App\Services;
use App\Repositories\Section5Repository;


class Section5Service
{

    protected $section5Repository;

    public function __construct(Section5Repository $section5Repository)
    {
        $this->section5Repository = $section5Repository;
    }


    public function index(){

        return $this->section5Repository->index();
    }

    public function  add ($attributes){

        return $this->section5Repository->add($attributes);
    }


    public function delete(){

        return $this->section5Repository->delete();
    }



}
