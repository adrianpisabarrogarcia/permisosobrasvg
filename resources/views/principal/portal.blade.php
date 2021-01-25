<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Vitoria-Gasteiz - Permisos y Obras</title>
    <link href="/css/styles-template-bootstrap.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <link href="/css/principal.css" rel="stylesheet" />
</head>
<body class="sb-nav-fixed sb-sidenav-toggled" id="bod">

@include("principal.layouts.navbar")
<!--MENU DESPLEGABLE-->
@include("principal.layouts.menuDesplegable")

<!--MAIN-->
<div id="layoutSidenav_content">
    <div class="jumbotron jumbotron-fluid w-100 m-0 p-0 bg-transparent border-bottom border-secondary d-flex align-items-center h-auto">
        <div class="container-fluid row justify-content-between py-5 w-100">
            <div class="h-auto py-5 col-12 col-lg-6 d-flex flex-column align-items-center">
                <img src="img/logo-claro.png" class="logo w-50 h-75 mr-5">
                <p class="lead w-50 m-0 ml-5">Obras y reformas Vitoria-Gasteiz.</p>
            </div>
            @switch(Session::get('rol'))
                @case('1')
                <div class="col-12 col-lg-6 h-auto row mt-3 ml-4 ml-lg-0 pl-5 float-end align-items-center justify-content-around">
                    <a href="solicitudpendiente" class="h-25 text-white enlaceprin col-4 col-md-4 col-lg-5 py-4 mr-5 ml-sm-0 border-5 rounded text-dark d-flex align-items-center justify-content-center text-decoration-none text-center">Solicitudes Pendientes</a>
                    <a href="comprobarsolicitud" class="h-25 text-white enlaceprin col-4 col-md-4 col-lg-5 py-4 mr-5 border-2 rounded border-transparent text-dark d-flex align-items-center justify-content-center text-decoration-none text-center">Comprobar Solicitudes</a>
                </div>
                @break
                @case('2')
                <div class="col-12 col-lg-6 h-auto row mt-3 ml-4 ml-lg-0 pl-5 float-end align-items-center justify-content-around">
                    <a href="asignarsolicitudes" class="h-25 text-white enlaceprin col-4 col-md-4 col-lg-5 py-4 mr-5 ml-sm-0 border-5 rounded text-dark d-flex align-items-center justify-content-center text-decoration-none text-center">Asignar Solicitudes</a>
                    <a href="graficos" class="h-25 text-white enlaceprin col-4 col-md-4 col-lg-5 py-4 mr-5 border-2 rounded border-transparent text-dark d-flex align-items-center justify-content-center text-decoration-none text-center">Gráficos</a>
                </div>
                @break
                @default
                <div class="col-12 col-lg-6 h-auto row mt-3 ml-4 ml-lg-0 pl-5 float-end align-items-center justify-content-around">
                    <a href="solicitarobra" class="h-25 text-white enlaceprin col-4 col-md-4 col-lg-5 py-4 mr-5 ml-sm-0 border-5 rounded d-flex align-items-center text-dark justify-content-center text-decoration-none text-center">Solicitar Obra</a>
                    <a href="contacto" class="h-25 text-white enlaceprin col-4 col-md-4 col-lg-5 py-4 mr-5 border-2 rounded border-transparent d-flex align-items-center text-dark justify-content-center text-decoration-none text-center">Contacto</a>
                </div>
                @break
            @endswitch
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if(count($listasolicitudes) > 0)
                @foreach($listasolicitudes as $solicitudes)
                    <div class="col-md-6 mt-4">
                        <a class="text-decoration-none">
                            <div class="container bg-primary mb-4 text-white card shadow card-solicitud d-flex align-items-center justify-content-center">
                                <div class="w-100">
                                    <span class="card-title h4 clearfix">{{ $solicitudes->tipo_obra }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="mb-4 mt-3 col-8 mx-auto paginacion">
                    <nav>
                        {{ $listasolicitudes->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            @else
                <span class="mt-3 text-center">No hay solicitudes realizadas</span>
            @endif
        </div>
    </div>
    <footer class="py-4 bg-primary mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-white">Copyright &copy; Ayuntamiento de Vitoria-Gasteiz 2021</div>
                <div>
                    <!-- <a href="#" class="text-secondary">Privacy Policy</a>
                    &middot; -->
                    <a href="https://github.com/adrianpisabarrogarcia/permisosobrasvg" target="_blank" class="text-white">GitHub</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="/js/principal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/js/script-template-bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
</body>
</html>
