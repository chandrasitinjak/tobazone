@extends('users.layouts.app')
@section('title') {{ "Homestay Order" }}
@endsection

@section('content')
<section class="shop_grid_area section-padding-80">
    <h2>Detail Pesanan Anda, {{ Auth::user()->username }}</h2>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="container card">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td><p class="h6">Penginapan Tujuan</p></td>
                                <td><p class="h6">:</p></td>
                                <td><p class="h6">{{ $orderDetail[0]->homestay->name }}</p></td>
                            </tr>
                    </div>
                    <tr>
                        <td><p class="h6">Lokasi Penginapan</p></td>
                        <td><p class="h6">:</p></td>
                        <td><p class="h6">{{ $orderDetail[0]->homestay->address }}</p></td>
                    </tr>
                    <tr>
                        <td><p class="h6">Lama Menginap</p></td>
                        <td><p class="h6">:</p></td>
                        <td><p class="h6">{{ $orderDetail[0]->duration }} Hari</p></td>
                    </tr>
                    <tr>
                        <td><p class="h6">Total Harga</p></td>
                        <td><p class="h6">:</p></td>
                        <td><p class="h6">Rp {{ number_format($orderDetail[0]->total_price, 2, ',',
                                '.') }}</p></td>
                    </tr>
                    <tr>
                        <td><p class="h6">Check-in</p></td>
                        <td><p class="h6">:</p></td>
                        <td><p class="h6">{{ date('d-m-Y', strtotime($orderDetail[0]->check_in))
                                }}</p>
                        </td>
                    </tr>
                </div>
                </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <?php $count=0 ?>
                        @foreach($orderDetail as $order)
                        <?php $count++; ?>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <p>Nama</p>
                                <p>Harga kamar</p>
                            </div>
                            <div class="col-md-2" align="end">
                                <p>:</p>
                                <p>:</p>
                            </div>
                            <div class="col-md-6" align="">
                                <p>Kamar {{$count}}</p>
                                <p> {{$order->total_price}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <table class="table table-borderless">
                    <tbody>

                    <tr>

                        <td>
                            <center>
                                @if($orderDetail[0]->status == 'Pending')
                                <button
                                    type="button"
                                    class="btn essence-btn"
                                    data-toggle="modal"
                                    data-target="#exampleModal"
                                >Bayar
                                </button>
                                @elseif($orderDetail[0]->status == 'In Progress')
                                <a href="{{ '/./images/'. $orderDetail->resi}}">
                                    <img src="{{ '/./images/'. $orderDetail->resi}}"
                                         style='width: 50%; object-fit: cover' alt="">
                                </a>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 style="color: #FF8311; ">
                                            {{$orderDetail[0]->status}}</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <button
                                            type="button"
                                            class="btn essence-btn"
                                            data-toggle="modal"
                                            data-target="#exampleModal"
                                        >Ubah Resi
                                        </button>
                                    </div>
                                </div>
                                @else
                                <h3 style="color: #FF8311; ">{{$orderDetail[0]->status}}</h3>
                                @endif
                            </center>
                        </td>
                    </tr>
                    </tbody>

                </table>

                <!-- Modal -->
                <div
                    class="modal fade"
                    id="exampleModal"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form class="form-group" method="POST"
                                  action="{{ url('/homestays/order/upload-resi', $orderDetail[0]->id_transaction) }}"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <spinner></spinner>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Unggah Bukti
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
                                <div class="modal-body">
                                    <!-- <form> -->
                                    <div class="form-group">
                                        <label for="namapengirim" class="small">Nama
                                            Pengirim</label>
                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            id="namapengirim"
                                            name="namapengirim"
                                            aria-describedby="emailHelp"
                                            placeholder="Nama Pengirim"
                                            required
                                        >
                                        <div class="valid-feedback">sudah valid</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="utkbank" class="small">Metode Pembayaran</label>
                                        <br>
                                        <select id="utkbank" name="utkbank" class="form-control"
                                                required>
                                            <!-- <option value="BRI">BRI</option> -->
                                            <option value="MANDIRI">MANDIRI</option>
                                            <option value="OVO">OVO</option>
                                            <option value="DANA">DANA</option>
                                            <option value="GOPAY">GOPAY</option>
                                            <!-- <option value="BNI">BNI</option>
                                            <option value="BCA">BCA</option> -->
                                        </select>
                                        <div class="valid-feedback">sudah valid</div>
                                        <div class="invalid-feedback">
                                            <span>tidak boleh kosong</span>
                                            <!-- <span v-if="!$v.senderName.required">tidak boleh kosong</span> -->
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-form-label">Bukti Pembayaran (
                                            jpg/jpeg/png )</label>
                                        <div class="col-sm-9">
                                            <div class="upload-btn-wrapper">
                                                <button class="btn-upcus" style="margin: auto">
                                                    <img src="/images/assets/addimage.png"
                                                         style="height: 100px">
                                                    <input type="file" name="images">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </form> -->
                                </div>
                                <div class="modal-footer">
                                    <button
                                        type="submit"
                                        class="btn essence-btn"
                                    >Unggah
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<!-- ##### Shop Grid Area End ##### -->
@endsection

