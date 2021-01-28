<!--Prueba para que funcione la pagina-->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav" >
        <nav class="sb-sidenav accordion sb-sidenav-light rounded-top shadow" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link enlace" href="{{ route('portal.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-house-user text-primary"></i></div>
                        Inicio
                    </a>
                    <div class="sb-sidenav-menu-heading bg-primary text-light pt-3">Solicitudes</div>
                    <a class="nav-link enlace" href="../portal.blade.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-primary"></i></div>
                        Asignar Solicitudes
                    </a>
                    <a class="nav-link enlace" href="../portal.blade.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-primary"></i></div>
                        Comprobar Solicitudes
                    </a>
                    <div class="sb-sidenav-menu-heading bg-primary text-light pt-3">Datos</div>
                    <a class="nav-link enlace" href="{{ route('portal.graficos') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-bar text-primary"></i></div>
                        Estadísticas
                    </a>
                    <a class="nav-link enlace" href="{{ route('listarUsuarios') }}">
                        <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill text-primary" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            </svg></div>
                        Añadir usuario
                    </a>
                    <a class="nav-link enlace" href="{{ route('listarUsuarios') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-users text-primary"></i></div>
                        Listar usuarios
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer bg-primary text-white text-center">
                <div class="small">Usuario conectado:</div>
                <small>{{Session::get("nombre")}}</small>
            </div>
        </nav>
    </div>

