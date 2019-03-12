<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Section6Request;
use App\Services\Section6Service;
use App\Services\CategoryService;

class Section6Controller extends Controller
{

    protected $section6Service;
    protected $categoryService;

    public function __construct(Section6Service $section6Service, CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->section6Service = $section6Service;
    }

    public function index(){
        $categories = $this->categoryService->index();
        $section6 = $this->section6Service->index();

        return view('backstore.page-layout.section6', compact('categories','section6'));
    }




    public function create (Section6Request $request){

      $this->section6Service->delete();
      $banner1 = $this->uploadBannerToCloudinary($request->file('banner1'));
      $banner2 = $this->uploadBannerToCloudinary($request->file('banner2'));

      $section6Details =  [
          'category1_id' => $request->category1,
          'product1List' =>  implode(", ", $request->product1List),
          'banner1Url' => $banner1,
          'category2_id' => $request->category2,
          'product2List' =>  implode(", ", $request->product2List),
          'banner2Url' => $banner2,
      ];

      $this->section6Service->add($section6Details);

      return back()->with(['status' => 'Successfully updated section 6']);

    }


    public  function  update (Request $request){

        $section6 = $this->section6Service->index();

        $banner1 = $section6->banner1Url;
        $banner2 = $section6->banner2Url;

        if ($request->hasFile('banner1')) {
            $banner1  =  $this->uploadBannerToCloudinary($request->file('banner1'));
        }


        if ($request->hasFile('banner2')) {
            $banner2  =  $this->uploadBannerToCloudinary($request->file('banner2'));
        }

        $section6Details =  [
            'category1_id' => $request->category1,
            'product1List' =>  implode(", ", $request->product1List),
            'banner1Url' => $banner1,
            'category2_id' => $request->category2,
            'product2List' =>  implode(", ", $request->product2List),
            'banner2Url' => $banner2,
        ];

        $this->section6Service->delete();
        $this->section6Service->add($section6Details);

        return back()->with(['status' => 'Successfully updated section 6']);


    }


    public function uploadBannerToCloudinary($image){
        \Cloudder::upload($image, 'frontend/assets/' . time(), array("width" => 570, "height" => 150,  "crop" => "fit"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }
}
