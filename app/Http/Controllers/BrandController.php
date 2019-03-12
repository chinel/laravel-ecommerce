<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Services\BrandService;
use App\Services\ProductService;

class BrandController extends Controller
{
    protected $brandService;
    protected  $productService;
    public function __construct(BrandService $brandService, ProductService $productService)
    {
        $this->brandService = $brandService;
        $this->productService = $productService;
    }

    public function index(){
        $brands = $this->brandService->index();

        return view('backstore.brands.brands', compact('brands'));
    }

    public function create(BrandRequest $request){
        $logoUrl = "";

        $logoUrl =  $this->uploadBrandLogoToCloudinary($request->file('logo'));

        $brandDetails = [
            'title' => $request->title,
            'slug' => $request->slug,
            'imageUrl' => $logoUrl
        ];

        $this->brandService->create($brandDetails);

        return back()->with(['status' => 'Brand successfully created']);
    }

    public function edit($id){
        $brand = $this->brandService->edit($id);

        return view('backstore.brands.edit-brands',compact('brand'));
    }


    public function update($id, Request $request){

        $brandDetail = $this->brandService->edit($id);

        $brandUrl = $brandDetail->imageUrl;

        if ($request->hasFile('logo')) {
            $brandUrl =  $this->uploadBrandLogoToCloudinary($request->file('logo'));
        }

        $brandInformation = [
            'title' => $request->title,
            'slug' => $request->slug,
            'imageUrl' => $brandUrl
        ];

        $this->brandService->update($id, $brandInformation);

        return back()->with(['status' => 'Brand details successfully updated']);
    }


    public function delete($id){

        $productWithBrand = $this->productService->getProductWithBrandId($id);

        if(!empty($productWithBrand)){

            return back()->with(['error' => 'This brand has already been attached to a product']);
        }else{

            $this->brandService->delete($id);

            return back()->with(['status' => 'Successfully deleted brand']);
        }

    }



    public function uploadBrandLogoToCloudinary($image){
        \Cloudder::upload($image, 'brands/logos/' . time(), array("width" => 98, "height" => 26,  "crop" => "fit"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }


}
