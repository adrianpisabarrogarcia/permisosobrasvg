$(document).ready(function () {
    anadirfecha();
});
function anadirfecha() {
    var fecha = new Date();
    var fechaactu = fecha.getFullYear() + "-" + ('0' + fecha.getMonth() + 1).slice(-2) + "-" + ('0' + fecha.getDate()).slice(-2) + " " + ('0' + fecha.getHours()).slice(-2) + ":" + ('0' + fecha.getMinutes()).slice(-2) + ":" + ('0' + fecha.getSeconds()).slice(-2);
    $("#fecha").val(fechaactu.toString());
}
