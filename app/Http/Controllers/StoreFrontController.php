<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\ProductService;
use Cart;
use App\Services\DeliveryTypeService;
use App\Services\Section1Service;
use App\Services\Section2Service;
use App\Services\Section3Service;
use App\Services\Section4Service;
use App\Services\Section5Service;
use App\Services\Section6Service;
use App\Services\Section8Service;
use App\Services\BrandService;
use App\Services\SubCategoryService;
use App\Services\SideBarBannerService;
use App\Services\LogoService;
use App\Product;
use App\Services\SliderService;
use App\Services\ServiceFeeService;
use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use App\Services\ShippingService;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOrderToUser;
use App\Mail\SendOrderToAdmin;
use App\Services\ProductReviewService;
use Auth;
use function redirect;
use Illuminate\Support\Facades\Session;



class StoreFrontController extends Controller
{
    protected  $categoryService;
    protected $productService;
    protected $deliveryTypeService;
    protected $section1Service;
    protected $section2Service;
    protected $section3Service;
    protected $section4Service;
    protected $section5Service;
    protected $section6Service;
    protected $section8Service;
    protected $brandService;
    protected $product;
    protected $subCategoryService;
    protected $sliderService;
    protected  $serviceFeeService;
    protected $orderService;
    protected $shippingService;
    protected $logoService;
    protected $sideBannerService;
    protected $productReviewService;
    private $ENCRYPT_KEY = "SALT12345";

    public function __construct(CategoryService $categoryService,
                                ProductService $productService,
                                DeliveryTypeService $deliveryTypeService,
                                 Section1Service $section1Service,
                                 Section2Service $section2Service,
                                  Section3Service $section3Service,
                                   Section4Service $section4Service,
                                   Section5Service $section5Service,
                                    Section6Service $section6Service,
                                    Section8Service $section8Service,
                                    BrandService $brandService,
                                    Product $product,
                                    SubCategoryService $subCategoryService,
                                    SliderService $sliderService,
                                     ServiceFeeService $serviceFeeService,
                                     OrderService $orderService,
                                     ShippingService $shippingService,
                                         LogoService $logoService,
                                      SideBarBannerService $sideBarBannerService,
                                       ProductReviewService $productReviewService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->deliveryTypeService = $deliveryTypeService;
        $this->section1Service = $section1Service;
        $this->section2Service = $section2Service;
        $this->section3Service = $section3Service;
        $this->section4Service = $section4Service;
        $this->section5Service = $section5Service;
        $this->section6Service = $section6Service;
        $this->section8Service = $section8Service;
        $this->brandService = $brandService;
        $this->product = $product;
        $this->subCategoryService = $subCategoryService;
        $this->sliderService = $sliderService;
        $this->serviceFeeService =  $serviceFeeService;
        $this->orderService = $orderService;
        $this->shippingService = $shippingService;
        $this->logoService = $logoService;
        $this->sideBannerService = $sideBarBannerService;
        $this->productReviewService = $productReviewService;
    }

    public function getCategories(){

        return $this->categoryService->allOrderByName();
    }

    public function getLogo(){

        $logoDetails =  $this->logoService->index();
        return $logoDetails->logoUrl;
    }

    public function home(){

       $section1 = $this->section1Service->index();
       $section2 = $this->section2Service->index();
       $section3 = $this->section3Service->index();
       $section4 = $this->section4Service->index();
       $section5 = $this->section5Service->index();
       $section6 = $this->section6Service->index();
       $section8 = $this->section8Service->index();
       $brands = $this->brandService->index();
       $sliders = $this->sliderService->index();
       $categories = $this->categoryService->allOrderByName();
       $logo = $this->getLogo();

        return view('storefront.index', compact('section1','section2','section3','section4','section5','section6','section8','brands','sliders','categories','logo'));
    }


