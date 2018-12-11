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
                                <strong>Change Password</strong>
                            </div>

                                <div class="card-body card-block">                         
                                   <form action="/admin/edit-password" method="post" class="">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">  

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                <input type="password" id="password" name="password" placeholder="Kata sandi baru" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                <input type="password" id="password_confirm" name="password_confirm" placeholder="Konfirmasi kata sandi baru" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                            <button type="submit" class="btn btn-danger btn-sm">Reset</button>
                                        </div>
                                    </form>                      
                                </div>                            
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
    </div>
@endsection