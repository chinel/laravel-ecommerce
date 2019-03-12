<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/4/2018
 * Time: 6:39 PM
 */

namespace App\Repositories;
use App\CategoryProduct;


class ProductCategoryRepository
{
     protected  $productCategory;

     public function __construct(CategoryProduct $productCategory)
     {
         $this->productCategory = $productCategory;
     }

    public function findProductByCategory($id){

         return $this->productCategory->where('category_id', $id)->first();

    }

   

    public function create($attributes){

         return $this->productCategory->create($attributes);
    }

    public function deleteProductCategories($id){

        return $this->productCategory->where('product_id', $id)->delete();
    }
}
