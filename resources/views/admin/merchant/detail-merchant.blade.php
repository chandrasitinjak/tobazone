@extends('admin.layouts.app')
@section('title') {{ "Detail Orders" }}
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Detail Merchant</strong>
                        </div>
                      
                        <div class="card-body">
                            <div class="typo-headers">
                                <h3 class="pb-2 display-5">Nama Merchant : {{ $profiles->name }}</h3>
                                {{ $profiles->address->subdistrict_name }},
                                        {{ $profiles->address->city_name}},
                                        {{ $usprofileser->address->province_name}}
                                
                            </div>

                                <h5>Phone : {{ $profiles->phone }}</h5>
                                <h5>Photo : {{ $profiles->photo }}</h5>
                                <h5>Gender : {{ $profiles->gender }}</h5>
                                <h5>Birthday : {{ $profiles->birthday }}</h5>
                                <h5>Phone : {{ $profiles->phone }}</h5>                               
                                
                            <br>

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection 