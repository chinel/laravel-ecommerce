<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 1/14/2019
 * Time: 6:38 PM
 */

namespace App\Services;
use App\Repositories\ProductReviewRepository;


class ProductReviewService
{

    protected $productReviewRepository;
    public function __construct(ProductReviewRepository $productReviewRepository)
    {
        $this->productReviewRepository = $productReviewRepository;
    }

    public function getProductReviews($productId){

        return $this->productReviewRepository->getProductReviews($productId);
    }

    public function getProductReviewsPaginated($productId){

        return $this->productReviewRepository->getProductReviewsPaginated($productId);
    }


    public function create($attributes){

        return $this->productReviewRepository->create($attributes);
    }


    public function checkIfUserHasReviewedProduct($userId, $productId){
        return $this->productReviewRepository->checkIfUserHasReviewedProduct($userId, $productId);

    }
}
