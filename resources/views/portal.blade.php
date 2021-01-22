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
                <img src="img/logo-negro.png" class=" w-50  h-75 mr-5">
                <p class="lead w-50 m-0 ml-5">Obras y reformas Vitoria-Gasteiz.</p>
            </div>
            <div class="col-12 col-lg-6 h-auto row mt-3 ml-4 ml-lg-0 pl-5 float-end align-items-center justify-content-around">
                <a href="solicitarObra" class="h-25 bg-pistacho col-4 col-md-4 col-lg-5 py-4 mr-5 ml-sm-0 border-5 rounded  text-dark d-flex align-items-center justify-content-center btn-outline-dark text-decoration-none">Solicitar Obra</a>
                <a href="contacto" class="h-25 bg-pistacho col-4  col-md-4 col-lg-5 py-4 mr-5 border-2 rounded border-transparent text-dark d-flex align-items-center justify-content-center btn-outline-dark text-decoration-none">Contacto</a>
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

</body>
</html>