    public function brand($term, Request $request){


        $logo = $this->getLogo();
        $categories = $this->getCategories();
        $brandDetails =  $this->brandService->getBrandBySlug($term);

        $brandCategories = $this->productService->getAllProductsWithBrands($brandDetails->id);
        $products = Product::productsByrandId($brandDetails->id);

        if($request->query('category')){

            $products = $products->productsInCategory($request->query('category'));
        }

        if ($request->query('sortBy'))
        {
            $sortBy = $request->query('sortBy');
            switch ($sortBy) {
                case "cheapest_prices":
                    $products =  $products->sortByCheapest()->paginate(9);
                    break;
                case "highest_prices":
                    $products =  $products->sortByHighest()->paginate(9);
                    break;
                default:
                    $products = $products->orderBy('products.created_at','DESC')->paginate(9);
            }

        }else{

            $products = $products->orderBy('products.created_at','DESC')->paginate(9);
        }



        return view('storefront.brands', compact('brandDetails','products','min','max','originalMax','selectedBrands','logo','categories','brandCategories','term'));

    }


    public function category($type, Request $request){

    $logo = $this->getLogo();
    $categories = $this->getCategories();
    $productCategory =  $this->categoryService->findCategoryBySlug($type);

    $min = 0;
    $max = $this->productService->getCategoryHighestPrice($productCategory->id);
    $originalMax = $this->productService->getCategoryHighestPrice($productCategory->id);
    $products = Product::productsByCategoryId($productCategory->id);
    $selectedBrands = array();
    if ($request->query('maximum') and $request->query('minimum') )
    {
        $max = $request->query('maximum');
        $min = $request->query('minimum');
        $products = $products->categoryByIdWithinRange($min, $max);
    }

    if($request->query('brands')){

        $products = $products->getProductsWithBrands($request->query('brands'));
        $selectedBrands =  $request->query('brands');
    }

    if ($request->query('sortBy'))
    {
        $sortBy = $request->query('sortBy');
        switch ($sortBy) {
            case "cheapest_prices":
                $products =  $products->sortByCheapest()->paginate(9);
                break;
            case "highest_prices":
                $products =  $products->sortByHighest()->paginate(9);
                break;
            default:
                $products = $products->orderBy('products.created_at','DESC')->paginate(9);
        }

    }else{

        $products = $products->orderBy('products.created_at','DESC')->paginate(9);
    }



    return view('storefront.category', compact('productCategory','products','min','max','originalMax','selectedBrands','logo','categories'));
}


    public function subcategory($type, Request $request){

        $logo = $this->getLogo();
        $productCategory =  $this->categoryService->findCategoryBySubCategorySlug($type);
        $min = 0;
        $max = $this->productService->getSubCategoryHighestPrice($productCategory->subId);
        $originalMax = $this->productService->getSubCategoryHighestPrice($productCategory->subId);
        $products = Product::ProductsBySubCategoryId($productCategory->subId);
        $selectedBrands = array();
        $categories = $this->getCategories();
        if ($request->query('maximum') and $request->query('minimum') )
        {
            $max = $request->query('maximum');
            $min = $request->query('minimum');
            $products = $products->categoryByIdWithinRange($min, $max);
        }

        if($request->query('brands')){

            $products = $products->getProductsWithBrands($request->query('brands'));
            $selectedBrands =  $request->query('brands');
        }

        if ($request->query('sortBy'))
        {
            $sortBy = $request->query('sortBy');
            switch ($sortBy) {
                case "cheapest_prices":
                    $products =  $products->sortByCheapest()->paginate(9);
                    break;
                case "highest_prices":
                    $products =  $products->sortByHighest()->paginate(9);
                    break;
                default:
                    $products = $products->orderBy('products.created_at','DESC')->paginate(9);
            }

        }else{

            $products = $products->orderBy('products.created_at','DESC')->paginate(9);
        }



        return view('storefront.subcategory', compact('productCategory','products','min','max','originalMax','selectedBrands','logo','categories'));
    }


