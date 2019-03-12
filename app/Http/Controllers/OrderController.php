<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ShippingService;
use App\Services\OrderService;
use App\Services\AccountService;
use App\Services\LogoService;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOrderStatus;

class OrderController extends Controller
{

    protected $shippingService;
    protected $orderService;
    protected $accountService;
    protected $logoService;
    public function __construct(ShippingService $shippingService, OrderService $orderService, AccountService $accountService, LogoService $logoService)
    {
        $this->shippingService = $shippingService;
        $this->orderService = $orderService;
        $this->accountService = $accountService;
        $this->logoService = $logoService;
    }

    public function getLogo(){

        $logoDetails =  $this->logoService->index();
        return $logoDetails->logoUrl;
    }


    public function index(){
        $orders = $this->shippingService->getAllOrders();

        return view('backstore.orders.orders', compact('orders'));
    }

    public function view($orderCode){
        $orders = $this->orderService->getAllOrdersByOrderCode($orderCode);
        $shippingDetail = $this->shippingService->getShippingDetailByCode($orderCode);

        return view('backstore.orders.view-order', compact('orders','shippingDetail'));
    }


    public function update(Request $request){

      $orderCode = $request->orderCode;
       $orderIds =  $request->orderId;

       $total = count($orderIds) - 1 ;
       $orderKeys = array_keys($orderIds);
       for ($x = 0; $x <= $total; $x++){
        $this->orderService->updateOrderStatus($orderCode, $orderKeys[$x] , $orderIds[$orderKeys[$x]]);

       }

        $shippingDetails =  $this->shippingService->getShippingDetailByCode($orderCode);
        $userDetails = $this->accountService->getUserByUserId($shippingDetails->user_id);
        $orderDetails = $this->orderService->getAllOrdersAndProductDetailsByCode($orderCode);
        $logo = $this->getLogo();
        Mail::to([$userDetails->email])->send(new SendOrderStatus($userDetails->firstname, $logo,$shippingDetails,$orderDetails));
        return back()->with(['status'=> 'Product order successfully updated']);


    }

}
