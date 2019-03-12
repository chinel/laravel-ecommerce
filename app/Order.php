<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    'product_id',
        'qty',
     'sub_total',
     'variation_types',
     'order_code',
        'shipping_status'
    ];

    public function getProductDetail($id){
        return Product::where('id',$id)->select('title','cover_image')->first();
    }
}
