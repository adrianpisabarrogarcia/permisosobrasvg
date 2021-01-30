@extends('login.layouts.layoutlogincarrousel')
@section('titulo','Ayuntamiento de Vitoria | Registro')

    @section('contenidologin')
        <div class="align-self-center login">
            <h2 class="fw-bold mb-5">Registro</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-2 row">
                    <div class="col-6">
                        <label for="nombre" class="form-label text-primary fw-bold mb-0">Nombre</label>
                        <input type="text" class="form-control border-0 p-0" name="nombre"  id="nombre" pattern="^([A-Za-zÀ-ÿ]+[ ]?)+$" placeholder="Fran" required>
                    </div>
                    <div class="col-6">
                        <label for="ape" class="form-label text-primary fw-bold mb-0">Apellidos</label>
                        <input type="text" class="form-control border-0 p-0" name="apellidos" id="ape" pattern="^([A-Za-zÀ-ÿ]+[ ]?)+$" placeholder="Rodríguez Fernádez" required>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="dni" class="form-label text-primary fw-bold mb-0">Dni</label>
                    <input type="text" class="form-control border-0 p-0" name="dni" id="dni" pattern="^[0-9]{8,8}[A-Za-z]$" placeholder="12345678A" required>
                </div>
                <div class="mb-2 row">
                    <div class="col-6">
                        <label for="fecha_nac" class="form-label text-primary fw-bold mb-0">Fecha de Nacimiento</label>
                        <input type="date" class="form-control border-0 p-0" name="fecha_nac" id="fecha_nac" required>
                    </div>
                    <div class="col-6">
                        <label for="lugar_nac" class="form-label text-primary fw-bold mb-0">Lugar de Nacimiento</label>
                        <input type="text" class="form-control border-0 p-0" name="lugar_nac" id="lugar_nac" pattern="^([A-Za-zÀ-ÿ]+[ ]?[-]?[/]?)+$" placeholder="Vitoria-Gasteiz" required>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="direccion" class="form-label text-primary fw-bold mb-0">Dirección</label>
                    <input type="text" class="form-control border-0 p-0" name="calle" id="direccion" pattern="^[A-Za-zÀ-ÿ]+([A-Za-zÀ-ÿ]*[ ]?[-]?[0-9]*[º]?[ª]?[,]?)+$" placeholder="Brasil, Nº5" required>
                </div>
                <div class="mb-2 row">
                    <div class="col-6">
                        <label for="municipio" class="form-label text-primary fw-bold mb-0">Municipio</label>
                        <input type="text" class="form-control border-0 p-0" name="municipio" id="municipio" pattern="^([A-Za-zÀ-ÿ]+[ ]?[-]?[/]?)+$" placeholder="Vitoria-Gasteiz" required>
                    </div>
                    <div class="col-6">
                        <label for="provincia" class="form-label text-primary fw-bold mb-0">Provincia</label>
                        <input type="text" class="form-control border-0 p-0" name="provincia" id="provincia" pattern="^([A-Za-zÀ-ÿ]+[ ]?[-]?[/]?)+$" placeholder="Álava/Araba" required>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="codigopostal" class="form-label text-primary fw-bold mb-0">Código Postal</label>
                    <input type="text" class="form-control border-0 p-0" name="codigopostal" id="codigopostal" pattern="^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$" placeholder="01000" required>
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label text-primary fw-bold mb-0">Email</label>
                    <input type="email" class="form-control border-0 p-0" name="email" id="email" pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="ejemplo@vitoria.org" required>
                </div>
                <div class="mb-2">
                    <label for="telefono" class="form-label text-primary fw-bold mb-0">Teléfono</label>
                    <input type="text" class="form-control border-0 p-0" name="telefono" id="telefono" pattern="^[9|8|7|6]\d{8}$" placeholder="600000000" required>
                </div>
                <div class="mb-2">
                    <label for="contra" class="form-label text-primary fw-bold mb-0">Contraseña</label>
                    <input type="password" class="form-control border-0 p-0" name="password" id="contra" minlength="8" pattern="^[A-Za-z0-9]+$" placeholder="8 carácteres. Sólo puede tener minúsculas, mayúculas y números."required>
                </div>
                @isset($errores)
                    <div class="mb-3">
                        <label for="repcontra" class="form-label text-primary fw-bold mb-0">Confirma Contraseña</label>
                        <input type="password" class="form-control border-0 p-0" id="repcontra" required pattern="^[A-Za-z0-9]+$">
                    </div>
                    <div class="alert alert-danger text-center" role="alert">
                        {!! $errores !!}
                    </div>
                @else
                    <div class="mb-4">
                        <label for="repcontra" class="form-label text-primary fw-bold mb-0">Confirma Contraseña</label>
                        <input type="password" class="form-control border-0 p-0" id="repcontra" required>
                    </div>
                @endisset
                <div id="erroresTypescript">

                </div>
                <button type="submit" class="btn btn-primary w-100" onclick="registro()">Registrarse</button>
            </form>
            <div class="text-center px-lg-5 pb-lg-2 p-2 w-100">
                <a href="{{ route('login.home') }}" class="text-primary fw-bold text-decoration-none">Volver al inicio</a>
            </div>
        </div>



    @endsection

@section('scripts')
    <script src="js/registro.js"></script>
@endsection
