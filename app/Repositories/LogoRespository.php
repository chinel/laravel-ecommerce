<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 7:42 AM
 */

namespace App\Repositories;
use App\Logo;


class LogoRespository
{

    protected $logo;
    public function __construct(Logo $logo)
    {
        $this->logo =  $logo;
    }

    public function index(){

        return $this->logo->first();

    }


    public function add ($attributes){

        return $this->logo->create($attributes);
    }

    public function delete(){

        return $this->logo->whereNotNull('id')->delete();
    }

}
