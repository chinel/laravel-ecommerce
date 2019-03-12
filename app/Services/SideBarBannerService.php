<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 1/12/2019
 * Time: 8:24 AM
 */

namespace App\Services;
use App\Repositories\SideBarBannerRepository;


class SideBarBannerService
{

    protected $sideBarRepository;

    public function __construct(SideBarBannerRepository $sideBarBannerRepository)
    {
        $this->sideBarRepository = $sideBarBannerRepository;
    }

    public function index(){

        return $this->sideBarRepository->index();
    }

    public function  add ($attributes){

        return $this->sideBarRepository->add($attributes);
    }


    public function delete(){

        return $this->sideBarRepository->delete();
    }

}
