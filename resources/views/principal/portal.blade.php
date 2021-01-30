@extends("principal.layouts.estructuraPagina")

<!--MENU DESPLEGABLE-->

<!--MAIN-->
@section("content")
    <div class="jumbotron jumbotron-fluid w-100 m-0 p-0 bg-transparent border-bottom border-secondary col-11 mx-auto d-flex align-items-center h-auto">
        <div class="container-fluid row justify-content-between py-5 w-100">
            <div class="h-auto py-5 col-12 col-lg-6 d-flex flex-column align-items-center">
                <img src="img/principal/logo-claro.png" class="logo w-50 h-75 mr-5">
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
                    <a href="{{ route('solicitarObra') }}" class="h-25 text-white enlaceprin col-4 col-md-4 col-lg-5 py-4 mr-5 ml-sm-0 border-5 rounded d-flex align-items-center text-dark justify-content-center text-decoration-none text-center">Solicitar Obra</a>
                    <a href="{{ route('contacto') }}" class="h-25 text-white enlaceprin col-4 col-md-4 col-lg-5 py-4 mr-5 border-2 rounded border-transparent d-flex align-items-center text-dark justify-content-center text-decoration-none text-center">Contacto</a>
                </div>
                @break
            @endswitch
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if(count($listasolicitudes) > 0)
                <div class="col-12 dropdown mt-3">
                    <div class="nav-item dropdown" id="menu">
                        <a class="nav-link col-3 mb-2 text-center col-sm-3 col-md-2 col-xl-1 filtrar border border-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="marginmenu()">
                            Filtrar
                        </a>
                        <div class="dropdown-menu dropright" aria-labelledby="navbarDropdown" id="submenu">
                            <a class="nav-link dropdown-item p-0 ps-4 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="marginsubmenu()">
                                Estados
                            </a>
                            <div class="dropdown-menu listmenu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item filtro" href="#" id="creado">Creado</a>
                                <a class="dropdown-item filtro" href="#" id="pendiente">Pendiente</a>
                                <a class="dropdown-item filtro" href="#" id="aceptado">Aceptado</a>
                                <a class="dropdown-item filtro" href="#" id="rechazado">Rechazado</a>
                                <form id="form-estado" action="{{ route('portal.ajax') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="estado" id="estado">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($listasolicitudes as $solicitudes)
                    <div class="col-lg-6 mt-2">
                        <a class="text-decoration-none" href="{{ route('solicitud.show',$solicitudes->id_obra) }}">
                            <div class="container mb-4 solicitudes text-white card shadow card-solicitud d-flex align-items-center justify-content-center">
                                <div class="w-100 mt-3">
                                    @foreach($tipo_obra as $tipo)
                                        @if ($tipo->id_tipobra == $solicitudes->id_tipo_obra)
                                            <span class="card-title text-dark h5 clearfix">{{ $tipo->tipo }}:</span>
                                            @break
                                        @endif
                                    @endforeach
                                    <div class="d-flex justify-content-end align-items-center">
                                        @foreach($listausuarios as $usuario)
                                            @if ($usuario->id_usu == $solicitudes->id_usuario)
                                                <span class="text-dark"><small>Creado por: <span class="text-primary font-weight-bold">{{ $usuario->nombre }}</span></small></span>
                                                @break
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="my-2 mt-3 card-footer border text-dark text-break">{!! substr($solicitudes->descrip,0,40) !!}</div>
                                    <div class="mt-3 d-flex justify-content-between">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <p><small class="text-dark fecha">{{ $solicitudes->fecha_creacion }}</small></p>
                                        </div>
                                        @switch($solicitudes->estado)
                                            @case("creado")
                                            <div class="alert alert-info py-2" role="alert">
                                                <small>{{ $solicitudes->estado }}</small>
                                            </div>
                                            @break
                                            @case("pendiente")
                                            <div class="alert alert-warning py-2" role="alert">
                                                <small>{{ $solicitudes->estado }}</small>
                                            </div>
                                            @break
                                            @case("aceptado")
                                            <div class="alert alert-success py-2" role="alert">
                                                <small>{{ $solicitudes->estado }}</small>
                                            </div>
                                            @break
                                            @default
                                            <div class="alert alert-danger py-2" role="alert">
                                                <small>{{ $solicitudes->estado }}</small>
                                            </div>
                                        @endswitch
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="mb-4 mt-3 d-flex justify-content-center paginacion">
                    <nav>
                        {{ $listasolicitudes->onEachSide(0)->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            @else
                @if(isset($estado))
                    <div class="col-12 dropdown mt-3">
                        <div class="nav-item dropdown" id="menu">
                            <a class="nav-link col-3 mb-2 text-center col-sm-3 col-md-2 col-xl-1 filtrar border border-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="marginmenu()">
                                Filtrar
                            </a>
                            <div class="dropdown-menu dropright" aria-labelledby="navbarDropdown" id="submenu">
                                <a class="nav-link dropdown-item p-0 ps-4 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="marginsubmenu()">
                                    Estados
                                </a>
                                <div class="dropdown-menu listmenu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item filtro" href="#" id="creado">Creado</a>
                                    <a class="dropdown-item filtro" href="#" id="pendiente">Pendiente</a>
                                    <a class="dropdown-item filtro" href="#" id="aceptado">Aceptado</a>
                                    <a class="dropdown-item filtro" href="#" id="rechazado">Rechazado</a>
                                    <form id="form-estado" action="{{ route('portal.ajax') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="estado" id="estado">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="mt-3 text-center">No hay solicitudes realizadas</span>
                @else
                    <span class="mt-3 text-center">No hay solicitudes realizadas</span>
                @endif
            @endif
        </div>
@endsection

