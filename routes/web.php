<?php

use Illuminate\Support\Facades\Route;

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
Route::get('crop-image-upload', 'CropImageController@index')->name("index");
Route::post('crop-image-uploaddata ', 'CropImageController@uploadCropImage')->name("crop-image-uploaddata");

Route::get('/', function () {
    return view('first');
});
//show product
Route::get('/pluspro/{id}', 'CartController@pluspro')->name("pluspro");
Route::get('/minuspro/{id}', 'CartController@minuspro')->name("minuspro");
Route::post('/postproducttocart', 'CartController@postproducttocart')->name("postproducttocart");
Route::get('/detailproduct/{id}', 'SaleController@detailproduct')->name("detailproduct");
Route::post('/reviewpro', 'SaleController@reviewpro')->name("reviewpro");

Route::get('/tracking', 'SaleController@tracking')->name("tracking");
Route::get('/deleteproduct.{id}', 'CartController@delete')->name("deleteproduct");
//postdatatoOrder
Route::post('/postdataorder', 'CartController@postdataorder')->name("postdataorder");
//cart

Route::get('/selectaddress', 'CartController@selectaddress')->name("selectaddress");
Route::get('/cart/{id}', 'CartController@cart')->name("cart");
Route::get('/bill', 'CartController@bill')->name("bill");
Route::post('/postpromotiontocart', 'CartController@postpromotiontocart')->name("postpromotiontocart");
Route::post('/postdatatocart', 'CartController@postdatatocart')->name("postdatatocart");
Route::post('/salenow', 'CartController@salenow')->name("salenow");
Route::get('/deletecart.{id}', 'CartController@deletecart')->name("deletecart");
Route::get('/plus/{id}', 'CartController@plus')->name("plus");
Route::get('/minus/{id}', 'CartController@minus')->name("minus");
Route::get('/buyproduct', 'CartController@buyproduct')->name('buyproduct');
Route::post('/saveship', 'CartController@saveship')->name('saveship');
//address
Route::get('/deleteaddressme.{id}', 'SendaddressController@deleteaddressme')->name("deleteaddressme");
Route::get('/editaddress.{id}', 'SendaddressController@editaddress')->name('editaddress');
Route::get('/updatedataaddress', 'SendaddressController@updatedataaddress')->name('updatedataaddress');
Route::get('/updateaddress', 'SendaddressController@updateaddress')->name('updateaddress');

//tracking
Route::get('/statustack', 'TrackingController@statustack')->name('statustack');
//buy product
Route::get('/senddataaddress', 'SendaddressController@senddataaddress')->name('senddataaddress');
//guidebook
Route::get('/guidebook', 'SaleController@guidebook')->name('guidebook');

Route::get('/newaddressUser', 'SendaddressController@newaddressUser')->name('newaddressUser');
Route::get('/newaddressbuy', 'SendaddressController@newaddressbuy')->name('newaddressbuy');

Route::get('/sendaddress', 'SendaddressController@sendaddress')->name('sendaddress');

//show promotion
Route::get('/promotion_', 'SaleController@viewpromotion')->name("viewpromotion");
Route::get('/detailpromotion/{id}', 'SaleController@detailpromotion')->name("detailpromotion");
Route::get('/pluspromotion/{id}', 'CartController@pluspromotion')->name("pluspromotion");
Route::get('/minuspromotion/{id}', 'CartController@minuspromotion')->name("minuspromotion");
//show producttype
Route::get('/viewtype.{id}', 'SaleController@viewtype')->name("viewtype");

//--------------------------------------------------------------------------------
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');



//promotion
Route::get('/Promotion', 'PromotionController@table_promotion')->name('promotion');
//action promotion
Route::post('/createnewpromotion', 'PromotionController@createnewpromotion')->name("createnewpromotion");
Route::post('/Update_editpromotion', 'PromotionController@update_editpromotion')->name("update_editpro");
Route::get('/deletepromotion.{id}', 'PromotionController@deletepromotion')->name("deletepromotion");
Route::get('/New_promotion', 'PromotionController@new_promotion')->name('newpromotion');
Route::get('/editpromotion.{id}', 'PromotionController@editpromotion')->name("order");

