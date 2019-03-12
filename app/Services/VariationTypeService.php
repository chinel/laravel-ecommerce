<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/7/2018
 * Time: 6:06 PM
 */

namespace App\Services;
use App\Repositories\VariationTypeRepository;


class VariationTypeService
{

    protected $variationTypeRepository;
    public function __construct(VariationTypeRepository $variationTypeRepository)
    {
        $this->variationTypeRepository = $variationTypeRepository;
    }

    public function create($attributes){

        return $this->variationTypeRepository->create($attributes);
    }

    public function findByVariationId($id){
        return $this->variationTypeRepository->findByVariationId($id);

    }

    public function update($id, array $attributes){

        return $this->variationTypeRepository->update($id, $attributes);
    }


    public function delete($id){
        return $this->variationTypeRepository->delete($id);
    }

    public function deleteByVariation($id){
        return $this->variationTypeRepository->deleteByVariation($id);
    }


}
