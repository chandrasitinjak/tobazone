@extends('admin.layouts.app')
@section('title') {{ "Member" }}
@endsection

@section('content')
    <div class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link {{((Request::segment(2) === 'new-member')&&(Request::segment(3) == null)) ? 'active' : null}}" href="#member"
                                                        data-toggle="tab">Member</a></li>
                                <li class="nav-item"><a class="nav-link {{((Request::segment(2) === 'new-member')&&(Request::segment(3) == 'request')) ? 'active' : null}}" href="#request" data-toggle="tab">Request
                                        Member</a></li>
                            </ul>
                </div>                    

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane {{((Request::segment(2) === 'new-member')&&(Request::segment(3) == null)) ? 'active' : null}} " id="member">
                                <div class="card-body">                                    
                                     <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-plus"> </i> Tambah Member
                                    </button>     
                                </div>
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
                                        <form action="{{ route('member.filter') }}" method="post">
                                        @csrf
                                        <tr>
                                            <td></td>
                                            <td></td>                                    
                                            <td></td>
                                            <td>
                                                <div class="form-group">
                                                    <select name="komunitas" class="form-control custom-select">               
                                                        <option selected="" disabled="">Pilih Komunitas</option>                
                                                        <option value="semua" {{(isset($id_komut)&&($id_komut=='semua'))?'selected':null}}>Semua Komunitas</option>                                                            
                                                                @foreach($komunitas as $row)
                                                                <option
                                                                    value="{{$row->id}}" {{(isset($id_komut)&&($id_komut==$row->id))?'selected':null}}>{{$row->nama_komunitas}}</option>
                                                                @endforeach                                                                                                                
                                                    </select>
                                                </div>
                                            </td>  
                                            <td></td> 
                                            <td>
                                                <div class="form-group">
                                                    <select name="status" class="form-control custom-select">               
                                                        <option selected="" disabled="">Pilih Status</option>                                                                          
                                                        <option value="semua" {{(isset($status)&&($status=='semua'))?'selected':null}}>Semua Status</option>
                                                            <option value="deactiveByAdmin" {{(isset($status)&&($status=='deactiveByAdmin'))?'selected':null}}>
                                                                        Non Aktif
                                                            </option>
                                                            <option value="verifiedByAdmin" {{(isset($status)&&($status=='verifiedByAdmin'))?'selected':null}}>
                                                                Aktif
                                                            </option>                                                                                                                                                                                                                             
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
                                            @forelse($member as $index => $row)
                                                    <tr style="font-size: 15px">
                                                        <td>{{$index+1}}</td>
                                                        <td>{{$row->getUser->name}}</td>
                                                        @if(($row->getUser->no_WA)==($row->getUser->no_HP))
                                                            <td> {{$row->getUser->no_WA}} <b>(Nomor WA & Telopon)</b>
                                                            </td>
                                                        @else
                                                            <td>{{$row->getUser->no_WA}} <br><b>(no wa)</b>
                                                                <br> {{$row->getUser->no_HP}} <br><b>(no
                                                                    telepon)</b>
                                                            </td>
                                                        @endif
                                                        <td>@foreach($row->getKomunitasMember as $rows)
                                                                {{$rows->nama_komunitas}}<br>
                                                            @endforeach
                                                        </td>
                                                        <td>{{$row->getUser->email}}</td>
                                                        <td>{{$row->defineStatus($row->getUser->status)}}</td>
                                                        <td>
                                                            <a href="{{route('member.detail',$row->id)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"> </i> Lihat</a>
                                                            @if($row->getUser->status=="verifiedByAdmin")
                                                                <a href="{{ route('member.nonaktifkan', $row->id) }}"  class="btn btn-sm btn-warning">Non-Aktif kan</a>
                                                            @elseif($row->getUser->status=="deactiveByAdmin")
                                                                <a href="{{ route('member.aktifkan', $row->id) }}" class="btn btn-sm btn-success">Aktif-kan</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr style="font-size: 15px">
                                                        <td colspan="5">
                                                            <center>Belum ada member/anggota CBT</center>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </tbody>                                                                                        
                                </table>
                            </div>
                            
                            <div class="tab-pane {{((Request::segment(2) === 'new-member')&&(Request::segment(3) == 'request')) ? 'active' : null}}" id="request">                                
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane {{((Request::segment(2) === 'new-member')&&(Request::segment(3) == null)) ? 'active' : null}} " id="member">
                                    <button style="margin-bottom: 10px" type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#exampleModal">
                                        <i class="fa fa-plus"> </i> Tambah Member
                                    </button>

                                    <!-- Modal -->
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
                                                <form action="{{route('member.store')}}" method="POST"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Nama Anggota/Member</label>
                                                            <input name="nama_lengkap" type="text" class="form-control" id="name"
                                                                   aria-describedby="emailHelp" placeholder="Nama Anggota/Member">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_wa">Nomor WhatsApp (WA)</label>
                                                            <input name="nomor_wa" type="text" class="form-control" id="no_WA"
                                                                   aria-describedby="emailHelp" placeholder="Nomor WhatsApp (WA)">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_HP">Nomor Telepon (Hp)</label>
                                                            <input name="nomor_hp" type="text" class="form-control" id="no_HP"
                                                                   aria-describedby="emailHelp" placeholder="Nomor Telepon (Hp)">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_KTP">Nomor KTP </label>
                                                            <input name="nomor_ktp" type="text" class="form-control" id="no_KTP"
                                                                   aria-describedby="emailHelp" placeholder="Nomor KTP">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input name="email" type="email" class="form-control" id="email"
                                                                   aria-describedby="emailHelp" placeholder="Email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <input name="kata_sandi" type="text" class="form-control" id="password"
                                                                   aria-describedby="emailHelp" placeholder="Password">
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="komunitas" type="hidden" class="form-control" id="password"
                                                                   aria-describedby="emailHelp" value="-">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="photo">Foto KTP</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
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
                                    <table class="table table-striped projects">
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
                                        <form action="{{route('member.filter')}}" method="post">
                                            @csrf
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <select name="komunitas" class="form-control custom-select">
                                                            <option selected="" disabled="">Pilih Komunitas</option>
                                                            <option value="semua" {{(isset($id_komut)&&($id_komut=='semua'))?'selected':null}}>Semua Komunitas</option>
                                                            @foreach($komunitas as $row)
                                                                <option
                                                                    value="{{$row->id}}" {{(isset($id_komut)&&($id_komut==$row->id))?'selected':null}}>{{$row->nama_komunitas}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <select name="status" class="form-control custom-select">
                                                            <option selected="" disabled="">Pilih Status</option>
                                                            <option value="semua" {{(isset($status)&&($status=='semua'))?'selected':null}}>Semua Status</option>
                                                            <option value="deactiveByAdmin" {{(isset($status)&&($status=='deactiveByAdmin'))?'selected':null}}>
                                                                Non Aktif
                                                            </option>
                                                            <option
                                                                value="verifiedByAdmin" {{(isset($status)&&($status=='verifiedByAdmin'))?'selected':null}}>
                                                                Aktif
                                                            </option>
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
                                        @forelse($member as $index => $row)
                                            <tr style="font-size: 15px">
                                                <td>{{$index+1}}</td>
                                                <td>{{$row->getUser->name}}</td>
                                                @if(($row->getUser->no_WA)==($row->getUser->no_HP))
                                                    <td> {{$row->getUser->no_WA}} <b>(Nomor WA & Telopon)</b>
                                                    </td>
                                                @else
                                                    <td>{{$row->getUser->no_WA}} <br><b>(no wa)</b>
                                                        <br> {{$row->getUser->no_HP}} <br><b>(no
                                                            telepon)</b>
                                                    </td>
                                                @endif
                                                <td>@foreach($row->getKomunitasMember as $rows)
                                                        {{$rows->nama_komunitas}}<br>
                                                    @endforeach
                                                </td>
                                                <td>{{$row->getUser->email}}</td>
                                                <td>{{$row->defineStatus($row->getUser->status)}}</td>
                                                <td>
                                                    <a href="{{route('member.detail',$row->id)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"> </i> Lihat</a>
                                                    @if($row->getUser->status=='verifiedByAdmin')
                                                        <a href="{{route('member.nonaktifkan',$row->id)}}" class="btn btn-sm btn-warning">Non-Aktif kan</a>
                                                    @elseif($row->getUser->status=='deactiveByAdmin')
                                                        <a href="{{route('member.aktifkan',$row->id)}}" class="btn btn-sm btn-success">Aktif-kan</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr style="font-size: 15px">
                                                <td colspan="5">
                                                    <center>Belum ada member/anggota CBT</center>
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane {{((Request::segment(2) === 'new-member')&&(Request::segment(3) == 'request')) ? 'active' : null}}" id="request">
                                    <table class="table table-striped projects">
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
                                        <form action="{{route('member.request.filter')}}" method="post">
                                            @csrf
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <select name="komunitas_r" class="form-control custom-select">
                                                            <option selected="" disabled="">Pilih Komunitas</option>
                                                            <option value="semua" {{(isset($id_komut_req)&&($id_komut_req==='semua'))?'selected':null}}>Semua Komunitas</option>
                                                            @foreach($komunitas as $row)
                                                                <option
                                                                    value="{{$row->id}}" {{(isset($id_komut_req)&&($id_komut_req==$row->id))?'selected':null}}>{{$row->nama_komunitas}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <select name="status_r" class="form-control custom-select">
                                                            <option selected="" disabled="">Pilih Status</option>
                                                            <option value="semua" {{(isset($status_req)&&($status_req==='semua'))?'selected':null}}>Semua Status</option>
                                                            <option
                                                                value="-" {{(isset($status_req)&&($status_req=='-'))?'selected':null}}>
                                                                Request
                                                            </option>
                                                            <option
                                                                value="4" {{(isset($status_req)&&($status_req=='4'))?'selected':null}}>
                                                                Ditolak
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="project-actions text-right">
                                                    <button type="submit" style="width: 180px"
                                                            class="btn btn-success btn-sm">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Filter
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
                                        @forelse($req as $index => $row)
                                            <tr style="font-size: 15px">
                                                <td>{{$index+1}}</td>
                                                <td>{{$row->getUser->name}}</td>
                                                @if(($row->getUser->no_WA)==($row->getUser->no_HP))
                                                    <td> {{$row->getUser->no_WA}}
                                                    </td>
                                                @else
                                                    <td>{{$row->getUser->no_WA}} <br><b>(no wa)</b>
                                                        <br> {{$row->getUser->no_HP}} <br><b>(no
                                                            telepon)</b>
                                                    </td>
                                                @endif
                                                <td>@foreach($row->getKomunitasMember as $rows)
                                                        {{$rows->nama_komunitas}}<br>
                                                    @endforeach
                                                </td>
                                                <td>{{$row->getUser->email}}</td>
                                                <td>{{$row->defineStatus($row->getUser->status)}}</td>
                                                <td>
                                                    <a href="{{route('member.request.detail',$row->getUser->id)}}" class="btn btn-sm btn-info">Detail</a>
                                                    @if($row->getUser->status==0)
                                                        <a href="{{route('member.request.tolak',$row->getUser->id)}}" class="btn btn-sm btn-danger">Tolak</a>
                                                        <a href="{{route('member.request.terima',$row->getUser->id)}}" class="btn btn-sm btn-warning">Terima</a>
                                                    @elseif($row->getUser->status==4)
                                                        <a href="{{route('member.request.terima',$row->getUser->id)}}" class="btn btn-sm btn-success">Terima</a>
                                                        <a href="{{route('member.request.hapus',$row->id)}}" class="btn btn-sm btn-danger">Hapus</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr style="font-size: 15px">
                                                <td colspan="5">
                                                    <center>Belum ada member/anggota CBT</center>
                                                </td>
                                            </tr>
                                        @endforelse
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
