$(document).ready(function () {
    modificarDatos();

});
function modificarDatos(){
    let boton= $("#modificar");
    $("#guardar").css("display","none");

    boton.on("click", function (){
        $(".mod").removeAttr("disabled");
        $("#modificar").css("display","none");
        $("#guardar").css("display","flex");
    });
}

