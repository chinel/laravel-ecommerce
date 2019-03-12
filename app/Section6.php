<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section6 extends Model
{
    protected $fillable = [
        'category1_id',
         'banner1Url',
          'product1List',
           'category2_id',
             'banner2Url',
              'product2List'
    ];


    public function getCategoryProducts($id){

        return Product::where('category_id','=', $id)->select('products.id','products.title')->get();
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
}
