<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'title',
        'content',
        'rating'
    ];

    public function getFullName($userId){

        return User::where('id',$userId)->select('firstname','lastname')->first();
    }

    public function checkIfUserBoughtProduct($userId, $productId){
        return Order::join('shipping_infos','orders.order_code','shipping_infos.order_code')
                  ->select('shipping_infos.order_code')
                    ->where('user_id', $userId)
                    ->where('product_id', $productId)
                     ->where('shipping_status', '=', 'delivered')->first();
    }
}
