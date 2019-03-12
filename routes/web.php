<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// FRONTEND ROUTES
Route::get('/', 'StoreFrontController@home');
Route::get('/product/{id}', 'StoreFrontController@product');
Route::get('/ajaxProduct/{id}', 'StoreFrontController@ajaxProduct');
Route::get('/ajaxReview/{id}','StoreFrontController@loadRating');
Route::get('/category/{id}', 'StoreFrontController@category');
Route::get('/subcategory/{id}','StoreFrontController@subcategory');
Route::get('/brand/{id}','StoreFrontController@brand');
Route::get('/cart', 'StoreFrontController@cart');
Route::post('/addToCart','StoreFrontController@addToCart');
Route::post('/updateCart','StoreFrontController@updateCart');
Route::get('/deleteCart/{id}','StoreFrontController@deleteCart');
Route::post('/deleteFromCart', 'StoreFrontController@deleteFromCart');
Route::get('/login','AccountController@loginForm');
Route::get('/register', 'AccountController@registerForm');

Route::post('/login', 'AccountController@login');
Route::post('/register', 'AccountController@register');
Route::get('/confirmAccount/{id}', 'AccountController@verifyAccount');
Route::get('/resendEmail', 'AccountController@resendEmail');
Route::get('/logout', 'AccountController@logout');
Route::get('/forgot-password','AccountController@forgotPasswordForm');
Route::post('/forgot-password','AccountController@forgotPassword');
Route::get('/resetPassword/{id}','AccountController@resetPasswordForm');
Route::post('/resetPassword','AccountController@resetPassword');
Route::get('/forgetCart', 'StoreFrontController@forgetCart');
Route::get('/search/products','ProductController@filterByKeywords');
Route::get('/search','StoreFrontController@searchForProducts');
Route::get('/checkIfUserIsLoggedIn','AccountController@checkIfUserIsLoggedIn');
Route::post('/writeReview','ProductReviewController@create');

/*
* AJAX ROUTE
* */
Route::get('/backstore/subCategories/{id}','CategoryController@getSubCategories');
Route::get('/backstore/getCategoryProducts/{id}','ProductController@getCategoryProducts');
Route::get('/backstore/getCategoryDetails/{id}','ProductController@getCategoryDetails');
Route::get('/backstore/getSubCategoryProducts/{id}','ProductController@getSubCategoryProducts');



