<?php

use function foo\func;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/test', 'HomeController@test');
    
    Route::middleware('role:admin')->group(function(){
        Route::get('/admin', 'AdminController@index');

        Route::get('/roles', 'RoleController@index');
        Route::post('/roles/store', 'RoleController@store');
        Route::post('/roles/update/{id}', 'RoleController@update');

        Route::get('/permissions', 'PermissionController@index');
        Route::post('/permissions/store', 'PermissionController@store');
        Route::post('/permissions/update/{id}', 'PermissionController@update');
    });
    Route::middleware('role:merchant')->group(function(){
        Route::get('/merchant', 'MerchantController@index');

        Route::prefix('/merchant/products')->group(function() {
            Route::get('/', 'MerchantController@products');
            Route::get('/create', 'ProductController@create');
        });
        Route::get('/merchant/orders', 'MerchantController@orders');
    });
    Route::middleware('role:costumer')->group(function(){
       //
    });

    Route::middleware('role:costumer|admin')->group(function(){
        Route::get('/products', 'ProductController@index');
    });

    Route::middleware('role:merchant|admin')->group(function(){
        Route::get('/products/create', 'ProductController@index');
        Route::post('/products/store', 'ProductController@store');
        Route::get('/products/edit/{id}', 'ProductController@edit');
        Route::post('/products/update/{id}', 'ProductController@update');
        Route::post('/products/delete/{id}', 'ProductController@destroy');
    });

    Route::middleware('role:merchant|costumer')->group(function(){
        
    });

    Route::middleware('role:admin|merchant|costumer')->group(function(){
        Route::get('/products/{id}', 'ProductController@show');
    });
});




