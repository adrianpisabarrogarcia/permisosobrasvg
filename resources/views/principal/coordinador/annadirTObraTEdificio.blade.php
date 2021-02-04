@extends("principal.layouts.estructuraPagina")

@section("content")
    <div class="d-flex mt-5 justify-content-evenly align-items-start flex-wrap">
        <div class="card col-10 col-lg-4 p-0 border-0">
            <div class="datos bg-primary text-white" style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                <h4 class="text-center font-weight-normal pt-2 pb-2 mb-0">
                    Añadir tipo de obra
                </h4>
                <div class="card-footer datosusu card shadow">
                    <h5 for="annadirobra" class="text-dark">Añadir obra:</h5>
                    <form action="{{route("annadirObra")}}" method="post">
                        @csrf
                        <input type="text" name="annadirobra" id="annadirobra" class="text-center card-footer border-0 rounded contacto p-1 col-11 col-md-12" required><br>
                        <button
                            class="btn btn-primary botoncoment text-white col-12 mt-1"
                            id="botonannadirobra">Añadir tipo de obra
                        </button>
                    </form>
                    @if($errorO != '')
                        <div class="alert mt-2 mb-2 alert-danger text-center" role="alert" id="errores">
                            {!! $errorO !!}
                        </div>
                        <h5 class="text-dark">Lista de obras:</h5>
                    @else
                        <h5 class="text-dark mt-4">Lista de obras:</h5>
                    @endif
                    <ul class="list-group border-0 text-center">
                        @foreach($obras as $obra)
                            @if($obra->tipo == "reforma" || $obra->tipo == "nueva obra")
                                <li class="list-group-item card-footer rounded col-11 col-md-12 text-dark">{{  ucfirst( $obra->tipo )  }}
                                </li>
                            @else
                                <li class="list-group-item card-footer rounded col-11 col-md-12 text-dark">{{  ucfirst( $obra->tipo )  }}
                                    <a href="/annadirobraedificio/borrarobra/{{$obra->tipo}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                                             class="bi bi-x"
                                             viewBox="0 0 16 16">
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="card col-10 col-lg-4 p-0 border-0 mt-5 mt-lg-0">
            <div class="datos bg-primary text-white" style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                <h4 class="text-center font-weight-normal pt-2 pb-2 mb-0">
                    Añadir tipo de edificio
                </h4>
                <div class="card-footer datosusu card shadow">
                    <h5 for="annadiredificio" class="text-dark">Añadir edificio:</h5>
                    <form action="{{route("annadirEdificio")}}" method="post">
                        @csrf
                        <input type="text" name="annadiredificio" id="annadiredificio" class="text-center card-footer border-0 rounded contacto p-1 col-11 col-md-12" required><br>
                        <button
                            class="btn btn-primary botoncoment text-white col-12 mt-1"
                            id="botonannadiredificio">Añadir tipo de edificio
                        </button>
                    </form>
                    @if($errorE != '')
                        <div class="alert mt-2 mb-2 alert-danger text-center" role="alert" id="errores">
                            {!! $errorE !!}
                        </div>
                        <h5 class="text-dark">Lista de edificios:</h5>
                    @else
                        <h5 class="text-dark mt-4">Lista de edificios:</h5>
                    @endif

                    <ul class="list-group border-0 text-center">
                        @foreach($edificios as $edificio)
                            @if ($edificio->tipo == "piso" || $edificio->tipo == "casa" || $edificio->tipo == "local" || $edificio->tipo == "garaje" || $edificio->tipo == "trastero" || $edificio->tipo == "edificio")
                                <li class="list-group-item card-footer rounded col-11 col-md-12 text-dark">{{ ucfirst($edificio->tipo) }}
                                </li>
                            @else
                                <li class="list-group-item card-footer rounded col-11 col-md-12 text-dark">{{ ucfirst($edificio->tipo) }}
                                    <a href="/annadirobraedificio/borraredificio/{{$edificio->tipo}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                                             class="bi bi-x"
                                             viewBox="0 0 16 16">
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                </div>
            </div>
        </div>
@endsection

