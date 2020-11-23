<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false"
                aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
            <a class="navbar-brand" href="/"><img src="{{ url('/admin-assets/images/logo.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="/"><img src="{{ url('/admin-assets/images/logo2.png')}}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <h3 class="menu-title">Merchant</h3>
                <li> <a href="{{ url('/admin/new-merchant')}}"> <i class="menu-icon fa fa-user"></i>New Register Merchant </a> </li>
                <li> <a href="{{ url('/admin/list-merchant')}}"> <i class="menu-icon fa fa-users"></i>List of Merchant </a> </li>

                <h3 class="menu-title">Member</h3>
                <li> <a href="{{ url('/admin/new-member')}}"> <i class="menu-icon fa fa-user"></i>Daftar Member</a> </li>
                <li> <a href="{{ url('/admin/new-member/request')}}"> <i class="menu-icon fa fa-user"></i>Request Member</a> </li>



                <h3 class="menu-title">Order</h3>
                <li> <a href="{{ url('/admin/new-order')}}"> <i class="menu-icon fa fa-archive"></i> New Order </a> </li>
                <!-- <li> <a href="{{ url('/admin/unpaid-order')}}"> <i class="menu-icon fa fa-archive"></i> Unpaid Order </a> </li> -->
                <li> <a href="{{ url('/admin/paid-order')}}"> <i class="menu-icon fa fa-money"></i> Paid Order </a> </li>
                <li> <a href="{{ url('/admin/invalid-order')}}"> <i class="menu-icon fa fa-ban"></i> Invalid Order </a> </li>
                <li> <a href="{{ url('/admin/onprocess-order')}}"> <i class="menu-icon fa fa-clock-o"></i> On Process Order </a> </li>
                <li> <a href="{{ url('/admin/successed-order')}}"> <i class="menu-icon fa fa-check-circle"></i> Successed Order </a> </li>
                <li> <a href="{{ url('/admin/rejected-order')}}"> <i class="menu-icon fa fa-exclamation-triangle"></i> Rejected Order</a> </li>

                {{--                Paket wisata--}}
                <h3 class="menu-title">Komunitas</h3>
                <li> <a href="{{ url('/admin/komunitas')}}"> <i class="menu-icon fa fa-users"></i>List Komunitas</a> </li>

                <h3 class="menu-title">Paket Wisata</h3>
                <li> <a href="{{ url('/admin/paket')}}"> <i class="menu-icon fa fa-book"></i>List Paket</a> </li>
                <li> <a href="{{ url('/admin/paket/add')}}"> <i class="menu-icon fa fa-plus"></i>Tambah Paket Wisata</a> </li>

                <h3 class="menu-title">Pemesanan</h3>
                <li> <a href="{{ route('admin.pemesanan')}}"> <i class="menu-icon fa fa-book"></i>List Pemesanan</a> </li>
                {{--                the end of paket--}}

                <h3 class="menu-title">View</h3>
                <li> <a href="{{ url('/carousels')}}"> <i class="menu-icon fa fa-star"></i> Carousel </a> </li>
                <!-- <li> <a href="{{ url('/banners')}}"> <i class="menu-icon fa fa-bookmark"></i> Banner </a> </li>
                <li> <a href="{{ url('/admin/blogs')}}"> <i class="menu-icon fa fa-stack-exchange"></i> Blogs </a> </li> -->

                <!-- <h3 class="menu-title">Role & Permissions</h3>

                <li> <a href="{{ url('/roles')}}"> <i class="menu-icon fa fa-users"></i> Roles </a> </li>
                <li> <a href="{{ url('/permissions')}}"> <i class="menu-icon fa fa-user"></i> Permissions </a> </li> -->
            </ul>
        </div>
    </nav>
</aside>
