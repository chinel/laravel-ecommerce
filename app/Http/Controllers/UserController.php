<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Services\UserService;
use App\Services\ShippingService;
use App\Services\OrderService;
use App\Services\LogoService;
use App\Services\CategoryService;
use function redirect;
use Auth;

class UserController extends Controller
{
    protected $userService;
    protected $shippingService;
    protected $orderService;
    protected $logoService;
    protected $categoryService;
    public function  __construct(UserService $userService, ShippingService $shippingService, OrderService $orderService, LogoService $logoService, CategoryService $categoryService)
    {
        $this->userService = $userService;
        $this->shippingService = $shippingService;
        $this->orderService = $orderService;
        $this->logoService = $logoService;
        $this->categoryService = $categoryService;
    }
    public function getCategories(){

        return $this->categoryService->allOrderByName();
    }

    public function getLogo(){

        $logoDetails =  $this->logoService->index();
        return $logoDetails->logoUrl;
    }

    public function userProfile(){

        $logo = $this->getLogo();
        $categories = $this->getCategories();
        return view('storefront.dashboard', compact('logo','categories'));
    }

    public function updateUserProfile(ProfileUpdateRequest $request){

        $this->userService->update(Auth::user()->id, [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone
        ]);

        return back()->with(['status'=> 'Profile Successfully updated']);
    }

    public function changePassword(){

        $logo = $this->getLogo();
        $categories = $this->getCategories();
        return view('storefront.change-password', compact('logo','categories'));
    }

    public function updateUserPassword(UpdatePasswordRequest $request){
     $this->userService->updatePassword(Auth::user()->id, ['password' => bcrypt($request->password)]);

     Auth::logout();
     return redirect('/login')->with(['status' => 'Password updated. Please login to continue']);
    }

    public function userOrders(){
        $logo = $this->getLogo();
        $categories = $this->getCategories();
        $orders = $this->shippingService->getOrderByUserId(Auth::user()->id);
        return view('storefront.orders', compact('orders','logo', 'categories'));
    }

    public function orderDetail($orderCode){
        $logo = $this->getLogo();
        $categories = $this->getCategories();
        $orders = $this->orderService->getAllOrdersByOrderCode($orderCode);
        $shippingDetail = $this->shippingService->getShippingDetailByCode($orderCode);

        return view('storefront.order-detail', compact('orders','shippingDetail','logo','categories'));
    }
}
