<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/20/2018
 * Time: 5:45 PM
 */

namespace App\Repositories;
use App\CategorySubCategory;

class CategorySubsRepository
{
    protected $categorySubCategory;

    public function __construct(CategorySubCategory $categorySubCategory)
    {
        $this->categorySubCategory = $categorySubCategory;
    }

    public function create($attributes){
        return $this->categorySubCategory->create($attributes);
    }


    public function findCategoryWithSubCategoryId($id){
        return $this->categorySubCategory->where('subcategory_id',$id)->first();
    }

    public function getAllSubCategoryIds(){
        return $this->categorySubCategory->pluck('subcategory_id')->all();
    }


    public function getAllSubCategoryIdsWithCategory($id){
        return $this->categorySubCategory->where('category_id', $id)->pluck('subcategory_id')->all();
    }


    public function deleteSubCategoriesWithCategoryId($id){

        return $this->categorySubCategory->where('category_id', $id)->delete();
    }

    public function getAllSubCategoryDetailsWithCategoryId($id){

        return $this->categorySubCategory->select('sub_categories.id','sub_categories.title')
            ->join('sub_categories','category_sub_categories.subcategory_id','=','sub_categories.id')
                                          ->where('category_sub_categories.category_id',$id)->get();
    }

}
