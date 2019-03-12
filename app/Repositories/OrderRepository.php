<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/18/2018
 * Time: 3:05 PM
 */

namespace App\Repositories;
use App\Order;


class OrderRepository
{

    protected  $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }


    public function getOrderByProductId($id){

        return $this->order->where('product_id', $id)->get();
    }

    public function create($attributes){

        return $this->order->create($attributes);
    }


    public function getAllOrdersByOrderCode($orderCode){

        return $this->order->where('order_code', $orderCode)->get();
    }

    public function updateOrderStatus($orderCode, $orderId, $status){

        return $this->order->where('order_code', $orderCode)->where('id', $orderId)->update(['shipping_status' => $status]);
    }

    public function getAllOrdersAndProductDetailsByCode($orderCode){

        return $this->order->join('products','orders.product_id','=','products.id')
            ->select('orders.*','products.cover_image','products.title')
            ->where('order_code', $orderCode)->get();
    }

    public function getItemsPending(){
        return $this->order->where('shipping_status','pending')->count();
    }

    public function getTotalItemOrders(){

        return $this->order->count();
    }


    public function getLatestOrders(){

        return $this->order->orderBy('created_at','DESC')->limit(5)->get();
    }


}
