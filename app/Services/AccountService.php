<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 1/8/2019
 * Time: 7:19 AM
 */

namespace App\Services;
use App\Repositories\AccountRepository;

class AccountService
{

    protected $accountRepository;
    public function __construct(AccountRepository $accountRepository)
    {
       $this->accountRepository =  $accountRepository;
    }

    public function create($attributes){
        return $this->accountRepository->create($attributes);
    }

    public function verifyUser($user){
        return $this->accountRepository->verifyUser($user);
    }

    public function getUserByEmail($email){

        return $this->accountRepository->getUserByEmail($email);
    }


    public function updatePassword($email, $passsword){
        return $this->accountRepository->updatePassword($email, $passsword);
    }

    public function getUserByUserId($userId){
       return $this->accountRepository->getUserByUserId($userId);
    }

    public function getAllCustomers(){

        return $this->accountRepository->getAllCustomers();
    }

    public function getAllAdminUsers(){

        return $this->accountRepository->getAllAdminUsers();
    }

    public function createAdminUser($attributes){

        return $this->accountRepository->createAdminUser($attributes);
    }

    public function updateAdminUser($id, $attributes){

        return $this->accountRepository->updateAdminUser($id, $attributes);
    }
}
