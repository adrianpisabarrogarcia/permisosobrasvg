@extends('login.layouts.layoutlogincarrousel')

@section('titulo','Ayuntamiento de Vitoria | Restablecer Contraseña')

@section('contenidologin')
    <div class="d-flex d-md-none pb-4 w-100 d-flex justify-content-center">
        <img src="/img/login/logo.png" class="img-fluid" width="55%" height="50%">
    </div>
    <div class="align-self-center login">
        <h2 class="fw-bold mb-5 mt-md-5">Modificar la Contraseña</h2>
        <form id="form-contra" class="mb-3" method="POST" action="{{ route('modificar.contra') }}">
            @csrf @method('PATCH')
            <div class="mb-3">
                <label for="passnew" class="form-label text-primary fw-bold">Contraseña nueva</label>
                <input type="password" class="form-control border-0 p-0" id="passnew" name="passnew">
            </div>
            <div class="mb-4">
                <label for="repnew" class="form-label text-primary fw-bold">Repite la contraseña</label>
                <input type="password" class="form-control border-0 p-0" id="repnew" name="repnew">
            </div>
            <div id="erroresTypescript">

            </div>
            <button type="submit" class="btn btn-primary w-100 modcont">Modificar la contraseña</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="/js/restablecercont.js"></script>
@endsection

