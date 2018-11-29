<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title">Merchant</li>

                <li> <a href="{{ url('/admin/newmerchant')}}"> <i class="menu-icon fa fa-user"></i> Merchant </a> </li> 

                <li class="menu-title">Order</li>

                <li> <a href="{{ url('/admin/new-order')}}"> <i class="menu-icon fa fa-box"></i> New Order </a> </li> 
                <li> <a href="{{ url('/admin/paid-order')}}"> <i class="menu-icon fa fa-box"></i> Paid Order </a> </li> 


                <li class="menu-title">Utilities</li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Blogs</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-list-ul"></i> <a href="{{url('/admin/blogs')}}"> All Blogs</a></li>
                        <li><i class="menu-icon fa fa-edit"></i> <a href="{{url('/blogs/create')}}"> Create Blog</a></li>
                    </ul>  
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-book"></i>Banners</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-list-ul"></i> <a href="{{url('/banner')}}"> All Banners</a></li>
                        <li><i class="menu-icon fa fa-edit"></i> <a href="{{url('/banner/create')}}"> Create Banners</a></li>
                    </ul>    
                </li>
                
                <li class="menu-title">Role and Permission</li>
                <!-- /.menu-title -->
                <li>
                    <a href="{{ url('/roles')}}"> <i class="menu-icon fa fa-key"></i>Role </a>
                </li>
                <li>
                    <a href="{{ url('/permissions')}}"> <i class="menu-icon fa fa-lock"></i>Permission </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>

