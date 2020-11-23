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
/*
    Visit Toba
*/

//Route::get('/paket',)->name('paket');

/*
    End Visit Toba
*/


Route::get('/', function () {
    if (Auth::user()) {
        return redirect('/home');
    }

    //maintenance
    // return view('maintenance.index');

    //not maintenance
    return view('users.homes.index');
});

Route::get('/login', function () {
    return redirect('/');
})->name('login');

Route::get('/listlogin', function(){
   return view('users.auth.listlogin');
});
//Auth::routes(['verify' => true]);
//login
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login/{role}', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


//register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('/profile', function () {
    return 'This is Profile';
})->middleware('verified');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('/carts', 'CartController@index');
Route::get('/get-banners', 'BannerController@getBanners');
Route::get('/blogs', 'BlogController@showBlogs');
Route::get('/get-blogs', 'BlogController@getBlogs');
Route::get('/get-carousels', 'CarouselController@getCarousels');
Route::get('/search', 'ProductController@searchProduct');
Route::get('/product/ulos', 'ProductController@searchProductByUlos');
Route::get('/product/pakaian', 'ProductController@searchProductByPakaian');
Route::get('/product/makanan', 'ProductController@searchProductByMakanan');
Route::get('/product/aksesoris', 'ProductController@searchProductByAksesoris');
Route::get('/product/obat', 'ProductController@searchProductByObat');


