@extends('login.layouts.layoutlogincarrousel')
@section('titulo','Ayuntamiento de Vitoria | Login')

@section('contenidologin')
    <div class="d-flex d-md-none pb-4 w-100 d-flex justify-content-center">
        <img src="/img/login/logo.png" class="img-fluid" width="55%" height="50%">
    </div>
    <div class="align-self-center login">
        <h2 class="fw-bold mb-5 mt-md-5">Login</h2>
        <form class="mb-3" method="POST" action="{{ route('login.auth') }}">
            @csrf
            <div class="mb-3">
                <label for="dni" class="form-label text-primary fw-bold">Dni</label>
                <input type="text" class="form-control border-0 p-0" id="dni" name="dni" required pattern="^[0-9]{8}[A-Z]$">
            </div>
            @isset($error)
                <div class="mb-3">
                    <label for="password" class="form-label text-primary fw-bold">Contraseña</label>
                    <input type="password" class="form-control border-0 p-0" id="password" name="password" required minlength="8">
                </div>
                <div class="alert alert-danger text-center " role="alert">
                      {{ $error }}
                </div>
    @else
        <div class="mb-5">
            <label for="password" class="form-label text-primary fw-bold">Contraseña</label>
            <input type="password" class="form-control border-0 p-0" id="password" name="password" required minlength="8">
        </div>
    @endisset

    <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
    </form>
    </div>
    <div class="text-center px-lg-5 pb-lg-2 p-2 w-100">
        <p class="d-inline-block mb-0">¿Todavía no tienes una cuenta?</p>
        <a href="{{ route('registro.index') }}" class="text-primary fw-bold text-decoration-none">Regístrate</a>
        <br />
        <a href="{{ route('restcontra.index') }}" class="text-primary fw-bold text-decoration-none">¿Has olvidado tu contraseña?</a>
    </div>
@endsection
