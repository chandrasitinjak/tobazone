@extends('users.layouts.app')
@section('title') {{ "Homestay Orders" }}
@endsection

@section('content')
<section class="shop_grid_area section-padding-80">
    <h2>Daftar Pesanan Penginapan Customer</h2>
    <hr>
  <div class="container">
    <div class="row">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Penginapan Tujuan</th>
                <th scope="col">Lama Menginap</th>
                <th scope="col">Metode Pembayaran</th>
                <th scope="col">Harga</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            @foreach ($homestayOrders as $index => $homestayOrder)
            <tbody>
                <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $homestayOrder->homestay->name }}</td>
                <td>{{ $homestayOrder->duration }} Hari</td>
                <td>{{ $homestayOrder->payment_method }}</td>
                <td>Rp {{ number_format($homestayOrder->total_price, 2, ',', '.') }}</td>
                <td>{{ ucfirst(strtolower($homestayOrder->status)) }}</td>
                </tr>
            </tbody>
            @endforeach
          </table>
    </div>
  </div>
</section>
<!-- ##### Shop Grid Area End ##### -->
@endsection
