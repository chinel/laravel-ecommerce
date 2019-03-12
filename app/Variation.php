<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $fillable = [
        'title', 'types'
    ];


    public function getVariationTypes($id){
        $variationTypes = VariationType::where('variation_id', $id)->pluck('name')->toArray();

        return $variationTypes;
    }

    public function getVariationFullTypeDetails($id){

        $variationTypes = VariationType::where('variation_id', $id)->get();

        return $variationTypes;
    }



}
