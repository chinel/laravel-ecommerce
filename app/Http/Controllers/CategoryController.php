<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Services\CategoryService;
use App\Http\Requests\CategoryRequest;
use App\Services\ProductCategoryService;
use App\Services\SubCategoryService;
use App\Services\CategorySubsService;

class CategoryController extends Controller
{

    protected  $categoryService;
    protected  $productCategoryService;
    protected  $subCategoryService;
    protected  $categorySubService;


    public function __construct(CategoryService $categoryService, ProductCategoryService $productCategoryService, CategorySubsService $categorySubsService, SubCategoryService $subCategoryService)
    {
        $this->categoryService = $categoryService;
        $this->productCategoryService = $productCategoryService;
        $this->subCategoryService = $subCategoryService;
        $this->categorySubService = $categorySubsService;
    }

    public function index(){

        $categories = $this->categoryService->index();
        $availableSubCategories = [];
        $subCategoryIds = $this->categorySubService->getAllSubCategoryIds();
        if(!empty($subCategoryIds)) {

            $availableSubCategories = $this->subCategoryService->getAllSubCategoryIdsNotInCategorySub($subCategoryIds);
        }else{

           $availableSubCategories = $this->subCategoryService->index();


        }


        return view('backstore.categories.categories', compact('categories','availableSubCategories'));
    }

    public function create (CategoryRequest $request){

        $whiteIconUrl =  $this->uploadWhiteIconToCloudinary($request->file('white_icon'));
        $blackIconUrl = $this->uploadBlackIconToCloudinary($request->file('black_icon'));
        $bannerUrl = $this->uploadBannerToCloudinary($request->file('banner'));

        $categoryDetails = [
            'title' => $request->title,
            'slug' => $request->slug,
            'bannerUrl' => $bannerUrl,
            'black_iconUrl' => $blackIconUrl,
            'white_iconUrl' => $whiteIconUrl
        ];

      $result  = $this->categoryService->create($categoryDetails);
      foreach ($request->subcategories as $subcategory){
        $this->categorySubService->create(['category_id' => $result->id , 'subcategory_id' => $subcategory]);
      }

     return back()->with(['status'=>'Category successfully created']);
    }

    public function edit($id){

     $category = $this->categoryService->edit($id);
        $allAssignedsubCategoryIds = $this->categorySubService->getAllSubCategoryIds();
        $allCategorySubIds = $this->categorySubService->getAllSubCategoryIdsWithCategory($id);

        $subCategoryIds = $this->subCategoryService->getAllSubIdsNotIn($allCategorySubIds);
        $assignedCategory = $this->subCategoryService->getAllSubIdsIn($allAssignedsubCategoryIds);

        foreach($subCategoryIds as $subCategoryId) {
            $assignedCategory->add($subCategoryId);
        }

      $subcategories =  $assignedCategory->toArray();


     return view('backstore.categories.edit-category', compact('category','subcategories','assignedCategory'));
    }


    public function update(Request $request, $id){
        $categoryDetail = $this->categoryService->edit($id);

        $black_iconUrl = $categoryDetail->black_iconUrl;
        $white_iconUrl = $categoryDetail->white_iconUrl;
        $banner_Url = $categoryDetail->bannerUrl;

        if ($request->hasFile('banner')) {
            $banner_Url =  $this->uploadBannerToCloudinary($request->file('banner'));
        }

        if ($request->hasFile('black_icon')) {
            $black_iconUrl =  $this->uploadBlackIconToCloudinary($request->file('black_icon'));
        }

        if ($request->hasFile('white_icon')) {
            $white_iconUrl =  $this->uploadWhiteIconToCloudinary($request->file('white_icon'));
        }

        $categoryInformation = [
            'title' => $request->title,
            'slug' => $request->slug,
            'bannerUrl' => $banner_Url,
            'white_iconUrl' => $white_iconUrl,
            'black_iconUrl' => $black_iconUrl
        ];

        $this->categoryService->update($categoryInformation, $id);

        $this->categorySubService->deleteSubCategoriesWithCategoryId($id);

        foreach ($request->subcategories as $subcategory){
            $this->categorySubService->create(['category_id' => $id , 'subcategory_id' => $subcategory]);
        }

        return back()->with(['status' => 'Category successfully updated']);
    }

    public function delete($id){

      $categoryProduct = $this->productCategoryService->findProductByCategory($id);

      if(empty($categoryProduct)){
          $this->categoryService->delete($id);
          return back()->with(['status' => 'Category Successfully deleted']);
      }else{
         return back()->with(['error' => 'This category has been attached to a product']);
      }

    }

    public function getSubCategories($id){

     $subcategories = $this->categorySubService->getAllSubCategoryDetailsWithCategoryId($id);

     return response()->json(['subcategories' =>  $subcategories]);
    }


    public function uploadBlackIconToCloudinary($image){
        \Cloudder::upload($image, 'categories/iconsBlack/' . time(), array("width" => 14, "height" => 21,  "crop" => "fit"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }


    public function uploadWhiteIconToCloudinary($image){
        \Cloudder::upload($image, 'categories/iconsWhite/' . time(), array("width" => 14, "height" => 21,  "crop" => "fit"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }


    public function uploadBannerToCloudinary($image){
        \Cloudder::upload($image, 'categories/banner/' . time(), array("width" => 1170, "height" => 385,  "crop" => "fit"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }
}
