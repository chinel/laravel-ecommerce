<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Services\AccountService;
use App\Services\ShippingService;

class DashboardController extends Controller
{
    protected $accountService;
    protected $orderService;
    protected $shippingService;

    public function __construct(AccountService $accountService, OrderService $orderService, ShippingService $shippingService)
    {
        $this->orderService = $orderService;
        $this->accountService = $accountService;
        $this->shippingService = $shippingService;

    }

    public function index(){

        $pendingItems = $this->orderService->getItemsPending();
        $totalOrderedItems = $this->orderService->getTotalItemOrders();
        $allCustomers = $this->accountService->getAllCustomers()->count();
        $payingCustomers = $this->shippingService->getUniqueOrders();
        $latestOrders = $this->orderService->getLatestOrders();

        return view('backstore.dashboard',compact('pendingItems','totalOrderedItems','allCustomers','payingCustomers','latestOrders'));
    }
}
