@extends("layouts.estructuraPagina")

@section("archivosCSS")
    <link href="/css/principal.css" rel="stylesheet" />
    <link href="/css/Principal/claro.css" rel="stylesheet" class="theme"/>
@endsection

@section("logo")
    <a href="portal"><img src="img/logo.png" class="w-8 "></a>
@endsection

@section("content")

        <div class="container flex-column align-items-center justify-content-center">
            <h1 class="font-weight-light my-5 text-center">Página de contacto</h1>
            <div>
                <div class="card border-0 bg-transparent m-auto w-75">
                    <span class="w-100">En caso de tener alguna duda sobre el funcionamiento de nuestra web o de la metodología de la empresa contacta con nosotros</span>
                    <span class="w-100">Rellena el formulario que se mostrará a continuación:</span>

                    <div class="card-body"><canvas id="myBarChart" width="100%" height="20"></canvas></div>
                </div>
            </div>

            <div class=" h-25 w-75 m-auto pb-5 ">
                <form action="{{}}" method="post" class="d-flex flex-column align-items-center border-4">
                    @csrf
                    <label for="name"><h3 class="font-weight-normal text-dark">Nombre</h3></label>
                    <input type="text" id="name" name="name" required class="w-50 border-1"><br>
                    <label for="email" ><h3 class="font-weight-normal text-dark">Correo electronico</h3></label>
                    <input type="email" name="email" id="email" required class="w-50"><br>
                    <label for="mensaje" ><h3 class="font-weight-normal text-dark">Mensaje</h3></label>
                    <textarea  id="mensaje" required class="w-100 overflow-hidden"rows="7"></textarea><br>
                    <button class="rounded bg-pistacho table-bordered border-secondary p-2">Enviar mensaje</button>




                </form>
            </div>
        </div>

@endsection
