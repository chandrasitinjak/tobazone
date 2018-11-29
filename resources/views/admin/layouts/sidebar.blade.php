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
                <li> <a href="{{ url('/admin/new-merchant')}}"> <i class="menu-icon fa fa-user"></i> Merchant </a> </li>

                <h3 class="menu-title">Order</h3>
                <li> <a href="{{ url('/admin/new-order')}}"> <i class="menu-icon fa fa-archive"></i> New Order </a> </li>
                <li> <a href="{{ url('/admin/paid-order')}}"> <i class="menu-icon fa fa-archive"></i> Paid Order </a> </li>

                <h3 class="menu-title">View</h3>
                <li> <a href="{{ url('/banners')}}"> <i class="menu-icon fa fa-key"></i> Banner </a> </li>
                <li> <a href="{{ url('/carousels')}}"> <i class="menu-icon fa fa-lock"></i> Carousel </a> </li>
                <h3 class="menu-title">Feature</h3>

                <h3 class="menu-title">UI elements</h3>
                <!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Components</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                        <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                        <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Social Buttons</a></li>
                        <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                        <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                        <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                        <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                        <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                        <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                        <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
                        <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                    </ul>
                </li>

                <li> <a href="{{ url('/roles')}}"> <i class="menu-icon fa fa-users"></i> Roles </a> </li>
                <li> <a href="{{ url('/permissions')}}"> <i class="menu-icon fa fa-user"></i> Permissions </a> </li>
                    <h3 class="menu-title">Icons</h3>
                    <!-- /.menu-title -->


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>