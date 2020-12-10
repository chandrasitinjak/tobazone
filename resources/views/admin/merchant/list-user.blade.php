@extends('admin.layouts.app') 
@section('title') {{ "List User" }}
@endsection
 
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">List User</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>email</th>
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
                                        {{ $user->email }}
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

@endsection