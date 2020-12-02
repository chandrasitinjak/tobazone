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
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="progress-table-wrap">
                                <div class="progress-table">
                                    <div class="table-head">
                                        <div class="serial">#</div>
                                        <div class="country">Nama Layanan</div>
                                        <div class="visit">Pemilik Layanan</div>
                                        <div class="visit">Jenis Layanan</div>
                                        <div class="percentage">Deskripsi</div>
                                    </div>
                                    @if(isset($row->getKomunitasMember)&&$row->getKomunitasMember->count()>0)
                                        <?php $indexx = 1 ?>
                                        @foreach($row->getKomunitasMember as $member)
                                            @if(isset($member->getLayanan))
                                                @foreach($member->getLayanan as $layanan)
                                                    <div class="table-row">
                                                        <div class="serial">{{$indexx}}<?php $indexx += 1 ?></div>
                                                        <div class="country">{{$layanan->nama_layanan}}</div>
                                                        <div class="visit">{{$member->getUser->name}}</div>
                                                        <div
                                                            class="visit">{{$layanan->getJenisLayanan->nama_jenis_layanan}}</div>
                                                        <div
                                                            class="percentage">{{$layanan->deskripsi_layanan}}</div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="table-row">
                                            <div class="serial"></div>
                                            <div class="country">Belum memiliki Layanan Wisata</div>
                                            <div class="visit"></div>
                                            <div
                                                class="visit"></div>
                                            <div
                                                class="percentage"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
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