    public function searchForProducts(Request $request){
        $term = $request->term;
        $logo = $this->getLogo();
        $products = "";
        $searchResultBrands = "";
        $searchResultCategory = "";
        $searchByCategory = false;
        $filterIn = $request->filterIn;


        if($filterIn == "all") {
            $searchByCategory = true;
            $products = Product::productsByTerm($term);
            $searchResultCategory = Product::searchProductsCategory($term);
            $searchResultBrands = Product::searchProductsBrand($term);
        }else{
            $searchByCategory = false;
            $products = Product::productTermByCategorySlug($term, $filterIn);
            $searchResultCategory = Product::searchProductsCategoryBySlug($term, $filterIn);
            $searchResultBrands = Product::SearchProductsBrandBySlug($term, $filterIn);
        }




        $selectedBrands = array();
        $categories = $this->getCategories();

        if ($request->query('sortBy'))
        {
            $sortBy = $request->query('sortBy');
            switch ($sortBy) {
                case "cheapest_prices":

                    $products =  $products->sortByCheapest()->paginate(9);
                    break;
                case "highest_prices":

                    $products =  $products->sortByHighest()->paginate(9);
                    break;
                default:

                    $products = $products->orderBy('products.created_at','DESC')->paginate(9);
            }

        }else{

            $products = $products->orderBy('products.created_at','DESC')->paginate(9);
        }



        return view('storefront.search-result', compact('products','min','max','originalMax','selectedBrands','logo','categories','term','searchResultBrands','searchResultCategory','searchByCategory','filterIn'));


    }

    public function product($product, Request $request){

        $logo = $this->getLogo();
        $originalName = str_replace('_', '.', $product);
        $productWithoutDashes = urldecode($originalName);

        $categories = $this->categoryService->allOrderByName();

        $sideBanners = $this->sideBannerService->index();

        $productDetails = $this->productService->getProductByTitle($productWithoutDashes);

        $productReviews = $this->productReviewService->getProductReviewsPaginated($productDetails->id);

        if ($request->ajax()) {
            return view('storefront.layouts.partials.productReview', compact('productReviews'));
        }


        return view('storefront.product', compact('productDetails','sideBanners','categories','logo','productReviews'));
    }

    public function ajaxProduct($product, Request $request){

        $originalName = str_replace('_', '.', $product);
        $productWithoutDashes = urldecode($originalName);
        $productDetails = $this->productService->getProductByTitle($productWithoutDashes);

        if ($request->ajax()) {
            return view('storefront.layouts.partials.inc.modalpopup', compact('productDetails'));
        }
    }


    public function loadRating($product, Request $request){
        $originalName = str_replace('_', '.', $product);
        $productWithoutDashes = urldecode($originalName);
        $productDetails = $this->productService->getProductByTitle($productWithoutDashes);
        $productReviews = $this->productReviewService->getProductReviewsPaginated($productDetails->id);
        if ($request->ajax()) {
            return view('storefront.layouts.partials.ReviewWrapper', compact('productDetails','productReviews'));
        }
    }


    public function addToCart(Request $request)
    {
        $found = false;
        $productId = $request->productId;
        $productName = $request->productName;
        $productPrice = $request->productPrice;
        $qty = $request->qty;
        $productPhoto =  $request->productPhoto;
        $subTypes = [];


        //session()->forget('cart');
        //return json_encode(session()->get('cart'));
        if(isset($request->subtypes)) {
            foreach ($request->subtypes as $key => $value) {
                $result = $array = explode('_', $value);
                $subTypes[] = array($result[0] => $result[1]);
            }
        }
        $cart = session()->get('cart');


        // if cart is empty then this the first product
        if ($cart == null) {

            $cart[$productId][0] = [
                "id" => $productId,
                "name" => $productName,
                "quantity" => $qty,
                "price" => $productPrice,
                "photo" => $productPhoto,
                "attributes" => $subTypes
            ];
           /* $cart = [
                $productId[0] => [
                    "id" => $productId,
                    "name" => $productName,
                    "quantity" => $qty,
                    "price" => $productPrice,
                    "photo" => $productPhoto,
                    "attributes" => $subTypes
                ]
            ];*/
            session()->put('cart', $cart);
           return json_encode(['status' => 'ok','totalCart' => $this->countTotalCartItems($cart)]);

        }



        // if cart not empty then check if this product exist then increment quantity
       else if(isset($cart[$productId])) {

            foreach ($cart[$productId] as $key => $value2 ){
              //  return json_encode(['array1' => $value2['attributes'], 'array2' => $subTypes, 'array3' => $this->compareArray($value2['attributes'], $subTypes )  ]);
                if ($value2['attributes'] === $subTypes){
                    if ((int)$qty > 0) {
                        $cart[$productId][$key]['quantity'] = $cart[$productId][$key]['quantity'] + (int)$qty;
                    }
                    else{

                        $cart[$productId][$key]['price'] = $cart[$productId][$key]['price'] + (int)$productPrice;

                    }
                 $found = true;
                }

            }

            if (!$found){

                    array_push($cart[$productId], [
                            "id" => $productId,
                            "name" => $productName,
                            "quantity" => $qty,
                            "price" => $productPrice,
                            "photo" => $productPhoto,
                            "attributes" => $subTypes
                        ]
                    );

            }


            session()->put('cart', $cart);
            return json_encode(['status' => 'ok','totalCart' => $this->countTotalCartItems($cart)]);


        }else {

           // if item not exist in cart then add to cart
           $cart[$productId][0] = [
               "id" => $productId,
               "name" => $productName,
               "quantity" => $qty,
               "price" => $productPrice,
               "photo" => $productPhoto,
               "attributes" => $subTypes
           ];


           session()->put('cart', $cart);
           return json_encode(['status' => 'ok','totalCart' => $this->countTotalCartItems($cart)]);
        }



    }


