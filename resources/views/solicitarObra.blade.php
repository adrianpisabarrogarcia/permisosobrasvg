@extends("layouts.estructuraPagina")

@section("logo")
    <a href="portal"><img src="img/logo.png" class="w-8 "></a>
@endsection

@section("archivosCSS")
    <link href="/css/principal.css" rel="stylesheet" />
    <link href="/css/Principal/claro.css" rel="stylesheet" class="theme"/>
@endsection

@section("content")
    <div>
        <div class="container flex-column align-items-center justify-content-center mt-5">
            <h1 class="font-weight-light my-5 text-center">Solicitar Obras</h1>
        </div>

        <div class=" mt-5 w-75 container-fluid">
            <div class="card mb-4 ">
                <div class="card-header">
                    <i class="fas fa-chart-bar mr-1"></i>
                    <select>
                        <option selected="true" disabled>Tipo de Obra</option>
                        <option >Reforma</option>
                        <option>Nueva construcción</option>
                    </select>
                </div>
                <div class="card-body">

                    <form action="" method="post" class="row">
                        @csrf
                        <div id="datos usuario" class="ml-5 col-6 p-0">
                            <h4>Datos</h4><br>
                            <label for="nombre" class="mr-5"><h5>Nombre</h5></label> <input type="text" name="nombre" id="nombre" value="" disabled><br>
                            <label for="apellido" class="mr-5"><h5>Apellido</h5></label> <input type="text" name="apellido" id="apellido" value="" disabled><br>
                            <label for="dni" class="mr-5 pr-3"><h5>DNI</h5></label> <input type="text" name="dni" id="dni" value="" class="ml-4" disabled><br>
                        </div>
                        <div id="datosDireccion" class="col-5 p-0">
                            <h4>Dirección</h4>
                            <input type="search" id="address" class="form-control ml-3 mt-4 w-75" placeholder="formato" >

                            <br><br>
                            <label for="portal" class="mr-5"><h5>Portal</h5></label> <input type="text" name="portal" id="portal" value=""><br>
                            <label for="piso" class="mr-5 pr-3"><h5>Piso</h5></label> <input type="text" name="piso" id="piso" value=""><br>
                            <label for="escalera" class=""><h5 class="mr-4 pr-2">Escalera</h5></label> <input type="text" name="escalera" id="escalera" value=""><br>

                        </div><br>
                        <button class="col-2 mx-auto rounded border-secondary mt-5">Enviar solicitud de obra</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
