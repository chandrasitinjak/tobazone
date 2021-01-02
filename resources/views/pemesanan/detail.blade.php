@extends('users.layouts.app')
@section('content')
    <div id="app">
        <div class="row">
            <div class="col">
                <center><h3 class="mt-5">Detail Pemesanan</h3></center>
                <div class="row mt-5">
                    <div class="col-lg-3 col-md-3 col-sm-12 px-1">
                        <div class="card products">
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
                    <div class="col-lg-9 col-md-3 col-sm-12">
                        <div class="row border pb-5"
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
                                 style="border-radius: 5px; background: #fbf9ff;padding-top: 10px;margin-bottom: 10px;">
                                <div class="col text-center" style="padding-bottom: 20px">
                                    <p>Segera selesaikan pembayaran Anda !</p>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-2">
                                        </div>

                                        <div class="col">
                                            <h2 id="jam"></h2>Jam
                                        </div>

                                        <div class="col">
                                            <h2 id="menit"></h2>Menit
                                        </div>

                                        <div class="col">
                                            <h2 id="detik"></h2>Detik
                                        </div>

                                        <div class="col-lg-4 col-sm-2">
                                        </div>
                                    </div>


                                    <h2 id="jam"></h2>
                                    <br>
                                    <p><i>(Sebelum @{{ getDeatline() }})</i></p>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <a href="{{route('pembayaran',$pemesanan->id_pemesanan)}}" class="col btn btn-dark">Upload
                                    Pembayaran</a>
                            </div>
                        </div>
                        <div v-else-if="status==5">
                            <div class="border row "
                                 style="border-radius: 5px; background: #fbf9ff;padding: 10px;margin-bottom: 10px;">
                                <div class="col text-center" style="padding-bottom: 20px">
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
                                <div class="col text-center" style="padding-bottom: 20px">
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
                                                    <div
                                                        class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Upload Bukti
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
                                                            <form
                                                                action="{{route('transaksi.update',$transaksi->id_transaksi)}}"
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
                                                                            <label
                                                                                for="rekening_{{$row->id_rekening}}">
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
                                                                        <label for="jumlah" class="small">Jumlah
                                                                            Nilai (Rp)
                                                                            yang
                                                                            Ditransfer</label>
                                                                        <hr>
                                                                        <input type="number" id="jumlah" min="0"
                                                                               class="form-control" name="jumlah"
                                                                               placeholder="Jumlah Nilai Transaksi (Rp)"
                                                                               required>
                                                                    </div>
                                                                </div>
                                                                <div class="row modal-footer">
                                                                    <div class="col-1">
                                                                    </div>
                                                                    <button type="submit" class="col btn btn-dark">
                                                                        Upload
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
                                        <div class="col text-center" style="padding-bottom: 20px">
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
                @if($pemesanan->status==3)
                    <div class="row">
                        <div class="col border"
                             style="border-radius: 5px; background: white;padding: 10px;margin-bottom: 10px;">
                            <div class="row ml-2">
                                <div class="col-lg-3 mt-2 ">
                                    <b>Pemesan</b>
                                </div>
                            </div>
                            <div class="row text-lg-left text-sm-center mt-2 ml-2">
                                <div class="col-lg-10 col-md-8 col-sm-8">
                                    <h3>{{$pemesanan->getUser->name}}</h3>
                                </div>
                                <div class="col">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark" data-toggle="modal"
                                            data-target="#ulasan">
                                        Buat Ulasan
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-lg" id="ulasan" tabindex="-1" role="dialog"
                                         aria-labelledby="ulasanTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ulasanTitle">Ulasan Anda</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form
                                                    action="{{url('/paket/'.$pemesanan->getSesi->getPaket->id_paket.'/'.$pemesanan->id_pemesanan.'/review')}}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <img
                                                                    src="{{asset('storage/img/paket/'.$pemesanan->getSesi->getPaket->gambar)}}">
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="row mb-3">
                                                                    <div class="col">
                                                                        Jadwal Kegiatan Perjalanan
                                                                    </div>
                                                                    <div class="col">
                                                                        {{$pemesanan->getSesi->jadwal}}
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col">
                                                                        Tanggal Pemesanan
                                                                    </div>
                                                                    <div class="col">
                                                                        {{$pemesanan->created_at}}
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col">
                                                                        Total Pembayaran
                                                                    </div>
                                                                    <div class="col">
                                                                        Rp. {{number_format($pemesanan->getSesi->getPaket->harga_paket*$pemesanan->jumlah_peserta)}}
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col">
                                                                        Jumlah Peserta
                                                                    </div>
                                                                    <div class="col">
                                                                        {{$pemesanan->jumlah_peserta}} Orang
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col">
                                                                <h5>Komentar Anda</h5>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col ">
                                                                <div class="form-group mt-2">
                                                                    <textarea class=" form-control" name="feedback" id="feedback" rows="3" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-dark">Kirim</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="{{url('https://cdn.jsdelivr.net/npm/vue@2.6.11/dist/vue.min.js')}}"></script>
    <script src="{{url('https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js')}}"></script>
    <script src="{{url('https://unpkg.com/axios/dist/axios.min.js')}}"></script>
    <script src="{{url('adminlte/plugins/moment/moment.min.js')}}"></script>
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
                },
                test() {

                }
            },
            created() {
                this.getTransaction();
                this.test();
                setInterval(() => {
                    this.updateDuration();
                    document.getElementById('jam').innerHTML = this.duration._data.hours;
                    document.getElementById('menit').innerHTML = this.duration._data.minutes;
                    document.getElementById('detik').innerHTML = this.duration._data.seconds;
                }, 1000);


            }
        });
    </script>
@endsection
