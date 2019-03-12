<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Services\Section1Service;
use App\Services\CategoryService;
use App\Http\Requests\Section1Request;

class Section1Controller extends Controller
{

    protected $section1Service;
    protected $categoryService;
    public function __construct(Section1Service $section1Service, CategoryService $categoryService)
    {
       $this->section1Service = $section1Service;
       $this->categoryService = $categoryService;
    }

    public function index (){
        $section1 = $this->section1Service->index();

        $categories = $this->categoryService->getAllCategoriesWithProduct();

        return view('backstore.page-layout.section1', compact('section1','categories'));
    }

    public function create (Section1Request $request){
      $this->section1Service->delete();

      $section1Details = [
          'title' => $request->title,
          'category1' => $request->subcategory1,
          'productlist1' => implode(", ", $request->subcategory1_childlist),
          'category2' => $request->subcategory2,
          'productlist2' => implode(", ", $request->subcategory2_childlist),
          'category3' => $request->subcategory3,
          'productlist3' => implode(", ", $request->subcategory3_childlist),
          'category4' => $request->subcategory4,
          'productlist4' => implode(", ", $request->subcategory4_childlist),
          'category5' => $request->subcategory5,
          'productlist5' => implode(", ", $request->subcategory5_childlist),

      ];
      $this->section1Service->add($section1Details);

      return back()->with(['status' => 'Successfully updated section 1']);
    }
}
