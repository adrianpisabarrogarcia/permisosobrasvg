$(document).ready(function () {
    $("#form-contra").css("display", "none");
    datos();
    modificarDatos();
    cambiarContra();
    borrarCuenta();
});
function cambiarContra() {
    $("#change").on("click", function () {
        onClicar("Cambiar contraseña", "block", "none");
    });
}
function modificarDatos() {
    $("#show").on("click", function () {
        onClicar("Datos de usuario", "none", "block");
        $(".mod").attr("disabled", "true");
        $("#modificar").removeClass("d-none");
        datos();
    });
}
function datos() {
    var boton = $("#modificar");
    $(".guardar").addClass("d-none");
    boton.on("click", function () {
        $(".mod").removeAttr("disabled");
        $("#modificar").addClass('d-none');
        $("#guardar").removeClass("d-none");
    });
}
function borrarCuenta() {
    $("#delete").on("click", function (e) {
        if (confirm("Estas seguro de borrar la cuenta")) {
            $.ajax({
                url: "/perfil/borrarUsuario",
                method: "get",
                success: function () {
                    alert("Su usuario se ha eliminado correctamente");
                    location.reload();
                }
            });
        }
        else {
            e.preventDefault();
        }
    });
}
function onClicar(titulo, contra, datos) {
    $("h4.cabecera").text(titulo);
    $("#form-contra").css("display", contra);
    $("#datos").css("display", datos);
}
