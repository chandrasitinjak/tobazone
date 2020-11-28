<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{Request::segment(3)=== 'add' ? 'Tambah Paket Wisata' : 'Edit Paket Wisata'}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if($status=='create')
                        <form action="{{ route('admin.paket.store') }}" method="post" enctype="multipart/form-data"
                              id="store-form">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_paket_wisata">Nama Paket Wisata</label>
                                    <input type="text" class="form-control" name="nama_paket_wisata"
                                           id="nama_paket_wisata"
                                           placeholder="Nama Paket Wisata" required>
                                    {{--                                    <p class="text-danger">{{$error->first('nama-paket-wisata')}}</p>--}}
                                </div>
                                <div class="form-group">
                                    <label for="harga_paket_wisata">Harga Paket Wisata</label>
                                    <input type="number" class="form-control" name="harga_paket_wisata"
                                           id="harga_paket_wisata" value="0" min="0" required>
                                </div>
                                <div class="form-group">
                                    <label for="availability">Availability</label>
                                    <input type="number" class="form-control" name="availability" id="availability"
                                           placeholder="Availability" required>
                                    {{--                                    <p class="text-danger">{{$error->first('availability')}}</p>--}}
                                </div>
                                <div class="form-group">
                                    <label for="durasi">Durasi</label>
                                    <input type="text" class="form-control" name="durasi" id="durasi"
                                           placeholder="Durasi" required>
                                    {{--                                    <p class="text-danger">{{$error->first('durasi')}}</p>--}}
                                </div>

                                <div class="form-group">
                                    <label for="jenis">Jenis Paket Wisata</label>
                                    <input type="text" class="form-control" name="jenis" id="jenis"
                                           placeholder="Jenis Paket Wisata" required>
                                    {{--                                    <p class="text-danger">{{$error->first('durasi')}}</p>--}}
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Paket</label>
                                    <div class="mb-3">
                                    <textarea class="textarea" id="deskripsi" name="deskripsi"
                                              placeholder="Deskripsi Paket"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        {{--                                        <p class="text-danger">{{$error->first('deskripsi')}}</p>--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rencana_perjalanan">Rencana Perjalanan (Itinerary)</label>
                                    <div class="mb-3">
                                    <textarea class="textarea" name="rencana_perjalanan" id="rencana_perjalanan"
                                              placeholder="Rencana Perjalanan ( Itinerary )"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        {{--                                        <p class="text-danger">{{$error->first('rencana-perjalanan')}}</p>--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tambahan">Tambahan</label>
                                    <div class="mb-3">
                                    <textarea class="textarea" name="tambahan" id="tambahan" placeholder="Tambahan"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        {{--                                        <p class="text-danger">{{$error->first('tambahan')}}</p>--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="included">Included
                                        <button type="button" onclick="tambahi()" class="btn btn-success">
                                            <i class="fas fa-plus"></i></button>
                                    </label>
                                    <div class="mb-3" id="included_to_add">
                                        <div class="row" id="item_included_1">
                                            <div class="col-10">
                                                <input type="text" class="form-control" name="included_1"
                                                       id="included_1"
                                                       placeholder="Included" required>
                                                {{--                                                <p class="text-danger">{{$error->first('included_1')}}</p>--}}
                                            </div>
                                            <div class="col-2">

                                            </div>
                                        </div>
                                    </div>
                                        <input id="jlh_included" type="number" name="jlh_included" value="<?= $ci ?>" hidden></input>
                                </div>
                                <div class="form-group">
                                    <label for="not_included">Not Included
                                        <button type="button" onclick="tambahu()" class="btn btn-success">
                                            <i class="fas fa-plus"></i></button>
                                    </label>
                                    <div class="mb-3" id="not_included_to_add">
                                        <div class="row" id="item_not_included_1">
                                            <div class="col-10">
                                                <input type="text" class="form-control" name="not_included_1"
                                                       id="not_included_1"
                                                       placeholder="Not Included" required>
                                            </div>
                                            <div class="col-2">

                                            </div>
                                        </div>
                                    </div>
                                    <input type="number" id="jlh_not_included" name="jlh_not_included" value="<?= $cu ?>" hidden></input>
                                </div>
                                <div class="form-group">
                                    <label for="daerah">Daerah Kabupaten</label>
                                    <select class="form-control custom-select" name="daerah" id="daerah" required>
                                        <option selected="" disabled="">Pilih Daerah</option>
                                        @foreach($kabupaten as $row)
                                            <option value="{{$row->id_kabupaten}}">{{$row->nama_kabupaten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="item_to_add">Layanan Wisata
                                        <button type="button" name="add" onclick="tambah()" class="btn add btn-success">
                                            <i class="fas fa-plus"></i></button>
                                    </label>
                                    <div id="item_to_add">
                                        <div class="row" id="new-layanan_1">
                                            <div class="col-md-10">
                                                <select class="form-control custom-select" name="layanan_1" required>
                                                    <option selected="" disabled="">Pilih Layanan</option>
                                                    <?= $options ?>
                                                </select>
                                                <input type="number" id="jlh_layanan" name="jlh_layanan" hidden
                                                       value="<?= $c ?>">
                                            </div>
                                            <div class="col-md-2">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="gambar" id="gambar"
                                                   required>
                                            <label class="custom-file-label" for="gambar">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{route('admin.paket')}}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>

                        <script>
                            var c = <?= $c ?>;
                            var ci = <?= $ci ?>;
                            var cu = <?= $cu ?>;

                            function tambah() {
                                c++;
                                var html = '';
                                html += '<div class="row" id="new_layanan_'+c+'"><div class="col-md-10"><br>';
                                html += '<select class="form-control custom-select" name="layanan_'+c +'">';
                                html += '<option selected="" disabled="">Pilih Layanan Wisata</option><?php echo $options; ?>';
                                html += '</select>';
                                html += '</div>';
                                html += '<div class="col-md-2"><br>';
                                html += '<button type="button" onclick="remove()" class="btn btn-danger"><i class="fas fa-minus"></i></button>';
                                html += '</div></div>';
                                $("#item_to_add").append(html);
                                $('#jlh_layanan').val(c);
                            }

                            function remove() {
                                $('#new_layanan_'+c).remove();
                                c--;
                                $('#jlh_layanan').val(c);}

                            function tambahi() {
                                ci ++;
                                var html = '';
                                html += '<div class="row" id="item_included_'+ci+'">';
                                html += '<div class="col-10"><br>';
                                html += '<input type="text" class="form-control" name="included_'+ ci +'" id="included_'+ ci +'" placeholder="Included">';
                                html += '</div>';
                                html += '<div class="col-2"><br>';
                                html += '<button type="button" onclick="removei()" class="btn btn-danger"><i class="fas fa-minus"></i></button>';
                                html += '</div>';
                                html += '</div>';
                                $("#included_to_add").append(html);
                                $('#jlh_included').val(ci);
                            }

                            function removei() {
                                $('#item_included_'+ci).remove();
                                ci -= 1;
                                $('#jlh_included').val(ci);
                            }

                            function tambahu() {

                                cu += 1;
                                var html = '';
                                html += '<div class="row" id="item_not_included_'+ cu +'">';
                                html += '<div class="col-10"><br>';
                                html += '<input type="text" class="form-control" name="not_included_'+cu +'" id="not_included_'+cu +'" placeholder="Not Included">';
                                html += '</div>';
                                html += '<div class="col-2"><br>';
                                html += '<button type="button" onclick="removeu()" class="btn btn-danger"><i class="fas fa-minus"></i></button>';
                                html += '</div>';
                                html += '</div>';
                                $('#not_included_to_add').append(html);
                                $('#jlh_not_included').val(cu);
                            }

                            function removeu() {
                                $('#item_not_included_'+cu).remove();
                                cu --;
                                $('#jlh_not_included').val(cu);
                            }
                        </script>
                    @elseif($status='edit')
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
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="{{route('admin.paket.editChoice',$paket->id_paket)}}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
