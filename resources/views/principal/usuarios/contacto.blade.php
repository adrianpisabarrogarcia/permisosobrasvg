@extends("principal.layouts.estructuraPagina")

@section("content")
        <div class="mt-5 container">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="datos bg-primary w-100">
                        <h2 class="text-white text-center pt-2">Contacto</h2>
                    <div class="card-footer datosusu pb-3 ps-0 pe-0 container mb-4 card shadow d-flex align-items-center justify-content-center">
                        <span class="text-dark text-center">En caso de tener alguna duda sobre el funcionamiento de nuestra web o de la metodología de la empresa contacta con nosotros.</span>
                        <span class="text-dark text-center">Rellena el formulario que se muestra a continuación:</span>
                        <div class="formulario col-11 col-md-8 border border-primary mt-4 p-3 text-center">
                            <form action="{{ route('enviarContacto') }}" method="post">
                                @csrf
                                <label for="name"><h5 class="mb-0 text-dark">Nombre</h5></label>
                                <br />
                                <input type="text" id="name" name="name" required value="{{ $nombre }}" class="rounded card-footer contacto p-1 text-center col-11 col-md-8" readonly>
                                <br />
                                <label for="email"><h5 class="text-dark mt-3 mb-0">Correo electrónico</h5></label>
                                <br />
                                <input type="email" name="email" id="email" required value="{{ $email }}" class="rounded card-footer contacto p-1 text-center col-11 col-md-8" readonly>
                                <br />
                                <label for="mensaje"><h5 class="text-dark mt-3 mb-0">Mensaje</h5></label>
                                <br />
                                <div class="form-floating">
                                    <textarea class="form-control p-2 card-footer col-11 col-md-8 mx-auto rounded text-center" name="mensaje" id="mensaje" required maxlength="250"></textarea>
                                </div>
                                <br />
                                <button type="submit" class="btn btn-primary botoncoment text-white col-8 mt-1">
                                    Enviar Mensaje
                                </button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
