<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/22/2018
 * Time: 5:35 PM
 */

namespace App\Repositories;
use App\Brand;

class BrandRepository
{

    protected $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function index(){
        return $this->brand::orderBy('created_at','DESC')->get();
    }

    public function create($attributes){

        return $this->brand->create($attributes);
    }


    public function edit($id){

        return $this->brand::find($id)->first();
    }


    public function update($id, $attributes){

        return $this->brand->find($id)->update($attributes);
    }


    public function delete($id){

        return $this->brand->find($id)->delete();
    }

    public function getBrandBySlug($brandSlug){

        return $this->brand->where('slug',$brandSlug)->first();
    }




}
