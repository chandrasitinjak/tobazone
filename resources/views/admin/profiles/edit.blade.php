@extends('admin.layouts.app') 
@section('title') {{ "Profile" }}
@endsection
 
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Profile</strong> Admin
                    </div>

                    <div class="card-body card-block">
                        <form action="/admin/update-profile" method="post" class="" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="row form-group">

                                <div class="col col-md-3">
                                    <img src="{{url('/images/profiles', $user->profile->photo)}}" height="150" width="150">
                                </div>

                                <div class="col-12 col-md-9">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Lengkap</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="name" name="name" value="{{$user->profile->name}}" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Phone</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" value="{{$user->profile->phone}}" class="form-control" required></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Upload Foto</label>
                                        </div>
                                        <div class="col-12 col-md-9"><input type="file" id="photo" name="photo" class="form-control-file">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-10"></div>
                                        <div class="col-12 col-md-1">
                                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection