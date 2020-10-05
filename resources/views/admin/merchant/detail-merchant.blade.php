@extends('admin.layouts.app')
@section('title') {{ "Detail Merchant" }}
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

                        
                        <div class="row mt-3">
                            <div class="col-md-6" >
                            @if($profiles->photo != "profile.png")
                            <div class="imgwrapper imgwrapper-a mb-3 img-circle" style="padding: 0px;">
                                <img src="{{ url("/images/user_profiles/".$profiles->photo )}}" alt="Card image cap test" style="object-fit: scale-down">
                            </div>
                            @else
                            <div class="imgwrapper imgwrapper-a mb-1 img-circle" style="padding: 0px; margin : auto">
                            <img src="/images/profile.png" style="object-fit: scale-down; height : 26rem;width : 26rem">
                            </div>
                            @endif
                            </div>

                            <div class="col-md-6">
                            <div class="card-body">
                            <div class="typo-headers">
                                <h3 class="pb-2 display-5">Nama Merchant : {{ $profiles->name }}</h3>
                                {{ $profiles->address->subdistrict_name }},
                                {{ $profiles->address->city_name}},
                                {{ $profiles->address->province_name}}
                                
                            </div>
                                <h5>Phone : {{ $profiles->phone }}</h5>
                               
                                <h5>Gender : {{ $profiles->gender }}</h5>
                                <h5>Birthday : {{ $profiles->birthday }}</h5>
                                <h5>Phone : {{ $profiles->phone }}</h5>                             

                                <a href="{{ url('/admin/list-merchant') }}" class="btn btn-info" style="position:absolute; margin-left:-90px;left:90%;
                                width:100px;bottom:2rem;">Kembali</a>
                        </div>
                            </div>
                        </div>

                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection 