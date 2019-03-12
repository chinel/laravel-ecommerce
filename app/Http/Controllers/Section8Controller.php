<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Section8Request;
use App\Services\Section8Service;
use App\Services\CategoryService;

class Section8Controller extends Controller
{
    protected $section8Service;
    protected $categoryService;
    public function __construct(Section8Service $section8Service, CategoryService $categoryService)
    {
        $this->section8Service = $section8Service;
        $this->categoryService = $categoryService;
    }

    public function index(){

        $section8 = $this->section8Service->index();
        $categories = $this->categoryService->index();

        return view('backstore.page-layout.section8', compact('section8','categories'));
    }


    public function create(Section8Request $request){
        $banner = $this->uploadBannerToCloudinary($request->file('banner'));

        $section8Details = [
            'bannerUrl' => $banner,
            'categoryId' => $request->categoryId
        ];

        $this->section8Service->delete();
        $this->section8Service->add($section8Details);

        return back()->with(['status' => 'Section 8 successfully updated']);

    }


    public function update(Request $request){

        $bannerDetails = $this->section8Service->index();

        $banner = $bannerDetails->bannerUrl;
        if ($request->hasFile('banner')) {
            $banner = $this->uploadBannerToCloudinary($request->file('banner'));
        }

        $section8Details = [
            'bannerUrl' => $banner,
            'categoryId' => $request->categoryId
        ];

        $this->section8Service->delete();
        $this->section8Service->add($section8Details);

        return back()->with(['status' => 'Section 8 successfully updated']);

    }

    public function uploadBannerToCloudinary($image){
        \Cloudder::upload($image, 'frontend/assets/' . time(), array("width" => 1170, "height" => 150,  "crop" => "fit"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }
}
