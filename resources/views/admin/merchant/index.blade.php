@extends('admin.layouts.app') 
@section('title') {{ "Merchant" }}
@endsection
 
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">New Merchant</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profiles as $idx => $user)
                                <tr>
                                    <th scope="row"> {{ $idx + 1}}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        {{ $user->address->subdistrict_name }},
                                        {{ $user->address->city_name}},
                                        {{ $user->address->province_name}}
                                    </td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <form action="/merchantconfirmed/{{ $user->user_id }}" method="POST">
                                            {{csrf_field()}}

                                            <button type="Submit" class="btn btn-primary"> Konfirmasi</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--
<div class="col-md-12">

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Photo</th>
                                    <th>Gender</th>
                                    <th>Birthday</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profiles as $idx => $user)
                                <tr>
                                    <td class="serial"> {{ $idx+1 }}</td>
                                    <td> <span class="username"> {{ $user->name}}</span> </td>
                                    <td> <span class="username"> {{ $user->address}}</span> </td>
                                    <td> <span class="username"> {{ $user->phone}}</span> </td>
                                    <td> <span class="username"> {{ $user->photo}}</span> </td>
                                    <td> <span class="username"> {{ $user->gender}}</span> </td>
                                    <td> <span class="username"> {{ $user->birthday}}</span> </td>
                                    <td>

                                        <form action="/merchantconfirmed/{{ $user->user_id }}" method="POST">
                                            {{csrf_field()}}

                                            <button type="Submit"> Konfirmasi</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> --}}
@endsection