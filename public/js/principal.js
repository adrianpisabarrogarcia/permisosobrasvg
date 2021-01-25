$(document).ready(function () {
    botonmodoscyclaro();
    var x = window.matchMedia("(max-width:992px");
    propiedadesCssMenu(x);
    x.addListener(propiedadesCssMenu);
});
function propiedadesCssMenu(ventana) {
    if (ventana.matches) {
        $("body").removeClass('sb-sidenav-toggled');
    }
    else
        $("body").addClass('sb-sidenav-toggled');
}
function botonmodoscyclaro() {
    var boton = document.querySelector('#switch');
    boton.addEventListener('click', function () {
        document.body.classList.toggle('dark');
        boton.classList.toggle('active');
        var body = document.getElementById('bod');
        if (body.classList.contains('dark'))
            modooscyclaro("img/logo-oscuro.png", "oscuro");
        else
            modooscyclaro("img/logo-claro.png", "claro");
    });
}
function modooscyclaro(url, modo) {
    $(".logo").attr('src', url);
    document.cookie = "modo=" + modo;
}
