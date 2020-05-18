@extends('users.layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
        @if(count($wishlist) == 0)
            <center><h3 class="mt-100">Wishlist Anda Kosong</h3></center>
            <div style="height : 15rem">

            </div>
        @else
        <center><h3 class="mt-5">Wishlist Saya</h3></center>

        <table class="table mt-3">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">nama produk</th>
                <th scope="col">gambar produk</th>                
                <th scope="col" colspan="2" ><center>aksi</center></th> 
                </tr>
            </thead>
            <tbody>
                <?php $i = 0 ?>
                @foreach($wishlist as $dasa)        
                <?php $i++ ?>
                <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $dasa['product']->name }}</td>
                <td><img src="{{ url('/images/'.json_decode($dasa['product']->images)[0]) }}" alt="" style="height:7rem;width:11rem"></td>            
                <td><center><a href="{{ url('/products/'.$dasa['product']->id) }}"><button class="btn btn-info">Beli</button></center></a></td>
                <td><center>
                    <form action="{{ url('/wishlist/'.$dasa->id.'/delete') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    </center>
                </td>                        
                </tr>                                
                @endforeach
            </tbody>
            </table>    
        @endif                                    
        </div>
        <div class="col-md-1">
        </div>
    </div>
    
@endsection 