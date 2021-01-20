<div id="layoutSidenav">
    <div id="layoutSidenav_nav" >
        <nav class="sb-sidenav accordion sb-sidenav-dark rounded-top" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading bg-dark pt-3">Solicitudes</div>
                    <a class="nav-link" href="asignarSolicitudes">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Asignar Solicitudes
                    </a>
                    <a class="nav-link" href="comprobarSolicitudes">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Comprobar Solicitudes
                    </a>
                    <div class="sb-sidenav-menu-heading bg-dark pt-3">Datos</div>
                    <a class="nav-link " href="graficos">
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

                            <a class="nav-link " href="tablaEmpleados">
                                Empleados
                            </a>
                            <a class="nav-link " href="tablausUsuarios">
                                Usuarios
                            </a>

                        </nav>
                    </div>
                </div>
            </div>
            @include("../footerMenu")
        </nav>
    </div>