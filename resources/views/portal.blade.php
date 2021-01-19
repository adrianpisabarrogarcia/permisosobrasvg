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

<div id="layoutSidenav_content" class="bg-degradado">
    <div class="jumbotron jumbotron-fluid pb-0 pt-4 bg-transparent mx-5 border-bottom border-light">
        <div class="container-fluid">
            <img src="img/logo-negro.png" class="w-25 h-75">
            <p class="lead ml-5">Obras y reformas Vitoria-Gasteiz.</p>
        </div>
        <p class="float-right mr-5 " ><a href="" class="text-dark hover">Más información</a></p>
    </div>
    <main>
        <div class="container-fluid bg-transparent">

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
    </main>
    <footer class="py-4 bg-dark mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Ayuntamiento de Vitoria-Gasteiz 2021</div>
                <div >
                    <!-- <a href="#" class="text-secondary">Privacy Policy</a>
                    &middot; -->
                    <a href="https://github.com/adrianpisabarrogarcia/permisosobrasvg" target="_blank" class="text-secondary">GitHub</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
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
