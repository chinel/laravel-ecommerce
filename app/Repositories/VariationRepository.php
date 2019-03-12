<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/4/2018
 * Time: 6:34 PM
 */

namespace App\Repositories;
use App\Variation;

class VariationRepository
{
   protected  $variation;

   public function __construct(Variation $variation)
   {
       $this->variation = $variation;
   }


    public function create($attributes){
        return $this->variation->create($attributes);
    }


    public function all(){
        return $this->variation->orderBy('created_at','DESC')->get();;
    }

    public function find($id){

        return $this->variation->find($id);
    }

    public function update($id, array $attributes){

        return $this->variation->find($id)->update($attributes);
    }

    public function delete($id){
        return $this->variation->find($id)->delete();
    }
}
