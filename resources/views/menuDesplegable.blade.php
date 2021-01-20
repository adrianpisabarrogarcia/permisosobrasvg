{{-- @if(Session::get("rol")==1 }}
    <!--<div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark rounded-top shadow-lg" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading  bg-dark pt-3">Solicitudes</div>
                        <a class="nav-link" href="portal.blade.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                             Solicitudes Pendientes
                        </a>
                        <a class="nav-link" href="portal.blade.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Comprobar Solicitudes
                        </a>
                        <div class="sb-sidenav-menu-heading bg-dark pt-3">Datos</div>
                        <a class="nav-link " href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Usuarios
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{Session::get("nombre")}}
                </div>
            </nav>
        </div>
{{ @endif--}}

{{--@if(Session::get("rol")==2)}}
<div id="layoutSidenav">
<div id="layoutSidenav_nav" >
<nav class="sb-sidenav accordion sb-sidenav-dark rounded-top shadow-lg" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading bg-dark pt-3">Solicitudes</div>
            <a class="nav-link" href="portal.blade.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Asignar Solicitudes
            </a>
            <a class="nav-link" href="portal.blade.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Comprobar Solicitudes
            </a>
            <div class="sb-sidenav-menu-heading bg-dark pt-3">Datos</div>
            <a class="nav-link " href="#">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Gráficos
            </a>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Tablas
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                    <a class="nav-link " href="#">
                        Empleados
                    </a>
                    <a class="nav-link " href="#">
                        Usuarios normales
                    </a>

                </nav>
            </div>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{Session::get("nombre")}}
    </div>
</nav>
</div> -->
        {{@endif--}}

<!--Prueba para que funcione la pagina-->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav" >
        <nav class="sb-sidenav accordion sb-sidenav-dark rounded-top shadow-lg" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading bg-dark pt-3">Solicitudes</div>
                    <a class="nav-link" href="portal.blade.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Asignar Solicitudes
                    </a>
                    <a class="nav-link" href="portal.blade.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Comprobar Solicitudes
                    </a>
                    <div class="sb-sidenav-menu-heading bg-dark pt-3">Datos</div>
                    <a class="nav-link " href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Gráficos
                    </a>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Tablas
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                            <a class="nav-link " href="#">
                                Empleados
                            </a>
                            <a class="nav-link " href="#">
                                Usuarios normales
                            </a>

                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{Session::get("nombre")}}
            </div>
        </nav>
    </div>

