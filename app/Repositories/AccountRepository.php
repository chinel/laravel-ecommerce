<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 1/8/2019
 * Time: 7:18 AM
 */

namespace App\Repositories;
use App\User;
use Carbon\Carbon;

class AccountRepository
{

 protected $user;
 public function __construct(User $user)
 {
     $this->user = $user;
 }

 public function create($attributes){

     return $this->user->create($attributes);
 }

 public function verifyUser($user){
     return $this->user->where('email', $user)->update(['verified' => true,'email_verified_at'=>Carbon::now()]);
 }

 public function getUserByEmail($email){

     return $this->user->where('email', $email)->first();
 }

public function updatePassword($email, $password){

     return $this->user->where('email', $email)->update(['password' => $password]);
}

public function getUserByUserId($userId){

     return $this->user::find($userId);
}


public function getAllCustomers(){

     return $this->user->where('role_id',4)->orderBy('created_at','DESC')->get();
}

public function getAllAdminUsers(){

     return $this->user->where('role_id', '!=', 4)->orderBy('created_at','DESC')->get();
}

public function createAdminUser($attributes){

     return $this->user->create($attributes);
}

public function updateAdminUser($id, $attributes){

     return $this->user->find($id)->update($attributes);
}

}
