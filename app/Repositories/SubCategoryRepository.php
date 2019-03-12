<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/20/2018
 * Time: 5:20 PM
 */

namespace App\Repositories;
use App\CategorySubCategory;
use App\SubCategory;
use App\Category;

class SubCategoryRepository
{

    protected $subCategory;
    protected $category;

    public function __construct(SubCategory $subCategory, Category $category)
    {
        $this->subCategory = $subCategory;
        $this->category = $category;

    }

    public function create($attributes){
        return $this->subCategory->create($attributes);
    }


    public function all(){
        return $this->subCategory->orderBy('created_at','DESC')->get();
    }

    public function find($id){

        return $this->subCategory->find($id);
    }

    public function update($id, array $attributes){

        return $this->subCategory->find($id)->update($attributes);
    }



    public function delete($id){
        return $this->subCategory->find($id)->delete();
    }

    public function getAllSubCategoriesNotInCategorySub($categorySubIds){
        return $this->subCategory->whereNotIn('id', $categorySubIds)->get();
    }


    public function getAllSubIdsNot($notAssignedTo){

        return $this->subCategory->whereNotIn('id', $notAssignedTo)->get();
    }


    public function getAllSubIdsIn($assignedToCategory){

        return $this->subCategory->whereIn('id', $assignedToCategory)->get();
    }


    public function getAllSubCategoryIds(){
        return $this->subCategory->pluck('id')->all();
    }


    public  function  getAllSubcategoriesWithProducts(){

        return $this->subCategory->select('sub_categories.id','sub_categories.title')
                                  ->join('products','sub_categories.id','=','products.subcategory_id')->get();
    }


    public function findCategoryBySubCategorySlug($title){

        return CategorySubCategory::join('sub_categories','category_sub_categories.subcategory_id','=','sub_categories.id')
                                    ->join('categories','category_sub_categories.category_id','=','categories.id')->
                                    select('sub_categories.id as id','categories.title as title','categories.slug as categorySlug','sub_categories.title as subcategoryTitle', 'sub_categories.slug as subcategorySlug','categories.bannerUrl')
                                    ->where('sub_categories.slug', $title)
                                    ->first();
    }




}
