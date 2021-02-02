$(document).ready(function () {
    anadirfecha();
});
function anadirfecha() {
    var fecha = new Date();
    var fechaactu = fecha.getFullYear() + "-" + ('0' + (fecha.getMonth() + 1)).slice(-2) + "-" + ('0' + fecha.getDate()).slice(-2) + " " + ('0' + fecha.getHours()).slice(-2) + ":" + ('0' + fecha.getMinutes()).slice(-2) + ":" + ('0' + fecha.getSeconds()).slice(-2);
    $("#fecha").val(fechaactu.toString());
    $("#fechafin").val(fechaactu.toString());
    var fechasolicitud = fecha.getFullYear() + "-" + ('0' + (fecha.getMonth() + 1)).slice(-2) + "-" + ('0' + (fecha.getDate() + 10)).slice(-2) + " " + ('0' + fecha.getHours()).slice(-2) + ":" + ('0' + fecha.getMinutes()).slice(-2) + ":" + ('0' + fecha.getSeconds()).slice(-2);
    $("#fechahoy").val(fechasolicitud.toString());
}
$(".finalizarobra").on("click", function (event) {
    if (!confirm("¿Estas segur@ de que deseas finalizar la obra?"))
        event.preventDefault();
});
