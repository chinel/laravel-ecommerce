<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Section2Service;
use App\Services\CategoryService;
use App\Http\Requests\Section24Request;

class Section2Controller extends Controller
{

    protected  $section2Service;
    protected  $categoryService;

    public  function  __construct(Section2Service $section2Service, CategoryService $categoryService)
    {
        $this->section2Service = $section2Service;
        $this->categoryService = $categoryService;
    }


    public  function  index (){
        $section2 = $this->section2Service->index();
        $categories = $this->categoryService->getAllCategoriesWithProduct();

        return view('backstore.page-layout.section2', compact('section2','categories'));
    }


    public function create(Section24Request $request){
        $this->section2Service->delete();
        $bannerUrl = $this->uploadBannerToCloudinary($request->file('banner'));
        $section2Details = [
            'category_id' => $request->category_id,
            'brandlist' => implode(", ",$request->brandlist),
            'bannerUrl' =>  $bannerUrl,
            'subcategory1' => $request->subcategory1,
            'subcategory2' => $request->subcategory2,
            'subcategory3' =>  $request->subcategory3,
            'subcategory4' => $request->subcategory4,
            'subcategory5' => $request->subcategory5,
            'subcategory1_childlist'  => implode(", ", $request->subcategory1_childlist),
            'subcategory2_childlist' => implode(", ", $request->subcategory2_childlist),
            'subcategory3_childlist' => implode(", ", $request->subcategory3_childlist),
            'subcategory4_childlist' => implode(", " , $request->subcategory4_childlist),
            'subcategory5_childlist' => implode(", ", $request->subcategory5_childlist)
        ];

        $this->section2Service->add($section2Details);

        return back()->with(['status' => 'Successfully updated section 2']);
    }


    public function update(Request $request){
        $section2 = $this->section2Service->index();

        $bannerUrl =  $section2->bannerUrl;

        if ($request->hasFile('banner')) {
            $bannerUrl  =  $this->uploadBannerToCloudinary($request->file('banner'));
        }

        $this->section2Service->delete();
        $section2Details = [
            'category_id' => $request->category_id,
            'brandlist' => implode(", ",$request->brandlist),
            'bannerUrl' =>  $bannerUrl,
            'subcategory1' => $request->subcategory1,
            'subcategory2' => $request->subcategory2,
            'subcategory3' =>  $request->subcategory3,
            'subcategory4' => $request->subcategory4,
            'subcategory5' => $request->subcategory5,
            'subcategory1_childlist'  => implode(", ", $request->subcategory1_childlist),
            'subcategory2_childlist' => implode(", ", $request->subcategory2_childlist),
            'subcategory3_childlist' => implode(", ", $request->subcategory3_childlist),
            'subcategory4_childlist' => implode(", " , $request->subcategory4_childlist),
            'subcategory5_childlist' => implode(", ", $request->subcategory5_childlist)
        ];

        $this->section2Service->add($section2Details);

        return back()->with(['status' => 'Successfully updated section 2']);



    }


    public function uploadBannerToCloudinary($image){
        \Cloudder::upload($image, 'frontend/assets/' . time(), array("width" => 470, "height" => 500,  "crop" => "fit"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }

}
