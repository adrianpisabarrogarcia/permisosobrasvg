$(document).ready(function () {
    modificarDatos();
});
function modificarDatos() {
    var boton = $("#modificar");
    $("#guardar").css("display", "none");
    boton.on("click", function () {
        $(".mod").removeAttr("disabled");
        $("#modificar").css("display", "none");
        $("#guardar").css("display", "flex");
    });
}
