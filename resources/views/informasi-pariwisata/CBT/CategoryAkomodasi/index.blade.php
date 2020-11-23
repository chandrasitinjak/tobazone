@extends('layouts.CBT.master')
​
@section('title')
    <title>Manajemen Kategori Akomodasi</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manajemen Kategori Akomodasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Manajemen Category</a></li>
                            <li class="breadcrumb-item active">Category Akomodasi</li>
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
                            <form role="form" action="{{ route('CategoryAkomodasi.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Kategori Akomodasi</label>
                                    <input type="text" 
                                    name="nama"
                                    class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}" id="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}" required=""></textarea>
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
                                <b>List Kategori</b>
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
                                            <td>Kategori</td>
                                            <td>Deskripsi</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($categoryAkomodasis as $categoryAkomodasi)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $categoryAkomodasi->nama }}</td>
                                            <td>{{ $categoryAkomodasi->deskripsi }}</td>
                                            <td>
                                                <form action="{{ route('CategoryAkomodasi.destroy', $categoryAkomodasi->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{ route('CategoryAkomodasi.edit', $categoryAkomodasi->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
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
                                {{ $categoryAkomodasis->links() }}
                            </div>
                            @endslot
                            @slot('footer')
​                               <i>List Category</i>
                            @endslot
                        @endcomponent
                    </div>
                </div>
            </div>
        </section>

    
    </div>
@endsection