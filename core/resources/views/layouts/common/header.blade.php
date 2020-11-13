<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
              <i class="ti-menu ti-close"></i>
            </a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <!-- Logo icon -->
                <a href="index.html">
                    <b class="logo-icon">
                        <!-- Dark Logo icon -->
                        <img src="{{asset('public/assets/images/icon_health.png')}}" alt="homepage" class="dark-logo" />

                        <!-- Light Logo icon -->
                        <img src="{{asset('public/assets/images/icon_health.png')}}" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                        <!-- dark Logo text -->
                        <img src="{{asset('public/assets/images/sodexo-text.jpg')}}" alt="homepage" class="dark-logo" width="132px"  />

                        <!-- Light Logo text -->
                        <img src="{{asset('public/assets/images/sodexo-text.jpg')}}" class="light-logo" alt="homepage" width="132px"  />

                    </span>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <i class="ti-more"></i>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
                <!-- User profile and search -->
                <!-- ============================================================== -->
                @if (Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="@if(Auth::user()->gender == 'Masculino') {{asset('public/img/user/man.png')}} @elseif(Auth::user()->gender == 'Femenino') {{asset('public/img/user/woman.png')}} @endif" alt="user" class="rounded-circle" width="40">
                        <span class="ml-2 d-none d-lg-inline-block">
                          <span>Bienvenido,</span> <span class="text-dark">{{ Auth::user()->fullname }}</span>
                          <i data-feather="chevron-down" class="svg-icon"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="{{ route('profile', Auth::user()->id) }}">
                          <i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                            Mi perfil
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)" id="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          <i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                          Salir
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="get" style="display: none;">@csrf</form>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                @endif
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
