<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'price_type',
        'overview',
        'description',
        'cover_image',
        'other_image1',
        'other_image2',
        'other_image3',
        'price',
        'category_id',
        'subcategory_id',
        'brand_id',
        'visible'
    ];


    public function getCategories($id){
        $categories = CategoryProduct::where('product_id', $id)
                      ->join('categories','category_products.product_id','=', 'categories.id')
                       ->pluck('categories.title')->toArray();
    return $categories;
    }

    public function getCategory($id){

     $category = Category::find($id);

     return $category->title;
    }

    public function getCategorySlug($id){

        $category = Category::find($id);

        return $category->slug;
    }

    public function getCategoryIds($id){
        $categories = CategoryProduct::where('product_id', $id)
            ->join('categories','category_products.product_id','=', 'categories.id')
            ->pluck('category_products.category_id')->toArray();
        return $categories;
    }

    public function getProductVariations($id){
        $productVariations = ProductVariation::where('product_id', $id)->where('type','!=', null)
                             ->get();

        return $productVariations;
    }

    public function getSimilarSubCategories($id){
     $subcategories = SubCategory::select('sub_categories.id','sub_categories.title')->join('category_sub_categories','sub_categories.id','=','category_sub_categories.subcategory_id')->where('category_sub_categories.category_id', $id)->get();

     return $subcategories;
    }

    public function getSubCategoryTitle($subcategoryId){

        return SubCategory::where('id', $subcategoryId)->pluck('title')->first();
    }


    public function scopeProductTermByCategorySlug($query,$term, $categorySlug){
        return  $query->join('categories','products.category_id','=','categories.id')
            ->select('products.id', 'products.title','cover_image','price_type','price')
            ->where('categories.slug',$categorySlug)
            ->where('products.title' ,  'LIKE', '%'. $term . '%');
    }

    public function scopeProductsByTerm($query,$term){
        return  $query
            ->select('products.id', 'products.title','cover_image','price_type','price')
             ->where('title' ,  'LIKE', '%'. $term . '%');
    }

    public function scopeSearchProductsCategoryBySlug($query,$term, $categorySlug){
        return  $query->join('categories','products.category_id','=','categories.id')
            ->join('sub_categories','products.subcategory_id','=','sub_categories.id')
            ->select('sub_categories.title', 'sub_categories.slug','price')
            ->where('categories.slug',$categorySlug)
            ->where('products.title' ,  'LIKE', '%'. $term . '%');
    }

    public function scopeSearchProductsCategory($query,$term){
        return  $query->join('categories','products.category_id','=','categories.id')
            ->select('categories.title', 'categories.slug','price')
            ->where('products.title' ,  'LIKE', '%'. $term . '%');
    }


    public function scopeSearchProductsBrandBySlug($query,$term, $categorySlug){
        return  $query->join('categories','products.category_id','=','categories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->select('brands.title', 'brands.slug','price')
            ->where('categories.slug',$categorySlug)
            ->where('products.title' ,  'LIKE', '%'. $term . '%')->distinct()->get();
    }

    public function scopeSearchProductsBrand($query,$term){

        return  $query
            ->join('brands','products.brand_id','=','brands.id')
            ->select('brands.title', 'brands.slug','price')
            ->where('products.title' ,  'LIKE', '%'. $term . '%')->distinct()->get();
    }


    public function scopeProductsInCategory($query,$slug){
        return $query->join('categories','products.category_id','=','categories.id')
               ->where('categories.slug','=', $slug);
    }

    public function scopeRetrieveHighest($query){

        return $query->orderBy('price','DESC')->first();
    }

    public function scopeProductsByrandId($query,$id){
        return  $query
             ->select('products.id', 'products.title','cover_image','price_type','price')
            ->where('brand_id',$id);

    }


    public function scopeProductsByCategoryId($query, $id){

      return  $query->select('products.id', 'products.title','cover_image','price_type','price')->where('category_id',$id);
    }


    public function scopeProductsBySubCategoryId($query, $id){

        return  $query->select('products.id', 'products.title','cover_image','price_type','price')->where('subcategory_id',$id);
    }


    public function scopeCategoryByIdWithinRange($query, $min, $max){

        return $query->whereBetween('price',[$min, $max]);
    }

    public function scopeGetProductsWithBrands($query, $brands){

        return $query->join('brands','products.brand_id','=','brands.id')->whereIn('brands.slug', $brands);
    }

    public function scopeSortByCheapest($query){

        return $query->orderBy('price','ASC');
    }

    public function scopeSortByHighest($query){

        return $query->orderBy('price','DESC');
    }


    public function getRelatedProducts($subcategoryId){

        return Product::where('subcategory_id',$subcategoryId)
                           ->limit(6)
                            ->inRandomOrder()
                            ->get();
    }


    public function getYouMayLikeProducts($categoryId){

        return Product::where('category_id',$categoryId)
            ->limit(6)
            ->inRandomOrder()
            ->get();
    }


    public function getTotalRatingOfPdt($productId){

        $ratings = ProductReview::where('product_id', $productId)->get();

        return $ratings->count();
    }

    public function getNoOfRatingsBByValue($no, $productId){

        return ProductReview::where('rating', $no)
                       ->where('product_id', $productId)->get()->count();
    }


    public function getAverageRatingOfPdt($productId){

        $rating1 = $this->getNoOfRatingsBByValue(1, $productId);
        $rating2 = $this->getNoOfRatingsBByValue(2, $productId);
        $rating3 = $this->getNoOfRatingsBByValue(3, $productId);
        $rating4 = $this->getNoOfRatingsBByValue(4, $productId);
        $rating5 = $this->getNoOfRatingsBByValue(5, $productId);


        $totalRating = $rating1 + $rating2 + $rating3 + $rating4 + $rating5;

        $addRating = $rating1 + ($rating2 * 2) + ($rating3 *3 ) + ($rating4 * 4) + ($rating5 * 5);


        if($addRating > 0){
            $averageRating = $addRating/$totalRating;
            return round($averageRating);
        }else{
            return 0;
        }





    }


    public function getPercentageRatingOfProductByRate($rate, $productId){
        $rating1 = $this->getNoOfRatingsBByValue(1, $productId);
        $rating2 = $this->getNoOfRatingsBByValue(2, $productId);
        $rating3 = $this->getNoOfRatingsBByValue(3, $productId);
        $rating4 = $this->getNoOfRatingsBByValue(4, $productId);
        $rating5 = $this->getNoOfRatingsBByValue(5, $productId);


        $totalRating = $rating1 + $rating2 + $rating3 + $rating4 + $rating5;

        if($totalRating > 0){

            $percent = ($this->getNoOfRatingsBByValue($rate, $productId) * 100) / $totalRating;

            return $percent;
        }else{
            return 0;
        }


    }


}
