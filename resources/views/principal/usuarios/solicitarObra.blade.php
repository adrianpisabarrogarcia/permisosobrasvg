@extends("principal.layouts.estructuraPagina")
@section("logo")
    <a href="portal"><img src="img/logo.png" class="w-8 "></a>
@endsection
@section("archivosCSS")
    <link href="/css/principal.css" rel="stylesheet" />
    <link href="/css/Principal/claro.css" rel="stylesheet" class="theme"/>
    <link rel="stylesheet" href="../../froala-editor/css/froala_editor.pkgd.css">
@endsection
@section("content")
    <div>
        <div class=" mt-5 w-75 container-fluid ">
            <div class="card mb-4 ">
                <div class="card-header bg-primary border-1">
                    <h1 class="text-center font-weight-normal text-white ">Solicitar obra</h1>
                </div>
                <div class="card-body ">
                    <form action="{{route("solicitarObras")}}" method="post" enctype="multipart/form-data" class="row d-flex justify-content-center ">
                        @csrf
                        <div id="datos usuario  " class="ml-xl-5 col-11 col-xl-6 p-0 d-flex d-block justify-content-center justify-content-xl-start flex-wrap">
                            <h4 class="mb-4 w-100">Datos</h4><br>
                            <div class="">
                                <div class="d-flex flex-column justify-content-center d-sm-block">
                                    <label for="obras" class="mr-sm-5"><h5 class="text-center">Tipo de obra</h5></label>
                                    <select  name="obra" class="border-secondary rounded bg-light mx-auto ml-xl-5 px-4 p-sm-0" id="obras" required>
                                        @foreach($tipoObras as $obra)
                                            <option  value="{{$obra->id}}">{{$obra->tipo}}</option>
                                        @endforeach
                                    </select><br>
                                </div>
                                <div class="d-flex flex-column justify-content-center d-sm-block">
                                    <label class="mr-sm-4 mr-xl-4"><h5 class="text-center">Tipo de edificio</h5></label>
                                    <select name="edificio" class="border-secondary rounded bg-light  mb-1 mb-sm-5 mx-auto px-5 px-sm-3" id="selector" required>
                                        @foreach($tipoEdificios as $edificio)
                                            <option  value="{{$edificio->id}}">{{$edificio->tipo}}</option>
                                        @endforeach
                                    </select><br>
                                </div>
                                <div class="d-flex flex-column justify-content-center d-sm-block">
                                    <label for="nombre" class="mr-3 mr-xl-5"><h5 class="text-center">Nombre:</h5></label>
                                    <input type="text" name="nombre" id="nombre" value="{{$usuario[0]->nombre}}" readonly><br>
                                </div>
                                <div class="d-flex flex-column justify-content-center d-sm-block">
                                    <label for="apellido" class="mr-3 mr-xl-5"><h5 class="text-center">Apellido:</h5>
                                    </label> <input type="text" name="apellido" id="apellido" value="{{$usuario[0]->apellido}}"readonly ><br>
                                </div>
                                <div class="d-flex flex-column justify-content-center d-sm-block">
                                    <label for="dni" class="mr-3 mr-xl-5 pr-3"><h5 class="text-center">DNI:</h5></label>
                                    <input type="text" name="dni" id="dni" value="{{$usuario[0]->dni}}" class="ml-sm-4" ><br>
                                </div>
                            </div>
                        </div>
                        <div id="datosDireccion" class="mt-4 mt-xl-0 col-11 col-xl-5 m-0 p-0 d-flex d-block justify-content-center justify-content-xl-start flex-wrap row">
                            <h4 class="w-100 text-start">Dirección</h4>
                            <div class="d-flex flex-column align-items-center">
                                <input type="search" id="address" class="form-control mb-3" placeholder="Where are we going?" name="dir"/>
                                <br><br>
                                <div class="d-flex flex-column justify-content-center d-sm-block">
                                    <label for="portal" class="mr-sm-5"><h5 class="text-center">Portal</h5></label>
                                    <input type="text" name="portal" id="portal" value="" pattern="^[0-9]{1,3}$" required><br>
                                </div>
                                <div class="d-flex flex-column justify-content-center d-sm-block">
                                    <label for="piso" class="mr-sm-5 pr-sm-3"><h5 class="text-center">Piso</h5></label>
                                    <input type="text" name="piso" id="piso" value="" placeholder="no requerido" pattern="^[0-9]{0,2}$"><br>
                                </div>
                                <div class="d-flex flex-column justify-content-center d-sm-block">
                                    <label for="escalera" class=""><h5 class="mr-sm-4 pr-sm-1 text-center">Escalera</h5></label>
                                    <input type="text" name="escalera" id="escalera" value="" placeholder="no requerido" pattern="^[A-z]{1,3}$"><br>
                                </div>
                                <div class="mt-4">
                                    <label for="plano"><a class="px-5 py-2 bg-primary text-white rounded">Añadir plano</a></label>
                                    <input type="file" class="d-none" name="plano" id="plano" accept="image/png, .jpeg, .jpg, application/pdf" required>
                                </div>
                                <input type="hidden" name="lat" id="lat">
                                <input type="hidden" name="lng" id="lng">
                                <input type="hidden" name="cp" id="codigopostal">
                                <input type="hidden" name="fecha" id="fecha">
                            </div>
                        </div>
                        <div class="col-11 mt-5 p-0 d-flex flex-column align-items-center">
                            <h4 class="w-100 text-start">Descripción</h4>
                            <textarea class="overflow-hidden w-50" id="froala-editor" name="descripcion" maxlength="250" required placeholder="Maximo 250 caracteres"></textarea>
                        </div><br>
                        <button class="col-7 mx-auto table-bordered rounded border-secondary mt-5 bg-pistacho py-2" id="enviar">Enviar solicitud de obra</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("scripts")
    <script type="text/javascript" src="../froala-editor/js/froala_editor.pkgd.js"></script>
    <script src="./js/solicitarObra.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
    <script src="/js/mapa.js"></script>
    <script>
        new FroalaEditor('textarea#froala-editor', {
            documentReady: true,
            heightMin: 300,
            heightMax: 300,
            "key": "INSERT-YOUR-FROALA-KEY-HERE",
            "events": {},
            "toolbarButtons": {
                "moreText": {
                    "buttons": [
                        "bold",
                        "italic",
                        "underline",
                        "strikeThrough",
                        "subscript",
                        "superscript",
                        "fontFamily",
                        "fontSize",
                        "textColor",
                        "backgroundColor",
                        "clearFormatting"
                    ],
                    "buttonsVisible": 3,
                    "align": "left"
                },
                "moreParagraph": {
                    "buttons": [
                        "formatOLSimple",
                        "formatOL",
                        "formatUL",
                        "outdent",
                        "indent"
                    ],
                    "buttonsVisible": 3,
                    "align": "left"
                },
                "undefined": {
                    "buttons": [],
                    "buttonsVisible": 0,
                    "align": "left"
                },
                "moreMisc": {
                    "buttons": [
                        "undo",
                        "redo",
                        "fullscreen",
                        "selectAll"
                    ],
                    "buttonsVisible": 2,
                    "align": "right"
                },
                "showMoreButtons": true
            },
            "language": "es"
        })
    </script>
@endsection
