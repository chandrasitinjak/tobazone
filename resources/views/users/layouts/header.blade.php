<nav class="navbar navbar-expand-lg navbar-white sticky-top ">
    <div class="container-fluid custom-container">
        <button class="navbar-toggler mr-4" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>
        <a class="navbar-brand mr-5" href="/">
            <h5>Tobazone</h5>
        </a>

        <!-- <a class="nav-link d-none d-sm-block" href="https://medium.com/uloszone" rel="noopener noreferrer"
           target="_blank"
           style="font-weight: 400; font-size: 1rem;">Blog</a> -->

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-start">
                <li class="nav-item d-lg-none dropdown">

                    <div class="loginbutton ">
                        @guest
                            <div class="user-login-info align-content-end">
                                <a href="#">
                                    <button class="btn btn-link " type="button" data-toggle="modal"
                                            data-target="#loginModal"
                                            style="color: black;text-decoration-line: unset; padding: 0"> Masuk
                                    </button>
                                </a>
                            </div>
                        @else
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                               data-toggle="dropdown" style="font-size: 1rem">Profile</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-toggle active mr-4" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <img width="25" src="/user-assets/img/core-img/user.svg" alt="">
                                </a>


                                <a class="dropdown-item" href="{{ url('/customer/'.Auth::user()->id.'/myProfil') }}"></i>My Profile</a>
                                @auth
                                    <div class="user-login-info dropdown-item">
                                        <a href="{{ url('/customer/' . Auth::user()->id . '/orders' )}}">Pesanan</a>
                                    </div>

                                @endauth
                            </div>

                            <form class="nav-link " method="POST" action="{{ url('/logout')}}">
                                {{ csrf_field() }}
                                <button type="submit " class="btn nav-link pt-0" style="background-color: white"
                                        >Logout
                                </button>
                            </form>
                        @endguest
                    </div>
                </li>
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">Kategori</a>--}}
                {{--</li>--}}

            </ul>
            <div class="d-sm-none d-md-block d-lg-block search">
                <input type="text" class="" placeholder="asdasd">
            </div>
        </div>

        <!-- Form Search -->
        <div class="d-none d-lg-block" style="margin-right: 8rem">

            <div class="search-area">
                <form class="example" action="/search">
                    <input type="text" placeholder="Cari Produk" name="search">
                    <button type="submit" style="background-color:#fff!important; border-color:#A8A8A8!important;">
                      <i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>


        <!-- Icon Cart -->
        <div id="cart-icon" class="d-none d-lg-block mr-3" style="margin-right:50px!important">
            @if(Auth::check())
                <cart-icon :user-id="{{Auth::user()->id}}"/>
            @else
                <cart-icon/>
            @endif
        </div>

        @auth
            <div class="user-login-info mr-2 d-none d-sm-block">
                <a href="{{ url('/customer/' . Auth::user()->id . '/orders' )}}" style="font-weight: 400;font-size: 1rem;">Pesanan</a>
            </div>
        @endauth

        <!-- Togle untuk form login -->
        <div class="loginbutton d-none d-lg-block">
            @guest
                <div class="user-login-info align-content-end">
                    <a href="#">
                        <button class="btn btn-toba" type="button" data-toggle="modal" data-target="#loginModal"
                                style="text-decoration-line: unset; margin-right:15px!important;"> Masuk
                        </button>
                    </a>
                    <a href="{{ url('/register') }}">
                        <button class="btn btn-toba" type="button"
                                style="text-decoration-line: unset;"> Daftar
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
                                    <a class="nav-link" href="{{ url('/customer/'.Auth::user()->id.'/myProfil') }}">My Profile</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ url('/customer/'.Auth::user()->id.'/wishlist') }}">My Wishlist</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ url('/logout')}}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn nav-link"
                                                style="background-color: transparent;padding-left: 12px;">Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endguest
        </div>

      <div>
</nav>

