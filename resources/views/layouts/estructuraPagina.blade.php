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

    @yield("archivosCSS")

</head>


<body class="sb-nav-fixed sb-sidenav-toggled">

@include("principal.layouts.navbar")
<!--MENU DESPLEGABLE-->
<div id="layoutSidenav" >
    <div id="layoutSidenav_nav">
        @extends("principal.layouts.menuDesplegable")
    </div>
    <!--CONTENIDO-->
    <div id="layoutSidenav_content" class="bg-light">
        @yield("content")
        @include("layouts.footer")
    </div>
</div>
<!--
<script src="/js/Librerias/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="/js/principal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>-->
<script src="/js/Librerias/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/js/script-template-bootstrap.js"></script>
<script src="/js/app.js"></script>
<script src="/js/principal.js"></script>


@yield("scripts")

</body>
</html>
