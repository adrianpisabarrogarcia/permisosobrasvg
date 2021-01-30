<nav class="sb-sidenav accordion sb-sidenav-light rounded-top shadow" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link enlace" href="{{ route('portal.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-house-user text-primary"></i></div>
                Inicio
            </a>
        @switch(Session::get("rol"))
            @case("1")
            @include("principal.coordinador.menuCoordinador")
            @break
            @case("2")
            @include("principal.tecnico.menuTecnico")
            @break
            @default
            <!--menu usuario normal-->
                @include("principal.usuarios.menuUsuarios")
            @endswitch
        </div>
    </div>
    @include("principal.layouts.footerMenu")
</nav>
