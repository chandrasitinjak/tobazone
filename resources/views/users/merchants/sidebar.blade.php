<div class="col-md-3 col-lg-3 d-none d-sm-block">
  <div class="merchant-sidebar">
    <div class="card globalcard">
      <div class="card-body">
        <div class="mercant-sidebar-menu">
          <ul id="menu-content2" class="menu-content collapse show">
            <!-- Single Item -->
            <li data-toggle="collapse" data-target="#produk">
              <a>Produk</a>
              <ul class="sub-menu collapse show" id="produk">
                <li><a href="{{ url('/merchant') }}">Semua Produk</a></li>
                <li>                
                  <ul id="menu-content2" class="menu-content collapse show">
                      <li data-toggle="collapse" data-target="#tambah_produk">
                        <a>Tambah Produk</a>
                        <ul class="sub-menu collapse show" id="tambah_produk">
                         <li> <a href="{{ url('/products/ulos/create') }}">Tambah ulos</a></li>
                         <li> <a href="{{ url('/products/clothes/create') }}">Tambah pakaian</a></li>
                         <li> <a href="{{ url('/products/food/create') }}">Tambah makanan</a></li>                         
                         <li> <a href="{{ url('/products/accessories/create') }}">Tambah aksesoris</a></li>
                         <li> <a href="{{ url('/products/medicine/create') }}">Tambah obat</a></li>
                          </ul>
                      </li>
                  </ul>                  
                </li>
                <!-- <li><a href="">Produk terjual</a></li> -->
              </ul>
            </li>
            <!-- Single Item -->
            <li data-toggle="collapse" data-target="#pemesanan" class="collapsed">
              <a href="#">Pemesanan</a>
              <ul class="sub-menu collapse show" id="pemesanan">
                <li><a href="{{ url('/merchant/' . Auth::user()->id . '/new-orders') }}">Order Masuk</a></li>
                <li><a href="{{ url('/merchant/' . Auth::user()->id . '/ongoing-orders') }}">Order yang Sedang Diproses</a></li>
                <li><a href="{{ url('/merchant/' . Auth::user()->id . '/succes-orders') }}">Order Berhasil</a></li>
                <!-- <li><a href="#">Order Dibatalkan</a></li>
                <li><a href="#">Order Gagal</a></li> -->
              </ul>
            </li>
            {{--<li data-toggle="collapse" data-target="#penjualan" class="collapsed">--}}
              {{--<a>Penjualan</a>--}}
            {{--</li>--}}
            {{--<ul class="sub-menu collapse" id="penjualan">--}}
              {{--<li><a href="">Order Berhasil</a></li>--}}
              {{--<li><a href="">Order Dibatalkan</a></li>--}}
              {{--<li><a href="">Order Gagal</a></li>--}}
            {{--</ul>--}}
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

