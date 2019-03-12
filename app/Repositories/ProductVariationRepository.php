<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/4/2018
 * Time: 6:42 PM
 */

namespace App\Repositories;
use App\ProductVariation;


class ProductVariationRepository
{

    protected  $productVariation;

    public function __construct(ProductVariation $productVariation)
    {
        $this->productVariation = $productVariation;
    }

   /* public function findProductVariationByVariationId($id){
        return $this->productVariation->where('variation_id', $id)->first();

    }*/

   public function create($attributes){
       return $this->productVariation->create($attributes);
   }

   public function findProductVariationsOfProductId($id){

       return $this->productVariation->where('product_id', $id)->get();
   }

   public function deleteProductVariationsByProductId($id){
       return $this->productVariation->where('product_id', $id)->delete();
   }
}
