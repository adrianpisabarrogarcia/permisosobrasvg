<div class="sb-sidenav-menu-heading  bg-primary pt-3 text-white" >Solicitudes</div>
<a class="nav-link" href="solicitarObra">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
    Solicitar Obras
</a>
<a class="nav-link" href="contacto">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
    Contacto
</a>
<div class="sb-sidenav-menu-heading bg-primary pt-3 text-white">Datos</div>
<a class="nav-link " href="{{ route('portal.logout') }}" onclick="
                    event.preventDefault();
                    document.getElementById('logout-form').submit();">
    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
    <form id="logout-form" action="{{ route('portal.logout') }}" method="POST" style="display: none">
        @csrf
    </form>
    Cerrar Sesión
</a>
<a class="nav-link" href="contacto">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
    Perfil
</a>
