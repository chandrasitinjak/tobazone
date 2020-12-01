@extends('users.layouts.app')
@section('content')
    <div class="container mt-5">

        <div class="row justify-content-center text-center">
            <div class="col-12 text-center">
                <h2>TENTANG KOMUNITAS</h2>
            </div>
            <div class="col-8 mt-2">
                <p>Community Based Tourism ( CBT ) yaitu konsep pengembangan suatu destinasi wisata melalui pemberdayaan
                    masyarakat lokal, dimana masyarakat turut andil dalam perencanaan, pengelolaan, dan pemberian suara berupa
                    keputusan dalam pembangunannya.
                </p>
            </div>
            <div class="col-8 mt-1">
                <p>Komunitas pariwisata yang ada pada aplikasi Tobazone merupakan komunitas pariwisata yang berada di delapan
                    (8) kabupaten sekitar Danau Toba.</p>
            </div>
        </div>

        <div class="row justify-content-center text-center">
            <div class="col-2 bg-secondary m-3">
                <h2>{{$c_komunitas}}</h2>
                <h5>Komunitas</h5>
            </div>
            <div class="col-2 bg-secondary m-3">
                <h2>{{$c_member}}</h2>
                <h5>Member</h5>
            </div>
            <div class="col-2 bg-secondary m-3">
                <h2>{{$c_layanan}}</h2>
                <h5>Layanan Wisata</h5>
            </div>
        </div>

        <div class="row justify-content-center text-center mt-5">
            <div class="col-12 text-center">
                <h2>KOMUNITAS DI SETIAP KABUPATEN</h2>
            </div>
            <div class="col-8">
                <p>Terdapat komunitas - komunitas di 8 kabupaten di sekitaran Danau Toba</p>
            </div>
        </div>

        <div class="row justify-content-center text-center">
            @foreach($kabupaten as $row)            
            @if($row->nama_kabupaten=='Toba')
            <div class="col-3 mt-1 mb-1">
                <a href="{{route('komunitas.show',$row->id_kabupaten)}}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Indonesia_-_Lake_Toba_%2826224127503%29.jpg/300px-Indonesia_-_Lake_Toba_%2826224127503%29.jpg" alt="Foto Danau Toba">                
                <h6>Toba</h6>
                <p>{{$row->getKomunitas->count()}} Komunitas</p>
                </a>
            </div>
            @elseif($row->nama_kabupaten == 'Samosir')
            <div class="col-3 mt-1 mb-1">
                <a href="{{route('komunitas.show',$row->id_kabupaten)}}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Indonesia_-_Lake_Toba_%2826224127503%29.jpg/300px-Indonesia_-_Lake_Toba_%2826224127503%29.jpg" alt="Foto Danau Toba">                
                <h6>Tapanuli Utara</h6>
                <p>{{$row->getKomunitas->count()}} Komunitas</p>
                </a>
            </div>
            @elseif($row->nama_kabupaten == 'Tapanuli Utara')
            <div class="col-3 mt-1 mb-1">
                <a href="{{route('komunitas.show',$row->id_kabupaten)}}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Indonesia_-_Lake_Toba_%2826224127503%29.jpg/300px-Indonesia_-_Lake_Toba_%2826224127503%29.jpg" alt="Foto Danau Toba">            
                <h6>Karo</h6>
                <p>{{$row->getKomunitas->count()}} Komunitas</p>
                </a>
            </div>
            @elseif($row->nama_kabupaten == 'Karo')
            <div class="col-3 mt-1 mb-1">
                <a href="{{route('komunitas.show',$row->id_kabupaten)}}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Indonesia_-_Lake_Toba_%2826224127503%29.jpg/300px-Indonesia_-_Lake_Toba_%2826224127503%29.jpg" alt="Foto Danau Toba">
                <h6>Samosir</h6>
                <p>{{$row->getKomunitas->count()}} Komunitas</p>
                </a>
            </div>
            @elseif($row->nama_kabupaten == 'Simalungun')
            <div class="col-3 mt-1 mb-1">
                <a href="{{route('komunitas.show',$row->id_kabupaten)}}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Indonesia_-_Lake_Toba_%2826224127503%29.jpg/300px-Indonesia_-_Lake_Toba_%2826224127503%29.jpg" alt="Foto Danau Toba">
                
                <h6>Simalungun</h6>
                <p>{{$row->getKomunitas->count()}} Komunitas</p>
                </a>
            </div>
            @elseif($row->nama_kabupaten == 'Humbang Hasundutan')
            <div class="col-3 mt-1 mb-1">
                <a href="{{route('komunitas.show',$row->id_kabupaten)}}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Indonesia_-_Lake_Toba_%2826224127503%29.jpg/300px-Indonesia_-_Lake_Toba_%2826224127503%29.jpg" alt="Foto Danau Toba">
                <h6>Humbang Hasundutan</h6>
                <p>{{$row->getKomunitas->count()}} Komunitas</p>
                </a>
            </div>
            @elseif($row->nama_kabupaten == 'Dairi')
            <div class="col-3 mt-1 mb-1">
                <a href="{{route('komunitas.show',$row->id_kabupaten)}}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Indonesia_-_Lake_Toba_%2826224127503%29.jpg/300px-Indonesia_-_Lake_Toba_%2826224127503%29.jpg" alt="Foto Danau Toba">                
                <h6>Dairi</h6>
                <p>{{$row->getKomunitas->count()}} Komunitas</p>
                </a>
            </div>
            @endif
            @endforeach
        </div>

        <div class="row justify-content-center text-center mt-5">
            <div class="col-12 text-center">
                <h2>PENDAFTARAN UNTUK KEANGGOTAAN CBT</h2>
            </div>
            <div class="col-8 mt-3">
                <p>Untuk menjadi Anggota CBT, pemilik usaha layanan wisata harus mendaftarkan dirinya ke dalam aplikasi.
                    Setelah menjadi Anggota CBT, pemilik layanan wisata nantinya akan dapat menggunakan aplikasi ini untuk
                    mengelola layanan wisata yang dimilikinya, melihat history penjualan, melihat komunitas yang berpasrtisipasi,
                    dan melakukan pendaftaran ke komunitas.
                </p>
            </div>
            <div class="col-12 mb-5">
                <a href="/register" class="btn essence-btn">DAFTAR ANGGOTA CBT</a>
            </div>
        </div>

    </div>
@endsection
