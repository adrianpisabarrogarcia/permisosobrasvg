@extends("layouts.estructuraPagina")

@section("archivosCSS")
    <link href="/css/principal.css" rel="stylesheet" />
    <link href="/css/Principal/claro.css" rel="stylesheet" class="theme"/>
    <link rel="stylesheet" href="./froala-editor/css/froala_editor.pkgd.css">
@endsection

@section("logo")
    <a href="portal"><img src="img/logo.png" class="w-8 "></a>
@endsection

@section("content")

        <div class="container flex-column align-items-center justify-content-center">
            <h1 class="font-weight-light my-5 text-center">Página de contacto</h1>
            <div>
                <div class="card border-0 bg-transparent m-auto w-75">
                    <span class="w-100">En caso de tener alguna duda sobre el funcionamiento de nuestra web o de la metodología de la empresa contacta con nosotros.<br><br></span>
                    <span class="w-100">Rellena el formulario que se muestra a continuación:</span><br>
                    <!--<div class="card-body"><canvas id="myBarChart" width="100%" height="20"></canvas></div>-->
                </div>
            </div>
            <div class=" h-25 w-75 m-auto pb-5 ">
                <form action="{{}}" method="post" class="d-flex flex-column border-4">
                    @csrf
                    <label for="name"><h3 class="font-weight-normal text-dark">Nombre</h3></label>
                    <input type="text" id="name" name="name" required class="w-100 border-1" disabled><br>
                    <label for="email" ><h3 class="font-weight-normal text-dark">Correo electrónico</h3></label>
                    <input type="email" name="email" id="email" required class="w-100" disabled><br>
                    <label for="mensaje" ><h3 class="font-weight-normal text-dark">Mensaje</h3></label>
                    <textarea id="froala-editor" name="mensaje"></textarea><br>
                    <button class="rounded bg-pistacho table-bordered border-secondary p-2">Enviar mensaje</button>
                </form>
            </div>
        </div>

@endsection

<!-- plugin de editor de js -->
@section("scripts")
    <script type="text/javascript" src="../froala-editor/js/froala_editor.pkgd.js"></script>

    <script>
        new FroalaEditor('textarea#froala-editor', {
            documentReady: true,
            iframe: true,
            iframeStyle: 'body{width:auto;font-family:"Helvetica Neue", Arial, sans-serif;background-color: white;}pre{width:auto;font-family:"Helvetica Neue", Arial, sans-serif;}',
            heightMin: 300,
            heightMax: 300,
            width: '1',
            placeholderText: 'Inserta aquí tu mensaje:',
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
