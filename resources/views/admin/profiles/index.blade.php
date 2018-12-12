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
                                <strong>Profile</strong> 
                            </div>

                                <div class="card-body card-block">                         
                
                                    <div class="row form-group">
                                        
                                        <div class="col col-md-3">
                                            <img src="{{url('images/profiles/'.$user->profile->photo)}}" alt="foto" height="150" width="150">
                                        </div>
                                        
                                        <div class="col-12 col-md-9">
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Lengkap</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" class="form-control" disabled="" value="{{$user->profile->name}}">
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Phone</label></div>
                                                <div class="col-12 col-md-9"><input type="email" id="email-input" name="email-input" class="form-control" disabled="" value="{{$user->profile->phone}}"></div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    
                                                </div>   
                                                <div class="col-12 col-md-9">
                                                     <a href="/admin/edit-profile"><button type="button" class="btn btn-primary">Edit</button></a>
                                                     <a href="/admin/show-password"><button type="button" class="btn btn-primary">Change Password</button></a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>                        
                                </div>                            
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
    </div>
@endsection