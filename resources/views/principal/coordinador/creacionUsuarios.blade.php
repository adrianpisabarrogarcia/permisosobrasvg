@extends("principal.layouts.estructuraPagina")

@section("content")
    <div class="align-self-center mt-5 p-3">
        <h2 class="">Registro de usuarios, técnicos y coordinadores</h2>
        <form id="formulregi" method="POST" action="{{ route('creacionUsuarioSave') }}">
            @csrf
            <div class="mb-2">
                <label class="form-label text-primary fw-bold mb-0">Selecciona el tipo de usuario que quieres
                    crear:</label><br>
                <div class="d-flex form-check form-check-inline" required>
                    <input type="radio" id="usuario" name="tipousuario" value="3" required> <label
                        class="form-check-label m-3" for="usuario">Usuario normal</label><br>
                    <input type="radio" id="tecnico" name="tipousuario" value="2" checked required> <label
                        class="form-check-label m-3" for="tecnico" required>Técnico</label><br>
                    <input type="radio" id="coordinador" name="tipousuario" value="1"> <label
                        class="form-check-label m-3" for="coordinador">Coordinador</label><br>
                </div>
            </div>
            <div class="d-flex mb-4 flex-wrap">
                <div class="col-12 col-lg-6">
                    <div class="mb-2 row">
                        <div class="col-6">
                            <label for="nombre" class="form-label text-primary fw-bold mb-0">Nombre</label>
                            <input type="text" class="form-control border-4 p-2" name="nombre" id="nombre"
                                   pattern="^([A-Za-zÀ-ÿ]+[ ]?)+$" placeholder="Fran" required>
                        </div>
                        <div class="col-6">
                            <label for="ape" class="form-label text-primary fw-bold mb-0">Apellidos</label>
                            <input type="text" class="form-control border-4 p-2" name="apellidos" id="ape"
                                   pattern="^([A-Za-zÀ-ÿ]+[ ]?)+$" placeholder="Rodríguez Fernádez" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-6">
                            <label for="fecha_nac" class="form-label text-primary fw-bold mb-0">Fecha de
                                Nacimiento</label>
                            <input type="date" class="form-control border-4 p-2" name="fecha_nac" id="fecha_nac"
                                   required>
                        </div>
                        <div class="col-6">
                            <label for="lugar_nac" class="form-label text-primary fw-bold mb-0">Lugar de
                                Nacimiento</label>
                            <input type="text" class="form-control border-4 p-2" name="lugar_nac" id="lugar_nac"
                                   pattern="^([A-Za-zÀ-ÿ]+[ ]?[-]?[/]?)+$" placeholder="Vitoria-Gasteiz" required>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="direccion" class="form-label text-primary fw-bold mb-0">Dirección</label>
                        <input type="text" class="form-control border-4 p-2" name="calle" id="direccion"
                               pattern="^[A-Za-zÀ-ÿ]+([A-Za-zÀ-ÿ]*[ ]?[-]?[0-9]*[º]?[ª]?[,]?)+$"
                               placeholder="Francia, Nº5" required>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-6">
                            <label for="municipio" class="form-label text-primary fw-bold mb-0">Municipio</label>
                            <input type="text" class="form-control border-4 p-2" name="municipio" id="municipio"
                                   pattern="^([A-Za-zÀ-ÿ]+[ ]?[-]?[/]?)+$" placeholder="Vitoria-Gasteiz" required>
                        </div>
                        <div class="col-6">
                            <label for="provincia" class="form-label text-primary fw-bold mb-0">Provincia</label>
                            <input type="text" class="form-control border-4 p-2" name="provincia" id="provincia"
                                   pattern="^([A-Za-zÀ-ÿ]+[ ]?[-]?[/]?)+$" placeholder="Álava/Araba" required>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="codigopostal" class="form-label text-primary fw-bold mb-0">Código Postal</label>
                        <input type="text" class="form-control border-4 p-2" name="codigopostal" id="codigopostal"
                               pattern="^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$" placeholder="01000" required>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-2">
                        <label for="dni" class="form-label text-primary fw-bold mb-0">Dni</label>
                        <input type="text" class="form-control border-4 p-2" name="dni" id="dni"
                               pattern="^[0-9]{8,8}[A-Za-z]$" placeholder="12345678A" required>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label text-primary fw-bold mb-0">Email</label>
                        <input type="email" class="form-control border-4 p-2" name="email" id="email"
                               pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"
                               placeholder="ejemplo@vitoria.org" required>
                    </div>
                    <div class="mb-2">
                        <label for="telefono" class="form-label text-primary fw-bold mb-0">Teléfono</label>
                        <input type="text" class="form-control border-4 p-2" name="telefono" id="telefono"
                               pattern="^[9|8|7|6]\d{8}$" placeholder="600000000" required>
                    </div>
                    <div class="mb-2">
                        <label for="contra" class="form-label text-primary fw-bold mb-0">Contraseña</label>
                        <input type="password" class="form-control border-4 p-2" name="password" id="contra"
                               minlength="8" pattern="^[A-Za-z0-9]+$"
                               placeholder="8 carácteres. Sólo puede tener minúsculas, mayúculas y números." required>
                    </div>
                    <div class="mb-5">
                        <label for="repcontra" class="form-label text-primary fw-bold mb-0">Confirma Contraseña</label>
                        <input type="password" class="form-control border-4 p-2" id="repcontra" minlength="8"
                               pattern="^[A-Za-z0-9]+$" placeholder="Repite la contraseña" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary bg-primary col-12 text-white">
                Registrarse
            </button>
            @isset($errores)
                <div class="alert alert-danger text-center mt-2" role="alert" id="errores">
                    {!! $errores !!}
                </div>
            @endisset
            @if($hecho != '')
                <div class="alert alert-success text-center mt-2" role="alert" id="hecho">
                    {!! $hecho !!}
                </div>
            @endisset
            <div id="erroresTypescript">
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="js/registro.js"></script>
@endsection
