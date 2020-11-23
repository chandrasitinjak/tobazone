@extends('layouts.CBT.master')
​
@section('title')
    <title>Manajemen User CBT</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manajemen User CBT</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Manajemen CBT</a></li>
                            <li class="breadcrumb-item active">Register User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        @component('components.card')
                            @slot('header')
                                <b>Tambah</b>
                            @endslot
                            
                            @if (session('error'))
                                @alert(['type' => 'danger'])
                                    {!! session('error') !!}
                                @endalert
                            @endif
​                            @slot('body')   
                            <form role="form" action="{{ route('User.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama User</label>
                                    <input type="text" 
                                    name="nama"
                                    class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}" id="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email"
                                    class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" 
                                    name="password"
                                    class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" id="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No Handphone</label>
                                    <input type="text" 
                                    name="no_hp"
                                    class="form-control {{ $errors->has('no_hp') ? 'is-invalid':'' }}" id="no_hp" required>
                                </div>
                            @endslot    
                            @slot('footer')
                                <div class="card-footer">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                            @endslot
                        @endcomponent
                    </div>
                    <div class="col-md-8">
                    @component('components.card')
                                @slot('header')
                                <b>List User CBT</b>
                            @endslot
                            
                            @slot('body')
                            @if (session('success'))
                                @component('components.alert')
                                    @slot('message')
                                        {!! session('success') !!}
                                    @endslot
                                @endcomponent
                            @endif
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                      <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Nama</td>
                                            <td>Kabupaten</td>
                                            <td>No. Handphone</td>
                                            <td>Terdaftar mulai tanggal</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($cbts as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->kabupaten->nama_kabupaten }}</td>
                                            <td>{{ $row->no_hp }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td>
                                                <form action="{{ route('User.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{ route('User.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $cbts->links() }}
                            </div>
                            @endslot
                            @slot('footer')
​                               <i>List User CBT</i>
                            @endslot
                        @endcomponent
                    </div>
                </div>
            </div>
        </section>

    
    </div>
@endsection