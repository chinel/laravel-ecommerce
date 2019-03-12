<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/4/2018
 * Time: 6:32 PM
 */

namespace App\Services;
use App\Category;
use App\Repositories\CategoryRepository;
use illuminate\Http\Request;


class CategoryService
{

    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
    $this->categoryRepository = $categoryRepository;
    }


    public function index(){
        return $this->categoryRepository->all();
    }

    public function allOrderByName(){
        return $this->categoryRepository->allOrderByName();
    }

    public function create($attributes){


        return $this->categoryRepository->create($attributes);
    }

    public function edit($id){

        return $this->categoryRepository->find($id);
    }

    public function update($attributes, $id){


        return $this->categoryRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->categoryRepository->delete($id);
    }


    public function findCategoryByTerm($term){

        return $this->categoryRepository->findCategoryByTerm($term);
    }

    public function getAllCategoriesWithProduct(){

        return $this->categoryRepository->getAllCategoriesWithProduct();
    }

    public function findCategoryBySlug($term){

        return $this->categoryRepository->findCategoryBySlug($term);
    }

    public function findCategoryBySubCategorySlug($title){

        return $this->categoryRepository->findCategoryBySubCategorySlug($title);
    }

    public function findCategoryProductsByTerm($categorySlug){

        return $this->categoryRepository->findCategoryProductsByTerm($categorySlug);
    }
}

