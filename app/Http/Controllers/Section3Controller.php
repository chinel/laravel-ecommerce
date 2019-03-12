<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Section3Service;
use App\Http\Requests\Section3Request;
use App\Services\CategoryService;

class Section3Controller extends Controller
{
    protected $section3Service;
    protected $categoryService;
    public function __construct(Section3Service $section3Service, CategoryService $categoryService)
    {
        $this->section3Service = $section3Service;
        $this->categoryService = $categoryService;
    }


    public function  index(){

        $section3 = $this->section3Service->index();
        $categories = $this->categoryService->index();

        return view('backstore.page-layout.section3', compact('section3','categories'));
    }

    public function create(Section3Request $request){

        $banner = $this->uploadBannerToCloudinary($request->file('banner'));

        $section3Details = [
            'bannerUrl' => $banner,
            'categoryId' => $request->categoryId
        ];

        $this->section3Service->delete();
        $this->section3Service->add($section3Details);

        return back()->with(['status' => 'Section 3 successfully updated']);


    }




    public function update(Request $request){

        $bannerDetails = $this->section3Service->index();

        $banner = $bannerDetails->bannerUrl;

        if ($request->hasFile('banner')) {
            $banner = $this->uploadBannerToCloudinary($request->file('banner'));
        }

        $section3Details = [
            'bannerUrl' => $banner,
            'categoryId' => $request->categoryId
        ];

        $this->section3Service->delete();
        $this->section3Service->add($section3Details);

        return back()->with(['status' => 'Section 3 successfully updated']);


    }

    public function uploadBannerToCloudinary($image){
        \Cloudder::upload($image, 'frontend/assets/' . time(), array("width" => 1170, "height" => 150,  "crop" => "fit"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }
}