Route::middleware(['auth', 'verified', 'verifiedByAdmin'])->group(function () {
    Route::post('/profile/edit/{id}', 'ProfileController@updateAddress');
    Route::get('/profile/{id}', 'ProfileController@getProfile');
    Route::get('/unverified', 'HomeController@showUnverifiedPage');

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', 'AdminController@index');
        Route::post('/merchantconfirmed/{id}', 'MerchantController@updateConfirm');
        Route::get('/admin/new-merchant', 'MerchantController@newMerchant');
        Route::get('/admin/new-order', 'TransactionController@getNewOrder');
        Route::get('/admin/paid-order', 'TransactionController@getPaidOrder');
        Route::get('/admin/unpaid-order', 'TransactionController@getUnpaidOrder');
        Route::get('/admin/invalid-order', 'TransactionController@getInvalidOrder');
        Route::get('/admin/successed-order', 'TransactionController@getSuccessedOrder');
        Route::get('/admin/onprocess-order', 'TransactionController@getOnProcessOrder');

        Route::get('/admin/rejected-order', 'TransactionController@getRejectedOrder');
        Route::get('/admin/rejected-order-detail/{id}', 'TransactionController@getRejectedOrderDetail');
        Route::get('/admin/invalid-order-detail/{id}', 'TransactionController@getInvalidOrderDetail');
        Route::get('/admin/success-order-detail/{id}', 'TransactionController@getSuccessOrderDetail');
        Route::get('/admin/onprocess-order-detail/{id}', 'TransactionController@getOnProcessOrderDetail');

        Route::get('/admin/new-order/order-detail', 'OrderController@detailOrder');
        Route::get('/admin/list-merchant', 'MerchantController@listMerchant');
        Route::get('/admin/list-merchant/merchant-detail/{id}', 'MerchantController@detailMerchant');
        Route::get('/admin/new-order-detail/{id}', 'TransactionController@getTransactionDetail');
        Route::get('/admin/unpaid-order-detail/{id}', 'TransactionController@getUnpaidTransactionDetail');
        Route::get('/admin/paid-order-detail/{id}', 'TransactionController@getPaidTransactionDetail');
        Route::post('/transaction/update-status/{id}', 'TransactionController@updateStatus');
        Route::get('/admin/profile', 'AdminController@showProfile');
        Route::get('/admin/edit-profile', 'AdminController@editProfile');
        Route::get('/admin/show-password', 'AdminController@showChangePassword');
        Route::post('/admin/update-profile', 'AdminController@updateProfile');
        Route::post('/admin/edit-password', 'AdminController@editPassword');

        Route::get('/roles', 'RoleController@index');
        Route::post('/roles/store', 'RoleController@store');
        Route::post('/roles/update/{id}', 'RoleController@update');

        Route::get('/permissions', 'PermissionController@index');
        Route::post('/permissions/store', 'PermissionController@store');
        Route::post('/permissions/update/{id}', 'PermissionController@update');

        Route::get('/orderconfirm', 'OrderController@ordercustomer');
        Route::post('/orderconfirm/{id}', 'OrderController@orderconfirm');

        Route::get('/banners', 'BannerController@index');
        Route::get('/banners/show/{id}', 'BannerController@show');
        Route::get('/banners/create', 'BannerController@create');
        Route::get('/banners/edit/{id}', 'BannerController@edit');
        Route::post('/banners/delete/{id}', 'BannerController@destroy');
        Route::post('/banners/update/{id}', 'BannerController@update');
        Route::post('/banners/store', 'BannerController@store');

        Route::get('/carousels', 'CarouselController@index');
        Route::get('/carousels/show/{id}', 'CarouselController@show');
        Route::get('/carousels/create', 'CarouselController@create');
        Route::get('/carousels/edit/{id}', 'CarouselController@edit');
        Route::post('/carousels/delete/{id}', 'CarouselController@destroy');
        Route::post('/carousels/update/{id}', 'CarouselController@update');
        Route::post('/carousels/store', 'CarouselController@store');

        Route::get('/admin/blogs', 'BlogController@index');
        Route::get('/blogs/create', 'BlogController@create');
        Route::get('/blogs/edit/{id}', 'BlogController@edit');
        Route::post('/blogs/delete/{id}', 'BlogController@destroy');
        Route::post('/blogs/update/{id}', 'BlogController@update');
        Route::post('/blogs/store', 'BlogController@store');

        Route::post('/orderconfirm/{id}', 'OrderController@orderconfirm');
    });

    Route::middleware('role:merchant')->group(function () {
        Route::get('/merchant', 'MerchantController@index');
        Route::prefix('/merchant/products')->group(function () {
            Route::get('/', 'MerchantController@products');
        });

        Route::get('/merchant/{id}/new-orders', 'MerchantController@getNewOrders');
        Route::get('/merchant/{id}/ongoing-orders', 'MerchantController@getOngoingOrders');
        Route::get('/merchant/{id}/succes-orders', 'MerchantController@getSuccesOrder');
        Route::get('/merchant/{id}/view-profile', 'ProfileController@getMerchantProfile');

        Route::get('/merchant/detail-transaction/{id}', 'OrderController@getDetailSuccesOrdersByMerchant');

        //Homestays
    });

    Route::middleware('role:customer')->group(function () {
        Route::post('/carts/delete/{id}', 'CartController@destroy');
        Route::get('/shipping', 'ShippingController@index');
        Route::get('/customer/transactions/{id}', 'TransactionController@show');
        Route::get('/customer/{id}/orders', 'TransactionController@getTransactionByUser');
        Route::get('/customer/{userId}/transactions/{transactionId}/tracking', 'TransactionController@getTrackingInfo');
        Route::get('/customer/{id}/myProfil', 'ProfileController@myProfile');
        Route::get('/customer/{id}/editProfil', 'ProfileController@editProfile');
        Route::post('/customer/{id}/store', 'ProfileController@storeUpdate');
        Route::get('/customer/{id}/wishlist', 'CartController@myWishlist');
        Route::post('/wishlist/delete', 'CartController@deleteWishlist');
    });

    Route::middleware('role:costumer|admin')->group(function () {

    });

    Route::middleware('role:merchant|admin')->group(function () {
        Route::get('/products', 'ProductController@index');

        Route::get('/products/ulos/create', 'ProductController@createUlos');
        Route::get('/products/food/create', 'ProductController@createFood');
        Route::get('/products/clothes/create', 'ProductController@createClothes');
        Route::get('/products/accessories/create', 'ProductController@createAccessories');
        Route::get('/products/medicine/create', 'ProductController@createMedicine');

        Route::get('/products/edit/{id}', 'ProductController@edit');
        Route::post('/products/delete/{id}', 'ProductController@destroy');
        Route::post('/products/update/{id}', 'ProductController@update');
        Route::post('/products/store/{id}', 'ProductController@store');

        Route::get('/merchant/{id}/editProfile', 'ProfileController@merchantEditProfile');
        Route::get('/merchant/{id}/myProfile', 'ProfileController@merchantProfile');
        Route::post('/merchant/{id}/store', 'ProfileController@storeUpdateMerchant');


        Route::prefix('/orders')->group(function () {
            Route::get('/', 'TransactionController@index');
        });
    });

    Route::middleware('role:merchant|customer')->group(function () {

    });

    Route::get('/home', 'HomeController@index');
});

