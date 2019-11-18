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
//
//Route::get('/', function () {
//    return view('fontEnd.master');
//});

Route::get('/','WelcomeController@index');
Route::get('/catagory/{id}','WelcomeController@catagory');
Route::get('/contact','WelcomeController@contact');
Route::post('/customer/info','WelcomeController@storeCustomer');
Route::get('/manage/customer','WelcomeController@manageCustomer');
Route::get('/single/view/{id}','WelcomeController@productDetails');

//Cart info
Route::get('/add-To-Cart{id}','cartController@addToCart');
Route::get('/showCart/','cartController@showCart');
Route::get('remove/to-cart{id}','cartController@removeCart');
Route::post('cart/update','cartController@updateCart')->name('cart/update');
Route::get('empty/cart','cartController@emptyCart')->name('empty/cart');

//checkout info
Route::get('/checkout','checkOutController@index')->name('/checkout');
Route::post('/checkout/sign-up','checkOutController@signUp')->name('/checkout/sign-up');
Route::get('/checkOut/shipping','checkOutController@showShippingForm')->name('/checkOut/shipping');
Route::post('/checkOut/save/shipping','checkOutController@storeShipping')->name('/checkOut/save/shipping');
Route::get('/checkOut/payment','checkOutController@showPaymentForm')->name('/checkOut/payment');
Route::post('/checkOut/save/order','checkOutController@saveOrder')->name('/checkOut/save/order');
Route::get('/customer/home','checkOutController@customerHome')->name('/customer/home');
Auth::routes();

Route::get('/homeContain', 'HomeController@index') ;


//MiddleWare class

Route::group(['middleware'=>'authenticateMiddleware'],function(){

    // Category Info

Route::get('/addCategory','categoryController@createCategory');
Route::post('/Category/save','categoryController@storeCategory');
Route::get('/category/manage','categoryController@manageCategory');
Route::get('/category/edit/{id}','categoryController@editCategory');
Route::post('/Category/update','categoryController@updateCategory');
Route::get('/category/delete/{id}','categoryController@deleteCategory');

// Manufacture info

Route::get('/add/Manufacture','manufactureController@addManufacture');
Route::post('/save/manufacture','manufactureController@storeManufacture');
Route::get('/Manufacture/manage','manufactureController@manageManufacture');
Route::get('/edit/manufacture/{id}','manufactureController@editManufacture');
Route::post('/update/manufacture','manufactureController@updateManufacture');
Route::get('/delete/manufacture/{id}','manufactureController@deleteManufacture');

 //product info

Route::get('/add/product','productController@createProduct');
Route::post('/Product/save','productController@storeProduct');
Route::get('/product/manage','productController@manageProduct');
Route::get('/product/Details/{id}','productController@viewProduct');
Route::get('/edit/product/{id}','productController@editProduct');
Route::post('/Product/update','productController@updateProduct');
Route::get('/delete/product/{id}','productController@deleteProduct');

//user info
Route::get('/addUser','userController@addUser');
Route::post('/user/save','userController@storeUser');
Route::get('/manage/user','userController@manageUser');

});

Route::get('/add/image','slideImageController@addImage')->name('/add/image');
Route::post('/slideImage/save','slideImageController@storeImage')->name('/slideImage/save');
Route::get('/image/manage','slideImageController@manageImage')->name('/image/manage');