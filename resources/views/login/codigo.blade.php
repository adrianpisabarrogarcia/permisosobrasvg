@extends('login.layouts.layoutlogincarrousel')

@section('titulo','Ayuntamiento de Vitoria | Restablecer Contraseña')

@section('contenidologin')
    <div class="d-flex d-md-none pb-4 w-100 d-flex justify-content-center">
        <img src="/img/login/logo.png" class="img-fluid" width="55%" height="50%">
    </div>
    <div class="align-self-center login">
        <h2 class="fw-bold mb-5 mt-md-5">Código de Verificación</h2>
        <form class="mb-3" method="POST" action="{{ route('codigo.auth') }}">
            @csrf
            @isset($error)
                <div class="mb-3">
                    <label for="codigo" class="form-label text-primary fw-bold">Introduce el codigo de verificación</label>
                    <input type="text" class="form-control border-0 p-0" id="codigo" name="codigo" required pattern="^[0-9]{5}">
                </div>
                <div class="alert alert-danger text-center " role="alert">
                    {{ $error }}
                </div>
            @else
                <div class="mb-4">
                    <label for="codigo" class="form-label text-primary fw-bold">Introduce el codigo de verificación</label>
                    <input type="text" class="form-control border-0 p-0" id="codigo" name="codigo" required pattern="^[0-9]{5}">
                </div>
            @endisset
            <button type="submit" class="btn btn-primary w-100">Verificar cuenta</button>
        </form>
    </div>
@endsection
