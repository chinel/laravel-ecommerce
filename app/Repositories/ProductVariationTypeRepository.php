<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/8/2018
 * Time: 4:30 PM
 */

namespace App\Repositories;
use App\ProductVariationType;

class ProductVariationTypeRepository
{

    protected $productVariationType;
    public function __construct(ProductVariationType $productVariationType)
    {
        $this->productVariationType = $productVariationType;
    }

    public function findProductVariationTypeByVariationId($id){

        return $this->productVariationType->where('variation_type_id', $id)->first();
    }
}
