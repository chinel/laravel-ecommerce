<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Section4Service;
use App\Services\CategoryService;
use App\Http\Requests\Section24Request;

class Section4Controller extends Controller
{
    protected  $section4Service;
    protected  $categoryService;

    public  function  __construct(Section4Service $section4Service, CategoryService $categoryService)
    {
        $this->section4Service = $section4Service;
        $this->categoryService = $categoryService;
    }


    public  function  index (){
        $section4 = $this->section4Service->index();
        $categories = $this->categoryService->getAllCategoriesWithProduct();

        return view('backstore.page-layout.section4', compact('section4','categories'));
    }


    public function create(Section24Request $request){
        $this->section4Service->delete();
        $bannerUrl = $this->uploadBannerToCloudinary($request->file('banner'));
        $section4Details = [
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

        $this->section4Service->add($section4Details);

        return back()->with(['status' => 'Successfully updated section 2']);
    }


    public function update(Request $request){
        $section4 = $this->section4Service->index();

        $bannerUrl =  $section4->bannerUrl;

        if ($request->hasFile('banner')) {
            $bannerUrl  =  $this->uploadBannerToCloudinary($request->file('banner'));
        }

        $this->section4Service->delete();
        $section4Details = [
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

        $this->section4Service->add($section4Details);

        return back()->with(['status' => 'Successfully updated section 2']);



    }


    public function uploadBannerToCloudinary($image){
        \Cloudder::upload($image, 'frontend/assets/' . time(), array("width" => 470, "height" => 500,  "crop" => "fit"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }
}
