@extends('admin.layouts.app')
@section('title') {{ "Edit Paket" }}
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Paket Wisata</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                            <form action="{{ route('admin.paket.update',$paket->id_paket) }}" method="post" enctype="multipart/form-data"
                                  id="store-form">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_paket_wisata">Nama Paket Wisata</label>
                                        <input type="text" class="form-control" value="{{$paket->nama_paket}}" name="nama_paket_wisata"
                                               id="nama_paket_wisata"
                                               placeholder="Nama Paket Wisata" required>
                                        {{--                                    <p class="text-danger">{{$error->first('nama-paket-wisata')}}</p>--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_paket_wisata">Harga Paket Wisata</label>
                                        <input type="number" class="form-control" value="{{$paket->harga_paket}}" name="harga_paket_wisata"
                                               id="harga_paket_wisata" value="0" min="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="availability">Availability</label>
                                        <input type="number" class="form-control" value="{{$paket->availability}}" name="availability" id="availability"
                                               placeholder="Availability" required>
                                        {{--                                    <p class="text-danger">{{$error->first('availability')}}</p>--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="durasi">Durasi</label>
                                        <input type="text" class="form-control" value="{{$paket->durasi}}" name="durasi" id="durasi"
                                               placeholder="Durasi" required>
                                        {{--                                    <p class="text-danger">{{$error->first('durasi')}}</p>--}}
                                    </div>

                                    <div class="form-group">
                                        <label for="jenis">Jenis Paket Wisata</label>
                                        <input type="text" value="{{$paket->jenis_paket}}" class="form-control" name="jenis" id="jenis"
                                               placeholder="Jenis Paket Wisata" required>
                                        {{--                                    <p class="text-danger">{{$error->first('durasi')}}</p>--}}
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status Paket</label>
                                        <select class="form-control custom-select" name="status" id="status" required>
                                            <option disabled="">Pilih Status</option>
                                            <option value="1" {{($paket->status==1)?'selected':''}}>Aktif</option>
                                            <option value="0" {{($paket->status==0)?'selected':''}}>Tidak Aktif</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi Paket</label>
                                        <div class="mb-3">
                                    <textarea class="textarea" id="deskripsi" name="deskripsi"
                                              placeholder="Deskripsi Paket"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$paket->deskripsi_paket}}</textarea>
                                            {{--                                        <p class="text-danger">{{$error->first('deskripsi')}}</p>--}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="rencana_perjalanan">Rencana Perjalanan (Itinerary)</label>
                                        <div class="mb-3">
                                    <textarea class="textarea" name="rencana_perjalanan" id="rencana_perjalanan"
                                              placeholder="Rencana Perjalanan ( Itinerary )"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$paket->rencana_perjalanan}}</textarea>
                                            {{--                                        <p class="text-danger">{{$error->first('rencana-perjalanan')}}</p>--}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tambahan">Tambahan</label>
                                        <div class="mb-3">
                                    <textarea class="textarea" name="tambahan" id="tambahan" placeholder="Tambahan"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$paket->tambahan}}</textarea>
                                            {{--                                        <p class="text-danger">{{$error->first('tambahan')}}</p>--}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="daerah">Daerah Kabupaten</label>
                                        <select class="form-control custom-select" name="daerah" id="daerah" required>
                                            <option disabled="">Pilih Daerah</option>
                                            @foreach($kabupaten as $row)
                                                <option value="{{$row->id_kabupaten}}" {{ $row->id_kabupaten == $paket->kabupaten_id ? 'selected' : ''}}>{{ucfirst($row->nama_kabupaten)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Gambar</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="gambar" id="gambar"
                                                >
                                                <label class="custom-file-label" for="gambar">Choose file</label>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row border" style="padding: 5px;border-radius: 10px">
                                            <div class="col-sm-10 text-center">
                                                <img class="img-fluid" src="{{asset('storage/img/paket/'.$paket->gambar)}}"
                                                     alt="Photo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button onclick="return confirm('Apakah data ini ingin diupdate?')" type="submit" class="btn btn-primary">Edit</button>
                                    <a href="{{route('admin.paket.editChoice',$paket->id_paket)}}" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
    <script>
        var deskripsi = document.getElementById('deskripsi');
        CKEDITOR.replace(deskripsi,{
            language:'en-gb'
        });
        var rencana_perjalanan = document.getElementById('rencana_perjalanan');
        CKEDITOR.replace(rencana_perjalanan,{
            language:'en-gb'
        });
        var tambahan = document.getElementById('tambahan');
        CKEDITOR.replace(tambahan,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
@endsection
