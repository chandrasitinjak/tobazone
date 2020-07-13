@extends('users.layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
        @if(count($wishlist) == 0)
            <center><h3 class="mt-100">Favorit Anda Kosong</h3></center>
            <div style="height : 15rem">

            </div>
        @else
        <center><h3 class="mt-5">Favorit Saya</h3></center>

        <table class="table mt-3">
            <thead>
                <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Gambar Produk</th>                
                <th scope="col" colspan="2" ><center>Aksi</center></th> 
                </tr>
            </thead>
            <tbody>
                <?php $i = 0 ?>
                @foreach($wishlist as $dasa)        
                <?php $i++ ?>
                <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $dasa['product']->name }}</td>
                <td>
                    <img src="{{ url('/images/'.json_decode($dasa['product']->images)[0]) }}" alt="" style="height:7rem;width:11rem">
                </td>            
                <td><center><a href="{{ url('/products/'.$dasa['product']->id) }}"><button class="btn btn-info">Beli</button></center></a></td>
                <td><center>
                   
                <!-- <form action="{{ url('/wishlist/'.$dasa->id.'/delete') }}" method="POST">
                    @csrf
 </form> -->

                    <button type="submit" class="btn btn-danger" onclick="parsingId({{$dasa->id}})" data-toggle="modal" data-target="#deleteConfirmation">Hapus</button>
                   
                    <div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteConfirmationLabel">Konfirmasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ url('/wishlist/delete') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <p>Apakah Anda Yakin Mau Menghapus?</p>
                                </div>
                                <input type="hidden" name="id_product" id="cat_prod" value="">
                                <div class="modal-footer">                                    
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

<script>
    
    function parsingId(id) {
        var id_prod = id;
        
        $("#cat_prod").val(id_prod);
    }
</script>
    
@endsection 