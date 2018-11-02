@role('merchant')
<header class="header_area">
  <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
    <!-- Classy Menu -->
    <nav class="classy-navbar" id="essenceNav">
      <!-- Logo -->
      <a class="nav-brand" href="{{url('/')}}"><img src="/user-assets/img/core-img/logo.png" alt=""></a>
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
      <a class="nav-brand" href="{{url('/')}}"><img src="/user-assets/img/core-img/logo.png" alt=""></a>
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
                  <li class="title">Women's Collection</li>
                  <li><a href="shop.html">Dresses</a></li>
                  <li><a href="shop.html">Blouses &amp; Shirts</a></li>
                  <li><a href="shop.html">T-shirts</a></li>
                  <li><a href="shop.html">Rompers</a></li>
                  <li><a href="shop.html">Bras &amp; Panties</a></li>
                </ul>
                <ul class="single-mega cn-col-4">
                  <li class="title">Men's Collection</li>
                  <li><a href="shop.html">T-Shirts</a></li>
                  <li><a href="shop.html">Polo</a></li>
                  <li><a href="shop.html">Shirts</a></li>
                  <li><a href="shop.html">Jackets</a></li>
                  <li><a href="shop.html">Trench</a></li>
                </ul>
                <ul class="single-mega cn-col-4">
                  <li class="title">Kid's Collection</li>
                  <li><a href="shop.html">Dresses</a></li>
                  <li><a href="shop.html">Shirts</a></li>
                  <li><a href="shop.html">T-shirts</a></li>
                  <li><a href="shop.html">Jackets</a></li>
                  <li><a href="shop.html">Trench</a></li>
                </ul>
                <div class="single-mega cn-col-4">
                  <img src="img/bg-img/bg-6.jpg" alt="">
                </div>
              </div>
            </li>

            <li><a href="blog.html">Blog</a></li>
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
          <input type="search" name="search" id="headerSearch" placeholder="Cari produk">
          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
      </div>

      <!-- Cart Area -->
      <div class="cart-area">
        <a href="#" id="essenceCartBtn"><img src="/user-assets/img/core-img/bag.svg" alt=""> <span>3</span></a>
      </div>

      @guest
        <div class="user-login-info align-content-end">
          <a href="#">
            <button class="btn btn-link" type="button" data-toggle="modal" data-target="#loginModal"> Masuk </button>
          </a>
        </div>
      @else
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
      @endguest
    </div>
  </div>
</header>
@endrole

@include('users.auth.login_modal')