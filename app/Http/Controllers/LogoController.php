<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LogoService;
use App\Http\Requests\LogoRequest;

class LogoController extends Controller
{

    protected $logoService;
    public function __construct(LogoService $logoService)
    {
        $this->logoService = $logoService;
    }

    public function index(){

        $logo = $this->logoService->index();

        return view('backstore.page-layout.logo',compact('logo'));
    }

    public function create(LogoRequest $request){

        $logoUrl = $this->uploadLogoToCloudinary($request->file('logo'));

        $data = [
            'logoUrl' => $logoUrl
        ];

        $this->logoService->delete();

        $this->logoService->add($data);

        return back()->with(['status' => 'Logo successfully added']);

    }

    public function uploadLogoToCloudinary($image){
        \Cloudder::upload($image, 'frontend/assets/' . time(), array("width" => 200, "height" => 38,  "crop" => "fit"));

        $d = \Cloudder::getResult();
        return $d['url'];
    }

}
