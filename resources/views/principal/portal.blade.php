@extends("layouts/estructuraPagina")

<!--MENU DESPLEGABLE-->

<!--MAIN-->
@section("content")
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
            @isset($solicitudes)
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
            @endisset
        </div>
    </div>
@endsection

@section('scripts')
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>-->

@endsection

