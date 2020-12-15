@extends('users.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-2">
        </div>

        <div class="col-md-8">
            <form method="POST" action="{{ url('/customer/'.$profiles->user_id.'/store') }}"
                  enctype="multipart/form-data" style="margin-top: 2rem">
                @csrf
                <div class="form-group">
                    <label class="label">Nama Lengkap</label>
                    <input type="text" class="form-control form-control-sm" value="{{ $profiles->name }}"
                           name="profile_name" required>
                </div>
                <div class="form-group">
                    <label class="label">Nomor Telepon</label>
                    <input type="text" class="form-control form-control-sm" value="{{ $profiles->phone }}"
                           name="profile_phone" required>
                </div>
                <div class="form-group">
                    <label class="label">Jenis Kelamin</label>
                        <select class="form-control" name="gender" >
                        <option name="profile_gender" value="Male" {{($profiles->gender=="Male")||($profiles->gender=="male")? "selected":""}} >Laki-laki (Male)</option>
                        <option name="profile_gender" value="Female" {{($profiles->gender=="Female")||($profiles->gender=="female")? "selected":""}}>Perempuan (Female)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="label">Tanggal Lahir</label>
                    <input type="date" class="form-control form-control-sm" name="birthday"
                           value="{{date('Y-m-d', strtotime($profiles->birthday))}}">
                </div>
                @if($profiles->photo == "profile.png")
                    <div class="form-group">
                        <label class="label">Unggah Foto</label>
                        <input class="form-control form-control-sm" type="file" name="profile_picture">
                    </div>
                @else
                    <div class="imgwrapper mb-3" style="padding: 0px;">
                        ` <img src="{{ url("/images/user_profiles/".$profiles->photo )}}" alt="Card image cap test"
                               style="object-fit: scale-down">
                    </div>

                    <p>Ubah Foto Anda</p>
                    <label class="label label-a">Unggah Foto</label>
                    <input class="form-control form-control-sm" type="file" name="profile_picture">
                @endif

                <center>
                    <button type="submit" class="btn essence-btn col-md-4"
                            style="margin-top: 0.5rem;margin-bottom: 2rem">ubah
                    </button>
                </center>

            </form>
        </div>

        <div class="col-md-2">
        </div>
    </div>
    <script>
        export default {
            components: {
                spinner
            },
            data() {
                return {}
    </script>
@endsection
