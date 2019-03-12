<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/26/2018
 * Time: 8:31 AM
 */

namespace App\Services;
use App\Repositories\LogoRespository;
use illuminate\Http\Request;


class LogoService
{
    protected $logoRepository;
    public function __construct(LogoRespository $logoRespository)
    {
        $this->logoRepository = $logoRespository;
    }

    public function index(){

        return $this->logoRepository->index();
    }

    public function add ($attributes){

        return $this->logoRepository->add($attributes);
    }


    public function delete(){

        return $this->logoRepository->delete();
    }


}
