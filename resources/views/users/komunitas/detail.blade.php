@extends('users.layouts.app')
@section('content')

    <div class="container-fluid mt-5">
        @forelse($komunitas as $indexK => $row)
            <div class="row">
                <div class="col-lg-12">
                    @if($indexK>0)
                        <br><br><br><br><br><br>
                    @endif
                    <h3>{{$indexK+1}}. {{$row->nama_komunitas}}</h3>
                    <div class="row">
                        <div class="col-lg-11 offset-lg-1">
                            <div class="row">
                                <div class="col-lg-10">
                                    <p><?= $row['deskripsi'] ?></p>
                                </div>
                            </div>
                            <!-- Gambar Komunitas -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="thumb">
                                        <img src="{{asset('storage/img/komunitas/'.$row->gambar)}}">
                                    </div>
                                </div>
                            </div>
                            <!--/Gambar Komunitas -->
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <h3 class="mb-30">Anggota Komunitas : </h3>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jumlah Layanan yang Dimiliki</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($row->getKomunitasMember)&&$row->getKomunitasMember->count()>0)
                                    @foreach($row->getKomunitasMember as $index => $member)
                                <tr>
                                    <th scope="row">{{$index+1}}</th>
                                    <td><img
                                            src="{{asset('/storage/img/member/'.$member->photo)}}"
                                            style="width: 20%"></td>
                                    <td>{{$member->getUser->name}}</td>
                                    <td>{{$member->getLayanan->count()}}</td>
                                </tr>
                                    @endforeach
                                @else
                                    <th scope="row"></th>
                                    <td></td>
                                    <td>Belum Memiliki Anggota</td>
                                    <td></td>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="mb-30">Layanan Wisata : </h3>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Layanan</th>
                                    <th scope="col">Pemilik Layanan</th>
                                    <th scope="col">Jenis Layanan</th>
                                    <th scope="col">Deskripsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($row->getKomunitasMember)&&$row->getKomunitasMember->count()>0)
                                    <?php $indexx = 1 ?>
                                    @foreach($row->getKomunitasMember as $member)
                                        @if(isset($member->getLayanan))
                                            @foreach($member->getLayanan as $layanan)
                                <tr>
                                    <th scope="row">{{$indexx}}<?php $indexx += 1 ?></th>
                                    <td>{{$layanan->nama_layanan}}</td>
                                    <td>{{$member->getUser->name}}</td>
                                    <td>{{$layanan->getJenisLayanan->nama_jenis_layanan}}</td>
                                    <td>{{$layanan->deskripsi_layanan}}</td>
                                </tr>
                                    @endforeach
                                    @endif
                                    @endforeach
                                </tbody> 
                                    @else                                              
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Belum Memiliki Layanan Wisata</td>
                                            <td></td>
                                    @endif                                                                                                           
                                </table>
                                    
                            </div>
                        </div>                        
                </div>
            </div>
        @empty
            <div class="row">
                <div class="col-lg-12">
                    <h3>Belum Ada Komunitas Di Daerah Ini !</h3>
                </div>
            </div>
        @endforelse
    </div>
@endsection
