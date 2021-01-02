@extends('users.layouts.app')
@section('title') {{ "Penginapan" }}
@endsection

@section('content')
<div id="app-2">
<div class="container" >
    <div class="row">
        <div class="col-12">
            <div class="card globalcard store">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-3 d-none d-sm-block store-image px-0">
                            @if($result->profile->photo == NULL)
                            <div class="imgwrapper">
                                <img src="{{ url('/images/assets/no-image.jpg') }}" alt="">
                            </div>
                            @else
                            <div class="imgwrapper">
                                <img src="{{ url("/images/user_profiles/".$result->profile->photo
                                )}}" alt="">
                            </div>
                            @endif
                        </div>
                        <div class="col-md-9 col-sm-12 store-name pl-0">
                            <div class="row">
                                <div class="col-10 col-sm-8 col-md-10">
                                    <h5 class="mb-0"> {{ $result->profile->name }}</h5>
                                </div>

                                <div class="col-2 ">
                                    <a href="{{ url('/merchant/'.$result->id.'/editProfile') }}">
                                        <button type="submit"
                                                class="button essence-btn btn-sm float-right">
                                            <i class="fa fa-gear"></i> &nbsp; UBAH
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <p> Horas Mamangke Mangomo Partiga-tiga </p>
                            <div class="store-desc">
                                <i class="fa fa-map mr-1"></i>
                                {{$result->profile->address->subdistrict_name}} {{", " .
                                $result->profile->address->city_name}}
                                {{", " . $result->profile->address->province_name}} <br>
                                <i class="fa fa-clock-o mr-1"></i>{{date('d-m-Y',
                                strtotime($result->email_verified_at))}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--menu-store-->
    <div class="row">
        <!--sidebar-->
        @include('users.merchants.sidebar')
        <!--//sidebar-->

        <!--content-->


        <!--        <div class="col-md-9 crudproduk mt-3" style="display: grid">-->
        <!--            <div class="pull-right">-->
        <!--                <div class="card globalcard mt-0">-->
        <!--                    <div class="card-header">-->
        <!--                        <h6>Ubah Product</h6>-->
        <!--                    </div>-->
        <!--                    <div class="card-body">-->
        <!--                        <form class="form-group" method="POST"-->
        <!--                              action="{{ url('/merchant/homestay/updateHomestay', $result->id) }}"-->
        <!--                              enctype="multipart/form-data">-->
        <!--                            {{ csrf_field() }}-->
        <!--                            <div class="form-group row">-->
        <!--                                <div class="input-group mb-3">-->
        <!--                                    <label for="inputEmail3" class="col-sm-3 col-form-label">-->
        <!--                                        Gambar Produk-->
        <!--                                        <span-->
        <!--                                            class="formbadge badge badge-secondary font-weight-light text-muted">Wajib</span>-->
        <!--                                    </label>-->
        <!--                                    <div class="col-sm-9">-->
        <!--                                        <div class="upload-btn-wrapper">-->
        <!--                                            <button class="btn-upcus">-->
        <!--                                                <img src="{{ '/images/assets/addimage.png'}}">-->
        <!--                                            </button>-->
        <!--                                            <input id="files" name="images" type="file"/>-->
        <!--                                        </div>-->
        <!--                                        <small id="passwordHelpBlock" class="form-text text-muted">-->
        <!--                                            Format gambar .jpg .jpeg .png dan ukuran minimum 300 x-->
        <!--                                            300px-->
        <!--                                            (Untuk gambar optimal gunakan ukuran 700 x 700 px)-->
        <!--                                        </small>-->
        <!--                                        <div id="result" class="row mt-4"></div>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="form-group row">-->
        <!--                                <label class="col-sm-3 col-form-label">Nama Homestay-->
        <!--                                    <span-->
        <!--                                        class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>-->
        <!--                                </label>-->
        <!--                                <div class="col-sm-9">-->
        <!--                                    <input type="text" class="form-control" value="{{ $result->name }}"-->
        <!--                                           aria-describedby="namaprodukhelp" name="name">-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="form-group row">-->
        <!--                                <label class="col-sm-3 col-form-label">Jumlah Kamar-->
        <!--                                    <span-->
        <!--                                        class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>-->
        <!--                                </label>-->
        <!--                                <div class="col-sm-9">-->
        <!--                                    <input type="number" class="form-control" value="{{ $result->total_room }}"-->
        <!--                                           aria-describedby="namaprodukhelp" min="1" name="stock" required>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="form-group row">-->
        <!--                                <label class="col-sm-3 col-form-label">Jumlah Kamar Tersedia-->
        <!--                                    <span-->
        <!--                                        class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>-->
        <!--                                </label>-->
        <!--                                <div class="col-sm-9">-->
        <!--                                    <input type="number" class="form-control" value="{{ $result->room_available }}"-->
        <!--                                           aria-describedby="namaprodukhelp" min="0" name="stock_available" required>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="form-group row">-->
        <!--                                <label class="col-sm-3 col-form-label">Harga Kamar/malam-->
        <!--                                    <span-->
        <!--                                        class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>-->
        <!--                                </label>-->
        <!--                                <div class="col-sm-9">-->
        <!--                                    <input type="number" class="form-control" value="{{ $result->price }}"-->
        <!--                                           aria-describedby="namaprodukhelp" min="1" name="price" required>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="form-group row">-->
        <!--                                <label class="col-sm-3 col-form-label">Deskripsi Homestay-->
        <!--                                    <span-->
        <!--                                        class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>-->
        <!--                                </label>-->
        <!--                                <div class="col-sm-9">-->
        <!--                            <textarea rows="10" class="form-control"-->
        <!--                                      aria-describedby="namaprodukhelp"-->
        <!--                                      name="description">{{ $result->description }}</textarea>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="form-group row">-->
        <!--                                <label class="col-sm-3 col-form-label">Alamat Homestay-->
        <!--                                    <span-->
        <!--                                        class="formbadge text-muted badge badge-secondary font-weight-light">Wajib</span>-->
        <!--                                </label>-->
        <!--                                <div class="col-sm-9">-->
        <!--                                    <input type="text" class="form-control" value="{{ $result->address }}"-->
        <!--                                           aria-describedby="namaprodukhelp" min="1" name="address"-->
        <!--                                           required>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!---->
        <!---->
        <!---->
        <!--                            <div class="form-group row">-->
        <!--                                <div class="col-md-12 mt-4">-->
        <!--                                    <button type="submit" class="btn btn-primary float-right">-->
        <!--                                        Simpan-->
        <!--                                    </button>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </form>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->


        <div class="col-md-9 crudproduk mt-3" style="display: grid">
            <Create-Homestay/>
        </div>

    </div>
</div>
</div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/vue@^2.0.0/dist/vue.min.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.js"></script>-->
    <script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>
    <script>

    </script>
@endsection


