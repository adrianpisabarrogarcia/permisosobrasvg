@extends("principal.layouts.estructuraPagina")

@section("content")
    <div class="bg-primary mt-5 table-bordered rounded col-12 col-lg-6 p-0 m-auto border-0 my-0">
        <div id="listado_perfil" class="card-footer datosusu border-0">
            <ul class="m-0 w-100 list-unstyled text-center">
                <li class="border border-primary p-0 p-lg-2 rounded"><a href="#" id="show" class="text-dark">Datos de usuario</a></li>
                <li class="border border-primary p-0 p-lg-2 mt-2 rounded"><a href="#" id="change" class="text-dark">Cambiar contraseña</a></li>
                <li class="border border-primary p-0 p-lg-2 mt-2 rounded"><a href="#" id="delete" class="text-dark">Borrar cuenta</a></li>
            </ul>
        </div>
    </div>
    <div class="mt-2 container">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">
                <div class="datos bg-primary w-100" style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                    <h4 class="text-white text-center cabecera font-weight-normal mb-0 pt-2 pb-2">Datos de usuario</h4>
                    <div class="card-footer datosusu pb-1 ps-0 pe-0 pt-0 container mb-4 card shadow">
                        <form id="form-contra" method="post" action="{{route("cambiarContra")}}">
                            @csrf
                            <div class="card-body row my-3">
                                <div class="col-12 col-xl-8 d-flex flex-column mx-auto row">
                                        <label class="text-center"><h5 class="mb-0 text-dark">Nueva contraseña:</h5></label>
                                        <input id="passnew" type="password" name="contra" class="text-center border-1 col-lg-12 card-footer contacto p-1 rounded" pattern="^[A-Za-z0-9]+$" minlength="8" placeholder="8 caracteres mínimo">
                                        <label class="text-center mt-2"><h5 class="mb-0 text-dark">Repite la contraseña:</h5></label>
                                        <input id="repnew" class="text-center border-1 col-lg-12 card-footer contacto p-1 rounded" type="password" pattern="^[A-Za-z0-9]+$">
                                </div>
                                <div id="erroresTypescript" class="mt-3 col-lg-8 mx-auto">

                                </div>
                                <div class="col-lg-8 mx-auto d-flex justify-content-around">
                                    <button class="rounded btn btn-primary botoncoment text-white col-12 col-lg-12 mt-1"> Cambiar contraseña</button>
                                </div>
                            </div>
                        </form>
                        <form id="datos" method="post" action="{{route("modificarPerfil")}}">
                            @csrf
                            <div class="card-body row">
                                <!-- datos-->
                                <div class="col-12 col-xl-6 d-flex flex-column align-items-center">
                                        <label><h5 class="mb-0 text-dark">Nombre:</h5></label>
                                        <input type="text" name="nombre" class="mod text-center border-1 col-lg-9 card-footer contacto p-1 rounded" value="{{$usuario[0]->nombre}}" disabled pattern="^([A-Za-zÀ-ÿ]+[ ]?)+$">
                                        <label class="mt-2"><h5 class="mb-0 text-dark rounded">Apellido:</h5></label>
                                        <input type="text" name="apellido" class="mod text-center border-1 col-lg-9 card-footer contacto p-1 rounded" value="{{$usuario[0]->apellido}}" disabled pattern="^([A-Za-zÀ-ÿ]+[ ]?)+$">
                                        <label class="mt-2"><h5 class="mb-0 text-dark rounded">Teléfono:</h5></label>
                                        <input type="text" name="telefono" class="mod text-center border-1 col-lg-9 card-footer contacto p-1 rounded" value="{{$usuario[0]->telefono}}" pattern="^[9|8|7|6]\d{8}$" disabled>
                                        <label class="mt-2"><h5 class="mb-0 text-dark">Email:</h5></label>
                                        <input type="text" name="email" class="mod col-lg-9 text-center border-1 card-footer contacto p-1 rounded" value="{{$usuario[0]->email}}" pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" disabled>
                                </div>
                                <div class="col-12 col-xl-6 d-flex flex-column align-items-center">
                                        <label><h5 class="mb-0 text-dark">Dirección:</h5></label>
                                        <input type="text" name="direccion" class="mod text-center border-1 col-lg-9 card-footer contacto p-1 rounded" value="{{$usuario[0]->calle}}" disabled pattern="^[A-Za-zÀ-ÿ]+([A-Za-zÀ-ÿ]*[ ]?[-]?[0-9]*[º]?[ª]?[,]?)+$">
                                        <label class="mt-2"><h5 class="mb-0 text-dark">CP:</h5></label>
                                        <input type="text" name="cp" class="mod col-lg-9 text-center border-1 card-footer contacto p-1 rounded" value="{{$usuario[0]->codigo_postal}}" pattern="^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$" disabled>
                                        <label class="mt-2"><h5 class="mb-0 text-dark">Provincia:</h5></label>
                                        <input type="text" name="provincia" class="mod col-lg-9 text-center border-1 card-footer contacto p-1 rounded" value="{{$usuario[0]->provincia}}" pattern="^([A-Za-zÀ-ÿ]+[ ]?[-]?[/]?)+$" disabled>
                                        <label class="mt-2"><h5 class="mb-0 text-dark">Municipio:</h5></label>
                                        <input type="text" name="municipio" class="mod col-lg-9 text-center border-1 card-footer contacto p-1 rounded" value="{{$usuario[0]->municipio}}" pattern="^([A-Za-zÀ-ÿ]+[ ]?[-]?[/]?)+$" disabled>
                                        <input type="hidden" name="dni" value="{{$usuario[0]->dni}}">
                                </div>
                                @if(isset($error))
                                    <div class="col-lg-9 alert alert-danger text-center mx-auto mb-0 mt-3" role="alert">
                                        El correo ya existe
                                    </div>
                                    <div class="col-12 mt-2 m-auto d-flex justify-content-around">
                                @else
                                    <div class="col-12 mt-4 m-auto d-flex justify-content-around">
                                @endif
                                    <a class="rounded btn btn-primary botoncoment text-white col-12 col-lg-10 mt-1 d-flex justify-content-center text-center" href="#" id="modificar">Modificar Cambios</a>
                                    <button class="guardar rounded btn btn-primary botoncoment text-white col-12 col-lg-10 mt-1" id="guardar"> Guardar cambios</button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!--Modificar datos-->
    </div>
@endsection
@section("scripts")
    <script src="/js/Librerias/jquery-3.5.1.min.js"></script>
    <script src="/js/perfil.js"></script>
    <script src="/js/restablecercont.js"></script>
@endsection
