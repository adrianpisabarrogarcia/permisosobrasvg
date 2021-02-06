<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <section class="row g-0">
        <div class="col-lg-6 col-md-6 d-flex flex-column justify-content-center align-items-center vh-100 min-vh-100">
            @yield('contenidologin')
        </div>
        <div class="col-lg-6 col-md-6 d-none d-md-block carousel-body">
            <div id="carouselExampleControls" class="carousel slide d-flex justify-content-center align-items-center h-100" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/img/login/logoayunt.png" class="d-block mx-auto" alt="..." >
                        <h1 class="text-center text-white mt-5">Gestión de licencias de obras</h1>
                    </div>
                    <div class="carousel-item">
                        <img style="width: 75% !important" src="/img/login/logocarrousel.png" class="d-block mx-auto" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/bootstrap-5.0/js/popper.min.js"></script>
    <script src="/bootstrap-5.0/js/bootstrap.js"></script>
    @yield('scripts')
</body>
</html>

