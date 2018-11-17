<?php

use Illuminate\Support\Facades\Auth;

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
    if (Auth::user()) {
        return redirect('/home');
    }
    return view('users.homes.index');
});

Auth::routes(['verify' => true]);

Route::get('/login', function() {
    return redirect('/');
})->name('login');

Route::get('/profile', function () {
    return 'This is Profile';
})->middleware('verified');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('/carts', 'CartController@index');

Route::middleware(['auth'])->group(function () {
    Route::post('/profile/edit/{id}', 'ProfileController@updateAddress');
    Route::get('/profile/{id}', 'ProfileController@getProfile');

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', 'AdminController@index');
        Route::post('/merchantconfirmed/{id}', 'MerchantController@updateConfirm');
        Route::get('/merchantconfirmed', 'MerchantController@merchantbeforeconfirmed');

        Route::get('/roles', 'RoleController@index');
        Route::post('/roles/store', 'RoleController@store');
        Route::post('/roles/update/{id}', 'RoleController@update');

        Route::get('/permissions', 'PermissionController@index');
        Route::post('/permissions/store', 'PermissionController@store');
        Route::post('/permissions/update/{id}', 'PermissionController@update');

        Route::get('/orderconfirm', 'OrderController@ordercustomer');
        Route::post('/orderconfirm/{id}', 'OrderController@orderconfirm');
    });

    Route::middleware('role:merchant')->group(function () {
        Route::get('/merchant', 'MerchantController@index');

        Route::prefix('/merchant/products')->group(function () {
            Route::get('/', 'MerchantController@products');
        });
        Route::get('/merchant/orders', 'MerchantController@orders');
        Route::get('/ordermasuk','MerchantController@ordermasuk');
    });

    Route::middleware('role:customer')->group(function () {
        Route::post('/carts/delete/{id}', 'CartController@destroy');

        Route::get('/shipping', 'ShippingController@index');
    });

    Route::middleware('role:costumer|admin')->group(function () {

    });

    Route::middleware('role:merchant|admin')->group(function () {
        Route::get('/products', 'ProductController@index');
        Route::get('/products/create', 'ProductController@create');
        Route::get('/products/edit/{id}', 'ProductController@edit');
        Route::post('/products/delete/{id}', 'ProductController@destroy');
        Route::post('/products/update/{id}', 'ProductController@update');
        Route::post('/products/store', 'ProductController@store');

        Route::prefix('/orders')->group(function () {
            Route::get('/', 'TransactionController@index');
        });
    });

    Route::middleware('role:merchant|customer')->group(function () {

    });

    Route::get('/home', 'HomeController@index');
});

Route::get('/products/{id}', 'ProductController@show');

