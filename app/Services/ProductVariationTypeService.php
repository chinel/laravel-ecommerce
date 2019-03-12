<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/8/2018
 * Time: 4:30 PM
 */

namespace App\Services;
use App\Repositories\ProductVariationTypeRepository;
use illuminate\Http\Request;

class ProductVariationTypeService
{

    protected  $productVariationTypeRepository;

    public function __construct(ProductVariationTypeRepository $productVariationTypeRepository )
    {
        $this->productVariationTypeRepository = $productVariationTypeRepository;
    }


    public function findProductVariationTypeByVariationId($id){
        return $this->productVariationTypeRepository->findProductVariationTypeByVariationId($id);
    }
}
