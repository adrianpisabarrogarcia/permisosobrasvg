<div class="sb-sidenav-menu-heading bg-primary text-light pt-3">Solicitudes</div>
<!-- solucionar la ruta -->
<a class="nav-link enlace" href="{{ route('comprobarSolicitudes') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-primary"></i></div>
    Comprobar Solicitudes
</a>
<a class="nav-link enlace" href="{{ route('solicitudesSinAsignar') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-primary"></i></div>
    Asignar Solicitudes
</a>
<div class="sb-sidenav-menu-heading bg-primary text-light pt-3">Datos</div>
<a class="nav-link enlace" href="{{ route('portal.graficos') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-chart-bar text-primary"></i></div>
    Estadísticas
</a>
<a class="nav-link enlace" href="{{ route('annadirObraEdificio') }}">
    <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop text-primary viewBox="0 0 16 16">
        <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
        </svg></div>
    Añadir tipo de obra y edificio
</a>
<a class="nav-link enlace" href="{{ route('creacionUsuarios') }}">
    <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill text-primary" viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
        </svg></div>
    Añadir usuarios
</a>
<a class="nav-link enlace" href="{{ route('listarUsuarios') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-users text-primary"></i></div>
    Empleados y Usuarios
</a>
