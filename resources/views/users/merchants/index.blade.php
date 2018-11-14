@extends('users.layouts.app')
@section('title')
    {{ "Dashboard" }}
@endsection
@section('content')

  <div class="container">
    <!--desc-store-->
    <div class="row">
      <div class="col-12">
        <div class="card globalcard store">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-3 col-sm-3 d-none d-sm-block store-image">
                <div class="imgwrapper">
                  <img src="img/product-img/product-1.jpg" alt="">
                </div>
              </div>
              <div class="col-md-9 col-sm-12 store-name">
                <div class="row">
                  <div class="col-10 col-sm-8 col-md-10">
                    <h5 class="mb-0">Nanda Ulos</h5>
                  </div>
                  <div class="col-2 ">
                    <button type="submit" class="btn btn-primary btn-sm float-right">
                      <i class="fa fa-gear"></i> Edit
                    </button>
                  </div>
                </div>

                <p> Horas Mamangke Mangomo Partiga-tiga </p>

                <div class="store-desc">
                  <div class="row">
                    <div class="col-sm-3">
                      laksjd
                    </div>
                    <div class="col-sm-3">
                      asd212
                    </div>
                    <div class="col-sm-3">
                      4121
                    </div>
                    <div class="col-sm-3">
                      dgsd
                    </div>
                  </div>
                  <i class="fa fa-map mr-1"></i>Balige TobaSamosir, Sumatera Utara, Indonesia
                </div>
                <div class="col-12 align-content-end store-share">
                  <button type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-instagram"></i>
                  </button>
                  <button type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-facebook"></i>
                  </button>
                  <button type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-whatsapp"></i>
                  </button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--//desc-store-->

    <!--menu-store-->
    <div class="row">
      <!--sidebar-->
        <div class="col-md-3 col-lg-3">
            <div class="merchant-sidebar">
                <div class="card globalcard">
                    <div class="card-body">
                        <div class="mercant-sidebar-menu">
                            <ul id="menu-content2" class="menu-content collapse show">
                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#clothing">
                                    <a href="#">Produk</a>
                                    <ul class="sub-menu collapse show" id="clothing">
                                        <li><a href="#">All</a></li>
                                        <li><a href="#">Tambah produk</a></li>
                                        <li><a href="#">Produk terjual</a></li>
                                    </ul>
                                </li>
                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#shoes" class="collapsed">
                                    <a href="#">Pemesanan</a>
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
                                <li data-toggle="collapse" data-target="#ulasan" class="collapsed">
                                    <a href="#">Informasi Toko</a>
                                </li>
                                <!-- Single Item -->

                            </ul>
                        </div>
                        <ul>
                            <li>Pengaturan Toko</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      <!--//sidebar-->

      <!--content-->
      <div class="col-12 col-md-9 col-lg-9">

        <!--List Produk-->
        <div class="card globalcard">
          <div class="card-header">
            <nav class="navbar navbar-expand-sm navbar-light ">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                      Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Ulos</a>
                      <a class="dropdown-item" href="#">Mandar</a>
                      <a class="dropdown-item" href="#">Bahan Jas</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                      Urutkan Berdasarkan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                      <a class="dropdown-item" href="#">Nama A-Z</a>
                      <a class="dropdown-item" href="#">Nama Z-A</a>
                      <a class="dropdown-item" href="#">Harga Termahal</a>
                      <a class="dropdown-item" href="#">Harga Termurah</a>
                      <a class="dropdown-item" href="#">Paling banyak dilihat</a>

                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control form-control-sm mr-sm-2 " type="search" placeholder="Cari Produk"
                         aria-label="Search">
                  <button class="btn btn-outline-primary btn-sm my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div>
            </nav>

          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-3 col-sm-2 px-1">
                <div class="card products">
                  <div class="imgwrapper">
                    <img src="img/product-img/product-33.jpg" alt="Card image cap">
                  </div>

                  <div class="card-body">
                    <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                    <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                    <p class="card-text float-right">
                      <i class="fa fa-truck" aria-hidden="true"></i>
                      <small class="text-muted">Tarutung</small>
                    </p>

                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-2 px-1">
                <div class="card products">
                  <div class="imgwrapper">
                    <img src="img/product-img/product-33.jpg" alt="Card image cap">
                  </div>

                  <div class="card-body">
                    <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                    <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                    <p class="card-text float-right">
                      <i class="fa fa-truck" aria-hidden="true"></i>
                      <small class="text-muted">Tarutung</small>
                    </p>

                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-2 px-1">
                <div class="card products">
                  <div class="imgwrapper">
                    <img src="img/product-img/product-33.jpg" alt="Card image cap">
                  </div>

                  <div class="card-body">
                    <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                    <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                    <p class="card-text float-right">
                      <i class="fa fa-truck" aria-hidden="true"></i>
                      <small class="text-muted">Tarutung</small>
                    </p>

                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-2 px-1">
                <div class="card products">
                  <div class="imgwrapper">
                    <img src="img/product-img/product-33.jpg" alt="Card image cap">
                  </div>

                  <div class="card-body">
                    <p class="card-title productname">Ulos Ragihotang asdjahslkd</p>
                    <h6 style="color: #ff5205"> Rp 2.400.000</h6>
                    <p class="card-text float-right">
                      <i class="fa fa-truck" aria-hidden="true"></i>
                      <small class="text-muted">Tarutung</small>
                    </p>

                  </div>
                </div>
              </div>
            </div>
            <!-- Pagination -->
            <nav aria-label="navigation">
              <ul class="pagination mt-50 mb-50">
                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">21</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </nav>
          </div>

        </div>
        <!--//List Produk-->

        <!--Pemesanan-->
        <div class="card globalcard">
          <div class="card-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pesananbaru-tab" data-toggle="tab" href="#pesananbaru" role="tab"
                   aria-controls="home" aria-selected="true">Pesanan Baru</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="Konfirmasi-tab" data-toggle="tab" href="#konfirmasi" role="tab"
                   aria-controls="profile" aria-selected="false">Konfirmasi Pengiriman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="Status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="contact"
                   aria-selected="false">Status Pengiriman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="transaksi-tab" data-toggle="tab" href="#transaksi" role="tab"
                   aria-controls="contact" aria-selected="false">Daftar Transaksi</a>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="pesananbaru" role="tabpanel" aria-labelledby="pesananbaru-tab">
                <div class="row mt-2">
                  <div class="col-12">
                    <div class="card hcard">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-lg-3 col-sm-3 d-none d-sm-block store-image">
                            <div class="imgwrapper">
                              <img src="img/product-img/product-1.jpg" alt="">
                            </div>
                          </div>
                          <div class="col-md-9 col-sm-12 store-name pl-0">
                            <div class="store-desc">
                              <div class="row">
                                <div class="col-10 col-sm-8 col-md-10">
                                  <h5 class="mb-0">Nanda Ulos</h5>
                                </div>

                              </div>
                              <div class="row">
                                <div class="col-3">
                                  <div class="font-bold">
                                    Kota tujuan:
                                  </div>
                                  <div class="text-muted  ">
                                    asdsad
                                  </div>
                                </div>
                                <div class="col-3">
                                  asd212
                                  asdasd
                                </div>
                                <div class="col-3">
                                  4121
                                </div>
                                <div class="col-3">
                                  dgsd
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <button class="btn btn-primary float-right">Konfirmasi</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="konfirmasi" role="tabpanel" aria-labelledby="Konfirmasi-tab">
                <h5> pemesanan</h5>
              </div>
              <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="Status-tab">...</div>
              <div class="tab-pane fade" id="transaksi" role="tabpanel" aria-labelledby="Konfirmasi-tab">
                <h5> transaksi</h5>
              </div>
            </div>

          </div>
        </div>
        <!--//Pemesanan-->


        <!--//content-->
      </div>
    </div>
  </div>

@endsection
