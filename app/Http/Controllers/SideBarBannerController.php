<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SideBarBannerRequest;
use App\Services\SideBarBannerService;

class SideBarBannerController extends Controller
{

    protected $sideBarBannerService;
    public function __construct(SideBarBannerService $sideBarBannerService)
    {
        $this->sideBarBannerService = $sideBarBannerService;
    }

    public function  index(){

        $sideBarBanner = $this->sideBarBannerService->index();

        return view('backstore.page-layout.sidebar-banner', compact('sideBarBanner'));
    }


    public function  create (SideBarBannerRequest $request){

        $banner1 = $this->uploadBannerToCloudinary($request->file('banner1'));
        $banner2 = $this->uploadBannerToCloudinary($request->file('banner2'));
        $banner3 = $this->uploadBannerToCloudinary($request->file('banner3'));

        $sideBannerDetails = [
            'banner1' => $banner1,
            'banner1Url' => $request->banner1Url,
            'banner2' => $banner2,
            'banner2Url' => $request->banner2Url,
            'banner3' => $banner3,
            'banner3Url' => $request->banner3Url
        ];

        $this->sideBarBannerService->delete();
        $this->sideBarBannerService->add($sideBannerDetails);

        return back()->with(['status' => 'Side Banner successfully updated']);

    }


    public function  update (Request $request){

        $sideBarBanner = $this->sideBarBannerService->index();

        $banner1 = $sideBarBanner->banner1;
        $banner2 = $sideBarBanner->banner2;
        $banner3 = $sideBarBanner->banner3;

        if ($request->hasFile('banner1')) {
            $banner1 = $this->uploadBannerToCloudinary($request->file('banner1'));
        }

        if ($request->hasFile('banner2')) {
            $banner2 = $this->uploadBannerToCloudinary($request->file('banner2'));
        }

        if ($request->hasFile('banner3')) {
            $banner3 = $this->uploadBannerToCloudinary($request->file('banner3'));
        }


        $sideBannerDetails = [
            'banner1' => $banner1,
            'banner1Url' => $request->banner1Url,
            'banner2' => $banner2,
            'banner2Url' => $request->banner2Url,
            'banner3' => $banner3,
            'banner3Url' => $request->banner3Url
        ];

        $this->sideBarBannerService->delete();
        $this->sideBarBannerService->add($sideBannerDetails);

        return back()->with(['status' => 'Side Banner successfully updated']);

    }



    public function uploadBannerToCloudinary($image){
        \Cloudder::upload($image, 'frontend/assets/' . time(), array("width" => 270, "height" => 500,  "crop" => "fit"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }
}
