<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\ProductCategoryService;
use App\Services\CategoryService;
use App\Services\ProductVariationService;
use App\Services\OrderService;
use App\Http\Requests\ProductRequest;
use JD\Cloudder\Facades\Cloudder;
use App\Services\BrandService;



class ProductController extends Controller
{

    protected $productService;
    protected $productCategoryService;
    protected $categoryService;
    protected $productVariationService;
    protected  $orderService;
    protected $brandService;

    public function __construct(ProductService $productService, ProductCategoryService $productCategoryService, CategoryService $categoryService, ProductVariationService $productVariationService, OrderService $orderService, BrandService $brandService)
    {
        $this->productService = $productService;
        $this->productCategoryService = $productCategoryService;
        $this->categoryService = $categoryService;
        $this->productVariationService = $productVariationService;
        $this->orderService = $orderService;
        $this->brandService = $brandService;
    }


    public function index(){

        $products = $this->productService->index();

        return view('backstore.products.products', compact('products'));

    }

    public function newProductForm(){

     $categories = $this->categoryService->index();
     $brands = $this->brandService->index();
    return view('backstore.products.new-product', compact('categories','brands'));
    }

    public function create(ProductRequest $request){

        $coverPhotoUrl = "";
        $otherImage1Url = "";
        $otherImage2Url = "";
        $otherImage3Url = "";
        $selling_price = 0;

        if((!empty($request->type) and empty($request->subtypes)) || (!empty($request->subtypes) and empty($request->type))){
            return back()->with(['error'=>'Please a variation and its subtype must be exist to continue']);
        }


        $coverPhotoUrl =  $this->uploadCoverImageToCloudinary($request->file('cover_image'));

        if ($request->hasFile('other_image1')) {
            $otherImage1Url = $this->uploadOtherImageToCloudinary($request->file('other_image1'));
        }

        if ($request->hasFile('other_image2')) {
            $otherImage2Url = $this->uploadOtherImageToCloudinary($request->file('other_image2'));
        }

        if ($request->hasFile('other_image3')) {
            $otherImage3Url = $this->uploadOtherImageToCloudinary($request->file('other_image3'));

        }

        if($request->has('selling_price')){
            $selling_price = (int)$request->selling_price;
        }

        $productData = [
            'title' => $request->title,
            'price_type' => $request->price_type,
            'overview' => $this->handleWysiwyg($request->overview),
            'description' =>  $this->handleWysiwyg($request->description),
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory,
            'brand_id' => $request->brand,
            'cover_image' => $coverPhotoUrl,
            'other_image1' => $otherImage1Url,
            'other_image2' => $otherImage2Url,
            'other_image3' => $otherImage3Url,
            'price' => $selling_price
        ];

        $product = $this->productService->create($productData);

        if (!empty($product)){


            if(!empty($request->type)) {
                foreach ($request->type as $key => $value) {
                    $this->productVariationService->create(
                        ['product_id' => $product->id,
                          'type' => $value,
                            'subtypes' => $request->subtypes[$key]]);
                }
            }

            return back()->with(['status'=>'Product successfully created']);
        }

    }

