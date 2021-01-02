<div class="overlay"></div>
<nav class="navbar navbar-expand-md navbar-light main-menu" style="box-shadow:none; background-color: #640000">
    <div class="container">
        <button type="button" id="sidebar1Collapse" class="btn btn-link d-block d-md-none">
            <i class="bx bx-menu icon-single" style="color:white"></i>
        </button>
        <a class="navbar-brand" href="/">
            <h4 class="font-weight-bold text-white">Tobazone</h4>
        </a>
        <ul class="navbar-nav ml-auto d-block d-md-none">
            <li class="nav-item">
                @if(Auth::check())
                <cart-icon :user-id="{{Auth::user()->id}}"/>
                @else
                <cart-icon/>
                @endif
            </li>
        </ul>
        <div class="collapse navbar-collapse">
            <form class="form-inline my-2 my-lg-0 mx-auto" action="/search">
                <input class="form-control" type="search" placeholder="Cari Produk..." aria-label="Search" name="search">
                <button class="btn my-2 my-sm-0 border" type="submit" style="background-color: #640000"><i class="bx bx-search text-white"></i></button>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div id="cart-icon" class="d-none d-lg-block mr-3" style="margin-right:50px!important">
                        @if(Auth::check())
                        <cart-icon :user-id="{{Auth::user()->id}}"/>
                        @else
                        <cart-icon/>
                        @endif
                    </div>
                </li>
                <li class="nav-item ml-md-3">
                    @guest
                    <div class="user-login-info align-content-end">
                        {{--                  <a href="#">--}}
                            {{--                  <a href="/listlogin"><button class="btn btn-toba" type="button"--}}
                                                                               {{--                     style="text-decoration-line: unset; margin-right:15px!important;"> Masuk--}}
                                    {{--                  </button></a>--}}
                            {{--                  </a>--}}
                        <button class="btn btn-outline-light" type="button"  data-toggle="modal"  data-target="#loginModal"
                                style="text-decoration-line: unset; margin-right:15px!important;"> Masuk
                        </button>
                        <a href="{{ url('/register') }}">
                            <button class="btn btn-outline-light" type="button"
                                    style="text-decoration-line: unset;"> Daftar
                            </button>
                        </a>
                    </div>
                    @else
                    <div class="classynav p-0">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle active mr-4" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false" style="display: inherit;">
                                <img width="25" src="/user-assets/img/core-img/user.svg" alt="">
                            </a>
                            <div class="user-menu dropdown-menu mt-2" style="border: 1px solid #e0e0e0; left: -70px;">
                                <a class="nav-link" href="{{ url('/customer/'.Auth::user()->id.'/myProfil') }}">Profil Saya</a>
                                <a class="nav-link" href="{{ url('/customer/'.Auth::user()->id.'/wishlist') }}" >Favorit</a>
                                <a class="nav-link" href="{{ url('/customer/' . Auth::user()->id . '/orders' )}}">Pesanan</a>
                                <ul class="dropdown">
                                    <li class="item">
                                        <form method="POST" action="{{ url('/logout')}}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn nav-link"
                                                    style="background-color: transparent;padding-left: 12px;">Keluar
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="search-bar d-block d-md-none" id="coba">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="example form-inline mb-3 mt-3 mx-auto" action="/search">
                    <input type="text" class="form-control" placeholder="Cari Produk" name="search">
                    <button type="submit" style="background-color:#640000 !important; ">
                        <i class="fa fa-search text-white"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Sidebar -->
