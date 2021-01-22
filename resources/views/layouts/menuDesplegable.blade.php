{{--@if(Session::get("rol")==1)
    @include("tecnico.menuTecnico")
@endif

@if(Session::get("rol")==2)
    @include("coordinador.menuCoordinador")
@endif--}}

<!--Prueba para que funcione la pagina-->
<div id="layoutSidenav" >
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light rounded-top shadow" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading bg-secondary pt-3">Solicitudes</div>
                    <a class="nav-link" href="asignarSolicitudes">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Asignar Solicitudes
                    </a>
                    <a class="nav-link" href="comprobarSolicitudes">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Comprobar Solicitudes
                    </a>
                    <div class="sb-sidenav-menu-heading bg-secondary pt-3">Datos</div>
                    <a class="nav-link" href="graficos">
                        <div class="sb-nav-link-icon text-secondary"><i class="fas fa-columns"></i></div>
                        Gráficos
                    </a>
                    <a class="nav-link" href="informacionUsuarios">
                        <div class="sb-nav-link-icon text-secondary"><i class="fas fa-columns"></i></div>
                        Tablas
                    </a>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon text-secondary"><i class="fas fa-book-open"></i></div>
                        Usuarios
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                            <a class="nav-link " href="creacionUsuarios?accion=crear">
                                Crear usuario
                            </a>
                            <a class="nav-link " href="creacionUsuarios?accion=borrar">
                                Listado  usuarios
                            </a>

                        </nav>
                    </div>
                </div>
            </div>
            @include("layouts.footerMenu")
        </nav>
    </div>