    public function uploadCoverImageToCloudinary($image){
        \Cloudder::upload($image, 'products/coverImages/' . time(), array("responsive_breakpoints" => array(
            "create_derived" => true, "bytes_step" => 20000, "min_width" => 200, "max_width" => 1000,
            "transformation" => array( "crop" => "fill", "aspect_ratio" => "16:9", "gravity" => "auto" ))));
        // upload($coverPhoto, 'products/coverImages/' . time(), array("width" => 200, "height" => 200, "gravity" => "faces", "crop" => "thumb"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }

    public function uploadOtherImageToCloudinary($image){
        \Cloudder::upload($image, 'products/otherImages/' . time(), array("responsive_breakpoints" => array(
            "create_derived" => true, "bytes_step" => 20000, "min_width" => 200, "max_width" => 1000,
            "transformation" => array( "crop" => "fill", "aspect_ratio" => "16:9", "gravity" => "auto" ))));
        // upload($coverPhoto, 'products/coverImages/' . time(), array("width" => 200, "height" => 200, "gravity" => "faces", "crop" => "thumb"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }

    public function handleWysiwyg($content){
        $dom = new \domdocument();
        @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        /*$images = $dom->getelementsbytagname('img');

        foreach($images as $k => $img){
            $data = $img->getattribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);
            $image_name = 'post_' . time() . $k . '.png';
            //you can save it with any nae of choice or any extension of choice. or you may wish to leave it as the default extension depends on how you want to save the image.

            $path =  public_path('shopImages') . "\\" .$image_name;

            file_put_contents($path, $data);
           // \Cloudder::upload($data);
              /*  , 'products/descriptionImages/' . time(), array("responsive_breakpoints" => array(
                "create_derived" => true, "bytes_step" => 20000, "min_width" => 200, "max_width" => 1000,
                "transformation" => array( "crop" => "fill", "aspect_ratio" => "16:9", "gravity" => "auto" ))));*/
            // upload($coverPhoto, 'products/coverImages/' . time(), array("width" => 200, "height" => 200, "gravity" => "faces", "crop" => "thumb"));

            //$d = \Cloudder::getResult();
            //$image_name = $d['url'];
           // $img->removeattribute('src');
            //$img->setattribute('src', $image_name);
        //}*/

        $detail = $dom->savehtml();
        return $detail;
    }

    public function edit($id){

        $product = $this->productService->find($id);
        $categories = $this->categoryService->index();
        $brands = $this->brandService->index();

        return view('backstore.products.edit-product', compact('product', 'categories','brands'));
    }


    public function update($id, Request $request){



     $request->validate([
         'title' => 'required',
         'price_type' => 'required',
         'overview' => 'required',
         'description' => 'required|min:30',
         'cover_image' => 'image|mimes:jpeg,png,jpg',
         'other_image1' => 'image|mimes:jpeg,png,jpg',
         'other_image2' => 'image|mimes:jpeg,png,jpg',
         'other_image3' => 'image|mimes:jpeg,png,jpg',
         'category' => 'required',
         'subcategory' => 'required'

     ]);

     $visibleValue = 0;

     $productDetail = $this->productService->find($id);

        $coverPhotoUrl = $productDetail->cover_image;
        $otherImage1Url = $productDetail->other_image1;
        $otherImage2Url = $productDetail->other_image2;
        $otherImage3Url = $productDetail->other_image3;
        $selling_price = $productDetail->price;

        if((!empty($request->type) and empty($request->subtypes)) || (!empty($request->subtypes) and empty($request->type))){
            return back()->with(['error'=>'Please a variation and its subtype must be exist to continue']);
        }


        if ($request->hasFile('cover_image')) {
            $coverPhotoUrl =  $this->uploadCoverImageToCloudinary($request->file('cover_image'));
        }

        if ($request->hasFile('other_image1')) {
            $otherImage1Url = $this->uploadOtherImageToCloudinary($request->file('other_image1'));
        }

        if ($request->hasFile('other_image2')) {
            $otherImage2Url = $this->uploadOtherImageToCloudinary($request->file('other_image2'));
        }

        if ($request->hasFile('other_image3')) {
            $otherImage3Url = $this->uploadOtherImageToCloudinary($request->file('other_image3'));

        }

        if($request->has('selling_price')){
            $selling_price = (int)$request->selling_price;
        }

        if ($request->visible == "on"){
            $visibleValue = 1;
        }

        //return $visibleValue;
        $productData = [
            'title' => $request->title,
            'price_type' => $request->price_type,
            'overview' => $this->handleWysiwyg($request->overview),
            'description' =>  $this->handleWysiwyg($request->description),
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory,
            'brand_id' => $request->brand,
            'cover_image' => $coverPhotoUrl,
            'other_image1' => $otherImage1Url,
            'other_image2' => $otherImage2Url,
            'other_image3' => $otherImage3Url,
            'price' => $selling_price,
            'visible' => $visibleValue
        ];

        $product = $this->productService->update($id, $productData);

        $this->productVariationService->deleteProductVariationsByProductId($id);


            if(!empty($request->type)) {
                foreach ($request->type as $key => $value) {
                    $this->productVariationService->create(
                        ['product_id' => $id,
                            'type' => $value,
                            'subtypes' => $request->subtypes[$key]]);
                }
            }

            return back()->with(['status'=>'Product successfully updated']);


    }


    public function delete($id){

        $orderProduct = $this->orderService->getOrderByProductId($id);


        if(count($orderProduct) == 0){
            $this->productCategoryService->deleteProductCategories($id);
            $this->productVariationService->deleteProductVariationsByProductId($id);
            $this->productService->delete($id);
            return back()->with(['status' => 'Product Successfully deleted']);
        }else{
            return back()->with(['error' => 'This product has been ordered before']);
        }

    }


    public function getCategoryProducts($id){

        $products = $this->productService->getCategoryProducts($id);

        return response()->json(['products' =>  $products]);
    }

    public function getCategoryDetails($id){

     $brands = $this->productService->getCategoryBrands($id);
     $subcategories =  $this->productService->getCategorySubCategories($id);

        return response()->json(['brands' =>  $brands, 'subcategories' =>  $subcategories]);
    }

    public function getSubCategoryProducts($id){

        $products = $this->productService->getSubCategoryProducts($id);

        return response()->json(['products' =>  $products]);
    }

    public function filterByKeywords(Request $request){

     $result = $this->productService->filterProductsTypeAhead($request->query('term'));

     return response()->json($result);
    }
}
