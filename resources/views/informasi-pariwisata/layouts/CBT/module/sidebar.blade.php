<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo --> 
 

    <a href="#" class="brand-link">
        
        <span class="brand-text font-weight-light">@if(session('nama_kabupaten'))
            {{session('nama_kabupaten')}}
        @endif</span>
    </a>
​
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            
            <div class="info">
                <a href="#" class="d-block">@if(session('nama'))
            {{session('nama')}}
        @endif</a>
            </div>
        </div>
​
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="{{url('admin/index')}}" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-briefcase"></i>
                        <p>
                            Manajemen Informasi
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/ObjekWisata')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Objek Wisata</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/Akomodasi')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Akomodasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/Budaya')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Budaya</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/Kuliner')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Kuliner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/Event')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Event</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/Transportasi')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Transportasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-server"></i>
                        <p>
                            Manajemen Category
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/kategori')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Kategori Wisata</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/CategoryAkomodasi')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Kategori Akomodasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-server"></i>
                        <p>
                            Manajemen CBT
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/User')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Register new user</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>