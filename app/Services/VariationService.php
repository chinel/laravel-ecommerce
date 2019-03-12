<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/4/2018
 * Time: 6:35 PM
 */

namespace App\Services;
use App\Repositories\VariationRepository;
use illuminate\Http\Request;

class VariationService
{
    protected $variationRepository;
    public function __construct(VariationRepository $variationRepository)
    {
        $this->variationRepository = $variationRepository;
    }


    public function create($attributes){
        return $this->variationRepository->create($attributes);
    }


    public function all(){
        return $this->variationRepository->all();
    }

    public function edit($id){

        return $this->variationRepository->find($id);
    }

    public function update($id, array $attributes){

        return $this->variationRepository->find($id)->update($attributes);
    }

    public function delete($id){
        return $this->variationRepository->delete($id);
    }
}
