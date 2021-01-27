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
                        <div class="sb-nav-link-icon"><i class="fas fa-users text-primary"></i></div>
                        Empleados y Usuarios
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer bg-primary text-white text-center">
                <div class="small">Usuario conectado:</div>
                <small>{{Session::get("nombre")}}</small>
            </div>
        </nav>
    </div>