@role('merchant')
<nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top main">
    <div class="container custom-container">
        <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-th"></span>
        </button>
        <a class="navbar-brand mr-5" href="/">
            <h5>Merchant Tobazone</h5>
        </a>

        <a class="nav-link d-none d-sm-block" href="https://medium.com/uloszone" rel="noopener noreferrer"
           target="_blank"
           style="font-weight: 400; font-size: 1rem;">Blog Tobazone</a>


        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-start">
                <li class="nav-item d-lg-none dropdown">
                    <a href="{{ url('/products/create') }}" class="btn btn-sm btn-success">Tambah produk</a>
                </li>
                <li class="nav-item d-lg-none dropdown">

                    <div class="loginbutton ">
                        @guest
                            <div class="user-login-info align-content-end">
                                <a href="#">
                                    <button class="btn btn-link " type="button" data-toggle="modal"
                                            data-target="#loginModal"
                                            style="color: black;text-decoration-line: unset; padding: 0"> Masuk
                                    </button>
                                </a>
                            </div>
                        @else
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                               data-toggle="dropdown" style="font-size: 1rem">Profile</a>
                            <div class="dropdown-menu">
                                {{--<a href="#" class="dropdown-toggle active mr-4" data-toggle="dropdown"--}}
                                {{--aria-haspopup="true" aria-expanded="false">--}}
                                {{--<img width="25" src="/user-assets/img/core-img/user.svg" alt="">--}}
                                {{--</a>--}}
                                <a class="dropdown-item" href="{{ url('/merchant/'.Auth::user()->id.'/myProfile') }}"></i>My Profile</a>
                            </div>


                        @endguest
                    </div>
                </li>

                <li class="nav-item d-lg-none dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                       data-toggle="dropdown" style="font-size: 1rem">Produk</a>

                    <div class="dropdown-menu">
                        <ul class="dropdown-item">
                            <li><a href="{{ url('/merchant') }}">All</a></li>
                            <li><a href="{{ url('/products/create') }}">Tambah produk</a></li>
                            <li><a href="">Produk terjual</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item d-lg-none dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownpe" role="button"
                       data-toggle="dropdown" style="font-size: 1rem">Pemesanan</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownpe">
                        <ul class="dropdown-item">
                            <li><a href="{{ url('/merchant/' . Auth::user()->id . '/new-orders') }}">Order Masuk</a>
                            </li>
                            <li><a href="{{ url('/merchant/' . Auth::user()->id . '/ongoing-orders') }}">Order yang
                                    Sedang Diproses</a></li>
                            <li><a href="">Order Berhasil</a></li>
                            <li><a href="">Order Dibatalkan</a></li>
                            <li><a href="">Order Gagal</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item d-lg-none dropdown">
                    <form class="nav-link " method="POST" action="{{ url('/logout')}}">
                        {{ csrf_field() }}
                        <button type="submit " class="btn nav-link pt-0"
                                style="background-color: transparent">Logout
                        </button>
                    </form>
                </li>
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">Kategori</a>--}}
                {{--</li>--}}

            </ul>
            <div class="d-sm-none d-md-block d-lg-block search">
                <input type="text" class="" placeholder="asdasd" >
            </div>
        </div>


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
                                    <a class="nav-link" href="{{ url('/merchant/'.Auth::user()->id.'/myProfile') }}">My Profile</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ url('/logout')}}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn nav-link"
                                                style="background-color: transparent;padding-left: 12px;">Logout
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
@else 

<nav class="navbar2 navbar-expand-lg navbar-white main">  
    <div class="container-fluid custom-container">
    <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav">

      <li class="nav-item dropdown">
      <!-- <a class="nav-link dropdown" href="{{ url('/product/pakaian') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
        <a class="nav-link dropdown" href="{{ url('/product/pakaian') }}" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
          Pakaian
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!-- <a class="dropdown-item" href="#">Pria</a> -->
          <!-- <a class="dropdown-item" href="#">Wanita</a> -->
          <!-- <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Bahan Spesial</a> -->
        </div>
      </li>
      <li class="nav-item dropdown" style="margin-left: 3rem">
        <a class="nav-link dropdown" href="{{ url('/product/aksesoris') }}" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
          Aksesoris
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!-- <a class="dropdown-item" href="#">Buatan Tangan</a> -->
          <!-- <a class="dropdown-item" href="#">Buatan Mesin</a> -->
          <!-- <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Recomended Aksesoris</a> -->
        <!-- </div> -->
      </li>
      <li class="nav-item dropdown" style="margin-left: 3rem">
        <a class="nav-link dropdown" href="{{ url('/product/makanan') }}" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
          Makanan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!-- <a class="dropdown-item" href="#">Basah</a> -->
          <!-- <a class="dropdown-item" href="#">Kering</a> -->
          <!-- <a class="dropdown-item" href="#">Sarune</a>
          <a class="dropdown-item" href="#">Seruling</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Costum</a> -->
        </div>
      </li>
      <li class="nav-item dropdown" style="margin-left: 3rem">
        <a class="nav-link dropdown" href="{{ url('/product/obat') }}" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
          Obat
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!-- <a class="dropdown-item" href="#">Cair</a> -->
          <!-- <a class="dropdown-item" href="#">Padat</a> -->
          <!-- <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Costum</a>
        </div> -->
      </li>
      <li class="nav-item dropdown" style="margin-left: 3rem">
        <a class="nav-link dropdown" href="{{ url('/product/ulos') }}" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
          Ulos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!-- <a class="dropdown-item" href="#">Tradisional</a> -->
          <!-- <a class="dropdown-item" href="#">Mesin</a> -->
          <!-- <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Costum</a>
        </div> -->
      </li>
    </ul>
  </div> 
  <div class="container-fluid custom-container"> 
</nav>
@endrole

@include('users.auth.login_modal')
