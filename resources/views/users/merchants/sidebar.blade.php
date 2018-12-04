<div class="col-md-3 col-lg-3">
  <div class="merchant-sidebar">
    <div class="card globalcard">
      <div class="card-body">
        <div class="mercant-sidebar-menu">
          <ul id="menu-content2" class="menu-content collapse show">
            <!-- Single Item -->
            <li data-toggle="collapse" data-target="#clothing">
              <a>Produk</a>
              <ul class="sub-menu collapse show" id="clothing">
                <li><a href="{{ url('/merchant') }}">All</a></li>
                <li><a href="{{ url('/products/create') }}">Tambah produk</a></li>
                <li><a>Produk terjual</a></li>
              </ul>
            </li>
            <!-- Single Item -->
            <li data-toggle="collapse" data-target="#shoes" class="collapsed">
              <a>Pemesanan</a>
              <ul class="sub-menu collapse" id="shoes">
                <li><a href="{{ url('/merchant/' . Auth::user()->id . '/new-orders') }}">Order Masuk</a></li>
                <li><a href="{{ url('/merchant/' . Auth::user()->id . '/ongoing-orders') }}">Order yang Sedang Diproses</a></li>
                <li><a>Order Berhasil</a></li>
                <li><a>Order Dibatalkan</a></li>
                <li><a>Order Gagal</a></li>
              </ul>
            </li>
            <li data-toggle="collapse" data-target="#penjualan" class="collapsed">
              <a>Penjualan</a>
            </li>
            <ul class="sub-menu collapse" id="penjualan">
              <li><a>Order Berhasil</a></li>
              <li><a>Order Dibatalkan</a></li>
              <li><a>Order Gagal</a></li>
            </ul>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>