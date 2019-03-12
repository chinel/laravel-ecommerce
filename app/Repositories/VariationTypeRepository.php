<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/7/2018
 * Time: 5:29 PM
 */

namespace App\Repositories;
use App\VariationType;

class VariationTypeRepository
{
    protected $variationType;

    public function __construct(VariationType $variationType)
    {
        $this->variationType = $variationType;
    }


    public function create($attributes){

        return $this->variationType->create($attributes);
    }

    public function findByVariationId($id){
        return $this->variationType->where('variation_id', $id)->get();

    }

    public function update($id, array $attributes){

        return $this->variationType->find($id)->update($attributes);
    }


    public function delete($id){
        return $this->variationType->find($id)->delete();
    }

    public function deleteByVariation($id){

        return $this->variationType->where('variation_id', $id)->delete();
    }


}
