@extends('users.layouts.app') 
@section('title') {{ "Order" }}
@endsection
 
@section('content')

<div class="container mt-15">
  <div class="row mt-15">
    <div class="col-md-3">
        <h4 class="pb-3">Pembeli</h4>        
            @foreach($trasactions as $trasactions) 
                <p>{{ $trasactions['customer_info']->name}}</p>                       
    </div>              

    <div class="col-md-6">
            <h4 class="pb-3">Produk</h4>
            
            @foreach($trasactions["orders"] as $order)                                        
            
        <div class="row">
          <div class="col-md-6">
              <img src="{{ url('/images/'.json_decode($order['product']->images)[0]) }}" alt="gambar" style="height:12rem;width:17rem" />                            
          </div>
          <div class="col-md-6">
                    <p>{{ $order['product']['name']}} , quantity : {{ $order['quantity']}}</p>                    
                    <p>Harga perunit : {{ $order['product']['price'] }}</p> 
                    <p>total pembayaran : {{ $order['quantity'] *  $order['product']['price'] }}</p>
          </div>
        </div>                           
                 @endforeach

                 @if(count($trasactions["orders"]))                               
                 <h5 class="pb-1" style="color : white">akjsdhaksj</h5>
            @endif
                 
    </div>

    <div class="col-md-3">
                <h4 class="pb-3">Detail Transaksi</h4>
                 <p>Total pembayaran : {{ $trasactions['payment']->product_cost }}</p>
                 <p>Ongkos Kirim : {{ $trasactions['payment']->shipping_cost }}</p>
                 <p>Jumlah Total : {{ $trasactions['payment']->shipping_cost  +  $trasactions['payment']->product_cost}} </p>
                <p></p>         
            @endforeach
    </div>
    
  </div>

  <div class="row pb-5 pt-5">
    <div class="col-md-10">
    </div>
    <div class="col-md-1">
        <center><a href="{{ url('/merchant/'.Auth::user()->id.'/succes-orders') }}" class="btn btn-info">kembali</a></center>
    </div>
  </div>
</div>
@endsection