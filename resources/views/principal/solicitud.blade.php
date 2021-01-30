@extends('principal.layouts.estructuraPagina')

@section('archivosCSS')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css">
@endsection

@section('content')
    <div class="container border-bottom border-secondary">
        <div class="row">
            @foreach($listasolicitudes as $solicitudes)
                @foreach($listausuarios as $usuarios)
                    <div class="col-lg-4 mt-4 mt-lg-4">
                        <div class="datos bg-primary w-100"
                             style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                            <h5 class="text-white text-center pt-2">Datos del Solicitante</h5>
                            <div
                                class="card-footer datosusu ps-0 pe-0 container mb-4 card shadow d-flex align-items-center justify-content-center">
                                <span
                                    class="text-dark text-center"><small><b>Nombre: </b>{{ $usuarios->nombre }}</small></span>
                                <span
                                    class="text-dark text-center"><small><b>Apellido: </b>{{ $usuarios->apellido }}</small></span>
                                <span
                                    class="text-dark text-center"><small><b>Dni: </b>{{ $usuarios->dni}}</small></span>
                                <span class="text-dark text-center"><small><b>Email: </b>{{ $usuarios->email }}</small></span>
                                <span
                                    class="text-dark text-center"><small><b>Teléfono: </b>{{ $usuarios->telefono }}</small></span>
                                <span
                                    class="text-dark text-center"><small><b>Dirección: </b>{{ $usuarios->calle }}</small></span>
                                <span class="text-dark text-center"><small><b>Codigo Postal: </b>{{ $usuarios->codigo_postal }}</small></span>
                                <span class="text-dark text-center"><small><b>Municipio: </b>{{ $usuarios->municipio }}</small></span>
                                <span class="text-dark text-center"><small><b>Provincia: </b>{{ $usuarios->provincia }}</small></span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-4 mt-lg-4">
                    <div class="datos bg-primary" style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                        <h5 class="text-white text-center pt-2">Datos de la Obra</h5>
                        <div class="card-footer datosusu ps-0 pe-0 container mb-4 card shadow">
                            <div class="d-flex justify-content-center flex-column align-items-center">
                                @foreach($tipo_edificio as $tipoedi)
                                    <span class="text-dark"><small><b>Tipo de edificio: </b>{{ $tipoedi->tipo }}</small></span>
                                @endforeach
                                @foreach($tipo_obra as $tipobra)
                                    <span
                                        class="text-dark"><small><b>Tipo de obra: </b>{{ $tipobra->tipo }}</small></span>
                                @endforeach
                                <span class="text-dark text-center"><small><b>Fecha de Creación: </b>{{ $solicitudes->fecha_creacion }}</small></span>
                                @if($solicitudes->fecha_ini !=null)
                                    <span class="text-dark text-center"><small><b>Fecha de Incio: </b>{{ $solicitudes->fecha_ini }}</small></span>
                                @endif
                                @if($solicitudes->fecha_fin != null)
                                    <span class="text-dark text-center"><small><b>Fecha de Fin: </b>{{ $solicitudes->fecha_fin }}</small></span>
                                @endif
                                <span class="text-dark text-center ps-1 pe-1"><small><b>Dirección: </b>{{ $solicitudes->calle }}</small></span>
                                <span class="text-dark text-center"><small><b>Codigo Postal: </b>{{ $solicitudes->codigo_postal }}</small></span>
                                <span
                                    class="text-dark text-center"><small><b>Portal: </b>{{ $solicitudes->numero }}</small></span>
                                <span class="text-dark text-center">
                                             @if($solicitudes->piso != null)
                                        <small><b>Piso: </b>{{ $solicitudes->piso }} </small>
                                    @endif
                                    @if($solicitudes->mano != null)
                                        <small><b> Mano: </b>{{ $solicitudes->mano }}</small>
                                    @endif
                                        </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-lg-4">
                    <div class="datos bg-primary w-100"
                         style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                        <h5 class="text-white text-center pt-2">Descripción</h5>
                        <div class="card-footer datosusu container mb-4 card shadow">
                            <span class="text-center text-dark"><small>{!! $solicitudes->descrip !!}</small></span>
                            <div class="d-flex justify-content-center align-items-end mt-4">
                                <button class="alert alert-primary py-2 me-3 mb-2">
                                    <small><a class="text-dark" href="{{ $solicitudes->plano }}" target="_blank"
                                              download><i class="fa fa-download"></i> Planos</a></small>
                                </button>
                                @switch($solicitudes->estado)
                                    @case("creado")
                                    <div class="alert alert-info py-2 mb-2" role="alert">
                                        <small>{{ $solicitudes->estado }}</small>
                                    </div>
                                    @break
                                    @case("pendiente")
                                    <div class="alert alert-warning py-2 mb-2" role="alert">
                                        <small>{{ $solicitudes->estado }}</small>
                                    </div>
                                    @break
                                    @case("aceptado")
                                    <div class="alert alert-success py-2 mb-2" role="alert">
                                        <small>{{ $solicitudes->estado }}</small>
                                    </div>
                                    @break
                                    @default
                                    <div class="alert alert-danger py-2 mb-2" role="alert">
                                        <small>{{ $solicitudes->estado }}</small>
                                    </div>
                                @endswitch
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-lg-2">
                    <div class="datos bg-primary" style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                        <h5 class="text-white text-center pt-2">Mapa</h5>
                        <div class="card-footer datosusu container mb-4 card shadow p-0">
                            <input type="hidden" id="lat" value="{{ $solicitudes->lat }}">
                            <input type="hidden" id="lng" value="{{ $solicitudes->lng }}">
                            <input type="hidden" id="direccion" value="{{ $solicitudes->calle }}">
                            <div id="map">

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @if (count($listacomentarios) > 0)
        <div class="container">
            <div class="row">
                <h5 class="text-dark text-start pt-3 comentario">Comentarios</h5>
                @foreach($listacomentarios as $comentarios)
                    <div class="col-lg-6 mt-2 mt-lg-2">
                        <div class="datos bg-primary"
                             style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                            <div class="card-footer text-dark datosusu container mb-2 card shadow">
                                <span>{{ $comentarios->descripcion }}</span>
                                <div class="d-flex justify-content-end align-items-center mt-3">
                                    @if($comentarios->archivos != null)
                                        <button class="alert alert-primary mb-0 py-2 me-3">
                                            <small><a class="text-dark" href="{{ $comentarios->archivos }}"
                                                      target="_blank" download><i
                                                        class="fa fa-download"></i>Archivos</a></small>
                                        </button>
                                    @endif
                                    <span>{{ $comentarios->fecha_comentario }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mt-4 d-flex justify-content-center paginacion">
                    <nav>
                        {{ $listacomentarios->onEachSide(0)->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
    @endif
    @if(Session::get('rol') == "2")
        @if(count($listacomentarios) ==  0)
            <div class="container mb-3 mt-3">
                @else
                    <div class="container mb-3">
                        @endif
                        <div class="row">
                            <h5 class="text-dark text-start comentario">Añadir Comentario</h5>
                            <div class="mt-2 col-12" style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                                <div class="datos bg-primary"
                                     style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                                    <div class="card-footer datosusu container card shadow">
                                        <form method="POST" action="{{ route('solicitud.insert') }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-floating">
                                                <textarea class="form-control p-2 card-footer anacomenta"
                                                          name="comentario" id="comentario" required
                                                          maxlength="250"></textarea>
                                            </div>
                                            <input type="file" name="archivos" class="mt-2 text-dark"
                                                   accept=".jpg,.jpeg,.png,.zip,.7z,.rar">
                                            <input type="hidden" name="fecha" id="fecha">
                                            <input type="hidden" name="idsoli"
                                                   value="{{ $listasolicitudes[0]->id_obra }}">
                                            <button type="submit"
                                                    class="btn btn-primary botoncoment text-white w-100 mt-2">Añadir
                                                Comentario
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                @endif
            </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/mapasolicitud.js"></script>
    <script src="/js/solicitudes.js"></script>
    <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
@endsection
