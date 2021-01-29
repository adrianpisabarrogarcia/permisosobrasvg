<div class="sb-sidenav-menu-heading bg-primary text-light pt-3">Solicitudes</div>

<!-- solucionar la ruta -->
<a class="nav-link enlace" href="/portal">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-primary"></i></div>
    Solicitudes Pendientes
</a>
<a class="nav-link enlace" href="{{ route('contacto') }}">
    <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill text-primary" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
        </svg></div>
    Contacto
</a>
<div class="sb-sidenav-menu-heading bg-primary pt-3 text-white">Datos</div>
<a class="nav-link enlace" href="{{ route('portal.logout') }}" onclick="
                    event.preventDefault();
                    document.getElementById('logout-form').submit();">
    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt text-primary"></i></div>
    <form id="logout-form" action="{{ route('portal.logout') }}" method="POST" style="display: none">
        @csrf
    </form>
    Cerrar Sesión
</a>
<a class="nav-link enlace" href="{{ route('perfil') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-primary"></i></div>
    Perfil
</a>
