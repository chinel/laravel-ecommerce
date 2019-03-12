<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/20/2018
 * Time: 5:46 PM
 */

namespace App\Services;
use App\Repositories\CategorySubsRepository;

class CategorySubsService
{

    protected $categorySubsRepository;
    public function __construct(CategorySubsRepository $categorySubsRepository)
    {
        $this->categorySubsRepository = $categorySubsRepository;
    }


    public function findCategoryWithSubcategoryId($id){
      return  $this->categorySubsRepository->findCategoryWithSubCategoryId($id);
    }


    public function getAllSubCategoryIds(){

        return  $this->categorySubsRepository->getAllSubCategoryIds();
    }

    public function create($attributes){

        return $this->categorySubsRepository->create($attributes);
    }

    public function getAllSubCategoryIdsWithCategory($id){
        return $this->categorySubsRepository->getAllSubCategoryIdsWithCategory($id);
    }

    public function deleteSubCategoriesWithCategoryId($id){

        return $this->categorySubsRepository->deleteSubCategoriesWithCategoryId($id);
    }

    public function getAllSubCategoryDetailsWithCategoryId($id){

        return $this->categorySubsRepository->getAllSubCategoryDetailsWithCategoryId($id);
    }
}
