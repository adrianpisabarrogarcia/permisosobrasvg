@extends("principal.layouts.estructuraPagina");

@section("content")
    <div class="bg-primary table-bordered rounded w-50 m-auto my-0 mt-4 ">
        <div id="listado_perfil" class="w-100">
            <ul class=" d-flex justify-content-around flex-wrap py-3 m-0 align-items-center w-100 text-white list-unstyled">
                <li><a id="#show" class="text-white">Ver datos</a></li>
                <li><a id="#change" class="text-white">Cambiar contraseña</a></li>
                <li><a id="#delete" class="text-white">Borrar cuenta</a></li>
            </ul>
        </div>
    </div>
    <div class="card w-50 m-auto mt-5 ">
        <div class="card-header bg-primary py-3 text-white">
            <h4 class="text-center font-weight-normal">Datos de usuario</h4>
            <!--<h4 class="text-center font-weight-normal">Modificar usuario</h4>-->
            <!--<h4 class="text-center font-weight-normal">Cambiar contraseña</h4>-->
            <!--<h4 class="text-center font-weight-normal">Borrar usuario</h4>-->
        </div>
        <form>
            <div class=" card-body row my-3">
                <!-- datos-->
                <div class=" col-12 col-xl-6 d-flex flex-column align-items-center mt-3">
                    <div class="">
                        <label class="mr-5"><h5>Nombre</h5></label>
                        <input type="text"  class=" mod" value="{{$usuario[0]->nombre}}" disabled>
                    </div>
                    <div>
                        <label class="ml-1 mr-5"><h5>Apellido</h5></label>
                        <input type="text" class="mod" value="{{$usuario[0]->apellido}}" disabled>
                    </div>
                </div>
                <div class=" col-12 col-xl-6 d-flex flex-column align-items-center mt-3">
                    <div>
                        <label class=" mr-5 "><h5 class="">DNI</h5></label>
                        <input type="text" value="{{$usuario[0]->dni}}" disabled>
                    </div>
                    <div>
                        <label class="ml-3 mr-5"><h5 class="ml-4 ">Email</h5></label>
                        <input type="text" class=" mod mr-5" value="{{$usuario[0]->email}}" disabled>
                    </div>
                </div>
                <div class="col-5 m-auto mt-5 d-flex justify-content-around">
                    <a class="rounded table-bordered bg-primary text-white p-2" href="#" id="modificar">Modificar Cambios</a>
                    <button class=" rounded table-bordered bg-primary text-white p-2" id="guardar"> Guardar cambios</button>
                </div>
            </div>
        </form>
        <!--Modificar datos-->
    </div>
@endsection
@section("scripts")
    <script src="/js/perfil.js"></script>
@endsection