Route::group(['middleware' => 'auth'], function() {
    Route::get('/checkout/{id}', 'StoreFrontController@checkoutForm');
    Route::post('/checkout', 'StoreFrontController@checkout');
    Route::post('/checkoutOrder', 'StoreFrontController@checkoutOrder');
    Route::get('/dashboard', 'UserController@userProfile');
    Route::post('/updateProfile', 'UserController@updateUserProfile');
    Route::get('/changePassword', 'UserController@changePassword');
    Route::post('/updatePassword', 'UserController@updateUserPassword');
    Route::get('/orders','UserController@userOrders');
    Route::get('/order/{id}','UserController@orderDetail');



// Backend Login
Route::get('/backstore', 'DashboardController@index');

/*
 * CATEGORIES ROUTES
 * */


Route::get('/backstore/categories', 'CategoryController@index');

Route::post('backstore/addCategory', 'CategoryController@create');

Route::get('backstore/edit-category/{id}','CategoryController@edit');

Route::get('backstore/delete-category/{id}','CategoryController@delete');

Route::post('backstore/updateCategory/{id}','CategoryController@update');



/*
 * SUB CATEGORIES ROUTES
 * */

Route::get('/backstore/subcategories', 'SubCategoryController@index');

Route::post('backstore/addSubCategory', 'SubCategoryController@create');

Route::get('backstore/edit-subcategory/{id}','SubCategoryController@edit');

Route::get('backstore/delete-subcategory/{id}','SubCategoryController@delete');

Route::post('backstore/updateSubCategory/{id}','SubCategoryController@update');


/*
 * BRANDS ROUTES
 * */

Route::get('/backstore/brands', 'BrandController@index');

Route::post('backstore/addBrand', 'BrandController@create');

Route::get('backstore/edit-brand/{id}','BrandController@edit');

Route::get('backstore/delete-brand/{id}','BrandController@delete');

Route::post('backstore/updateBrand/{id}','BrandController@update');



Route::post('backstore/addProductVariation', 'VariationController@create');

Route::get('backstore/edit-productVariation/{id}','VariationController@edit');

Route::get('backstore/delete-productVariation/{id}','VariationController@delete');

Route::post('backstore/updateProductVariation/{id}','VariationController@update');


Route::get('backstore/delete-productVariation/{id}','VariationController@delete');


/*
 *PRODUCTS ROUTE
 * */
Route::get('/backstore/products', 'ProductController@index');
Route::get('/backstore/new-product', 'ProductController@newProductForm');
Route::post('/backstore/addproduct','ProductController@create');
Route::get('/backstore/edit-product/{id}', 'ProductController@edit');

Route::post('/backstore/update-product/{id}','ProductController@update');
Route::get('/backstore/delete-product/{id}','ProductController@delete');



/*
 * DELIVERY TYPES ROUTES
 * */

Route::get('/backstore/deliverytypes','DeliveryTypeRequestController@index');
Route::get('/backstore/new-deliverytype', function () {
    return view('backstore.deliverytypes.new-deliverytype');});
Route::post('/backstore/addDeliveryType' ,'DeliveryTypeRequestController@create');
Route::get('/backstore/editDeliveryType/{id}' ,'DeliveryTypeRequestController@edit');
Route::post('/backstore/updateDeliveryType/{id}' ,'DeliveryTypeRequestController@update');
Route::get('/backstore/deleteDeliveryType/{id}' ,'DeliveryTypeRequestController@delete');



/*
 * ORDERS ROUTES
 * */

Route::get('/backstore/orders','OrderController@index');
Route::get('/backstore/view-order/{id}','OrderController@view');
Route::post('/backstore/updateOrder' ,'OrderController@update');


/*
 * USERS ROUTES
 * */

Route::get('/backstore/customers','AccountController@customers');
Route::get('/backstore/adminUsers','AccountController@adminUsers');
Route::post('/backstore/add-adminUser','AccountController@addAdminUser');
Route::get('/backstore/edit-adminUser/{id}' ,'AccountController@editAdminUser');
Route::post('/backstore/update-adminUser/{id}' ,'AccountController@updateAdminUser');

/*
 * CHANGE PASSWORD ROUTES
 * */
Route::get('/backstore/changePassword',function (){
    return view('backstore.change-password');
});
Route::post('/backstore/updatePassword','AccountController@updatePassword');



/*
 * PAGE LAYOUT ROUTES
 * */

Route::get('/backstore/logo','LogoController@index');
Route::post('/backstore/addLogo', 'LogoController@create');
Route::get('/backstore/sliders','SliderController@index');
Route::post('/backstore/addSliders','SliderController@create');
Route::post('/backstore/updateSliders','SliderController@update');
Route::get('/backstore/section1','Section1Controller@index');
Route::post('/backstore/addSection1','Section1Controller@create');
Route::get('/backstore/section2','Section2Controller@index');
Route::post('/backstore/addSection2','Section2Controller@create');
Route::post('/backstore/updateSection2','Section2Controller@update');
Route::get('/backstore/section3','Section3Controller@index');
Route::post('/backstore/addSection3','Section3Controller@create');
Route::post('/backstore/updateSection3','Section3Controller@update');
Route::get('/backstore/section8','Section8Controller@index');
Route::post('/backstore/addSection8','Section8Controller@create');
Route::post('/backstore/updateSection8','Section8Controller@update');
Route::get('/backstore/section5','Section5Controller@index');
Route::post('/backstore/addSection5','Section5Controller@create');
Route::post('/backstore/updateSection5','Section5Controller@update');
Route::get('/backstore/section6','Section6Controller@index');
Route::post('/backstore/addSection6','Section6Controller@create');
Route::post('/backstore/updateSection6','Section6Controller@update');
Route::get('/backstore/section4','Section4Controller@index');
Route::post('/backstore/addSection4','Section4Controller@create');
Route::post('/backstore/updateSection4','Section4Controller@update');
Route::get('/backstore/sidebarBanner','SideBarBannerController@index');
Route::post('/backstore/addSidebarBanner','SideBarBannerController@create');
Route::post('/backstore/updateSidebarBanner','SideBarBannerController@update');


/*
 * SERVICE FEE ROUTES
 */

Route::get('/backstore/serviceFee', 'ServiceFeeController@index');
Route::post('/backstore/addServiceFee','ServiceFeeController@create');

});
// Authentication routes...

Route::get('auth/login', 'AccountController@loginForm');

Route::post('auth/login', 'AccountController@login')->name('login');
Route::get('auth/logout', 'AccountController@logout');
