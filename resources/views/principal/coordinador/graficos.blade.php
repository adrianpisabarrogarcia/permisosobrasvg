
@extends("principal.layouts.estructuraPagina")

@section("archivosCSS")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.23.1/apexcharts.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.23.1/apexcharts.min.css">
@endsection
@section("content")
    <div class="card mt-5 col-11 col-lg-9 p-0 mx-auto border-0">
        <div class="datos bg-primary">
            <h4 class="text-center font-weight-normal pt-2 pb-2 mb-0 text-white">Gráficos</h4>
            <div class="card-footer p-0 datosusu card shadow">
                <div id="selects" class="d-flex justify-content-center justify-content-lg-start align-items-center align-content-lg-start flex-column flex-lg-row">
                    <select id="selector" class="border m-2 border-primary p-0 pt-1 pb-1 card-footer rounded col-lg-2 col-md-3 col-sm-4 col-11 ml-2" style="text-align-last: center">
                        <option value="estado">Estado</option>
                        <option value="temporada">Temporada</option>
                        <option value="tipo">Tipo</option>
                        <option value="trabajo">Carga de Trabajo</option>
                    </select>
                </div>
                <div id="graficos" class="text-dark"></div>
            </div>
        </div>
    </div>

@endsection
@section("scripts")
    <script src="/js/Librerias/jquery-3.5.1.min.js"></script>
    <script src="/js/graficos.js"></script>
@endsection
