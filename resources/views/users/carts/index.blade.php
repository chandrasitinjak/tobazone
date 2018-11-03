@extends('users.layouts.app') 
@section('content')
<div class="col-md-12 keranjang">
  <div class="card globalcard ">
    <div class="card-header">
      <h5 style="float: left">Keranjang Belanja</h5>
    </div>

    <div class=" card-body ">
      <div class="row">
        <div class="col-md-12" style="margin-bottom: 2em">
          <div class="row font-bold">
            <div class="col-md-4 col-4">
              Produk
            </div>
            <div class="col-md-4 col-4">
              Harga
            </div>
            <div class="col-md-4 col-4">
              Jumlah
            </div>
          </div>
        </div>
        
        @foreach ($carts as $cart)
          <div class="col-md-4 col-4">
            <div class="row">
              <div class="col-md-6">
                <div class="imgwrapper">
                  <img src="{{ url('/images/' . json_decode($cart->product->images)[0]) }}">
                </div>
              </div>
              <div class="col-md-3">
                <div class="keranjang-desc-prod">
                  <p>{{$cart->product->name}}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-4">
            Rp. {{ $cart->product->price }}
          </div>
          <div class="col-md-4 col-4">
            {{ $cart->total }} 
            <button type="button" onclick="deleteCart('{{ $cart->id }}')" class=" ml-5 btn btn-sm btn-danger"> Hapus </button>
          </div>
        @endforeach
      </div>
    </div>
    <div class="card-footer  ">
      <div class="row justify-content-end">
        <div class="col-md-3 text-right">
          <h6> Total Bayar</h6>

          @php
            $total = 0;
            foreach ($carts as $cart) {
              $total += $cart->product->price * $cart->total;
            }
          @endphp
          <h5>Rp. {{ $total }}</h5>
        </div>
      </div>
    </div>

    @if(count($carts) !== 0)
      <div class="card-footer ">
        <a href="{{ url('/shipping') }}" class="btn btn-primary float-right">Lanjut Pembayaran</a>
      </div>
    @else
      <div class="card-footer ">
        <a href="{{ url('/') }}" class="btn btn-primary float-right">Lanjut Berbelanja</a>
      </div>
    @endif
  </div>
</div>
@endsection

<script> 
  function deleteCart(id) {
    jQuery.ajax({
      url: 'carts/delete/' + id,
      type: 'POST',
      data: {
        _token: "{{ csrf_token() }}"
      },
      dataType: 'json',
      success: function( data ) {
        console.log(data);
      }       
    })
  }
</script>