<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products', 'API\ProductController');
Route::resource('carts', 'API\CartController');
Route::get('/carts/user/{id}', 'API\CartController@getUserCart');
Route::get('/provincies', 'API\RegionalController@getProvinces');
Route::get('/cities', 'API\RegionalController@getCities');
Route::get('/subdistricts', 'API\RegionalController@getSubdistricts');
Route::post('/shippingcost', 'API\RajaOngkirController@getShippingCost');