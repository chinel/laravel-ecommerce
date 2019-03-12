<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SliderService;
use App\Http\Requests\SliderRequest;
use App\Services\CategoryService;

class SliderController extends Controller
{
    protected $sliderService;
    protected $categoryService;

    public function __construct(SliderService $sliderService, CategoryService $categoryService)
    {
        $this->sliderService =  $sliderService;
        $this->categoryService = $categoryService;
    }

    public function index(){
        $sliders = $this->sliderService->index();
        $categories = $this->categoryService->index();

        return view('backstore.page-layout.slider',compact('sliders','categories'));
    }


    public function create(SliderRequest $request){

        $bigSlider1 = $this->uploadBigSliderToCloudinary($request->file('big_slider1'));
        $bigSlider2 = $this->uploadBigSliderToCloudinary($request->file('big_slider2'));
        $bigSlider3 = $this->uploadBigSliderToCloudinary($request->file('big_slider3'));

        $smallSlider1 = $this->uploadSmallSliderToCloudinary($request->file('small_slider1'));
        $smallSlider2 = $this->uploadSmallSliderToCloudinary($request->file('small_slider2'));
        $smallSlider3 = $this->uploadSmallSliderToCloudinary($request->file('small_slider3'));

        $sliderDetails = [
            'big_slider1Url' => $bigSlider1,
            'big_slider1CategoryId' => $request->big_slider1CategoryId,
            'big_slider2Url' => $bigSlider2,
            'big_slider2categoryId' => $request->big_slider2categoryId,
            'big_slider3Url' => $bigSlider3,
            'big_slider3CategoryId' => $request->big_slider3CategoryId,
            'small_slider1Url' => $smallSlider1,
            'small_slider1CategoryId' => $request->small_slider1CategoryId,
            'small_slider2Url' => $smallSlider2,
            'small_slider2CategoryId' => $request->small_slider2CategoryId,
            'small_slider3Url' => $smallSlider3,
            'small_slider3CategoryId' => $request->small_slider3CategoryId
        ];


        $this->sliderService->delete();
        $this->sliderService->add($sliderDetails);

        return back()->with(['status' => 'Slider successfully added']);

    }


    public function update(Request $request){

        $sliders = $this->sliderService->index();

        $bigSlider1 = $sliders->big_slider1Url;
        $bigSlider2 = $sliders->big_slider2Url;
        $bigSlider3 = $sliders->big_slider3Url;

        $smallSlider1 = $sliders->small_slider1Url;
        $smallSlider2 = $sliders->small_slider2Url;
        $smallSlider3 = $sliders->small_slider3Url;


        if ($request->hasFile('big_slider1')) {
            $bigSlider1 = $this->uploadBigSliderToCloudinary($request->file('big_slider1'));
        }

        if ($request->hasFile('big_slider2')) {
            $bigSlider2 = $this->uploadBigSliderToCloudinary($request->file('big_slider2'));
        }

        if ($request->hasFile('big_slider3')) {
            $bigSlider3 = $this->uploadBigSliderToCloudinary($request->file('big_slider3'));
        }


        if ($request->hasFile('small_slider1')) {
            $smallSlider1 = $this->uploadSmallSliderToCloudinary($request->file('small_slider1'));
        }

        if ($request->hasFile('small_slider2')) {
            $smallSlider2 = $this->uploadSmallSliderToCloudinary($request->file('small_slider2'));
        }

        if ($request->hasFile('small_slider3')) {
            $smallSlider3 = $this->uploadSmallSliderToCloudinary($request->file('small_slider3'));
        }



        $sliderDetails = [
            'big_slider1Url' => $bigSlider1,
            'big_slider1CategoryId' => $request->big_slider1CategoryId,
            'big_slider2Url' => $bigSlider2,
            'big_slider2categoryId' => $request->big_slider2categoryId,
            'big_slider3Url' => $bigSlider3,
            'big_slider3CategoryId' => $request->big_slider3CategoryId,
            'small_slider1Url' => $smallSlider1,
            'small_slider1CategoryId' => $request->small_slider1CategoryId,
            'small_slider2Url' => $smallSlider2,
            'small_slider2CategoryId' => $request->small_slider2CategoryId,
            'small_slider3Url' => $smallSlider3,
            'small_slider3CategoryId' => $request->small_slider3CategoryId
        ];


        $this->sliderService->delete();
        $this->sliderService->add($sliderDetails);

        return back()->with(['status' => 'Slider successfully added']);

    }




    public function uploadBigSliderToCloudinary($image){
        \Cloudder::upload($image, 'frontend/assets/' . time(), array("width" => 900, "height" => 360,  "crop" => "fit"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }

    public function uploadSmallSliderToCloudinary($image){
        \Cloudder::upload($image, 'frontend/assets/' . time(), array("width" => 300, "height" => 230,  "crop" => "fit"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }
}
