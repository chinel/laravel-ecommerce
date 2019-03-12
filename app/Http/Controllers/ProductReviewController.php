<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductReviewService;
use Auth;
use function redirect;
use Illuminate\Support\Facades\Session;

class ProductReviewController extends Controller
{
    protected  $productReviewService;

    public function __construct(ProductReviewService $productReviewService)
    {
        $this->productReviewService = $productReviewService;
    }




    public function create(Request $request){

      if(Auth::user()) {

          $check = $this->productReviewService->checkIfUserHasReviewedProduct(Auth::user()->id, $request->product_id);
     
      if(empty($check)){
          $this->productReviewService->create([
              'user_id' => Auth::user()->id,
              'product_id' => $request->product_id,
              'title' => $request->title,
              'content' => $request->review,
              'rating' => $request->rating
          ]);

          return response()->json(['status' => 'ok', 'message' => 'Thanks! You review has been sent']);

      }else{
          return response()->json(['status' => 'failed', 'message' => 'You have already sent a review for this product']);
      }
      }else{
          return response()->json(['status' => 'failed', 'message' => 'Please login to continue']);

      }


    }
}
