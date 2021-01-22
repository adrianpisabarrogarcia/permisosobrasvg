///<reference path="../../node_modules/@types/jquery/index.d.ts" />
$(document).ready(function () {
    $("#selector").change(function () {
    });
});
function mostrarDatosFormulario() {
    var boton = $("#enviar");
    boton.on("click", function (e) {
        e.preventDefault();
        var select = $("#selector");
        if (select.val() == "tipo de obra") {
            //error
        }
        else {
            comprobarFormulario(select);
        }
    });
}
function comprobarFormulario(selector) {
    if (select.val() == "Reforma") {
        $ajax({
            url: "",
            type: "POST",
        });
        var calle = "";
        var provincia = "";
        var pais = "";
        var portal = $("#portal").val();
        var piso = $("#piso").val();
        var escalera = $("#escalera").val();
        var direccion = calle + "," + provincia + "," + pais;
    }
    else if (select.val() == "Nueva Construcción") {
    }
    select.on('change', function () {
    });
}
