@extends('admin.layouts.app') 
@section('title') {{ "Member" }}
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Member</strong>                    
                    </div>
                    <div class="card-body" >
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"> </i> Tambah Member
                    </button>     
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                            <th style="width: 40px">
                                                ID
                                            </th>
                                            <th class="text-center">
                                                Nama
                                            </th>
                                            <th class="text-center">
                                                Nomor WA/Telepon
                                            </th>
                                            <th class="text-center">
                                                Komunitas
                                            </th>
                                            <th class="text-center">
                                                Email
                                            </th>
                                            <th style="width: 100px">
                                                Status
                                            </th>
                                            <th style="width: 200px"></th>  
                                </tr>
                            </thead>
                            <tbody>
                                <form action="" method="post">
                                @csrf
                                <tr>
                                    <td></td>
                                    <td></td>                                    
                                    <td></td>
                                    <td>
                                        <div class="form-group">
                                            <select name="komunitas" class="form-control custom-select">               
                                                <option selected="" disabled="">Pilih Komunitas</option>                
                                                    <option value="semua">Semua Komunitas</option>           
                                                        <option value="" </option>                                                                                                                   
                                            </select>
                                        </div>
                                    </td>  
                                    <td></td> 
                                    <td>
                                        <div class="form-group">
                                            <select name="komunitas" class="form-control custom-select">               
                                                <option selected="" disabled="">Pilih Komunitas</option>                                                                          
                                                    <option value="semua">Semua Status</option> 
                                                    <option value="2">Non Aktif</option>                                                                                                               
                                                    <option value="1">Aktif</option>                                                                                                                                                                                                                             
                                            </select>
                                        </div>
                                    </td>   
                                    <td class="project-actions text-right">
                                                    <button type="submit" style="width: 180px"
                                                            class="btn btn-success btn-sm">
                                                        <i class="fa fa-filter">
                                                        </i>
                                                        Filter
                                                    </button>
                                                </td>        
                                </tr>
                                </form>
                            </tbody>                                                                                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Member</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="POST" enctype="multipart/form-data">                                                
                                                    @csrf
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label for="name">Nama Anggota/Member</label>
                                                            <input name="name" type="text" class="form-control" id="name"
                                                                   aria-describedby="emailHelp" placeholder="Nama Anggota/Member">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_wa">Nomor WhatsApp (WA)</label>
                                                            <input name="no_WA" type="text" class="form-control" id="no_WA"
                                                                   aria-describedby="emailHelp" placeholder="Nomor WhatsApp (WA)">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_HP">Nomor Telepon (Hp)</label>
                                                            <input name="no_HP" type="text" class="form-control" id="no_HP"
                                                                   aria-describedby="emailHelp" placeholder="Nomor Telepon (Hp)">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_KTP">Nomor KTP </label>
                                                            <input name="no_KTP" type="text" class="form-control" id="no_KTP"
                                                                   aria-describedby="emailHelp" placeholder="Nomor KTP">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input name="email" type="email" class="form-control" id="email"
                                                                   aria-describedby="emailHelp" placeholder="Email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <input name="password" type="text" class="form-control" id="password"
                                                                   aria-describedby="emailHelp" placeholder="Password">
                                                        </div>
                                                        <div class="form-group input-group">
                                                            <label for="photo">Foto KTP</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input name="photo" type="file" class="custom-file-input" id="exampleInputFile">
                                                                    <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                                                </div>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="">Upload</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>                                   
@endsection