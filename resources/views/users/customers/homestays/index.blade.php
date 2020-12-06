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
                @if(count($homestayOrders) == 0)
                <center><img src="/images/assets/search_result_empty.png" style="height: 120px; alignment: center; border: none; opacity: 0.5"/></center>
                    <br>
                    <p>pesanan anda belum ada</p>
                @else
                <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Penginapan Tujuan</th>
                    <th scope="col">Lama Menginap</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                @foreach ($homestayOrders as $index => $homestayOrder)
                <tbody>
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $homestayOrder->homestay->name }}</td>
                    <td>{{ $homestayOrder->duration }} Hari</td>
                    <td>Rp {{ number_format($homestayOrder->total_price, 2, ',', '.') }}</td>
                    <td> <p  style="color: #FF8311; ">{{ ucfirst(strtolower($homestayOrder->status)) }}</p></td>
                    <td><a class="btn" style="background-color: black; color: white" href="{{url('/user/homestay/order/findById/'.$homestayOrder->id)}}">Detail</a>
                    <a class="btn" style="background-color: #6D0000; color: white" onclick="deletes()" >Delete</a></td>
                </tr>
                </tbody>
                @endforeach
                @endif
            </table>
        </div>
    </div>
</section>
<!-- ##### Shop Grid Area End ##### -->
@endsection
@if(!count($homestayOrders) == 0)
<script>
    function deletes() {
        var x = confirm("Are you sure you want to delete?");
        if (x)
            window.location = "{{url('/user/homestay/order/delete/'.$homestayOrder->id)}}";
        else
            return false;
        // href="{{url('/user/homestay/order/delete/'.$homestayOrder->id)}}"
    }
</script>
@endif
