<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="#">
                <i class="ti-menu ti-close"></i>
            </a>
            <div class="navbar-brand">
                <!-- Logo icon -->
                <a href="{{ route('super-admin-dashboard') }}">
                    <b class="logo-icon">
                        <!-- Dark Logo icon -->
                        <img src="/assets/icons/logo-metashare.png" width="180" alt="homepage"
                            class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="/assets/icons/logo-metashare.png" width="180" alt="homepage"
                            class="light-logo" />
                    </b>
                </a>
            </div>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="#" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>
        @if (Auth::check() && Auth::user()->roles == 'SUPER_ADMIN')
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav float-left mr-auto ml-3 pl-1"></ul>
                <ul class="navbar-nav float-right">
                    <h5 class="pb-2 pr-2">Super Admin</h5>
                </ul>
            </div>
        @elseif (Auth::check() && Auth::user()->roles == 'ADMIN')
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav float-left mr-auto ml-3 pl-1"></ul>
                <ul class="navbar-nav float-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="ml-2 d-none d-lg-inline-block">
                                <span>Hello,</span>
                                <span class="text-dark">{{ Auth::user()->name }}</span>
                                <i data-feather="chevron-down" class="svg-icon"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                            <a class="dropdown-item" href="#">
                                <i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i data-feather="key" class="svg-icon mr-2 ml-1"></i>
                                Edit Password
                            </a>
                            <hr>
                            <a class="dropdown-item" id="logout" href="{{ route('admin-logout') }}">
                                <i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        @endif
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
