<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/4/2018
 * Time: 6:22 PM
 */

namespace App\Services;
use App\Repositories\ProductRepository;
use illuminate\Http\Request;


class ProductService
{
    protected  $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function findProductWithDeliveryType($id){

        return $this->productRepository->findProductWithDeliveryType($id);

    }


    public function index(){
        return $this->productRepository->index();
    }

    public function create($attributes){

        return $this->productRepository->create($attributes);
    }

    public function find($id){

        return $this->productRepository->find($id);
    }


    public function update($id , array $atttibutes){
        return $this->productRepository->update($id, $atttibutes);
    }


    public function delete($id){

        return $this->productRepository->delete($id);
    }

    public function getProductByTitle($title){

        return $this->productRepository->getProductByTitle($title);
    }

    public function getProductWithBrandId($id){

        return $this->productRepository->getProductWithBrandId($id);
    }

    public function getCategoryProducts($id){

        return $this->productRepository->getCategoryProducts($id);
    }

    public function getCategoryBrands($id){

        return $this->productRepository->getCategoryBrands($id);
    }

    public function getCategorySubCategories($id){

        return $this->productRepository->getCategorySubCategories($id);
    }

    public function getSubCategoryProducts($id){

        return $this->productRepository->getSubCategoryProducts($id);
    }

    public function getProductByCategoryId($id){

        return $this->productRepository->getProductByCategoryId($id);
    }

    public function getCategoryHighestPrice($id){

        return $this->productRepository->getCategoryHighestPrice($id);
    }


    public function getCategoryLowestPrice($id){

        return $this->productRepository->getCategoryLowestPrice($id);
    }


    public function getSubCategoryHighestPrice($id){

        return $this->productRepository->getSubCategoryHighestPrice($id);
    }


    public function getSubCategoryLowestPrice($id){

        return $this->productRepository->getSubCategoryLowestPrice($id);
    }

    public function filterProductsTypeAhead($keyword){
        return $this->productRepository->filterProductsTypeAhead($keyword);
    }

    public function getAllProductsWithBrands($brandID){
        return $this->productRepository->getAllProductsWithBrands($brandID);
    }

}
