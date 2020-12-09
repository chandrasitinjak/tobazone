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
Route::get('product/{catProduct}/{productId}', 'API\ProductController@getSuggest');
Route::get('/merchant/products/{id}', 'API\ProductController@getProducts');
Route::resource('/transactions', 'API\TransactionController');
Route::resource('carts', 'API\CartController');
Route::post('wishlist', 'API\CartController@addToWishlist');
// Route::post('wishlist', 'API\CartController@addToWishlist');

Route::get('/carts/user/{id}', 'API\CartController@getUserCart');
Route::get('/provincies', 'API\RegionalController@getProvinces');
Route::get('/cities', 'API\RegionalController@getCities');
Route::get('/subdistricts', 'API\RegionalController@getSubdistricts');

Route::post('/shippingcost', 'API\RajaOngkirController@getShippingCost');
Route::get('/merchant/{id}/new-orders', 'API\OrderController@getNewOrdersByMerchant');
Route::get('/merchant/{id}/onprocess-orders', 'API\OrderController@getOnProcessOrdersByMerchant');
Route::post('/orders/{id}/update-shipping-number', 'API\OrderController@updateShippingNumber');
Route::post('/merchant/orders/{id}', 'API\OrderController@updateOrderStatus');
Route::get('/customer/{id}/transactions', 'API\TransactionController@getCustomerTransaction');
Route::get('/customer/{userId}/transaction/{tranId}', 'API\TransactionController@getTransaction');
Route::post('/transaction/{id}/proof-of-payment', 'API\TransactionController@updateProofOfPayment');
Route::post('/transaction/{id}/update-status', 'API\TransactionController@updateTransactionStatus');
Route::get('/transaction/{id}/tracking', 'API\TransactionController@getTrackingStatus');
Route::get('/product/search', 'API\ProductController@searchProduct');
Route::get('/product/ulos', 'API\ProductController@searchUlos');
Route::get('/product/pakaian', 'API\ProductController@searchPakaian');
Route::get('/product/makanan', 'API\ProductController@searchMakanan');
Route::get('/product/obat', 'API\ProductController@searchObat');
Route::get('/product/aksesoris', 'API\ProductController@searchAksesoris');
Route::post('/product/{id}/review', 'API\ProductController@addReview');
Route::post('/rating', 'API\RatingController@setRating')->name('setRating');
Route::get('/rating/{id}', 'API\RatingController@getRating')->name('getRating');
Route::get('/rating/{userid}/{productid}', 'API\RatingController@showRating')->name('showRating');


// Route::post('/transaction/{id}/update-status', 'API\TransactionController@updateTransactionStatus');
Route::post('/transaction/{id}/confirmByUser', 'API\TransactionController@confirmByUser');

// Route::get('/merchant/{id}/onprocess-orders', 'API\OrderController@getOnProcessOrdersByMerchant');
Route::get('/merchant/{id}/success-orders', 'API\OrderController@getSuccesOrdersByMerchant');
// Route::get('/merchant/detail-transaction/{id}', 'API\OrderController@getDetailSuccesOrdersByMerchant');
Route::get('/customer/{userId}/wishlists/{productId}', 'API\CartController@cekWishlist');
Route::get('/customer/{userId}/wishlists', 'API\CartController@myWishlist');


// Homestay routes


Route::middleware('role:merchant')->group(function () {
    Route::get('/homestay/create', 'HomestayController@index');
    Route::prefix('/merchant/products')->group(function () {
        Route::get('/', 'MerchantController@products');
    });

    Route::get('/merchant/{id}/new-orders', 'MerchantController@getNewOrders');
    Route::get('/merchant/{id}/ongoing-orders', 'MerchantController@getOngoingOrders');
    Route::get('/merchant/{id}/succes-orders', 'MerchantController@getSuccesOrder');
    Route::get('/merchant/{id}/view-profile', 'ProfileController@getMerchantProfile');

    Route::get('/merchant/detail-transaction/{id}', 'OrderController@getDetailSuccesOrdersByMerchant');
});
Route::get('/homestay/all', 'HomestayController@findAll');
Route::get('/product/get-product-terlaris', 'API\ProductController@getProductTerlaris');

//Paket Wisata
Route::get('/paket/get-paket-terbaru','API\PaketWisataController@getNewPackage');
