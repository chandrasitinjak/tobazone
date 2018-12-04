@extends('users.layouts.app') 
@section('title') {{ "Order" }}
@endsection
 
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-3 col-lg-3">
      <div class="merchant-sidebar">
        <div class="card globalcard">
          <div class="card-body p-1">
            <div class="mercant-sidebar-menu">
              <div class="col-md-12 text-center">
                <div class="imgwrapper mb-3" style="padding: 0px;">
                  <img src="img/product-img/product-2.jpg" alt="Card image cap" style="object-fit: scale-down">
                </div>
                <h6>Palti Sinaga</h6>
              </div>
            </div>
          </div>
        </div>

        <!--leftnav-->
        <div class="card globalcard">
          <div class="card-body">
            <div class="mercant-sidebar-menu">
              <ul id="menu-content2" class="menu-content collapse show">
                <!-- Single Item -->
                <li data-toggle="collapse" data-target="#clothing">
                  <a href="#">Profil</a>
                </li>
                <!-- Single Item -->
                <li data-toggle="collapse" data-target="#shoes" class="collapsed">
                  <a href="#">Pesanan</a>
                  <ul class="sub-menu collapse" id="shoes">
                    <li><a href="#">Order Berhasil</a></li>
                    <li><a href="#">Order Dibatalkan</a></li>
                    <li><a href="#">Order Gagal</a></li>
                  </ul>
                </li>
                <li data-toggle="collapse" data-target="#penjualan" class="collapsed">
                  <a href="#">Penjualan</a>
                </li>
                <ul class="sub-menu collapse" id="penjualan">
                  <li><a href="#">Order Berhasil</a></li>
                  <li><a href="#">Order Dibatalkan</a></li>
                  <li><a href="#">Order Gagal</a></li>
                </ul>
                <li data-toggle="collapse" data-target="#ulasan" class="collapsed" style="border-top:1px #b6b6b6 solid ">
                  <form method="POST" action="{{ url('/logout')}}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn nav-link" style="background-color: transparent">Keluar</button>
                  </form>
                </li>
                <!-- Single Item -->
              </ul>
            </div>
          </div>
        </div>
        <!--leftnav-->
      </div>
    </div>
    <div id="order-list-customer" class="col-md-9 crudproduk">
      <order-list-customer-page :user-id="{{ Auth::user()->id }}" />
    </div>
  </div>
</div>
@endsection