<nav id="sidebar1" >
    <div class=
         "sidebar1-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-10 pl-0">
                    @guest
                    <div class="user-login-info align-content-end">
                        <a href="#">
                            <button class="btn btn-toba" id="butMasuk" type="button" data-toggle="modal" data-target="#loginModal"
                                    style="text-decoration-line: unset; margin-right:15px!important;"> Masuk
                            </button>
                        </a>
                        <a href="{{ url('/register') }}">
                            <button class="btn btn-toba" id="butDaftar" type="button"
                                    style="text-decoration-line: unset;"> Daftar
                            </button>
                        </a>
                    </div>
                    @else
                    <ul class="list-unstyled components links">
                        <li>
                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="bx bx-user mr-3"></i>
                                Profil</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu">
                                <li>
                                    <a href="{{ url('/customer/'.Auth::user()->id.'/myProfil') }}">Profil Saya</a>
                                </li>
                                <li>
                                    <a href="{{ url('/customer/'.Auth::user()->id.'/wishlist') }}">Favorit</a>
                                </li>
                                <li>
                                    <a href="{{ url('/customer/' . Auth::user()->id . '/orders' )}}">Pesanan</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ url('/logout')}}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn nav-link"
                                                style="background-color: transparent;padding-left: 12px;">Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @endguest

                </div>
                <div class="col-2 text-left">
                    <button type="button" id="sidebar1CollapseX" class="btn btn-link">
                        <i class="bx bx-x icon-single" style="color:black"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <ul class="list-unstyled components links">
        <li class="dropdown" >
            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bxs-t-shirt mr-3"></i> Souvenir
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('/product/pakaian') }}">Fashion</a>
                <a class="dropdown-item" href="{{ url('/product/ulos') }}">Tenun</a>
                <a class="dropdown-item" href="{{ url('/product/obat') }}">Kesehatan & Kecantikan</a>
                <a class="dropdown-item" href="{{ url('/product/makanan') }}">Kuliner</a>
                <a class="dropdown-item" href="{{ url('/product/aksesoris') }}">Aksesoris</a>
            </div>
        </li>
        <li>
            <a href="{{ url('/user/homestays') }}"><i class="bx bxs-star-half mr-3"></i> Penginapan</a>
        </li>
        <li>
            <a href="{{ route('paket') }}"><i class="bx bxs-bar-chart-square mr-3"></i> Paket Wisata</a>
        </li>
    </ul>
</nav>
@role('merchant')
<nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top main">
    <div class="container custom-container">
        <button type="button" id="sidebar2Collapse" class="btn btn-link d-block d-md-none">
            <i class="bx bx-menu icon-single" style="color:black"></i>
        </button>
        <a class="navbar-brand mr-5" href="/">
            <h5>Merchant Tobazone</h5>
        </a>
        <!-- <a class="nav-link d-none d-sm-block" href="https://medium.com/uloszone" rel="noopener noreferrer"
           target="_blank"
           style="font-weight: 400; font-size: 1rem;">Blog Tobazone</a> -->

        <div class="loginbutton d-none d-lg-block">
            @guest
            <div class="user-login-info align-content-end">
                <a href="#">
                    <button class="btn btn-link " type="button" data-toggle="modal" data-target="#loginModal"
                            style="color: black;text-decoration-line: unset;"> Masuk
                    </button>
                </a>
            </div>
            @else
            <div class="classynav p-0">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle active mr-4" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false" style="    display: inherit;">
                        <img width="25" src="/user-assets/img/core-img/user.svg" alt="">
                    </a>
                    <div class="user-menu dropdown-menu mt-2" style="border: 1px solid #e0e0e0; left: -70px;">
                        <ul class="dropdown">
                            <li>
                                <a class="nav-link" href="{{ url('/merchant/'.Auth::user()->id.'/myProfile') }}">Profil Saya</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ url('/logout')}}">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn nav-link"
                                            style="background-color: transparent;padding-left: 12px;">Keluar
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endguest
        </div>
    </div>
</nav>

