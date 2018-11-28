@role('merchant')
<header class="header_area">
  <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
    <!-- Classy Menu -->
    <nav class="classy-navbar" id="essenceNav">
      <!-- Logo -->
      <a class="nav-brand" href="{{url('/')}}">
        {{-- <img src="/user-assets/img/core-img/logo.png" alt=""> --}}
        <h5>UlosZone</h5>
      </a>
      <!-- Navbar Toggler -->
      <div class="classy-navbar-toggler">
        <span class="navbarToggler"><span></span><span></span><span></span></span>
      </div>
      <!-- Menu -->
      <div class="classy-menu">
        <!-- close btn -->
        <div class="classycloseIcon">
          <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
        </div>
        <!-- Nav Start -->
        <div class="classynav">
          <ul>
            <li><a href="{{url('/products')}}">My Product</a></li>
            <li><a href="{{url('/orders')}}">My Order</a></li>
          </ul>
        </div>
        <!-- Nav End -->
      </div>
    </nav>

    <!-- Header Meta Data -->
    <div class="header-meta d-flex clearfix justify-content-end">
      <!-- Search Area -->
      <div class="search-area">
        <form action="#" method="post">
          <input type="search" name="search" id="headerSearch" placeholder="Type for search">
          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
      </div>

      <div class="classynav">
        <div class=" dropdown float-right">
          <a href="#" class="dropdown-toggle active mr-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img width="25" src="/user-assets/img/core-img/user.svg" alt="">
          </a>

          <div class="user-menu dropdown-menu">
            <ul class="dropdown">
              <a class="nav-link" href="#"><i class="fa fa-user mr-2"></i>My Profile</a>

              <form method="POST" action="{{ url('/logout')}}">
                {{ csrf_field() }}
                <button type="submit" class="btn nav-link" style="background-color: transparent"><i class="fa fa-power-off mr-2"></i>Logout</a>
              </form>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
</header>
@else
<header class="header_area">
  <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
    <!-- Classy Menu -->
    <nav class="classy-navbar" id="essenceNav">
      <!-- Logo -->
      <a class="nav-brand" href="{{url('/')}}">
        {{-- <img src="/user-assets/img/core-img/logo.png" alt=""> --}}
        <h5>UlosZone</h5>
      </a>
      <!-- Navbar Toggler -->
      <div class="classy-navbar-toggler">
        <span class="navbarToggler"><span></span><span></span><span></span></span>
      </div>
      <!-- Menu -->
      <div class="classy-menu">
        <!-- close btn -->
        <div class="classycloseIcon">
          <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
        </div>
        <!-- Nav Start -->
        <div class="classynav">
          <ul>
            <li><a href="#">Kategori</a>
              <div class="megamenu">
                <ul class="single-mega cn-col-4">
                  <li class="title">Ulos</li>
                  <li><a href="shop.html">Mangiring</a></li>
                  <li><a href="shop.html">Maratur</a></li>
                  <li><a href="shop.html">Antak-antak</a></li>
                  <li><a href="shop.html">Ragi Hotang</a></li>
                  <li><a href="shop.html">Pinuncaan</a></li>
                  <li><a href="shop.html">Sibolang</a></li>
                  <li><a href="shop.html">Tumtuman</a></li>
                  <li><a href="shop.html">Sitolu Tuho</a></li>
                </ul>
                <ul class="single-mega cn-col-4">
                  <li class="title">Acara</li>
                  <li><a href="shop.html">Pernikahan</a></li>
                  <li><a href="shop.html">Monding</a></li>
                  <li><a href="shop.html">Marhajabuan</a></li>
                  <li><a href="shop.html">Mambosuri</a></li>
                  <li><a href="shop.html">Mangharoan</a></li>
                </ul>
                <ul class="single-mega cn-col-4">
                  <li class="title">Pembuatan Ulos</li>
                  <li><a href="shop.html">Tradisional</a></li>
                  <li><a href="shop.html">ATBM</a></li>
                  <li><a href="shop.html">Mesin</a></li>
                </ul>
              </div>
            </li>
            <li><a href="{{ url('/blogs') }}">Blog</a></li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Header Meta Data -->
    <div class="header-meta d-flex clearfix justify-content-end">
      <!-- Search Area -->
      <div class="search-area">
        <form action="#" method="post">
          <input type="search" name="search" id="headerSearch" placeholder="Cari produk">
          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
              </form>
          </div>

          <div id="cart-icon">
            @if(Auth::check())
              <cart-icon :user-id="{{Auth::user()->id}}"/>
            @else
              <cart-icon/>
            @endif
          </div>

          @auth
          <div class="user-login-info">
            <a href="{{ url('/customer/' . Auth::user()->id . '/orders' )}}">Pesanan</a>
          </div>
          @endauth

          @guest
            <div class="user-login-info align-content-end">
              <a href="#">
                <button class="btn btn-link" type="button" data-toggle="modal" data-target="#loginModal"> Masuk </button>
              </a>
            </div>
          @else
            <div class="classynav">
              <div class="dropdown float-right">
                <a href="#" class="dropdown-toggle active mr-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img width="25" src="/user-assets/img/core-img/user.svg" alt="">
                </a>

                <div class="user-menu dropdown-menu">
                  <ul class="dropdown">
                    <a class="nav-link" href="#"><i class="fa fa-user mr-2"></i>My Profile</a>

                    <form method="POST" action="{{ url('/logout')}}">
                      {{ csrf_field() }}
                      <button type="submit" class="btn nav-link" style="background-color: transparent"><i class="fa fa-power-off mr-2"></i>Logout</button>
                    </form>
                  </ul>
                </div>
              </div>
            </div>
          @endguest
    </div>
  </div>
</header>
@endrole
  
@include('users.auth.login_modal')