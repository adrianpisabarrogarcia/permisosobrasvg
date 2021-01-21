

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-secondary">
    <button class="btn btn-link btn-sm order-1 order-lg-0 ml-5personalized text-light border-1 border-light btn-outline-secondary" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <span class="navbar-brand ml-5 w-100 pl-lg-5">
        @yield("logo")

    </span>



    <!-- Navbar Search
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
     Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i> {{ Session::get('nombre') }} </a>
            <div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Ajustes</a>
                <a class="dropdown-item" href="#">Activity Log</a>
                <a class="dropdown-item" href="#">
                    <label class="switch mt-2">
                        <input type="checkbox" class="checkbox">
                        <span class="slider round"></span>
                    </label> Modo claro/oscuro </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('login.home') }}">Cerrar Sesión</a>
            </div>
        </li>
    </ul>
</nav>
