<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Vitoria-Gasteiz - Permisos y Obras</title>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css"> <!-- css de las tablas -->
    <link href="/css/styles-template-bootstrap.css" rel="stylesheet"/>
    <link href="/css/principal.css" rel="stylesheet"/>
    @yield("archivosCSS")

</head>


<body class="sb-nav-fixed sb-sidenav-toggled" id="bod">


@include("principal.layouts.navbar")
<!--MENU DESPLEGABLE-->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        @include("principal.layouts.menuDesplegable")
    </div>
    <!--CONTENIDO-->
    <div id="layoutSidenav_content">
        @yield("content")
        @include("principal.layouts.footer")
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
<!--<script src="/js/Librerias/jquery-3.5.1.min.js" crossorigin="anonymous"></script>-->
<!-- ADRIÁN CORTA MANOS QUIEN TOQUE ESTA ESTRUCTURA :( -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="/js/principal.js"></script>
<script src="/js/script-template-bootstrap.js"></script>

@yield("scripts")

</body>
</html>
