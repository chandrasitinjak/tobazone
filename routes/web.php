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
//

Auth::routes(['verify' => true]);


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

Route::middleware('role:member_cbt')->group(function(){
        Route::get('/cbt/dashboard','DashboardCBTController@index');
        //Layanan Wisata
        Route::get('anggotacbt/layananwisata', 'LayananWisataController@index')->name('anggotacbt.layanan');
        Route::post('anggotacbt/layananwisata/create', 'LayananWisataController@create')->name('anggotacbt.layanan.tambah');
        Route::get('anggotacbt/layananwisata/{id}/edit', 'LayananWisataController@edit')->name('anggotacbt.layanan.edit');
        Route::put('anggotacbt/layanan_wisata/{id}/update', 'LayananWisataController@update')->name('anggotacbt.layanan.update');
        Route::get('anggotacbt/layanan_wisata/{id}/delete', 'LayananWisataController@delete')->name('anggotacbt.layanan.delete');
        Route::get('anggotacbt/komunitas/','KomunitasCBTController@index')->name('anggotacbt.komunitas');
        Route::get('anggotacbt/komunitas/pendaftar','PendaftarController@index')->name('view_anggota');
        Route::post('anggotacbt/komunitas/pendaftar/create','PendaftarController@daftar')->name('gabung_daftar');
});



