<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServiceFeeRequest;
use App\Services\ServiceFeeService;

class ServiceFeeController extends Controller
{
    protected $serviceFeeService;
    public function __construct(ServiceFeeService $serviceFeeService)
    {
        $this->serviceFeeService = $serviceFeeService;
    }

    public function index(){

    $serviceFee = $this->serviceFeeService->index();

    return view('backstore.service-fee', compact('serviceFee'));
    }

    public function create(ServiceFeeRequest $request){

        $this->serviceFeeService->delete();
        $this->serviceFeeService->create(['higherSubtotal' => $request->higherSubtotal,'lowerSubtotal' => $request->lowerSubtotal]);
        return back()->with(['status' => 'successfully updated service fee']);
    }
}
