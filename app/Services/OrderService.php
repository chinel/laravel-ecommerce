<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/18/2018
 * Time: 3:06 PM
 */

namespace App\Services;
use illuminate\Http\Request;
use App\Repositories\OrderRepository;

class OrderService
{

    protected  $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getOrderByProductId($id){

        return $this->orderRepository->getOrderByProductId($id);
    }

    public function create($attributes){

        return $this->orderRepository->create($attributes);
    }

    public function getAllOrdersByOrderCode($orderCode){
        return $this->orderRepository->getAllOrdersByOrderCode($orderCode);
    }

    public function updateOrderStatus($orderCode, $orderId, $status){

        return $this->orderRepository->updateOrderStatus($orderCode, $orderId, $status);
    }

    public function getAllOrdersAndProductDetailsByCode($orderCode){
        return $this->orderRepository->getAllOrdersAndProductDetailsByCode($orderCode);
    }

    public function getItemsPending(){
        return $this->orderRepository->getItemsPending();
    }

    public function getTotalItemOrders(){

        return $this->orderRepository->getTotalItemOrders();
    }

    public function getLatestOrders(){

        return $this->orderRepository->getLatestOrders();
    }
}