Route::middleware(['auth', 'verified', 'verifiedByAdmin'])->group(function () {
    Route::post('/profile/edit/{id}', 'ProfileController@updateAddress');
    Route::get('/profile/{id}', 'ProfileController@getProfile');
    Route::get('/unverified', 'HomeController@showUnverifiedPage');

    Route::middleware('role:admin')->group(function () {

        //BEGIN KOPERASI
        Route::get('/admin/status-koperasi', function () {
            return view('admin.koperasi.status-koperasi');
        });
        Route::get('/admin/akun-koperasi-pending', function () {
            return view('admin.koperasi.akun-koperasi-pending');
        });
        Route::get('/admin/layanan-maintenence', function () {
            return view('admin.koperasi.layanan-maintenence');
        });
        //END KOPERASI

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
//Awal pengelolaan member
        Route::post('/admin/member/store','MemberController@store')->name('member.store');
//        Route::get('/admin/member/add','Auth\RegisterController@create')->name('member.tambah');
//akhir pengelolaan member
        Route::post('/register-cbtAdmin', 'Auth\RegisterController@registerCbtAdmin')->name('registerCbtAdmin');
        Route::get('/admin/new-member', 'MemberController@index')->name('member');
        Route::get('/admin/new-member/request', 'MemberController@index')->name('member.request');
        Route::post('/admin/new-member/request','MemberController@indexFilterR')->name('member.request.filter');
        Route::get('/admin/member/request/tolak/{id_member}','MemberController@tolak')->name('member.request.tolak');
        Route::get('/admin/member/request/terima/{id_member}','MemberController@terima')->name('member.request.terima');
        Route::get('/admin/member/request/detail/{id_member}','MemberController@showRequest')->name('member.request.detail');
        Route::get('/admin/member/request/hapus/{id_member}','MemberController@hapus')->name('member.request.hapus');
        Route::post('/admin/new-member', 'MemberController@indexFilterM')->name('member.filter');
        Route::get('/admin/member/detail', 'MemberController@show');
        Route::get('/admin/member/non-aktif/{id_member}', 'MemberController@nonAktif')->name('member.nonaktifkan');
        Route::get('/admin/member/aktif/{id_member}', 'MemberController@aktifkanStatus')->name('member.aktifkan');
        Route::get('/admin/member/detail/{id_member}', 'MemberController@detailMember')->name('member.detail');
        Route::put('/admin/member/keluarkan/{id_komunitas}/{id_member}', 'MemberController@keluarkan')->name('member.keluarkan');
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
        Route::get('/admin/list-user', 'MerchantController@listUser');
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

        //Admin Homestay
        Route::get('/admin/homestay/new-order', 'HomestayController@findAllNewOrder');
        Route::get('/admin/homestay/paid-order', 'HomestayController@findAllPaidOrder');
        Route::get('/admin/homestay/success-order', 'HomestayController@findAllSuccessOrder');
        Route::get('/admin/homestay/rejected-order', 'HomestayController@findAllRejectedOrder');
        Route::get('/admin/homestay/new-order/{id}', 'HomestayController@findDetailNewOrder');
        Route::get('/admin/homestay/room-categories', 'HomestayRoomsCategoriesController@findAllCategories');
        Route::get('/admin/delete-kategori/{id}', 'HomestayRoomsCategoriesController@deleteKategori');
        Route::post('/admin/tambah-kategori-homestay', 'HomestayRoomsCategoriesController@createCategories');
        Route::post('/admin/edit-kategori-homestay/{id}', 'HomestayRoomsCategoriesController@editKategori');
        Route::get('/admin/homestay/room-facilities', 'HomestayRoomsFacilitiesController@findAllFacilities');

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
        Route::get('/customer/editalamat/{id}', 'ProfileController@merchantEditAlamat');
        Route::post('/customer/{id}/store', 'ProfileController@storeUpdate');
        Route::get('/customer/{id}/wishlist', 'CartController@myWishlist');
        Route::post('/wishlist/delete', 'CartController@deleteWishlist');
        //Start visit Tba
        //pemesanan
        Route::post('/pesan/paket/{id_paket}','PaketWisataCustomerController@bookingPaket');
        Route::get('/pemesanan','PemesananController@indexC')->name('pemesanan');
        Route::get('/pemesanan/detail/{id}','PemesananController@show_c')->name('pemesanan.detail');
        Route::put('/pemesanan/detail/{id_pemesanan}/upload','PemesananController@kirimTransaksi')->name('transaksi.kirim');
        Route::put('/pemesanan/detail/{id_transaksi}/update', 'PemesananController@updateTransaksi')->name('transaksi.update');
        Route::get('/pemesanan/detail/pembayaran/{id}','PemesananController@pembayaran')->name('pembayaran');

        Route::delete('/pemesanan/cancel/{id_pemesanan}', 'PemesananController@cancel')->name('pemesanan.batal');
        //end pemesanan
        //end visit toba
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
        Route::get('/merchant/ubahalamat/{id}', 'ProfileController@merchantAlamat');
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
Route::get('/user/homestays/more', 'HomestayController@morePage');
Route::get('/homestays/find/{id}', 'HomestayController@findById');
Route::get('/homestays/create', 'HomestayController@createDataPage');
Route::post('/homestays/save', 'HomestayController@store');

Route::post('/homestays/search', 'HomestayController@search');
Route::get('/homestays/searchPage', 'HomestayController@searchTest');
Route::post('/homestays/order/upload-resi/{id}', 'HomestayController@uploadResi');

//orderHomestay
Route::post('/homestay/pesan/{id}', 'HomestayController@bookHomestay');

//Approval Penginapan Backend
Route::get('/homestay/approvePenginapan/{id}', 'HomestayController@approvePenginapan');
Route::get('/homestay/rejectedPenginapan/{id}', 'HomestayController@rejectedPenginapan');

//Approval Penginapan Frontend
Route::get('/homestay/ListPesanan', 'HomestayController@listPesananPenginapan');


//Homestay Merchant
Route::get('/merchant/homestay/create', 'HomestayController@createHomestayPage');
Route::get('/merchant/homestay/findAll', 'HomestayController@getAllMerchantHomestay');
Route::get('/merchant/homestay/delete/{id}', 'HomestayController@deleteById')->name('deleteHomestay');
Route::get('/merchant/homestay/update/{id}', 'HomestayController@updateHomestay');
Route::post('/merchant/homestay/updateHomestay/{id}', 'HomestayController@update');
Route::get('/merchant/homestay/findHomestayById/{id}', 'HomestayController@findHomestayById');
Route::get('/merchant/homestay/orders', 'HomestayController@findAllMerchantOrders');
Route::get('/merchant/homestay/success-order', 'HomestayController@listSuccessOrder');
Route::get('/merchant/homestay/get-success-order', 'HomestayController@allSuccessOrder');
Route::get('/merchant/homestay/get-paid-order', 'HomestayController@allPaidOrder');
Route::get('/homestays/save', 'HomestayController@store');
Route::get('/homestays/findAllMyHomestay', 'HomestayController@findAllMerchantHomestay');
Route::get('/homestay/room-facilities/findAll', 'HomestayRoomsFacilitiesController@findAll');
//Homestay Rooms
Route::post('homestay/room/store','HomestayController@saveRooms');


// Display all homestay orders of a customer.
Route::get('/user/homestay/order/findAll', 'HomestayController@findAllCustomerOrder');
// Display detail of a customer's homestay order.
Route::get('/user/homestay/order/findById/{idOrder}', 'HomestayController@findCustomerOrderByID');
Route::get('/user/homestay/order/delete/{idOrder}', 'HomestayController@deleteOrder');







//List homestay Orders merchant side
Route::get('/merchant/homestay/findAllOrder', 'HomestayController@findAllMerchantOrder');

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

Route::get('/customer/transactions/paket/{id}', 'TransactionPaketController@show')->middleware('auth');

// Route::get('/tessi123/{id}', function($id){
//     echo $id;
//


//menampilkan paket wisata di sisi customer


Route::get('/paket-wisata/more','PaketWisataController@more_paket')->name('paket');
Route::post('/paket-wisata/more','PaketWisataController@indexFilter')->name('paket.filter');

Route::get('/konfirmasiemail/{email}/{token}', 'RegisterController@konfirmasiemail')->name('konfirmasiemail');

//detail paket wisata
Route::get('/paket/details/{id_paket}', 'PaketWisataCustomerController@show')->name('paket.detail');


Route::get('/komunitas', 'KomunitasController@komunitas')->name('komunitas');
Route::get('/komunitas/{id_kabupaten}','KomunitasController@showC')->name('komunitas.show');




//CBT informasi pariwisata

Route::resource('objekwisata', 'ObjekWisataController');
Route::resource('kuliner', 'KulinerController');
Route::resource('akomodasi', 'AkomodasiController');
Route::resource('event', 'EventController');
Route::resource('transportasi', 'TransportasiController');
Route::resource('budaya', 'BudayaController');

//Sistem informasi Pariwisata
Route::get('informasi-akomodasi', 'AkomodasiController@displayAkomodasi');
Route::get('/Kab/Information/Akomodasi/{id}', 'AkomodasiController@displayDetailAkomodasi');
Route::get('informasi-objek-wisata', 'ObjekWisataController@displayObjekWisata');
Route::get('/Kab/Information/ObjekWisata/{id}', 'ObjekWisataController@displayDetailObjekWisata');
Route::get('informasi-event', 'EventController@displayEvent');
Route::get('/Kab/Information/Event/{id}', 'EventController@displayDetailEvent');
Route::get('informasi-kuliner', 'KulinerController@displayKuliner');
Route::get('/Kab/Information/Kuliner/{id}', 'KulinerController@displayDetailKuliner');
Route::get('informasi-budaya', 'BudayaController@displayBudaya');
Route::get('/Kab/Information/Budaya/{id}', 'BudayaController@displayDetailBudaya');
Route::get('informasi-transportasi', 'TransportasiController@displayTransportasi');
Route::get('/Kab/Information/Transportasi/{id}', 'TransportasiController@displayDetailTransportasi');

Route::get('/email-verify1', function () {
    return view('auth.verify1');
});
