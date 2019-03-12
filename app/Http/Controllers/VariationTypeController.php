<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VariationTypeService;
use App\Http\Requests\VariationTypeRequest;
use App\Services\ProductVariationTypeService;

class VariationTypeController extends Controller
{
    protected $variationTypeService;
    protected $productVariationTypeService;

    public function __construct(VariationTypeService $service, ProductVariationTypeService $productVariationTypeService)
    {
        $this->variationTypeService =  $service;
        $this->productVariationTypeService = $productVariationTypeService;
    }


    public function update($id, VariationTypeRequest $request){
        $this->variationTypeService->update($id, $request);

        return back()->with(['status'=>'Successfully updated variation type']);
    }

    public function delete($id){

        $variationType = $this->productVariationTypeService->findProductVariationTypeByVariationId($id);

        if(empty($variationType)){
            $this->variationTypeService->delete($id);
            return back()->with(['status' => 'Variation type successfully deleted']);
        }else{
            return back()->with(['error' => 'This Variation type has already been attached to a product']);
        }

    }

}
