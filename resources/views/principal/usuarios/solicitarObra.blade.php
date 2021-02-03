@extends("principal.layouts.estructuraPagina")

@section('archivosCss')

@endsection

@section("content")
    <div class="mt-5 container">
        <div class="row mt-4">
            <div class="col-12">
                <div class="datos bg-primary w-100">
                    <h2 class="text-white text-center pt-2">Solicitar obra</h2>
                <div class="card-footer datosusu pb-3 ps-0 pe-0 container mb-4 card shadow">
                    <div class="formulario">
                        <form action="{{ route('solicitarObra.insert') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="pb-2 row">
                                <div class="col-md-5 col-11 mx-auto">
                                    <label for="obra" class="text-dark mt-1 font-weight-bold">Tipo de obra:</label>
                                    <select class="form-select pt-1 card-footer contacto pb-1 border-primary rounded" name="obra" required style="text-align-last: center">
                                        @foreach($tipoObras as $obra)
                                            <option value="{{$obra->id_tipobra}}">{{ ucfirst($obra->tipo)}}</option>
                                        @endforeach
                                    </select>
                                    <label for="edificio" class="text-dark mt-1 direc font-weight-bold">Tipo de edificio:</label>
                                    <select class="form-select pb-1 pt-1 card-footer contacto rounded" name="edificio" required style="text-align-last: center">
                                        @foreach($tipoEdificios as $edificio)
                                            <option value="{{$edificio->id}}" class="card-footer contacto text-center">{{ ucfirst($edificio->tipo)}}</option>
                                        @endforeach
                                    </select>
                                    <label for="nombre" class="text-dark mt-1 font-weight-bold">Nombre:</label>
                                    <br />
                                    <input type="text" name="nombre" id="nombre" class="rounded card-footer contacto p-1 text-center col-12" value="{{ $usuario[0]->nombre }}" readonly>
                                    <br/>
                                    <label for="apellido" class="text-dark mt-1 font-weight-bold">Apellidos:</label>
                                    <br />
                                    <input type="text" name="apellido" id="apellido" class="rounded card-footer contacto p-1 text-center col-12" value="{{ $usuario[0]->apellido }}" readonly>
                                    <br />
                                    <label for="dni" class="text-dark mt-1 font-weight-bold">DNI:</label>
                                    <br />
                                    <input type="text" name="dni" id="dni" class="rounded card-footer contacto p-1 text-center col-12" value="{{ $usuario[0]->dni }}" readonly>
                                    <br />
                                </div>
                                <div class="col-md-5 col-11 mx-auto">
                                    <label for="direccion" class="text-dark mt-1 font-weight-bold">Dirección</label>
                                    <input type="search" id="address" class="form-control card-footer contacto text-center text-dark" name="direccion">
                                    <br />
                                    <label for="portal" class="text-dark mt-1 font-weight-bold">Portal</label>
                                    <input type="text" name="portal" id="portal" class="rounded card-footer contacto p-1 text-center col-12" pattern="^[0-9]{1,3}$" required>
                                    <br />
                                    <label for="piso" class="text-dark mt-1 font-weight-bold">Piso</label>
                                    <input type="text" name="piso" id="piso" class="rounded card-footer contacto p-1 text-center col-12" pattern="^[0-9]{0,2}$">
                                    <br />
                                    <label for="escalera" class="text-dark mt-1 font-weight-bold">Escalera</label>
                                    <input type="text" name="escalera" id="escalera" class="rounded card-footer contacto p-1 text-center col-12" pattern="^[A-z]{1,3}$">
                                    <br />
                                    <label class="text-dark mt-1 font-weight-bold">Planos</label>
                                    <br />
                                    <label for="plano"><a class="px-5 py-2 border border-primary botonfile text-primary rounded" style="cursor: pointer !important;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-paperclip mb-1" viewBox="0 0 16 16">
                                                <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                                            </svg> Adjuntar planos</a></label>
                                    <input type="file" class="d-none" name="plano" id="plano" accept="image/png, .jpeg, .jpg, application/pdf" required>
                                </div>
                                <div class="col-12 mt-2 mt-lg-4 text-center">
                                    <label for="descripcion" class="font-weight-bold text-dark">Descripción</label>
                                    <br />
                                    <textarea class="form-control p-2 card-footer col-11 col-md-8 mx-auto text-center" name="mensaje" id="mensaje" required maxlength="250"></textarea>
                                    <input type="hidden" name="lat" id="lat">
                                    <input type="hidden" name="lng" id="lng">
                                    <input type="hidden" name="cp" id="codigopostal">
                                    <input type="hidden" name="fecha" id="fecha">
                                    <button type="submit" class="btn btn-primary botoncoment text-white col-11 col-md-8 mt-4" id="enviar">Enviar solicitud de obra</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
    <script src="/js/solicitarObra.js"></script>
@endsection
