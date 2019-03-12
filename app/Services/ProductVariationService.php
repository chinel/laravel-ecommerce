<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/4/2018
 * Time: 6:43 PM
 */

namespace App\Services;
use App\Repositories\ProductVariationRepository;


class ProductVariationService
{
    protected $productVariationRepository;
    public function __construct(ProductVariationRepository $productVariationRepository)
    {
        $this->productVariationRepository = $productVariationRepository;
    }

    public function findProductVariationByVariationId($id){

        return $this->productVariationRepository->findProductVariationByVariationId($id);
    }


    public function create($attributes){

        return $this->productVariationRepository->create($attributes);
    }


    public function findProductVariationsByProductId($id){

        return $this->productVariationRepository->findProductVariationsOfProductId($id);
    }


    public function deleteProductVariationsByProductId($id){

        return $this->productVariationRepository->deleteProductVariationsByProductId($id);
    }

}
