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
    <body class="sb-nav-fixed sb-sidenav-toggled">
        @include("principal.layouts.navbar")
        @include("principal.layouts.menuDesplegable")
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <div class="row d-flex justify-content-between px-3">
                        <h2 class="mt-4">Estadísticas</h2>
                        <div class="form-group">
                            <select class="form-control mt-4" id="filtro">
                                <option>Período</option>
                                <option>Tipo</option>
                                <option>Estado</option>
                                <option>Técnicos</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 mx-auto mt-3 mt-md-5">
                        <div class="chart-container w-100">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
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
        <script src="/js/assets/chart-area-demo.js"></script>
        <script src="/js/assets/chart-bar-demo.js"></script>
        <script src="/js/assets/chart-pie-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="/js/assets/datatables-demo.js"></script>
    </body>
</html>
