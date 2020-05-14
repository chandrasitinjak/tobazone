@extends('users.layouts.app')
@section('content')
<div class="row">
                <div class="col-md-2">
                </div>

                <div class="col-md-8">
                


                    <form method="POST" action="{{ url('/customer/'.$profiles->user_id.'/store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="label">Nama</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $profiles->name }}" name="profile_name">
                        </div>
                        <div class="form-group">
                            <label class="label">nomor hp</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $profiles->phone }}" name="profile_phone">
                        </div>                                              
                        @if($profiles->photo == null)
                        <div class="form-group">                            
                            <label class="label">upload foto</label>
                            <input class="form-control form-control-sm" type="file" name="profile_picture">
                        </div>
                        @else
                        <div class="imgwrapper mb-3" style="padding: 0px;">
                    `      <img src="{{ url("/images/user_profiles/".$profiles->photo )}}" alt="Card image cap test" style="object-fit: scale-down">
                        </div>

                            <p>ubah foto anda</p>
                            <label class="label">upload foto</label>
                            <input class="form-control form-control-sm" type="file" name="profile_picture">
                        @endif

                       <center><button type="submit" class="btn btn-success col-md-6">ubah</button></center>
                    </form>
                </div>
                </div>

                <div class="col-md-2">
                </div>
            </div>
@endsection