@extends('admin.layouts.app')
@section('title') {{ "Member" }}
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Sesi Wisata</h3>
                        </div>
                        <form action="{{ route('member.store')}}"
                              enctype="multipart/form-data"
                              id="store-form">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label for="name">Nama Anggota/Member</label>
                                <input name="nama_lengkap" type="text" class="form-control" id="name"
                                       aria-describedby="emailHelp" placeholder="Nama Anggota/Member">
                            </div>
                            <div class="form-group">
                                <label for="no_wa">Nomor WhatsApp (WA)</label>
                                <input name="nomor_wa" type="text" class="form-control" id="no_WA"
                                       aria-describedby="emailHelp" placeholder="Nomor WhatsApp (WA)">
                            </div>
                            <div class="form-group">
                                <label for="no_HP">Nomor Telepon (Hp)</label>
                                <input name="nomor_hp" type="text" class="form-control" id="no_HP"
                                       aria-describedby="emailHelp" placeholder="Nomor Telepon (Hp)">
                            </div>
                            <div class="form-group">
                                <label for="no_KTP">Nomor KTP </label>
                                <input name="nomor_ktp" type="text" class="form-control" id="no_KTP"
                                       aria-describedby="emailHelp" placeholder="Nomor KTP">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control" id="email"
                                       aria-describedby="emailHelp" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="kata_sandi" type="text" class="form-control" id="password"
                                       aria-describedby="emailHelp" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input name="komunitas" type="hidden" class="form-control" id="password"
                                       aria-describedby="emailHelp" value="-">
                            </div>
                            <div class="form-group">
                                <label for="photo">Foto KTP</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
