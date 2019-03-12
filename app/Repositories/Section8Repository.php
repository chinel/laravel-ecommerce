<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 7:57 AM
 */

namespace App\Repositories;
use App\Section8;


class Section8Repository
{

    protected $section8;
    public function __construct(Section8 $section8)
    {
        $this->section8 = $section8;
    }

    public function index(){

        return $this->section8->first();
    }

    public function add ($attributes){

        return $this->section8->create($attributes);
    }


    public function delete(){

        return $this->section8->whereNotNull('id')->delete();
    }


}