//add new product page
Route::post('/createnewproduct', 'Shop_Controller@createnewproduct')->name("createnewproduct");
Route::post('/Update', 'Shop_Controller@update_edit')->name("update_edit");
Route::get('/delete.{id}', 'Shop_Controller@delete')->name("delete");
Route::get('/New_product', 'Shop_Controller@new_product')->name('newproduct');
Route::get('/editproduct.{id}', 'Shop_Controller@editproduct')->name("order");

//Route::get('/Producttype.{id}', 'Shop_Controller@type')->name("type");

//main page
Route::get('/Shop_warehouse', 'Shop_Controller@shop_warehouse')->name('shop');
Route::get('/Login-backennd', 'SaleController@loginbackend')->name('loginbackend');
Route::get('/', 'SaleController@first_data')->name('first_data');

//shop
Route::post('/edit', 'ShopController@edit')->name("edit");
Route::get('/myshop', 'Shop_Controller@myshop')->name('myshop');
Route::get('/adddress', 'Shop_Controller@newaddress')->name('newaddress');
Route::get('/province', 'Shop_Controller@province')->name('province');
Route::post('/createshop', 'Shop_Controller@createnewshop')->name("createshop");
Route::post('/province/fetch', 'Shop_Controller@fetch')->name("fetch");


//coupon
Route::get('/Coupon', 'CouponController@Coupon')->name('coupon');
Route::get('/NewCoupon', 'CouponController@newcoupon')->name('newcoupon');
Route::post('/createnewcoupon', 'CouponController@createnewcoupon')->name("createnewcoupon");
Route::get('/editcoupon.{id}', 'CouponController@editcoupon')->name("editcoupon");
Route::get('/deletecoupon.{id}', 'CouponController@deletecoupon')->name("deletecoupon");
Route::post('/Update_editcoupon', 'CouponController@update_editcoupon')->name("update_editcoupon");

//--------------------------API
Route::get('/tambon', function () {
    return view("newaddress");
});

//order
Route::get('/order', 'OrderController@index')->name("order");
Route::get('/orderdetail/{id}', 'OrderController@orderdetail_shop');
Route::post('/orderupdate', 'OrderController@update')->name('orderupdate');

//payment
Route::get('/payment/{id}', 'PaymentController@detail');

Route::post('/paymentupdate', 'PaymentController@update')->name("paymentupdate");

//trackin api
Route::get('/tracking/{id}', 'TrackingController@detail');

Route::middleware(['admin'])->group(function () {
    Route::get('/shops', 'Shop_Controller@index')->name("shops");
    Route::get('/shops/{id}', 'Shop_Controller@detail');
    Route::post('/tranfermoney', 'Shop_Controller@tranfermoney')->name("tranfermoney");
    Route::get('/clearmoney', 'Shop_Controller@clearmoney')->name("clearmoney");
    Route::get('/addminclearmoney/{id}', 'Shop_Controller@addminclearmoney')->name("addminclearmoney");
    Route::get('/detailclearmoney/{id}', 'Shop_Controller@detailclearmoney')->name("detailclearmoney");
    //producttype
    Route::get('/producttype', 'ProducttypeController@index')->name("producttype");
    Route::get('/producttypeDelete/{id}', 'ProducttypeController@delete')->name("delete");
    Route::get('/producttype/{id}', 'ProducttypeController@detail');
    Route::post('/producttypeupdate', 'ProducttypeController@update')->name("producttypeupdate");
    Route::get('/producttypecreate', 'ProducttypeController@create');
    Route::post('/producttypeinsert', 'ProducttypeController@insert')->name("producttypeinsert");
    //user
    Route::get('/users', 'UserController@index')->name("users");
    Route::get('/users/{id}', 'UserController@detail');
    Route::post('/usersupdate', 'UserController@update')->name("usersupdate");
});