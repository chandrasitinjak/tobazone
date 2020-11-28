@extends('users.layouts.app')
@section('content')
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <center><h3 class="mt-5">Detail Pemesanan</h3></center>
                    <div class="row mt-5">
                        <div class="col-3 px-1">
                            <div class="card products" style="border-radius: 10px;">
                                <a href="{{route('paket.detail',$pemesanan->getSesi->getPaket->id_paket)}}">
                                    <p class="btn btn-info btn-sm"
                                       style="border-radius: 30px;padding-top:5px;position:relative;left:4px;top:5px;">
                                        Rp.{{number_format($pemesanan->getSesi->getPaket->harga_paket)}}</p>
                                    <div class="imgwrapper">
                                        <img src="{{asset('storage/img/paket/'.$pemesanan->getSesi->getPaket->gambar)}}"
                                             alt="Card image cap" style="width: 1200px">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$pemesanan->getSesi->getPaket->nama_paket}}</h5>
                                        <p>{{$pemesanan->getSesi->getPaket->getKabupaten->nama_kabupaten}}</p>
                                        <p class="card-text">
                                            <medium class="text-muted  float-right"><i class="fa fa-clock-o"></i>
                                                &nbsp;{{$pemesanan->getSesi->getPaket->durasi}}</medium>
                                            <medium class="text-muted  float-left"></medium>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class=" col" style="margin-left: 5px;">
                            <div class="row border"
                                 style="border-radius: 5px; background: white;padding: 10px;margin-bottom: 10px;">
                                <div class="col ">
                                    <div class="row">
                                        <div class="col-4">

                                            <a class="btn btn-dark btn-md" href="{{route('pemesanan')}}">Kembali</a>
                                        </div>
                                        <div class="col">

                                            <h2>Detail Pemesanan</h2>
                                        </div>
                                    </div>
                                    <hr>
                                    <table width="100%">
                                        <tr>
                                            <th style="width: 48%"></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td><b>Status</b></td>
                                            <td><p>: </p></td>
                                            <td><p>{{$status}}</p></td>
                                        </tr>
                                        <tr>
                                            <td><b>Jadwal Kegiatan Perjalanan</b></td>
                                            <td><p>: </p></td>
                                            <td><p>{{$pemesanan->getSesi->jadwal}}</p></td>
                                        </tr>
                                        <tr>
                                            <td><b>Tanggal Pemesanan</b></td>
                                            <td><p>: </p></td>
                                            <td><p>{{$pemesanan->created_at}}</p></td>
                                        </tr>
                                        <tr>
                                            <td><b>Total Pembayaran</b></td>
                                            <td><p>: </p></td>
                                            <td><p>
                                                    Rp. {{number_format($pemesanan->getSesi->getPaket->harga_paket*$pemesanan->jumlah_peserta)}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Jumlah Peserta</b></td>
                                            <td><p>: </p></td>
                                            <td><p>{{$pemesanan->jumlah_peserta}} Orang</p></td>
                                        </tr>
                                        <tr>
                                            <td><b>Pesan</b></td>
                                            <td><p>: </p></td>
                                            <td><p>{{$pemesanan->pesan}}</p></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div v-if="status==1">
                                <div class="border row "
                                     style="border-radius: 5px; background: #fbf9ff;padding: 10px;margin-bottom: 10px;">
                                    <div class="col text-center" style="padding-bottom: 20px">
                                        <p>Segera selesaikan pembayaran Anda !</p>
                                        <br>
                                        <h2>@{{duration._data.hours}} Jam @{{ duration._data.minutes}} Menit @{{
                                            duration._data.seconds }} Detik</h2>
                                        <br>
                                        <p><i>(Sebelum @{{ getDeatline() }})</i></p>
                                    </div>
                                </div>
                                <div class="border row"
                                     style="background: white;padding: 10px;margin-bottom: 10px;border-radius: 5px">
                                    <div class="col ">
                                        <p class="gj-text-align-center">Transfer pembayaran ke salah satu nomor Account di bawah
                                            ini :</p>
                                        @foreach($rekening as $row)
                                            <hr>
                                            <h3 class="mb-30">{{$row->nama_bank}}</h3>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="{{asset('storage/img/rekening/'.$row->gambar)}}"
                                                         class="img-fluid">
                                                </div>
                                                <div class="col-md-10 mt-sm-20">
                                                    <p><b>Nomor Rekening : {{$row->nomor_rekening}}</b></p>
                                                    <p>a/n Kristopel Lumbantoruan </p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <hr>
                                        <div class="row">
                                            <button data-toggle="modal"
                                                    data-target="#exampleModal"
                                                    class="btn btn-dark col-md mt-sm-20">
                                                Upload Bukti Pembayaran
                                            </button>

                                            <!-- Modal -->
                                            <div
                                                class="modal fade"
                                                id="exampleModal"
                                                tabindex="-1"
                                                role="dialog"
                                                aria-labelledby="exampleModalLabel"
                                                aria-hidden="true"
                                            >
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Upload Bukti
                                                                Bayar</h5>
                                                            <button
                                                                type="button"
                                                                class="close"
                                                                data-dismiss="modal"
                                                                aria-label="Close"
                                                            >
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('transaksi.kirim',$pemesanan->id_pemesanan)}}"
                                                              method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <p>Total Yang Harus Dibayar :
                                                                    <b>Rp. {{number_format($pemesanan->getSesi->getPaket->harga_paket*$pemesanan->jumlah_peserta)}}</b>
                                                                </p>
                                                                <hr>
                                                                <label for="rekening" class="small">Pilih Rekening</label>
                                                                <hr>
                                                                @foreach($rekening as $row)
                                                                    <div id="rekening" class="form-group">
                                                                        <input type="radio" value="{{$row->id_rekening}}"
                                                                               id="rekening_{{$row->id_rekening}}"
                                                                               name="rekening"
                                                                               required>
                                                                        <label for="rekening_{{$row->id_rekening}}">
                                                                            <img
                                                                                src="{{asset('storage/img/rekening/'.$row->gambar)}}"
                                                                                width="50"> {{$row->nama_bank}}
                                                                            ({{$row->nomor_rekening}})</label>
                                                                    </div>
                                                                @endforeach
                                                                <br>
                                                                <hr>
                                                                <div class="form-group">
                                                                    <label for="bukti" class="small">Bukti Pembayaran</label>
                                                                    <hr>
                                                                    <input id="bukti" name="bukti" class="form-control"
                                                                           type="file" required>

                                                                </div>
                                                                <hr>
                                                                <div class="form-group">
                                                                    <label for="jumlah" class="small">Jumlah Nilai (Rp) yang
                                                                        Ditransfer</label>
                                                                    <hr>

                                                                    <input type="number" id="jumlah" min="0" class="form-control" name="jumlah"
                                                                           placeholder="Jumlah Nilai Transaksi (Rp)"
                                                                           required>
                                                                </div>
                                                            </div>
                                                            <div class="row modal-footer">
                                                                <div class="col-1">
                                                                </div>
                                                                <button type="submit" class="col btn btn-dark">Upload
                                                                </button>
                                                                <div class="col-1">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end Modal -->
                                        </div>
                                        <div class="row" style="margin-top:10px">
                                            <button type="button" class="btn btn-danger col-md mt-sm-20" data-toggle="modal"
                                                    data-target="#delete_{{$pemesanan->id_pemesanan}}">
                                                Batalkan Pemesanan
                                            </button>
                                            <div class="modal fade" id="delete_{{$pemesanan->id_pemesanan}}"
                                                 tabindex="-1" role="dialog"
                                                 aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="hapusModalLongTitle">
                                                                Batalkan Pemesanan</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Anda Yakin Ingin Membatalkan Pemesanan Paket ini ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                Tidak
                                                            </button>
                                                            <form
                                                                action="{{route('pemesanan.batal',$pemesanan->id_pemesanan)}}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Ya
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-else-if="status==5">
                                <div class="border row "
                                     style="border-radius: 5px; background: #fbf9ff;padding: 10px;margin-bottom: 10px;">
                                    <div class="col gj-text-align-center" style="padding-bottom: 20px">
                                        <p>Terima Kasih, {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                                        <br>
                                        <h2>Waktu Pembayaran Anda Telah Habis</h2>
                                        <br>
                                    </div>
                                </div>
                            </div>

                            <div v-else-if="status==6">
                                <div class="border row "
                                     style="border-radius: 5px; background: #fbf9ff;padding: 10px;margin-bottom: 10px;">
                                    <div class="col gj-text-align-center" style="padding-bottom: 20px">
                                        <p>Mohon Maaf, {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                                        <br>
                                        <h2>Bukti Pembayaran anda ditolak atau tidak dapat divalidasi !</h2>
                                        <br>
                                    </div>
                                </div>
                                @foreach($pemesanan->getTransaksi as $transaksi)
                                    @if(isset($transaksi->gambar))
                                        <div class="border row "
                                             style="border-radius: 5px; background: #fbf9ff;padding: 10px;margin-bottom: 10px;">
                                            <div class="col gj-text-align-center" style="padding-bottom: 20px">
                                                <h3>Bukti Pembayaran </h3>
                                                <br>
                                                <img src="{{asset('/storage/img/pembayaran/'.$transaksi->gambar)}}"
                                                     style="max-width: 300px">

                                                <div class="row" style="margin-top:20px;">
                                                    <button data-toggle="modal"
                                                            data-target="#exampleModal" type="button"
                                                            class="btn btn-dark col-md mt-sm-20">
                                                        Ganti Bukti Pembayaran
                                                    </button>

                                                    <!-- Modal -->
                                                    <div
                                                        class="modal fade"
                                                        id="exampleModal"
                                                        tabindex="-1"
                                                        role="dialog"
                                                        aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true"
                                                    >
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Upload Bukti
                                                                        Bayar</h5>
                                                                    <button
                                                                        type="button"
                                                                        class="close"
                                                                        data-dismiss="modal"
                                                                        aria-label="Close"
                                                                    >
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{route('transaksi.update',$transaksi->id_transaksi)}}"
                                                                      method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <p>Total Yang Harus Dibayar :
                                                                            <b>Rp. {{number_format($pemesanan->getSesi->getPaket->harga_paket*$pemesanan->jumlah_peserta)}}</b>
                                                                        </p>
                                                                        <hr>
                                                                        <label for="rekening" class="small">Pilih
                                                                            Rekening</label>
                                                                        <hr>
                                                                        @foreach($rekening as $row)
                                                                            <div id="rekening" class="form-group">
                                                                                <input type="radio"
                                                                                       value="{{$row->id_rekening}}"
                                                                                       id="rekening_{{$row->id_rekening}}"
                                                                                       name="rekening"
                                                                                       required>
                                                                                <label for="rekening_{{$row->id_rekening}}">
                                                                                    <img
                                                                                        src="{{asset('storage/img/rekening/'.$row->gambar)}}"
                                                                                        width="50"> {{$row->nama_bank}}
                                                                                    ({{$row->nomor_rekening}})</label>
                                                                            </div>
                                                                        @endforeach
                                                                        <br>
                                                                        <hr>
                                                                        <div class="form-group">
                                                                            <label for="bukti" class="small">Bukti
                                                                                Pembayaran</label>
                                                                            <hr>
                                                                            <input id="bukti" name="bukti"
                                                                                   class="form-control-file"
                                                                                   type="file" required>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="form-group">
                                                                            <label for="jumlah" class="small">Jumlah Nilai (Rp)
                                                                                yang
                                                                                Ditransfer</label>
                                                                            <hr>
                                                                            <input type="number" id="jumlah" min="0" class="form-control" name="jumlah"
                                                                                   placeholder="Jumlah Nilai Transaksi (Rp)"
                                                                                   required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row modal-footer">
                                                                        <div class="col-1">
                                                                        </div>
                                                                        <button type="submit" class="col btn btn-dark">Upload
                                                                        </button>
                                                                        <div class="col-1">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end Modal -->
                                                </div>
                                            </div>
                                        </div>

                                    @endif
                                @endforeach
                            </div>

                            <div v-else>
                                @foreach($pemesanan->getTransaksi as $transaksi)
                                    @if(isset($transaksi->gambar))
                                        <div class="border row "
                                             style="border-radius: 5px; background: #fbf9ff;padding: 10px;margin-bottom: 10px;">
                                            <div class="col gj-text-align-center" style="padding-bottom: 20px">
                                                <h3>Bukti Pembayaran </h3>
                                                <br>
                                                <img src="{{asset('/storage/img/pembayaran/'.$transaksi->gambar)}}"
                                                     style="max-width: 300px">
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('https://cdn.jsdelivr.net/npm/vue@2.6.11/dist/vue.min.js')}}"></script>
    <script src="{{url('https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js')}}"></script>
    <script src="{{url('https://unpkg.com/axios/dist/axios.min.js')}}"></script>
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js')}}"></script>
    <script>

        // import moment from "moment";
        new Vue({
            el: '#app',
            data: function () {
                return {
                    pemesanan: [],
                    status: 0,
                    deadline: "",
                    statusUpdated: false,
                    duration: {
                        _data: {
                            hours: 0,
                            minutes: 0,
                            seconds: 0
                        }
                    }
                }
            },
            methods: {
                getTransaction() {
                    var id = window.location.href.split('/').pop();
                    const response = axios.get("/api/pemesanan/detail/" + id)
                        .then(response => {
                            this.pemesanan = response.data;
                            this.status = this.pemesanan.status;
                            if (this.status != 1) {
                                this.statusUpdated = true;
                            }
                            this.deadline = moment(this.pemesanan.created_at).add(1, "days");
                        })
                },
                getDeatline() {
                    return moment(this.pemesanan.created_at)
                        .add(1, "days")
                        .format("dddd, MMMM Do YYYY, h:mm:ss a");
                },
                updateDuration() {
                    this.duration = moment.duration(this.deadline.diff(moment()));
                    if (
                        this.duration._data.hours <= 0 &&
                        this.duration._data.minutes <= 0 &&
                        this.duration._data.seconds <= 0 &&
                        this.statusUpdated == false
                    ) {
                        this.updateStatusCanceled();
                    }
                },
                updateStatusCanceled() {
                    var id = window.location.href.split('/').pop();
                    axios
                        .post("/api/pemesanan/" + id + "/update-status")
                        .then(() => {
                            this.status = 5;
                            this.statusUpdated = true;
                        })
                        .catch(err => {
                            console.log(err);
                        });
                }
            },
            created() {
                this.getTransaction();
                setInterval(() => {
                    this.updateDuration();
                }, 1000);
            }
        });
    </script>
@endsection
