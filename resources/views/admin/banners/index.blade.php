@extends('admin.layouts.app')
@section('title') {{ "Banner" }}
@endsection

@section('content')

 <div class="content">
            <div class="animated fadeIn">
                <div class="row">             
                 
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="images/banner1.png" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="card-title mb-3" align="center" >Tenun Mesin Ulos</h3>
                                
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#">
                                <button type="button" class="btn btn-link btn-sm"><i class="fa fa-link"></i>&nbsp; Link</button></a>

                            
                                <label class="switch switch-3d switch-primary mr-3"><input type="checkbox" class="switch-input" checked="true"> <span class="switch-label"></span> <span class="switch-handle"></span></label>
                                
                                <br>
                                <a href="banner-detail.html"><span class="badge badge-primary pull-right">Detail</span></a>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="images/banner2.png" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="card-title mb-3" align="center">Diskon 50%</h3>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#">
                                <button type="button" class="btn btn-link btn-sm"><i class="fa fa-link"></i>&nbsp; Link</button></a>

                                <label class="switch switch-3d switch-primary mr-3"><input type="checkbox" class="switch-input" checked="true"> <span class="switch-label"></span> <span class="switch-handle"></span></label>

                                <br>
                                <a href="banner-detail.html"><span class="badge badge-primary pull-right">Detail</span></a>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="images/banner1.png" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="card-title mb-3" align="center">Paket Ulos</h3>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#">
                                <button type="button" class="btn btn-link btn-sm"><i class="fa fa-link"></i>&nbsp; Link</button></a>

                                <label class="switch switch-3d switch-primary mr-3"><input type="checkbox" class="switch-input" checked="true"> <span class="switch-label"></span> <span class="switch-handle"></span></label>

                                <br>
                                <a href="banner-detail.html"><span class="badge badge-primary pull-right">Detail</span></a>

                            </div>
                        </div>
                    </div>

@endsection
