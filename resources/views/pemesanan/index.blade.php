@extends('users.layouts.app')
@section('content')

    <div class="row">
        <div class="col">
            <center><h3 class="mt-5">Riwayat Pemesanan</h3></center>

            <table class="table mt-5 mb-5">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Paket wisata</th>
                    <th scope="col">Status Pemesanan</th>
                    <th scope="col">Jumlah Peserta Perjalanan</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($pemesanan as $index => $row)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$row->getSesi->getPaket->nama_paket}}</td>
                        <td>{{$row->defineStatus($row->status)}}</td>
                        <td>{{$row->jumlah_peserta}}</td>
                        <td>
                            <a href="{{route('pemesanan.detail',$row->id_pemesanan)}}"
                               class="btn btn-dark">Detail</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <center>Anda belum memiliki riwayat pemesanan</center>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