        public function cart(){
        $logo = $this->getLogo();
    $deliveryTypes =  $this->deliveryTypeService->index();
    $serviceFee = $this->serviceFeeService->index();
    $categories = $this->getCategories();

     //return $deliveryTypes;

    return view('storefront.cart', compact('deliveryTypes','serviceFee','logo','categories'));
    }


    public function updateCart(Request $request){

        $cart = session()->get('cart');

        $cart[$request->productId][$request->indexId]["quantity"] = $request->quantity;

        session()->put('cart', $cart);
       // return json_encode(['cart' => $cart]);
        return json_encode(['status' => 'ok','totalCart' => $this->countTotalCartItems($cart)]);
    }

    public function deleteFromCart(Request $request){

        if($request->productId) {

            $cart = session()->get('cart');

            if (isset($cart[$request->productId])) {

                unset($cart[$request->productId]);

                session()->put('cart', $cart);
            }
        }

        return json_encode(['status' => 'ok','totalCart' => $this->countTotalCartItems($cart)]);
    }

    public function deleteCart($id, Request $request){

        $key = $request->query('index');

        if($id) {

            $cart = session()->get('cart');

            if (isset($cart[$id][$key])) {

                unset($cart[$id][$key]);

                session()->put('cart', $cart);
            }
        }

        return redirect('/cart')->with('success', 'Item successfully removed from Cart!!!');
    }

    public function forgetCart(){
        session()->forget('cart');
    }


    public function countTotalCartItems($cart){
        $total = 0;
        foreach ($cart as $value){
            $total += count($value);
        }

        return $total;
    }


    public function checkoutForm($deliveryId){
        if (Auth::user()) {
            $logo = $this->getLogo();
            $serviceFee = $this->serviceFeeService->index();
            $categories = $this->getCategories();
            $deliveryDetails = $this->deliveryTypeService->edit(openssl_decrypt($deliveryId, "AES-128-ECB", $this->ENCRYPT_KEY));

            return view('storefront.checkout', compact('deliveryDetails', 'serviceFee','logo','categories'));
        }
        else{
            return redirect('/login');
        }

    }




    public function checkout(Request $request){
        $deliveryId = $request->deliveryId;
        if (Auth::user()){
            return redirect('checkout/'. openssl_encrypt($deliveryId, "AES-128-ECB", $this->ENCRYPT_KEY));
        }else{
            return redirect('/login');
        }
    }


