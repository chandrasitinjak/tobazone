@role('merchant')
@include('users.auth.login_modal')
<nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top">
    <div class="container custom-container">
        <button class="navbar-toggler mr-4" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>
        <a class="navbar-brand mr-5" href="/">
            <h5>UlosZone</h5>
        </a>
        <div id="cart-icon" class="d-lg-none">
            @if(Auth::check())
                <cart-icon :user-id="{{Auth::user()->id}}"/> @else
                <cart-icon/> @endif
        </div>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-start">
                <li class="nav-item d-lg-none">
                    <div class="loginbutton ">
                        @auth
                            <div class="user-login-info">
                                <a href="{{ url('/customer/' . Auth::user()->id . '/orders' )}}">Pesanan</a>
                            </div>
                        @endauth @guest
                            <div class="user-login-info align-content-end">
                                <a href="#">
                                    <button class="btn btn-link " type="button" data-toggle="modal"
                                            data-target="#loginModal"
                                            style="color: black;text-decoration-line: unset; padding: 0"> Masuk
                                    </button>
                                </a>
                            </div>
                        @else
                            <div class="classynav p-0">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle active mr-4" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        <img width="25" src="/user-assets/img/core-img/user.svg" alt="">
                                    </a>

                                    <div class="user-menu dropdown-menu">
                                        <ul class="dropdown">
                                            <a class="nav-link" href="#"><i class="fa fa-user mr-2"></i>My Profile</a>

                                            <form method="POST" action="{{ url('/logout')}}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn nav-link"
                                                        style="background-color: transparent"><i
                                                            class="fa fa-power-off mr-2"></i>Logout
                                                </button>
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endguest
                    </div>
                </li>
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">Kategori</a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="https://medium.com/uloszone"
                       style="font-weight: 400; font-size: 1rem;line-height: 1.5">Blog</a>
                </li>
            </ul>
            <div class="d-sm-none d-md-block d-lg-block search">
                <input type="text" class="" placeholder="asdasd">
            </div>
        </div>

        <div class="d-none d-lg-block" style="margin-right: 17rem">
            <div class="search-area">
                <form class="example" action="/search">
                    <input type="text" placeholder="Cari Produk" name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <div id="cart-icon" class="d-none d-lg-block">
            @if(Auth::check())
                <cart-icon :user-id="{{Auth::user()->id}}"/> @else
                <cart-icon/> @endif
        </div>


        <div class="loginbutton d-none d-lg-block">
            @auth
                <div class="user-login-info">
                    <a href="{{ url('/customer/' . Auth::user()->id . '/orders' )}}">Pesanan</a>
                </div>
            @endauth @guest
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
                           aria-expanded="false">
                            <img width="25" src="/user-assets/img/core-img/user.svg" alt="">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <ul class="dropdown">
                                <a class="nav-link" href="#"><i class="fa fa-user mr-2"></i>My Profile</a>

                                <form method="POST" action="{{ url('/logout')}}">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn nav-link" style="background-color: transparent"><i
                                                class="fa fa-power-off mr-2"></i>Logout
                                    </button>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            @endguest
        </div>


    </div>
</nav>

<div class="col-sm-12 d-sm-block d-md-none d-lg-none" style="    top: -16px;">
    <div class="search-area">
        <form class="example" action="/search">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
@include('users.auth.login_modal')
@endrole