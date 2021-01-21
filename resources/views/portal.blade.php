@extends("layouts.estructuraPagina")

@section("archivosCSS")
    <link href="/css/principal.css" rel="stylesheet" />
    <link href="/css/Principal/claro.css" rel="stylesheet" class="theme"/>
@endsection

<!--MAIN-->
@section("content")

    <div class="jumbotron jumbotron-fluid w-100 m-0 p-0 bg-transparent border-bottom border-secondary d-flex align-items-center h-auto">
        <div class="container-fluid row justify-content-between py-5 w-100">
            <div class="h-auto py-5 col-12 col-lg-6 d-flex flex-column align-items-center">
                <img src="img/logo-negro.png" class=" w-75  h-75 mr-5">
                <p class="lead w-50 m-0 ml-5">Obras y reformas Vitoria-Gasteiz.</p>
            </div>
            <div class="col-12 col-lg-6 h-auto row mt-3 ml-4 ml-lg-0 pl-5 float-end align-items-end justify-content-around">
                <a href="solicitarObra" class="h-25 bg-pistacho col-5 col-lg-5 py-4 mr-5 ml-sm-0 border-5 rounded  text-dark d-flex align-items-center justify-content-center btn-outline-dark text-decoration-none">Solicitar Obra</a>
                <a href="contacto" class="h-25 bg-pistacho col-5 col-lg-5 py-4 mr-5 border-2 rounded border-transparent text-dark d-flex align-items-center justify-content-center btn-outline-dark text-decoration-none">Contacto</a>
                <p class="w-100" ><a href="" class="text-pistacho float-right">Más información</a></p>
            </div>
        </div>

    </div>
    <main>
        <div class="container-fluid bg-transparent h-auto">
            <div class="container-fluid row d-flex justify-content-center align-items-end py-5">
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
                    <h2 class="font-weight-light">Todavía no hay solicitudes de obras publicadas</h2>
                @endif
            </div>
        </div>
    </main>

@endsection
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
