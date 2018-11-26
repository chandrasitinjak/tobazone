@extends('admin.layouts.app') 
@section('title') {{ "New Orders" }}
@endsection
 
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $idx => $order)
                                        <tr>
                                            <td class="serial"> {{ $idx+1 }}</td>

                                            <td> <span class="address"> {{ $order->address}}</span> </td>
                                            <td>
                                                <form action="{{ url('/orderconfirm', $order->id) }}" method="POST">
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
        </div>
    </div>
</div>
@endsection