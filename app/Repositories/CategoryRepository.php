<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/4/2018
 * Time: 6:31 PM
 */

namespace App\Repositories;
use App\Category;
use App\CategorySubCategory;
use App\Product;


class CategoryRepository
{

    protected  $category;
    protected $categorySubCategory;
    protected $product;
    public function __construct(Category $category, CategorySubCategory $categorySubCategory,Product $product)
    {
        $this->category = $category;
        $this->categorySubCategory = $categorySubCategory;
        $this->product = $product;
    }


    public function create($attributes){
        return $this->category->create($attributes);
    }


    public function all(){
        return $this->category->orderBy('created_at','DESC')->get();
    }

    public function allOrderByName(){
        return $this->category->orderBy('title','ASC')->get();
    }

    public function find($id){

        return $this->category->find($id);
    }

    public function update($id, array $attributes){

        return $this->category->find($id)->update($attributes);
    }



    public function delete($id){
        return $this->category->find($id)->delete();
    }


    public function findCategoryByTerm($term){
        return $this->category->where('title', $term)->first();
    }


    public function findCategoryBySlug($term){
        return $this->category->where('slug', $term)->first();

    }


    public function getAllCategoriesWithProduct(){
       return \DB::table("categories")->select('*')
            ->whereIn('id',function($query){
                $query->select('category_id')->from('products');
            })
            ->get();
    }


    public function findCategoryBySubCategorySlug($title){

        return $this->categorySubCategory->join('sub_categories','category_sub_categories.subcategory_id','=','sub_categories.id')
            ->join('categories','category_sub_categories.category_id','=','categories.id')->
            select('categories.id as id','sub_categories.id as subId','categories.title as title','categories.slug as categorySlug','sub_categories.title as subcategoryTitle', 'sub_categories.slug as subcategorySlug','categories.bannerUrl')
            ->where('sub_categories.slug', $title)
            ->first();
    }






}
