<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/4/2018
 * Time: 6:38 PM
 */

namespace App\Services;
use App\Repositories\DeliveryTypeRepository;
use illuminate\Http\Request;

class DeliveryTypeService
{

    protected  $deliveryTypeRepository;
    public function __construct(DeliveryTypeRepository $deliveryTypeRepository)
    {
        $this->deliveryTypeRepository = $deliveryTypeRepository;

    }

    public function index(){
        return $this->deliveryTypeRepository->all();
    }

    public function create(Request $request){
        //return $request;
        $data = [
          'title' => $request->title,
          'type' => $request->type,
          'duration' => (int)$request->duration,
          'fee' => (int)$request->fee
        ];
        return $this->deliveryTypeRepository->create($data);
    }

    public function edit($id){

        return $this->deliveryTypeRepository->find($id);
    }

    public function update(Request $request, $id){

        $attributes = $request->all();

        return $this->deliveryTypeRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->deliveryTypeRepository->delete($id);
    }


}
