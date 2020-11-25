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

Route::get('/listlogin', function () {
    return view('users.auth.listlogin');
});

Route::get('/cbt', function () {
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

//CBT
Route::get('/cbt/dashboard','DashboardCBTController@index');
//Layanan Wisata
Route::get('anggotacbt/layananwisata', 'LayananWisataController@index')->name('anggotacbt.layanan');
Route::post('anggotacbt/layananwisata/create', 'LayananWisataController@create')->name('anggotacbt.layanan.tambah');
Route::get('anggotacbt/layananwisata/{id}/edit', 'LayananWisataController@edit')->name('anggotacbt.layanan.edit');
Route::put('anggotacbt/layanan_wisata/{id}/update', 'LayananWisataController@update')->name('anggotacbt.layanan.update');
Route::get('anggotacbt/layanan_wisata/{id}/delete', 'LayananWisataController@delete')->name('anggotacbt.layanan.delete');
// Manajemen objek wisata
//Objek Wisata
Route::get('cbt/objek', 'ObjekWisataController@index')->name('cbt.objek');
Route::post('cbt/objek/store', 'ObjekWisataController@store')->name('cbt.objek.store');
Route::put('cbt/objek/edit/{id}', 'ObjekWisataController@edit')->name('cbt.objek.edit');
//Akomodasi
Route::get('cbt/akomodasi', 'AkomodasiController@index')->name('cbt.akomodasi');

Route::middleware(['auth', 'verified', 'verifiedByAdmin'])->group(function () {
    Route::post('/profile/edit/{id}', 'ProfileController@updateAddress');
    Route::get('/profile/{id}', 'ProfileController@getProfile');
    Route::get('/unverified', 'HomeController@showUnverifiedPage');

    Route::middleware('role:admin')->group(function () {

//visit toba

        Route::get('/admin/paket/edit/{id_paket}/choice', 'PaketWisataController@editChoice')->name('admin.paket.editChoice');

        Route::get('/admin/paket/edit/{id_paket}/utama', 'PaketWisataController@edit')->name('admin.paket.edit');
        Route::put('/admin/paket/edit/{id_paket}/utama/update', 'PaketWisataController@update')->name('admin.paket.update');

        Route::get('/admin/paket/edit/{id_paket}/ini', 'PaketWisataController@editIni')->name('admin.paket.ini');
        Route::get('/admin/paket/edit/{id_ini}/ini/hapus', 'PaketWisataController@hapusIni')->name('admin.paket.hapus.ini');
        Route::put('/admin/paket/edit/{id_paket}/ini/update', 'PaketWisataController@updateIni')->name('admin.paket.update.ini');

        Route::get('/admin/paket/edit/{id_paket}/layanan', 'PaketWisataController@editLayanan')->name('admin.paket.layanan');
        Route::get('/admin/paket/edit/{id_layanan}/{id_paket}/layanan/hapus', 'PaketWisataController@hapusLayanan')->name('admin.paket.hapus.layanan');
        Route::put('/admin/paket/edit/{id_paket}/layanan/update', 'PaketWisataController@updateLayanan')->name('admin.paket.update.layanan');


        Route::get('/admin/paket', 'PaketWisataController@index')->name('admin.paket');
        Route::post('/admin/paket', 'PaketWisataController@indexFilter')->name('admin.paket.filter');
        Route::get('/admin/paket/show/{id_paket}', 'PaketWisataController@show')->name('admin.paket.show');

        //sesi
        Route::get('/admin/sesi/add/{id_paket}', 'PaketWisataController@createSesi')->name('admin.sesi.create');
        Route::put('/admin/sesi/{id_paket}', 'PaketWisataController@storeSesi')->name('admin.sesi.store');
        Route::get('/admin/sesi/edit/{id_sesi}', 'PaketWisataController@editSesi')->name('admin.sesi.edit');
        Route::put('/admin/sesi/edit/{id_sesi}/update', 'PaketWisataController@updateSesi')->name('admin.sesi.update');
        Route::delete('/admin/sesi/delete/{id_sesi}', 'PaketWisataController@destroySesi')->name('admin.sesi.delete');
        Route::delete('/admin/sesi/nonaktif/{id_sesi}', 'PaketWisataController@nonaktifSesi')->name('admin.sesi.nonaktif');
        Route::put('/admin/sesi/aktif/{id_sesi}', 'PaketWisataController@aktifSesi')->name('admin.sesi.aktif');


//craete new paket
        Route::get('/admin/paket/add', 'PaketWisataController@create')->name('admin.paket.tambah');
        Route::post('/admin/paket/add', 'PaketWisataController@store')->name('admin.paket.store');
//hapus
        Route::delete('/admin/paket/delete/{id_paket}', 'PaketWisataController@destroy')->name('admin.paket.hapus');
        Route::put('/admin/paket/recycle/{id_paket}', 'PaketWisataController@recycle')->name('admin.paket.recycle');
        Route::put('/admin/paket/nonaktif/{id_paket}', 'PaketWisataController@nonaktifkanPaket')->name('admin.paket.nonaktif');
        Route::put('/admin/paket/aktifkan/{id_paket}', 'PaketWisataController@aktifkanPaket')->name('admin.paket.aktifkan');

//Komunitas
        Route::get('/admin/komunitas','KomunitasController@index')->name('data_komunitas.admin');
        Route::post('/admin/komunitas/create','KomunitasController@create')->name('tambah_komunitas');
        Route::get('/admin/komunitas/{id}/show','KomunitasController@show')->name('show_komunitas');
        Route::get('/admin/komunitas/{id}/edit', 'KomunitasController@edit')->name('edit_komunitas');
        Route::post('/admin/komunitas/{id}/update', 'KomunitasController@update')->name('update_komunitas');
        Route::get('/admin/komunitas/{id}/hapus','KomunitasController@hapus')->name('hapus_komunitas');

//Akhir Komunitas
//pemesanan
        Route::get('/admin/pemesanan', 'PemesananController@index')->name('admin.pemesanan');
        Route::get('/admin/pemesanan/show/{id_pemesanan}', 'PemesananController@show')->name('admin.pemesanan.show');
        Route::post('/admin/pemesanan', 'PemesananController@indexFilter')->name('admin.pemesanan.filter');
        Route::put('/admin/pemesanan/transaksi/konfirmasi/{id_pemesanan}', 'PemesananController@konfirmasiPembayaran')->name('admin.pemesanan.konfirmasi');
        Route::put('/admin/pemesanan/transaksi/tolak/{id_pemesanan}', 'PemesananController@tolakPembayaran')->name('admin.pemesanan.tolak');
        Route::put('/admin/pemesanan/transaksi/upload/{id_pemesanan}', 'PemesananController@uploadUlangPembayaran')->name('admin.pemesanan.upload');
        Route::put('/admin/pemesanan/ubahPesan/{id_pemesanan}', 'PemesananController@ubahPesan')->name('admin.pemesanan.ubahPesan');
        Route::post('/admin/rekening','PemesananController@tambahRekening')->name('admin.rekening.tambah');
        Route::get('/admin/rekening/edit/{id_rekening}','PemesananController@editRekening')->name('admin.rekening.edit');
        Route::put('/admin/rekening/update/{id_rekening}','PemesananController@updateRekening')->name('admin.rekening.update');
        Route::delete('/admin/rekening/delete/{id_rekening}','PemesananController@destroyRekening')->name('admin.rekening.hapus');
//akhir pemesanan

//akhir visit toba
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

Route::get('/homestays', 'HomestayController@findAll');
Route::get('/homestays/find/{id}', 'HomestayController@findById');
Route::get('/homestays/create', 'HomestayController@createDataPage');
Route::get('/homestays/save', 'HomestayController@store');


// Sistem Informasi Pariwisata
Route::get('/home-informasi-pariwisata', 'InformasiPariwisataController@index');
//Informasi
Route::get('/informasi1', 'InformasiController@displayObjekWisata');
Route::get('/informasi2', 'InformasiController@displayAkomodasi');
Route::get('/informasi3', 'InformasiController@displayBudaya');
Route::get('/informasi4', 'InformasiController@displayKuliner');
Route::get('/informasi5', 'InformasiController@displayEvent');
//Kabupaten
Route::get('/Kab/{id}', 'KabupatenController@index');
Route::get('/Kab/Information/ObjekWisata/{id}', 'ObjekWisataController@displayObjekWisata');
Route::get('/Kab/Information/Akomodasi/{id}', 'AkomodasiController@displayAkomodasi');
Route::get('/Kab/Information/Kuliner/{id}', 'KulinerController@displayKuliner');
Route::get('/Kab/Information/Budaya/{id}', 'BudayaController@displayBudaya');
Route::get('/Kab/Information/Event/{id}', 'EventController@displayEvent');
//Transportasion
Route::get('/transportasion', 'TransportasiController@displayTransportasi');
//Map
Route::get('/map', 'MapController@displayMap');
Route::get('/map1', 'MapController@displayObjek');
Route::get('/map2', 'MapController@displayAkomodasi');
Route::get('/map3', 'MapController@displayKuliner');

Route::get('/homestays/approvalPesananPenginapan', function () {
    return view('homestay.merchant.ApprovalPesananPenginapan');
});

Route::post('/register-cbt', 'Auth\RegisterController@registerCbt');
Route::post('/register-cbtAdmin', 'Auth\RegisterController@registerCbtAdmin')->name('registerCbtAdmin');
Route::get('/admin/new-member', 'MemberController@index')->name('member');
Route::get('/admin/new-member/request', 'MemberController@index')->name('member.request');
Route::post('/admin/new-member', 'MemberController@indexFilterM')->name('member.filter');
Route::get('/admin/member/detail', 'MemberController@show');
Route::get('/admin/member/non-aktif/{id_member}', 'MemberController@nonAktif')->name('member.nonaktifkan');
Route::get('/admin/member/aktif/{id_member}', 'MemberController@aktifkanStatus')->name('member.aktifkan');
Route::get('/admin/member/detail/{id_member}', 'MemberController@detailMember')->name('member.detail');
Route::put('/admin/member/keluarkan/{id_komunitas}/{id_member}', 'MemberController@keluarkan')->name('member.keluarkan');
