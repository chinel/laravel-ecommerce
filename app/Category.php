<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'title',
        'slug',
        'bannerUrl',
        'white_iconUrl',
        'black_iconUrl'
    ];


    public function findProductByCategoryId($id){

    $productsByCategory = Product::select('products.id','products.title','products.cover_image','products.price')
                                    ->where('category_products.category_id', $id)
                                    ->join('category_products','products.id','=','category_products.product_id')
                                    ->orderBy('products.created_at','DESC')
                                    ->paginate();

    return $productsByCategory;
    }

    public function getSubCategory($id){

        return SubCategory::join('category_sub_categories','sub_categories.id','=','category_sub_categories.subcategory_id')->where('category_sub_categories.category_id', $id)->pluck('title')->all();
    }


    public function getSubCategoryIds($id){

        return SubCategory::join('category_sub_categories','sub_categories.id','=','category_sub_categories.subcategory_id')->where('category_sub_categories.category_id', $id)->pluck('sub_categories.id')->all();
    }


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
