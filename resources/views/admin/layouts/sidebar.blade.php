<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/"><img src="{{ url('/admin-assets/images/logo.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="/"><img src="{{ url('/admin-assets/images/logo2.png')}}"
                                                         alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <h3 class="menu-title">Merchant</h3>
                <li><a href="{{ url('/admin/new-merchant')}}"> <i class="menu-icon fa fa-user"></i>New Register Merchant
                    </a></li>
                <li><a href="{{ url('/admin/list-merchant')}}"> <i class="menu-icon fa fa-users"></i>List of Merchant
                    </a></li>

                <h3 class="menu-title">Order</h3>
                <li><a href="{{ url('/admin/new-order')}}"> <i class="menu-icon fa fa-archive"></i> New Order </a></li>
                <!-- <li> <a href="{{ url('/admin/unpaid-order')}}"> <i class="menu-icon fa fa-archive"></i> Unpaid Order </a> </li> -->
                <li><a href="{{ url('/admin/paid-order')}}"> <i class="menu-icon fa fa-money"></i> Paid Order </a></li>
                <li><a href="{{ url('/admin/invalid-order')}}"> <i class="menu-icon fa fa-ban"></i> Invalid Order </a>
                </li>
                <li><a href="{{ url('/admin/onprocess-order')}}"> <i class="menu-icon fa fa-clock-o"></i> On Process
                        Order </a></li>
                <li><a href="{{ url('/admin/successed-order')}}"> <i class="menu-icon fa fa-check-circle"></i> Successed
                        Order </a></li>
                <li><a href="{{ url('/admin/rejected-order')}}"> <i class="menu-icon fa fa-exclamation-triangle"></i>
                        Rejected Order</a></li>

                <h3 class="menu-title">View</h3>
                <li><a href="{{ url('/carousels')}}"> <i class="menu-icon fa fa-star"></i> Carousel </a></li>
                <!-- <li> <a href="{{ url('/banners')}}"> <i class="menu-icon fa fa-bookmark"></i> Banner </a> </li>
                <li> <a href="{{ url('/admin/blogs')}}"> <i class="menu-icon fa fa-stack-exchange"></i> Blogs </a> </li> -->

                <!-- <h3 class="menu-title">Role & Permissions</h3>

                <li> <a href="{{ url('/roles')}}"> <i class="menu-icon fa fa-users"></i> Roles </a> </li>
                <li> <a href="{{ url('/permissions')}}"> <i class="menu-icon fa fa-user"></i> Permissions </a> </li> -->
                <h3 class="menu-title">Koperasi</h3>
                <li><a href="{{ url('/admin/koperasi-aktif')}}"> <i class="menu-icon"></i>Koperasi Aktif</a></li>
                <li><a href="{{ url('/admin/koperasi-tidak-aktif')}}"> <i class="menu-icon"></i>Koperasi Tidak Aktif</a>
                </li>
                <li><a href="{{ url('/admin/akun-koperasi-pending')}}"> <i class="menu-icon"></i>Akun Pending</a></li>
            </ul>
        </div>
    </nav>
</aside>
