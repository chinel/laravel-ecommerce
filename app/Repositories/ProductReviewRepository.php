<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 1/14/2019
 * Time: 6:37 PM
 */

namespace App\Repositories;
use App\ProductReview;

class ProductReviewRepository
{

    protected $productReview;
    public function __construct(ProductReview $productReview)
    {
        $this->productReview = $productReview;
    }


    public function getProductReviews($productId){

     return $this->productReview->where('product_id',$productId)->get();
    }

    public function getProductReviewsPaginated($productId){

        return $this->productReview->where('product_id',$productId)->orderBy('created_at','DESC')->paginate(6);
    }


    public function create($attributes){

        return $this->productReview->create($attributes);
    }


    public function checkIfUserHasReviewedProduct($userId, $productId){
        return $this->productReview->
        where('user_id', $userId)
        ->where('product_id', $productId)
         ->first();

    }



}
