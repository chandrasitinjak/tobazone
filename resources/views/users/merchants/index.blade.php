@extends('users.layouts.app') 
@section('title') {{ "Dashboard" }}
@endsection
 
@section('content')

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card globalcard store">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3 col-sm-3 d-none d-sm-block store-image">
              <div class="imgwrapper">
                <img src="{{ url('/images/no-image.jpg') }}" alt="">
              </div>
            </div>
            <div class="col-md-9 col-sm-12 store-name">
              <div class="row">
                <div class="col-10 col-sm-8 col-md-10">
                  <h5 class="mb-0"> {{ $merchant->profile->name }}</h5>
                </div>
                <div class="col-2 ">
                  <button type="submit" class="btn btn-primary btn-sm float-right">
                      <i class="fa fa-gear"></i> Edit
                    </button>
                </div>
              </div>

              <p> Horas Mamangke Mangomo Partiga-tiga </p>

              <div class="store-desc">
                <i class="fa fa-map mr-1"></i> {{$merchant->profile->address->subdistrict_name}} {{", " . $merchant->profile->address->city_name}}
                {{", " . $merchant->profile->address->province_name}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--menu-store-->
  <div class="row">
    <!--sidebar-->
    @include('users.merchants.sidebar')
    <!--//sidebar-->

    <!--content-->

    <div id="product-list" class="col-12 col-md-9 col-lg-9">
      <product-list-merchant-page />

      <div class="card globalcard">
        <div class="card-header">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pesananbaru-tab" data-toggle="tab" href="#pesananbaru" role="tab" aria-controls="home" aria-selected="true">Pesanan Baru</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="Konfirmasi-tab" data-toggle="tab" href="#konfirmasi" role="tab" aria-controls="profile" aria-selected="false">Konfirmasi Pengiriman</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="Status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="contact" aria-selected="false">Status Pengiriman</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="transaksi-tab" data-toggle="tab" href="#transaksi" role="tab" aria-controls="contact" aria-selected="false">Daftar Transaksi</a>
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
                                <div class="font-bold">Kota tujuan:</div>
                                <div class="text-muted">asdsad</div>
                              </div>
                              <div class="col-3">asd212 asdasd</div>
                              <div class="col-3">4121</div>
                              <div class="col-3">dgsd</div>
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
              <h5>pemesanan</h5>
            </div>
            <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="Status-tab">...</div>
            <div class="tab-pane fade" id="transaksi" role="tabpanel" aria-labelledby="Konfirmasi-tab">
              <h5>transaksi</h5>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection