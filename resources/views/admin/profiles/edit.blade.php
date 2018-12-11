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
                                <form action="/admin/edit" method="post" class="">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">                         
                
                                    <div class="row form-group">
                                        <!-- <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"> -->
                                        
                                        <div class="col col-md-3">
                                            <img src="{{$user->profile->photo}}"  height="150" width="150">
                                            
                                        </div>
                                        
                                        <div class="col-12 col-md-9">
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Lengkap</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" value="{{$user->profile->name}}" class="form-control" >
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Phone</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="disabled-input" value="{{$user->profile->phone}}"  class="form-control"></div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Upload Foto</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-10"></div>   
                                                <div class="col-12 col-md-1">
                                                     <a href="#"><button type="button" class="btn btn-primary">Save</button></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>                        
                                </div>                            
                        </div>
                    </div>
                </div>
            </div>
@endsection