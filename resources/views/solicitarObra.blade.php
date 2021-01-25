@extends("layouts.estructuraPagina")

@section("logo")
    <a href="portal"><img src="img/logo.png" class="w-8 "></a>
@endsection

@section("archivosCSS")
    <link href="/css/principal.css" rel="stylesheet" />
    <link href="/css/Principal/claro.css" rel="stylesheet" class="theme"/>
    <link rel="stylesheet" href="./froala-editor/css/froala_editor.pkgd.css">

@endsection

@section("content")
    <div>
        <div class="container flex-column align-items-center justify-content-center mt-5">
            <h1 class="font-weight-light my-5 text-center">Solicitar Obras</h1>
        </div>

        <div class=" mt-5 w-75 container-fluid ">
            <div class="card mb-4 ">
                <div class="card-header bg-pistacho border-pistacho border-1">
                    Solicitar obra o reforma

                </div>
                <div class="card-body">

                    <form action="" method="post" class="row">
                        @csrf
                        <div id="datos usuario  " class="ml-5 col-6 p-0 ">
                            <h4 class="mb-4">Datos</h4><br>
                            <div class="mt-5">
                                <label class="mr-5"><h5>Tipo de edificio</h5></label>
                                <select class="border-secondary rounded bg-light mb-5 table-bordered" id="selector" required>
                                    <option selected="true" disabled>Tipo de obra</option>
                                    @foreach($tipoObras as $obra)
                                        <option value="{{$obra->id}}">{{$obra->tipo}}</option>
                                    @endforeach
                                </select><br>

                                <label class="mr-5"><h5>Tipo de edificio</h5></label>
                                <select class="border-secondary rounded bg-light mb-5 table-bordered shadow-none" id="selector" required>
                                    <option  selected="true" value="edificacion" disabled>Tipo de edificación</option>
                                    {{var_dump($tipoEdificios)}}
                                    @foreach($tipoEdificios as $edificio)
                                    <option value="{{$edificio->id}}">{{$edificio->tipo}}</option>
                                    @endforeach

                                </select><br>


                            <label for="nombre" class="mr-5"><h5>Nombre</h5></label> <input type="text" name="nombre" id="nombre" value="{{$usuario[0]->nombre}}" disabled><br>
                            <label for="apellido" class="mr-5"><h5>Apellido</h5></label> <input type="text" name="apellido" id="apellido" value="{{$usuario[0]->apellido}}" disabled><br>
                            <label for="dni" class="mr-5 pr-3"><h5>DNI</h5></label> <input type="text" name="dni" id="dni" value="{{$usuario[0]->dni}}" class="ml-4" disabled><br>
                            </div>
                        </div>
                        <div id="datosDireccion" class="col-5 p-0">
                            <h4>Dirección</h4>
                            <input type="search" id="address" class="form-control ml-3 mt-4 w-75" placeholder="formato">
                            <br><br>
                            <label for="portal" class="mr-5"><h5>Portal</h5></label> <input type="text" name="portal" id="portal" value="" pattern="[0-9]{1,3}" prequired><br>
                            <label for="piso" class="mr-5 pr-3"><h5>Piso</h5></label> <input type="text" name="piso" id="piso" value="" placeholder="no requerido"><br>
                            <label for="escalera" class=""><h5 class="mr-4 pr-1 ">Escalera</h5></label> <input type="text" name="escalera" id="escalera" value="" placeholder="no requerido"><br>
                            <label for="plano" class="mr-3 pr-4"><h5>Planos</h5> </label>&nbsp;&nbsp;<input type="file" name="plano" id="plano" accept="image/png, .jpeg, .jpg, application/pdf" required>
                            <input type="hidden" name="lat" id="lat">
                            <input type="hidden" name="lng" id="lng">
                        </div>
                        <div class="col-11 mt-5 ml-5 p-0 d-flex flex-column align-items-center">
                            <h4 class="w-100">Descripción</h4>
                            <textarea class="overflow-hidden w-75" id="froala-editor" name="descripcion" required></textarea>

                        </div><br>
                        <button class="col-7 mx-auto table-bordered rounded border-secondary mt-5 bg-pistacho py-2">Enviar solicitud de obra</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section("scripts")
    <script type="text/javascript" src="../froala-editor/js/froala_editor.pkgd.js"></script>
    <script src="./js/solicitarObra.js"></script>
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
