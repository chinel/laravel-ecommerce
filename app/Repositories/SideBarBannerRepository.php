<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 1/12/2019
 * Time: 8:24 AM
 */

namespace App\Repositories;
use App\SideBarBanner;

class SideBarBannerRepository
{

    protected $sideBarBanner;
    public function __construct(SideBarBanner $sideBarBanner)
    {
        $this->sideBarBanner = $sideBarBanner;
    }

    public function index(){

        return $this->sideBarBanner->first();
    }


    public function add($attributes){

        return $this->sideBarBanner->create($attributes);
    }

    public function delete(){

        return $this->sideBarBanner->whereNotNull('id')->delete();
    }

}
