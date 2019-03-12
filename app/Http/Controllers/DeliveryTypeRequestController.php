<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DeliveryTypeRequest;
use App\Services\DeliveryTypeService;
use App\Services\ShippingService;

class DeliveryTypeRequestController extends Controller
{
    protected $deliveryTypeService;
    protected $shippingService;
    public function __construct(DeliveryTypeService $deliveryTypeService, ShippingService $shippingService)
    {
     $this->deliveryTypeService = $deliveryTypeService;
     $this->shippingService = $shippingService;
    }

    public function index(){

        $deliveryTypes = $this->deliveryTypeService->index();

        return view('backstore.deliverytypes.deliverytypes', compact('deliveryTypes'));
    }

    public function create(DeliveryTypeRequest $request){
     $this->deliveryTypeService->create($request);

     return back()->with(['status' => 'Delivery Type successfully created']);
    }

    public function edit($id){

        $deliveryType = $this->deliveryTypeService->edit($id);

        return view('backstore.deliverytypes.edit_deliveryType', compact('deliveryType'));
    }


    public function update(DeliveryTypeRequest $request, $id){
        $this->deliveryTypeService->update($request, $id);

        return back()->with(['status' => 'Delivery Type successfully updated']);
    }

    public function delete($id){

        $shippingInfo = $this->shippingService->findShippingInfoByDeliveryType($id);

        if(empty($shippingInfo)){
            $this->deliveryTypeService->delete($id);
            return back()->with(['status' => 'Delivery Type Successfully deleted']);
        }else{
            return back()->with(['error' => 'This Delivery type has been attached to a product']);
        }

    }
}