<nav id="sidebar2">
    <div class=
         "sidebar1-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-10 pl-0">
                    @guest
                    <div class="user-login-info align-content-end">
                        <a href="#">
                            <button class="btn btn-toba" id="butMasuk" type="button" data-toggle="modal" data-target="#loginModal"
                                    style="text-decoration-line: unset; margin-right:15px!important;"> Masuk
                            </button>
                        </a>
                        <a href="{{ url('/register') }}">
                            <button class="btn btn-toba" id="butDaftar" type="button"
                                    style="text-decoration-line: unset;"> Daftar
                            </button>
                        </a>
                    </div>
                    @else
                    <ul class="list-unstyled components links">
                        <li>
                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="bx bx-user mr-3"></i>
                                Profil</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu">
                                <li>
                                    <a href="{{ url('/merchant/'.Auth::user()->id.'/myProfile') }}">Profil Saya</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ url('/logout')}}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn nav-link"
                                                style="background-color: transparent;padding-left: 12px;">Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="bx bx-store-alt mr-3"></i>
                                Produk</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu1">
                                <li>
                                    <a href="{{ url('/merchant') }}"><i class="bx bx-blanket mr-3" style="margin-left: 20px"></i>Semua Produk</a>
                                </li>
                                <li>
                                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="bx bx-store-alt mr-3" style="margin-left: 20px"></i>
                                        Tambah Produk</a>
                                    <ul class="collapse list-unstyled" id="pageSubmenu3">
                                        <li>
                                            <a href="{{ url('/products/ulos/create') }}"><i class="bx bx-plus mr-3" style="margin-left: 40px"></i>Tambah Ulos</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/products/clothes/create') }}"><i class="bx bx-plus mr-3" style="margin-left: 40px"></i>Tambah Pakaian</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/products/food/create') }}"><i class="bx bx-plus mr-3" style="margin-left: 40px"></i>Tambah Makanan</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/products/accessories/create') }}"><i class="bx bx-plus mr-3" style="margin-left: 40px"></i>Tambah Aksesoris</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/products/medicine/create') }}"><i class="bx bx-plus mr-3" style="margin-left: 40px"></i>Tambah Obat</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="bx bx-cart mr-3"></i>
                                Pemesanan</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu2">
                                <li>
                                    <a href="{{ url('/merchant/' . Auth::user()->id . '/ongoing-orders') }}">Order masuk</a>
                                    <a href="{{ url('/merchant/' . Auth::user()->id . '/succes-orders') }}">Order Keluar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @endguest

                </div>
                <div class="col-2 text-left">
                    <button type="button" id="sidebar2CollapseX" class="btn btn-link">
                        <i class="bx bx-x icon-single" style="color:black"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>

@else
<nav class="navbar2 navbar-expand-lg main" style="background-color: #833333">
    <div class="container-fluid custom-container">
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item-dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Souvenir
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/product/pakaian') }}" ><b>Fashion</b><br> <span data-toggle="tooltip" data-placement="right" title="Kemeja, Kaos, Jaket, Topi">Pria</span> <br> <span  data-placement="right" title="Kemeja, Kaos, Jaket, Topi, Dress"> Wanita</span> <br> <span   data-placement="right" title="Kemeja, Kaos, Jaket">Anak - anak</span>
                            <br><br></a>
                        <a class="dropdown-item" href="{{ url('/product/ulos') }}"><b>Tenun</b><br> <span data-toggle="tooltip" data-placement="right" title="Ulos (sarung, selendang), lembaran kain"> Buatan tangan</span> <br> <span  data-placement="right" title="Ulos (sarung, selendang), lembaran kain">Mesin</span>  <br><br></a>
                        <a class="dropdown-item" href="{{ url('/product/obat') }}"><b>Kesehatan & Kecantikan</b> <br> <span data-toggle="tooltip" data-placement="right" title="Rempah-rempah, minyak karo, masker"> Obat tradisional</span>
                            <br> <span data-toggle="tooltip" data-placement="right" title="Masker wajah, lulur kopi, madu,sabun"> Perawatan</span> <br><br></a>
                        <a class="dropdown-item" href="{{ url('/product/makanan') }}"><b>Kuliner</b> <br> <span data-toggle="tooltip" data-placement="right" title="Tipa-tipa, kacang, sasagun"> Kering</span> <br> Basah <br><br></a>
                        <a class="dropdown-item" href="{{ url('/product/aksesoris') }}"><b><span data-toggle="tooltip" data-placement="right" title="Ikan mas arsik, naniura, napinadar, ikan mujahir tombur, lappet"> Aksesoris</span></b></a>
                    </div>
                </li>
                <li class="nav-item dropdown ml-30">
                    <a class="nav-link dropdown text-white" href="{{ url('/user/homestays') }}" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span data-toggle="tooltip" data-placement="right" title="Homestay, guesthouse, losmen, hotel, villa">Akomodasi</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    </div>
                </li>
                <li class="nav-item dropdown ml-30">
                    <a class="nav-link dropdown text-white" href="{{ route('paket') }}" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span data-toggle="tooltip" data-placement="right" title="Paket wisata, komunitas paket wisata">Paket Wisata</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    </div>
                </li>
            </ul>
        </div>
        <div class="container-fluid custom-container">
</nav>
@endrole

@include('users.auth.login_modal')
