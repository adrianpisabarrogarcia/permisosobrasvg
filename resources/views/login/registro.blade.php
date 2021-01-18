@extends('login.layouts.layoutlogincarrousel')
@section('titulo','Ayuntamiento de Vitoria | Registro')

    @section('contenidologin')
        <div class="align-self-center login">
            <h2 class="fw-bold mb-5">Registro</h2>
            <form>
                <div class="mb-2 row">
                    <div class="col-6">
                        <label for="nombre" class="form-label text-primary fw-bold mb-0">Nombre</label>
                        <input type="text" class="form-control border-0 p-0" name="nombre"  id="nombre" required>
                    </div>
                    <div class="col-6">
                        <label for="ape" class="form-label text-primary fw-bold mb-0">Apellidos</label>
                        <input type="text" class="form-control border-0 p-0" name="apellidos" id="ape" required>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="dni" class="form-label text-primary fw-bold mb-0">Dni</label>
                    <input type="text" class="form-control border-0 p-0" name="dni" id="dni" required>
                </div>
                <div class="mb-2 row">
                    <div class="col-6">
                        <label for="fecha_nac" class="form-label text-primary fw-bold mb-0">Fecha de Nacimiento</label>
                        <input type="date" class="form-control border-0 p-0" name="fecha_nac" id="fecha_nac" required max="2020-1-23">
                    </div>
                    <div class="col-6">
                        <label for="lugar_nac" class="form-label text-primary fw-bold mb-0">Lugar de Nacimiento</label>
                        <input type="text" class="form-control border-0 p-0" name="lugar_nac" id="lugar_nac" required>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="direccion" class="form-label text-primary fw-bold mb-0">Dirección</label>
                    <input type="text" class="form-control border-0 p-0" name="calle" id="direccion" required>
                </div>
                <div class="mb-2 row">
                    <div class="col-6">
                        <label for="municipio" class="form-label text-primary fw-bold mb-0">Municipio</label>
                        <input type="text" class="form-control border-0 p-0" name="municipio" id="municipio" required>
                    </div>
                    <div class="col-6">
                        <label for="provincia" class="form-label text-primary fw-bold mb-0">Provincia</label>
                        <input type="text" class="form-control border-0 p-0" name="provincia" id="provincia" required>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="codigopostal" class="form-label text-primary fw-bold mb-0">Código Postal</label>
                    <input type="text" class="form-control border-0 p-0" name="codigopostal" id="codigopostal" required>
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label text-primary fw-bold mb-0">Email</label>
                    <input type="email" class="form-control border-0 p-0" name="email" id="email" required>
                </div>
                <div class="mb-2">
                    <label for="telefono" class="form-label text-primary fw-bold mb-0">Teléfono</label>
                    <input type="text" class="form-control border-0 p-0" name="telefono" id="telefono" required>
                </div>
                <div class="mb-2">
                    <label for="contra" class="form-label text-primary fw-bold mb-0">Contraseña</label>
                    <input type="text" class="form-control border-0 p-0" name="password" id="contra" required>
                </div>
                <div class="mb-5">
                    <label for="repcontra" class="form-label text-primary fw-bold mb-0">Confirma Contraseña</label>
                    <input type="text" class="form-control border-0 p-0" id="repcontra" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
            </form>
            <div class="text-center px-lg-5 pb-lg-2 p-2 w-100">
                <a href="{{ route('login.home') }}" class="text-primary fw-bold text-decoration-none">Volver al inicio</a>
            </div>
        </div>
    @endsection
