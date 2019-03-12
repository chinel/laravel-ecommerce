<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 1/11/2019
 * Time: 6:25 PM
 */

namespace App\Repositories;
use App\User;

class UserRepository
{
   protected $user;
   public function __construct(User $user)
   {
       $this->user = $user;
   }


   public function updateProfile($id, $details){
       $this->user->find($id)->update($details);
   }

   public function updatePassword($id, $password){

       $this->user->find($id)->update($password);
   }
}
