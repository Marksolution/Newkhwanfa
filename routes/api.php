<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/provinces','API\TambonController@getProvinces');
Route::get('/province/{province_code}/amphoes','API\TambonController@getAmphoes');
Route::get('/province/{province_code}/amphoe/{amphoe_code}/tambons','API\TambonController@getTambons');
Route::get('/province/{province_code}/amphoe/{amphoe_code}/tambon/{tambon_code}/zipcodes','API\TambonController@getZipcodes');
//เป็นตัวกำหนด Path ว่า Path นี้ให้ทำงานที่ Controller ไหน หรือ แสดง View ไหน
Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');

Route::resource('products', 'API\ProductController');    
Route::resource('promotions', 'API\PromotionController');    
Route::resource('carts', 'API\CartController');
Route::resource('personals', 'API\PersonalController');
Route::resource('prepares', 'API\PrepareController');
Route::resource('payments', 'API\PaymentController');
Route::resource('address', 'API\AddressController');

Route::middleware('auth:api')->group( function () {    
    //Route::resource('carts', 'API\CartController');
});
