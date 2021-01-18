///<reference path="../../node_modules/@types/jquery/index.d.ts" />
$(document).ready(function () {
    calcularfecha();
});
//Función que se crea para saber la fecha de hace 18 años
function calcularfecha() {
    //Declaracion de variables
    var fechahoy = new Date();
    var fechamayoredad;
    //Comprobar si el mes es menor a 10 para introducir un 0 antes de dicho numero
    fechamayoredad = (fechahoy.getFullYear() - 18).toString() + "-" + ('0' + fechahoy.getMonth() + 1).slice(-2).toString() + "-" + ('0' + fechahoy.getDate()).slice(-2).toString();
    //Asignar el atributo max al input con id fecha_nac
    $("#fecha_nac").attr('max', String(fechamayoredad));
}
