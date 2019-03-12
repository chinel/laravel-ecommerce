<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section2 extends Model
{
    protected $fillable = [
        'category_id',
        'brandlist',
         'bannerUrl',
         'subcategory1',
          'subcategory2',
           'subcategory3',
            'subcategory4',
             'subcategory5',
            'subcategory1_childlist',
              'subcategory2_childlist',
              'subcategory3_childlist',
             'subcategory4_childlist',
            'subcategory5_childlist'
    ];

    public function getCategoryBrands($id){
        return Product::join('brands', 'products.brand_id', '=', 'brands.id')->select('brands.id','brands.title')->distinct()->where('products.category_id','=', $id)->get();
    }

    public function getCategorySubCategories($id){

        return Product::join('sub_categories', 'products.subcategory_id', '=', 'sub_categories.id')->select('sub_categories.id','sub_categories.title')->distinct()->where('products.category_id','=', $id)->get();

    }

    public function getSubCategoryProducts($id){
        return Product::where('subcategory_id','=',$id)->select('id','title')->get();
    }
    public function getCategoryTitle($id){

        $category = Category::where('id',$id)->select('title')->first();
        return $category->title;
    }

    public function getCategorySlug($id){

        $category = Category::where('id',$id)->select('slug')->first();
        return $category->slug;
    }

    public function getCategoryIcon($id){
        $category = Category::where('id',$id)->select('white_iconUrl')->first();
        return $category->white_iconUrl;
    }

    public function getProductDetails($ids){

        $product = Product::whereIn('id', $ids)->select('id','title','cover_image','price_type','price')->get();

        return $product;
    }

    public function getBrandDetails($ids){

        $brands = Brand::whereIn('id', $ids)->select('title','slug','imageUrl')->get();

        return $brands;
    }

    public function getSubCategoryTitle($id){
        $subcategory = SubCategory::where('id',$id)->select('title')->first();
        return $subcategory->title;
    }

    public function getSubCategorySlug($id){
        $subcategory = SubCategory::where('id',$id)->select('slug')->first();
        return $subcategory->slug;
    }
}
