<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 1/11/2019
 * Time: 6:26 PM
 */

namespace App\Services;
use App\Repositories\UserRepository;


class UserService
{
  protected  $userRepository;

  public function __construct(UserRepository $userRepository)
  {
      $this->userRepository = $userRepository;
  }


  public function update($id, $details){

      return $this->userRepository->updateProfile($id, $details);
  }


  public function updatePassword($id, $password){

      return $this->userRepository->updateProfile($id, $password);
  }
}
