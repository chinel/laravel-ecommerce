<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/4/2018
 * Time: 6:40 PM
 */

namespace App\Services;
use App\Repositories\ProductCategoryRepository;
use illuminate\Http\Request;


class ProductCategoryService
{

    protected  $peoductCategoryRepository;
    public function __construct(ProductCategoryRepository $productCategoryRepository)
    {
      $this->peoductCategoryRepository = $productCategoryRepository;
    }

    public function findProductByCategory($id){

        return $this->peoductCategoryRepository->findProductByCategory($id);

    }

    public function create($attributes){
        return $this->peoductCategoryRepository->create($attributes);
    }

    public function deleteProductCategories($id){

        return $this->peoductCategoryRepository->deleteProductCategories($id);
    }


}
