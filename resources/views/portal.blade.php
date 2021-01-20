<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Vitoria-Gasteiz - Permisos y Obras</title>
    <link href="/css/styles-template-bootstrap.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <link href="/css/principal.css" rel="stylesheet" />
    <link href="/css/Principal/claro.css" rel="stylesheet" class="theme"/>


</head>
<body class="sb-nav-fixed sb-sidenav-toggled">

@include("navbar")
<!--MENU DESPLEGABLE-->
@include("menuDesplegable")

<!--MAIN-->

<div id="layoutSidenav_content" class="bg-light">
    <div class="jumbotron jumbotron-fluid w-100 m-0 p-0 bg-transparent border-bottom border-secondary d-flex align-items-center h-auto">
        <div class="container-fluid row justify-content-between py-5 w-100">
            <div class="h-auto py-5 col-12 col-lg-6 d-flex flex-column align-items-center">
                <img src="img/logo-negro.png" class=" w-75  h-75 mr-5">
                <p class="lead w-50 m-0 ml-5">Obras y reformas Vitoria-Gasteiz.</p>
            </div>
            <div class="col-12 col-lg-6 h-auto row mt-3 ml-4 ml-lg-0 pl-5 float-end align-items-end justify-content-around">
                <a href="contacto" class="h-25 bg-pistacho col-5 col-lg-5 py-4 mr-5 ml-sm-0 border-5 rounded  text-dark d-flex align-items-center justify-content-center btn-outline-secondary">Solicitar Obra</a>
                <button class="h-25 bg-pistacho col-5 col-lg-5 py-4 mr-5 border-2 rounded border-transparent text-dark d-flex align-items-center justify-content-center">Contacto </button>
                <p class="w-100" ><a href="" class="text-pistacho float-right">Más información</a></p>
            </div>
        </div>

    </div>
    <main>
        <div class="container-fluid bg-transparent h-auto">
            <div class="container-fluid row d-flex justify-content-center align-items-end mh-100">
                @if(isset($listaPublicaciones)/*$listaPublicaciones>0*/)
                    @foreach($listaPublicaciones as $publicacion )
                        <div class="col-xl-5 mx-5">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar mr-1"></i>
                                     Contacto
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h1 class="">Todavía no hay solicitudes de obras publicadas</h1>
                @endif
            </div>
        </div>



        <!--<div class="container-fluid bg-transparent">

            <div class="container-fluid">
                <div class="row justify-content-around">
                    <div class="col-xl-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                Solicitar Obra
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar mr-1"></i>
                                Estado de obras
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-around">
                    <div class="col-xl-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                Más Información
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar mr-1"></i>
                                Contacto
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
    </main>
    <footer class="py-4 bg-secondary mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-light">Copyright &copy; Ayuntamiento de Vitoria-Gasteiz 2021</div>
                <div >
                    <!-- <a href="#" class="text-secondary">Privacy Policy</a>
                    &middot; -->
                    <a href="https://github.com/adrianpisabarrogarcia/permisosobrasvg" target="_blank" class="text-light pr-5">GitHub</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>
<script src="/js/Librerias/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="/js/principal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/js/script-template-bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>

</body>
</html>
