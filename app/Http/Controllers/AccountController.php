<?php

namespace App\Http\Controllers;

use App\Mail\SendAdminUserEmail;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Services\AccountService;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendConfirmation;
use App\Mail\SendForgotPassword;
use App\Services\LogoService;
use App\Services\UserService;
use Illuminate\Support\Facades\Session;
use function redirect;
use App\Http\Requests\LoginRequest;
use App\Services\CategoryService;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\CreateAdminRequest;
use Auth;
use App\Role;

class AccountController extends Controller
{

    protected $registerService;
    private $ENCRYPT_KEY = "SALT12345";
    protected $logoService;
    protected $categoryService;
    protected $userService;
    public function __construct(AccountService $accountService, LogoService $logoService, CategoryService $categoryService, UserService $userService)
    {
        $this->accountService =  $accountService;
        $this->logoService = $logoService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
    }


    public function getCategories(){

        return $this->categoryService->allOrderByName();
    }

    public function getLogo(){

        $logoDetails =  $this->logoService->index();
        return $logoDetails->logoUrl;
    }



    public function loginForm(){
        $logo = $this->getLogo();
        $categories = $this->getCategories();
        return view('storefront.login', compact('logo','categories'));
    }


    public function registerForm(){
        $logo = $this->getLogo();
        $categories = $this->getCategories();
        return view('storefront.register', compact('logo', 'categories'));
    }

    public function register(RegisterRequest $request){

     $userDetails = [
         'firstname' => $request->firstname,
         'lastname' => $request->lastname,
         'phone' => $request->phone,
         'email' => $request->email,
         'role_id' => 4,
         'password' => bcrypt($request->password)
     ];

     //return $userDetails;

     $this->accountService->create($userDetails);
     $logo = $this->logoService->index();

     $encryptEmail =  openssl_encrypt($userDetails['email'], "AES-128-ECB", $this->ENCRYPT_KEY);
     Mail::to([$userDetails['email']])->send(new SendConfirmation($userDetails['firstname'], $encryptEmail, $logo));
     return back()->with(['status'=> 'An email has been sent to you, please confirm to get started']);

    }

    public function verifyAccount($key){
        $decryptedKey = openssl_decrypt($key, "AES-128-ECB", $this->ENCRYPT_KEY);

        $this->accountService->verifyUser($decryptedKey);
        Session::flash('status','Your account has been verified');
        return redirect('/login');
    }

    public function login(LoginRequest $request){

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active' => true,'verified' => true])){


            if(\Auth::user()->role_id == 4){

                return redirect('/');



            }

            elseif(\Auth::user()->role_id == 3 || \Auth::user()->role_id == 2 || \Auth::user()->role_id == 1 ){


                return redirect('/backstore');


            }



        }
        elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active' => false])){
           return 3;
            Auth::logout();

            Session::flash('error','Your account has been deactivated,\n please contact support@ecommerce.com');
            return   redirect('/login');


        }
        elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'verified' => false])){
            return 3;
            Auth::logout();
            Session::put('userEmail', $request->email);

            Session::flash('verify','Your are yet to verify your account, Please check your email.');
            return   redirect('/login');
        }
        else{

            Session::flash('error','Invalid Email or Password');
            return   redirect('/login');

        }


    }

    public function resendEmail(){
   $userDetails = $this->accountService->getUserByEmail(Session::get('userEmail'));

        $logo = $this->logoService->index();

        $encryptEmail =  openssl_encrypt($userDetails->email, "AES-128-ECB", $this->ENCRYPT_KEY);
        Mail::to([$userDetails->email])->send(new SendConfirmation($userDetails->firstname, $encryptEmail, $logo->logoUrl));
        return back()->with(['status'=> 'An email has been sent to you again, please confirm to get started']);


    }

    public function checkIfUserIsLoggedIn(){
        if (Auth::user()) {

            return response()->json(['status' => 'success']);
        } else{
            return response()->json(['status' => 'failed']);
        }
    }

    public function forgotPasswordForm(){

        $logo = $this->getLogo();
        $categories = $this->getCategories();
        return view('storefront.forgot-password', compact('logo', 'categories'));
    }

    public function forgotPassword(ForgotPasswordRequest $request){
    $checkIfUserExist = $this->accountService->getUserByEmail($request->email);
        $logo = $this->getLogo();
    if (empty($checkIfUserExist))
    {
        Session::flash('error','This user does not exist');
        return redirect()->back();
    }

      else {


          $encryptEmail =  openssl_encrypt($checkIfUserExist->email, "AES-128-ECB", $this->ENCRYPT_KEY);
          Mail::to([$checkIfUserExist->email])->send(new SendForgotPassword($checkIfUserExist->firstname, $encryptEmail, $logo));
          return back()->with(['status'=> 'An email has been sent to you, click on the link to reset your password']);


      }

}


    public function  resetPasswordForm($userKey){
        $email = openssl_decrypt($userKey, "AES-128-ECB", $this->ENCRYPT_KEY);

        $logo = $this->getLogo();
        $categories = $this->getCategories();
        return view('storefront.reset-password', compact('logo', 'categories','email'));

    }

    public function resetPassword(ResetPasswordRequest $request){
        $this->accountService->updatePassword($request->email, bcrypt($request->password));

        Session::flash('status','Password reset successful');
        return redirect('/login');
    }


    public function customers(){

        $customers = $this->accountService->getAllCustomers();

        return view('backstore.users.customers',compact('customers'));
    }

    public function adminUsers(){

        $roles = Role::whereNotIn('id', [1,4])->get();
        $adminUsers = $this->accountService->getAllAdminUsers();

        return view('backstore.users.adminUsers', compact('roles','adminUsers'));
    }


    public function addAdminUser(CreateAdminRequest $request){
        $password = rand ( 10000 , 99999 );
        $logo = $this->getLogo();
        $this->accountService->createAdminUser([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' =>  $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($password),
            'role_id' => $request->role_id,
            'active' => 1,
            'verified' => 1,
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);

    Mail::to([$request->email])->send(new SendAdminUserEmail($request->firstname,$request->email,$password, $logo));
    return back()->with(['status'=> 'Successfully created Admin User']);


}

    public function editAdminUser($id){
        $adminUser = $this->accountService->getUserByUserId($id);
        $roles = Role::whereNotIn('id', [1,4])->get();

        return view('backstore.users.edit-adminUser', compact('adminUser','roles'));
    }


    public function updateAdminUser($id, Request $request){
     $this->accountService->updateAdminUser($id,[
         'firstname' => $request->firstname,
         'lastname' => $request->lastname,
         'email' =>  $request->email,
         'phone' => $request->phone,
         'role_id' => $request->role_id,
         'active' => $request->active,
     ]);

     return back()->with(['status' => 'Admin user successfully updated']);
    }

    public function updatePassword(Request $request){
       $this->userService->updatePassword(Auth::user()->id,['password'=> bcrypt($request->password)]);
        Auth::logout();
        return redirect('/login')->with(['status' => 'Password updated. Please login to continue']);
    }



    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
