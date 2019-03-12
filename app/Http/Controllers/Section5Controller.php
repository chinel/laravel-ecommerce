<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Section5Request;
use App\Services\Section5Service;
use App\Services\CategoryService;

class Section5Controller extends Controller
{

    protected  $section5Service;
    protected $categoryService;

    public function __construct(Section5Service $section5Service, CategoryService $categoryService)
    {
        $this->section5Service = $section5Service;
        $this->categoryService = $categoryService;

    }

    public function  index(){

        $section5 = $this->section5Service->index();
        $categories = $this->categoryService->index();

        return view('backstore.page-layout.section5', compact('section5', 'categories'));
    }


    public function  create (Section5Request $request){

        $banner1 = $this->uploadBannerToCloudinary($request->file('banner1'));
        $banner2 = $this->uploadBannerToCloudinary($request->file('banner2'));

        $section5Details = [
            'banner1Url' => $banner1,
            'banner2Url' => $banner2,
            'banner1CategoryId' => $request->banner1CategoryId,
            'banner2CategoryId' => $request->banner2CategoryId
        ];

        $this->section5Service->delete();
        $this->section5Service->add($section5Details);

        return back()->with(['status' => 'Section 5 successfully updated']);

    }


    public function  update (Request $request){

        $section5 = $this->section5Service->index();

        $banner1 = $section5->banner1Url;
        $banner2 = $section5->banner2Url;

        if ($request->hasFile('banner1')) {
            $banner1 = $this->uploadBannerToCloudinary($request->file('banner1'));
        }

        if ($request->hasFile('banner2')) {
            $banner2 = $this->uploadBannerToCloudinary($request->file('banner2'));
        }


        $section5Details = [
            'banner1Url' => $banner1,
            'banner2Url' => $banner2,
            'banner1CategoryId' => $request->banner1CategoryId,
            'banner2CategoryId' => $request->banner2CategoryId
        ];

        $this->section5Service->delete();
        $this->section5Service->add($section5Details);

        return back()->with(['status' => 'Section 5 successfully updated']);

    }



    public function uploadBannerToCloudinary($image){
        \Cloudder::upload($image, 'frontend/assets/' . time(), array("width" => 570, "height" => 400,  "crop" => "fit"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }

}
