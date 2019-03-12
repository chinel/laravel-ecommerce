<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySubCategory extends Model
{
    protected $fillable = [
        'category_id',
        'subcategory_id'
    ];


    public function getSubCategoriesWithCategoryId($id){
        return CategorySubCategory::join('sub_categories','category_sub_categories.subcategory_id','=','sub_categories.id')->where('category_sub_categories.category_id',$id)->select('title','slug')->orderBy('title','ASC')->get();
    }

    public function getBrandsWithCategoryId($id){

        return Product::join('brands','products.brand_id','=','brands.id')->where('products.category_id',$id)->select('brands.id','brands.title','brands.slug')->distinct()->orderBy('brands.title','ASC')->get();
    }

    public function getTotalBrandsByCategory($category, $brand){
        return Product::where('category_id',$category)->where('brand_id', $brand)->count();

    }
}
