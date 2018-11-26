@extends('admin.layouts.app')
@section('title') {{ "Banner" }}
@endsection

@section('content')
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br/>
    @endif
    <style>
            .card-body .card-text{

            }
        </style>
    <div class="col-md-12">
    <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Banner</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Banner</a></li>
                                    <li class="active">List</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">             
                 
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="card-body">
                                <h1 class="card-title mb-3" align="center" >{{$banner->title}}</h3>
                                <img src="{{ '/images/' . $banner->image }}" alt="">
                                <p class="banner-desc">{{$banner->description}}
                                </p>
                                <a href="#">
                                <button type="button" class="btn btn-link btn-sm"><i class="fa fa-link"></i>&nbsp; https://uloszone.com</button></a>

                                <br>
                                <a href="banner-edit.html"><span class="btn btn-primary ">Edit</span></a>
                                <a href="#"><span class="btn btn-danger ">Delete</span></a>

                            </div>
                        </div>
                    </div>

    </div>


@endsection