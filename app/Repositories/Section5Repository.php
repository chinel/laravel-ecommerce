<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 7:55 AM
 */

namespace App\Repositories;
use App\Section5;


class Section5Repository
{

    protected $section5;
    public function __construct(Section5 $section5)
    {
       $this->section5 =  $section5;
    }

    public function index(){

        return $this->section5->first();
    }


    public function add($attributes){

        return $this->section5->create($attributes);
    }

    public function delete(){

        return $this->section5->whereNotNull('id')->delete();
    }


}
