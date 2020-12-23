<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{url('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Anggota CBT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

            </div>
            <div class="info">
                <a href="#" class="d-block">Tobazone</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="{{url('cbt.dashboard')}}" class="nav-link ">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-copy"></i>
                        <p>
                            Komunitas Pariwisita
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('anggotacbt/komunitas')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Komunitas </p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-tree"></i>
                        <p>
                            Layanan Wisata
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"></li>
                        <li class="nav-item">
                            <a href="{{route('anggotacbt.layanan')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Layanan</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-adjust"></i>
                        <p>
                            Informasi Pariwisata
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"></li>
                        <li class="nav-item">
                            <a href="{{url('/objekwisata')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mengelola Objek Wisata</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"></li>
                        <li class="nav-item">
                            <a href="{{url('/kuliner')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mengelola Kuliner</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"></li>
                        <li class="nav-item">
                            <a href="{{url('/akomodasi')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mengelola Akomodasi</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"></li>
                        <li class="nav-item">
                            <a href="{{url('/event')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mengelola Event</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"></li>
                        <li class="nav-item">
                            <a href="{{url('/transportasi')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mengelola Transportasi</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"></li>
                        <li class="nav-item">
                            <a href="{{url('/budaya')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mengelola Budaya</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                <a href="https://tobazone-koperasi.herokuapp.com/#/register" class="nav-link ">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Daftar/Login Koperasi
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
