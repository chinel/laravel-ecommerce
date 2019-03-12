<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VariationService;
use App\Services\VariationTypeService;
use App\Services\ProductVariationService;
use App\Http\Requests\VariationRequest;
use App\Variation;

class VariationController extends Controller
{
    protected $variationService;
    protected $variationTypeService;
    protected $productVariationService;

    public function __construct(VariationService $variationService, VariationTypeService $variationTypeService, ProductVariationService $productVariationService)
    {
        $this->variationService = $variationService;
        $this->variationTypeService = $variationTypeService;
        $this->productVariationService = $productVariationService;

    }


    public function index(){
     $variations = Variation::all();

     return view('backstore.productvariations', compact('variations'));

    }

    public function create(VariationRequest $request){


        $data = [
            'title' => $request->title
        ];
        $variation = $this->variationService->create($data);

        if (!empty($variation)){
            foreach ($request->types as $type){
                $this->variationTypeService->create(['variation_id' => $variation->id, 'name' => $type]);
            }

            return back()->with(['status' => 'Product variations successfully created']);
        }
    }


    public function edit($id){

        $variation = Variation::find($id);

        return view('backstore.editProductVariations',compact('variation'));

    }


    public function update($id,Request $request){

        $request->validate([
            'title' => 'required',
            'types' => 'required'
        ]);


        $this->variationService->update($id, ['title' => $request->title]);
        $this->variationTypeService->deleteByVariation($id);
        foreach ($request->types as $type){
            $this->variationTypeService->create(['variation_id' => $id, 'name' => $type]);
        }


        return back()->with(['status' => 'Successfully updated product variation']);
    }

    public function delete($id){

     $variation  = $this->productVariationService->findProductVariationByVariationId($id);

     if (empty($variation)){

         $this->variationTypeService->deleteByVariation($id);
         $this->variationService->delete($id);
         return back()->with(['status' => 'Product Variation successfully deleted']);

     }else{
       return back()->with(['error' => 'This Product Variation has already been attached to a product']);
     }
    }
}
