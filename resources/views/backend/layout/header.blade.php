<header class="main-header">
    <!-- Logo -->
    <a href="/backend/home" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels >
    <span class="logo-mini"><b>CM</b>S</span-->
        <img src="{{ asset('assets/logos/logoSFondo.png') }}" alt="" style="width: 200%; margin-left: -10px !important;"
            id="log">
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"> <img src="{{ asset('assets/logos/logoSFondo.png') }}" alt="" style="width: 10%;">
            <b>INAP</b>Ayudas</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!--li><a href="{{ route('register') }}">Register</a></li--->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{-- <img src="../../assets/img/user2-160x160.jpg" class="user-image" alt="User Image"> --}}
                        <span class="hidden-xs"> User </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header  text-center">
                          <i class="fa fa-users" style="font-size:82px; color: white"></i>
                            {{-- <img src="{{ url('assets/img/boxed-bg.jpg') }}" class="img-circle" alt="User Image"> --}}
                            <p class="text-uppercase text-center">
                                {{ $cookie->email }}
                                <strong class="text-uppercase">{{ $cookie->firstname." ".$cookie->lastname }}</strong>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">

                            <div class="pull-left">
                                {{-- <a href="/backend/usuarios/{{ Auth::user()->first()->id }}/edit" class="btn btn-default btn-flat">Mi Perfil</a> --}}
                            </div>

                            <div class="pull-right">
                                <a href="{{ route('logoutData') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"> Logout </a>

                                <form id="logout-form" action="{{ route('logoutData') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>

                    </ul>
                </li>
                <li><a href="https://www.gfiles.co/publicaciones/213/terminos-y-condiciones-del-servicio/"> <i class="fa fa-caret-square-o-down" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </nav>
</header>
