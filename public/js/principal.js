$(document).ready(function () {
    guardardato();
    botonmodoscyclaro();
    var x = window.matchMedia("(max-width:992px");
    propiedadesCssMenu(x);
    x.addListener(propiedadesCssMenu);
});
//Funcion para ocultar el menu cada vez que coincide con la distribucion de la pantalla
function propiedadesCssMenu(ventana) {
    if (ventana.matches) {
        $("body").removeClass('sb-sidenav-toggled');
    }
    else
        $("body").addClass('sb-sidenav-toggled');
}
//Funcion para saber si la sesion esta en modo oscuro o modo claro para cada pagina y para cuando cierre sesion
function guardardato() {
    var localstorage = localStorage.getItem("modo");
    if (localstorage != null && localstorage === "oscuro") {
        $("body").addClass('dark');
        $("#switch").addClass("active");
        modooscyclaro("img/principal/logo-oscuro.png", "oscuro");
    }
    else {
        $("body").removeClass('dark');
        $("#switch").removeClass("active");
        modooscyclaro("img/principal/logo-claro.png", "claro");
    }
}
//Función que se utiliza para modificar el valor del boton y hacer el cambio de modo claro a modo oscuro y viceversa
function botonmodoscyclaro() {
    var boton = document.querySelector('#switch');
    boton.addEventListener('click', function () {
        document.body.classList.toggle('dark');
        boton.classList.toggle('active');
        var body = document.getElementById('bod');
        if (body.classList.contains('dark'))
            modooscyclaro("img/principal/logo-oscuro.png", "oscuro");
        else
            modooscyclaro("img/principal/logo-claro.png", "claro");
    });
}
//Modificar el logo dependiendo del color de la pagina
function modooscyclaro(url, modo) {
    $(".logo").attr('src', url);
    localStorage.setItem("modo", modo);
}
//Función para quitar el estado de los filtros y hacer que se muestren todas las solicitudes
$(".quitarestado").on('click', function (event) {
    event.preventDefault();
    $("#estado").val('quitar');
    document.getElementById('form-estado').submit();
});
$(".filtro").on('click', function (event) {
    $("#estado").val($(this).attr("id"));
    event.preventDefault();
    document.getElementById("form-estado").submit();
});
function marginmenu() {
    var submenu = document.getElementById('submenu');
    contador = 0;
    if (submenu.classList.contains('show')) {
        $(".filtrar").removeClass('filtrado');
    }
    else
        $(".filtrar").addClass('filtrado');
}
function marginsubmenu() {
    var submenu = document.getElementById('submenu');
    contador++;
    if (submenu.classList.contains('show') && contador % 2 != 0) {
        $(".filtrar").addClass('filtrado');
    }
    else
        $(".filtrar").removeClass('filtrado');
}
