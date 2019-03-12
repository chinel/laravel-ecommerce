<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/22/2018
 * Time: 5:36 PM
 */

namespace App\Services;
use App\Repositories\BrandRepository;

class BrandService
{

    protected  $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }


    public function index(){

        return $this->brandRepository->index();
    }


    public function create($attributes){

        return $this->brandRepository->create($attributes);
    }

    public function edit($id){

        return $this->brandRepository->edit($id);
    }


    public  function update($id, $attributes){

        return $this->brandRepository->update($id, $attributes);
    }


    public function delete($id){

        return $this->brandRepository->delete($id);
    }


    public function getBrandBySlug($brandSlug){

        return $this->brandRepository->getBrandBySlug($brandSlug);
    }

}