    public function checkoutOrder(OrderRequest $request){
        $reference_code = $this->getGUID();
        $deliveryDetails = $this->deliveryTypeService->edit($request->deliveryId);
        $serviceFeeDetails = $this->serviceFeeService->index();
        $cart = session()->get('cart');
        $total = 0;
        $logo = $this->logoService->index();
        $deliveryTime = "";
        if ($deliveryDetails->type == "Hour"){
            $deliveryTime =  date("l jS F Y h:i:s A", strtotime('+'.$deliveryDetails->duration. ' hours'));
        }elseif($deliveryDetails->type == "Day"){
            $deliveryTime =  date("l jS F Y h:i:s A", strtotime('+'.$deliveryDetails->duration. ' days'));
        }


        foreach ($cart as $value1){
            foreach($value1 as $key1 => $value){
                $total += ((int)$value['quantity'] > 0) ? ((int)$value['quantity'] * (int)$value['price']) : (int)$value['price'];
            if(count($value['attributes']) > 0){

                $attributes = "";
                foreach ($value['attributes'] as $key => $value3){
                    $totalAttributes = (count($value3) - 1);
                    foreach ($value3 as $key2 => $value4){
                        $attributes = $attributes . key($value3) .":". $value4. ($key2 == $totalAttributes ? "" : ",");
                    }

                }

                $this->orderService->create([
                    'product_id' => $value['id'],
                    'qty' => $value['quantity'],
                    'sub_total' => ((int)$value['quantity'] == 0)? (int)$value['price'] :((int)$value['quantity'] * (int)$value['price']),
                    'variation_types' => $attributes,
                    'order_code' => $reference_code

                ]);


                $attributes = "";



            }else{
                $this->orderService->create([
                    'product_id' => $value['id'],
                    'qty' => $value['quantity'],
                    'sub_total' => ((int)$value['quantity'] == 0)? (int)$value['price'] :((int)$value['quantity'] * (int)$value['price']),
                    'order_code' => $reference_code

                ]);
            }
            }
        }

        $serviceFee = $total > 50000 ? ($serviceFeeDetails->higherSubtotal/100) * $total : ($serviceFeeDetails->lowerSubtotal/100) * $total;

        if ($request->payment  == "Online Payment"){
           $this->shippingService->create([
               'user_id' => Auth::user()->id,
               'billing_address' => $request->address,
               'billing_city' => $request->city,
               'billing_phone' => $request->phone,
               'billing_firstname' => $request->firstname,
               'billing_lastname'  => $request->lastname,
               'billing_state' => $request->state,
               'billing_email' => $request->email,
               'delivery_date' => $deliveryTime,
               'order_code' => $reference_code,
               'delivery_type_id' => $deliveryDetails->id,
               'delivery_fee' => $deliveryDetails->fee,
               'service_fee' => $serviceFee,
               'product_total'  => $total,
               'payment_method' => $request->payment,
               'online_ref_code' => $request->referenceCode
           ]);
        }elseif ($request->payment == "Pay on delivery"){
            $this->shippingService->create([
                'user_id' => Auth::user()->id,
                'billing_address' => $request->address,
                'billing_city' => $request->city,
                'billing_phone' => $request->phone,
                'billing_firstname' => $request->firstname,
                'billing_lastname'  => $request->lastname,
                'billing_state' => $request->state,
                'billing_email' => $request->email,
                'delivery_date' => $deliveryTime,
                'order_code' => $reference_code,
                'delivery_type_id' => $deliveryDetails->id,
                'delivery_fee' => $deliveryDetails->fee,
                'service_fee' => $serviceFee,
                'product_total'  => $total,
                'payment_method' => $request->payment
            ]);
        }else{
            Session::flash('error',  "Oops an error occurred");
            return redirect()->back();
        }





        Mail::to([Auth::user()->email])->send(
            new SendOrderToUser(
                Auth::user()->firstname, $reference_code, $logo->logoUrl,
                $cart,$deliveryDetails->fee, $serviceFee,
                ['shipping_firstname' => $request->firstname,
                 'shipping_lastname' => $request->lastnamee,
                 'shipping_email' => $request->email,
                 'shipping_phone' => $request->phone,
                    'shipping_state' => $request->state,
                    'shipping_city' => $request->city,
                    'shipping_address' => $request->address
                    ], $deliveryTime
                ));

        Mail::to(['nellyhr02@gmail.com'])->send(
            new SendOrderToAdmin(
          $reference_code, $logo->logoUrl,
                $cart,$deliveryDetails->fee, $serviceFee,
                ['shipping_firstname' => $request->firstname,
                    'shipping_lastname' => $request->lastname,
                    'shipping_email' => $request->email,
                    'shipping_phone' => $request->phone,
                    'shipping_state' => $request->state,
                    'shipping_city' => $request->city,
                    'shipping_address' => $request->address
                ], $deliveryTime
            ));

        session()->forget('cart');
        Session::flash('successOrder','Order successfully received');
        return redirect('/cart');

    }


   public function getGUID(){

        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = substr($charid, 20, 3)
            .substr($charid, 8, 3)
            .substr($charid,12, 3)
            .substr($charid,16, 3)
            .substr($charid,20,3);
        return $uuid;

    }



}
