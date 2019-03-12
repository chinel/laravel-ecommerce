<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SubCategoryService;
use App\Services\CategorySubsService;
use App\Http\Requests\SubCategoryRequest;

class SubCategoryController extends Controller
{

    protected $subCategoryService;
    protected $categorySubService;
    public function __construct(CategorySubsService $categorySubsService, SubCategoryService $subCategoryService)
    {
        $this->subCategoryService = $subCategoryService;
        $this->categorySubService = $categorySubsService;
    }

    public function index(){

        $categories = $this->subCategoryService->index();

        return view('backstore.subcategories.subcategories', compact('categories'));
    }

    public function create (SubCategoryRequest $request){
        $result  = $this->subCategoryService->create($request);
        //return $result;
        return back()->with(['status'=>'Sub Category successfully created']);
    }

    public function edit($id){

        $subcategory = $this->subCategoryService->edit($id);

        return view('backstore.subcategories.edit_subcategories', compact('subcategory'));
    }


    public function update(SubCategoryRequest $request, $id){
        $this->subCategoryService->update($request, $id);

        return back()->with(['status' => 'Sub Category successfully updated']);
    }

    public function delete($id){

        $subcategoryProduct = $this->categorySubService->findCategoryWithSubcategoryId($id);

        if(empty($subcategoryProduct)){
            $this->subCategoryService->delete($id);
            return back()->with(['status' => 'Sub Category Successfully deleted']);
        }else{
            return back()->with(['error' => 'This sub category has been attached to a category']);
        }

    }
}
