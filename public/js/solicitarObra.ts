///<reference path="../../node_modules/@types/jquery/index.d.ts" />
$(document).ready(function(){
    $( "#selector" ).change(function () {

    });
});
function mostrarDatosFormulario(){
    var boton= $("#enviar");
    boton.on("click",function (e){
        e.preventDefault();
        var select= $("#selector");
        if(select.val()=="tipo de obra"){
            //error
        }
        else {
            comprobarFormulario(select)
        }
    })
}
function comprobarFormulario(selector){
    if(select.val()=="Reforma"){
        $ajax({
            url: "",
            type: "POST",
        })
        let calle= "";
        let provincia="";
        let pais="";
        let portal=$("#portal").val();
        let piso= $("#piso").val();
        let escalera=$("#escalera").val();
        let direccion= calle+ ","+ provincia+","+ pais;
    }
    else if(select.val()=="Nueva Construcción"){
    }
    select.on('change', function(){
    })
}
