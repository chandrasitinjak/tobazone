@extends('users.layouts.app') 
@section('title') {{ "Order" }}
@endsection
 
@section('content')

<div class="container">
  <div class="row mt-15">
    <div class="col-12">
        <h4>Pembeli</h4>        
            @foreach($trasactions as $trasactions) 
                <p> nama : {{ $trasactions['customer_info']->name}}</p>       
                <p>barang yang dibeli : </p>                
                 @foreach($trasactions["orders"] as $order)                                        
                    <p>nama Produk : {{ $order['product']['name']}} , quantity : {{ $order['quantity']}}</p>                    
                    <p>Harga perunit : {{ $order['product']['price'] }}, total pembayaran = {{ $order['quantity'] *  $order['product']['price'] }}</p> 
                 @endforeach

                 <p>Total pembayaran : {{ $trasactions['payment']->product_cost }}</p>
                 <p>Ongkos Kirim : {{ $trasactions['payment']->shipping_cost }}</p>
                 <p>Jumlah Total : {{ $trasactions['payment']->shipping_cost  +  $trasactions['payment']->product_cost}} </p>
                <p></p>         
            @endforeach
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
        <a href="{{ url('/merchant/'.Auth::user()->id.'/succes-orders') }}" class="btn btn-info">kembali</a>
    </div>
  </div>
</div>
@endsection