Route::get('/products/{id}', 'ProductController@show');
Route::get('/carabelanja', 'QnAController@show');
Route::get('/carajual', 'QnAController@showj');
Route::get('/carabayar', 'QnAController@showi');

// Route::get('/food', 'makananController@index');

//homestays

Route::get('/homestay/get-carousels', 'HomestayCarouselController@getCarousels');


Route::post('/homestay/create', 'HomestayController@store');


Route::get('/homestays', 'HomestayController@findAll');
Route::get('/user/homestays', 'HomestayController@findAllCustomer');
Route::get('/homestays/find/{id}', 'HomestayController@findById');
Route::get('/homestays/create', 'HomestayController@createDataPage');
Route::post('/homestays/save', 'HomestayController@store');

Route::post('/homestays/search', 'HomestayController@search');
Route::get('/homestays/searchPage', 'HomestayController@searchTest');

//orderHomestay
Route::post('/homestay/pesan', 'HomestayController@bookHomestay');

//Approval Penginapan Backend
Route::post('/homestay/approvePenginapan/{id}', 'HomestayController@approvePenginapan');
Route::post('/homestay/rejectedPrenginapan/{id}', 'HomestayController@rejectedPenginapan');

//Approval Penginapan Frontend
Route::get('/homestay/ListPesanan', 'HomestayController@listPesananPenginapan');


//Homestay Merchant
Route::get('/merchant/homestay/create', 'HomestayController@createHomestayPage');
Route::get('/merchant/homestay/findAll', 'HomestayController@getAllMerchantHomestay');
Route::get('/merchant/homestay/delete/{id}', 'HomestayController@deleteById');
Route::get('/merchant/homestay/update/{id}', 'HomestayController@updateHomestay');
Route::post('/merchant/homestay/updateHomestay/{id}', 'HomestayController@update');
Route::get('/merchant/homestay/findHomestayById/{id}', 'HomestayController@findHomestayById');
Route::get('/merchant/homestay/orders', 'HomestayController@findAllMerchantOrders');
Route::get('/homestays/save', 'HomestayController@store');
Route::get('/homestays/findAllMyHomestay', 'HomestayController@findAllMerchantHomestay');

// Display all homestay orders of a customer.
Route::get('/user/homestay/order/findAll', 'HomestayController@findAllCustomerOrder');
// Display detail of a customer's homestay order.
Route::get('/user/homestay/order/findById/{idOrder}', 'HomestayController@findCustomerOrderByID');








// Sistem Informasi Pariwisata
Route::get('/home-informasi-pariwisata', 'HomeController@homeInformasiPariwisata');


Route::get('/homestays/approvalPesananPenginapan', function () {
    return view ('homestay.merchant.ApprovalPesananPenginapan');
});

Route::post('/register-cbt', 'Auth\RegisterController@registerCbt');
