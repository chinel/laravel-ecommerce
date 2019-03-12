<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/4/2018
 * Time: 6:24 PM
 */

namespace App\Repositories;
use App\Product;



class ProductRepository
{

    protected  $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function findProductWithDeliveryType($id){
        return $this->product->where('delivery_type_id', $id)->first();

    }


    public function index(){

        return $this->product->select('id','title','cover_image','category_id')->orderBy('created_at', 'DESC')->get();
    }

    public function create($attributes){
        return $this->product->create($attributes);
    }


    public function find($id){

        return $this->product->find($id);
    }


    public function update($id, array $attributes){

        return $this->product->find($id)->update($attributes);
    }


    public function delete($id){

        return $this->product->find($id)->delete();
    }


    public function getProductByTitle($title){

        return $this->product->where('title',$title)->first();
    }

    public function getProductWithBrandId($id){

        return $this->product->where('brand_id', $id)->first();
    }

    public function getCategoryProducts($id){
        return $this->product->where('category_id','=',$id)->select('id','title')->get();
    }

    public function getCategoryBrands($id){
        return $this->product->join('brands', 'products.brand_id', '=', 'brands.id')->select('brands.id','brands.title')->distinct()->where('products.category_id','=', $id)->get();
    }

    public function getCategorySubCategories($id){

        return $this->product->join('sub_categories', 'products.subcategory_id', '=', 'sub_categories.id')->select('sub_categories.id','sub_categories.title')->distinct()->where('products.category_id','=', $id)->get();

    }

    public function getSubCategoryProducts($id){
        return $this->product->where('subcategory_id','=',$id)->select('id','title')->get();
    }


    public function getProductByCategoryId($id){

        return $this->product->where('category_id',$id)->select('id', 'title','cover_image','price_type','price')->get();
    }


    public function getCategoryHighestPrice($id){
        $product = $this->product->where('category_id',$id)->orderBy('price','DESC')->first();

        return $product->price;
    }

    public function getCategoryLowestPrice($id){
        $product = $this->product->where('category_id',$id)->orderBy('price','ASC')->first();

        return $product->price;
    }
    public function getSubCategoryHighestPrice($id){
        $product = $this->product->where('subcategory_id',$id)->orderBy('price','DESC')->first();

        return $product->price;
    }

    public function getSubCategoryLowestPrice($id){
        $product = $this->product->where('subcategory_id',$id)->orderBy('price','ASC')->first();

        return $product->price;
    }

    public function filterProductsTypeAhead($keyword){

        return $this->product->where('title' ,  'LIKE', '%'. $keyword . '%')->pluck('title');
    }

    public function getAllProductsWithBrands($brandId){

    return $this->product->join('categories','products.category_id','=','categories.id')
       ->select('categories.title','categories.slug')
        ->where('brand_id',$brandId)
        ->distinct()->get();
    }


}
