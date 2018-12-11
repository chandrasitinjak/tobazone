<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle" src="{{ url('/admin-assets/images/admin.jpg')}}" alt="User Avatar">
                            </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="/admin/profile"><i class="fa fa-user"></i> My Profile</a>

                    <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                    <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                    <form action="{{ url('/logout')}}" method="POST">
                        {{ csrf_field() }}
                        <button class="" style="background: none;
                                                border: none;
                                                font-size: 14px;
                                                color: black;
                                                padding-left: 0;"
                                type="submit"><i class="fa fa-power-off"></i>&nbsp;Logout</a>
                    </form>
                </div>
            </div>

        </div>
    </div>

</header>