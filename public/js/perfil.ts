$(document).ready(function () {
    //Cuando se carga la pagina ejecutamos las diferentes funciones y ocultamos el formulario de la contraseña
    $("#form-contra").css("display","none");
    datos();
    modificarDatos();
    cambiarContra();
    borrarCuenta();
});

//Funcion que se utiliza cuando clicas en la opcion al cambiar la contraseña
function cambiarContra(){
    $("#change").on("click", function (){
        onClicar("Cambiar contraseña","block","none");
    })
}

//Funcion que se utiliza mostrar el formulario al modificar cuando se pulsa en el menu
function modificarDatos(){
    $("#show").on("click", function (){
        onClicar("Datos de usuario","none","block");
        $(".mod").attr("disabled","true");
        $("#modificar").removeClass("d-none");

        datos();
    });
}

//Funcion que se utiliza para desabilitar los inputs y mostrar el boton de guardar los cambios
function datos(){
    let boton=$("#modificar");
    $(".guardar").addClass("d-none");

    boton.on("click", function (){
        $(".mod").removeAttr("disabled");
        $("#modificar").addClass('d-none');
        $("#guardar").removeClass("d-none");
    });
}

//Funcion para borrar la cuenta del usuario
function borrarCuenta(){
    $("#delete").on("click", function (e){
        if(confirm("Estas seguro de borrar la cuenta")){
            $.ajax({
                url: "/perfil/borrarUsuario",
                method: "get",
                success: function () {
                    alert("Su usuario se ha eliminado correctamente")
                    location.reload();
                }
            })
        }
        else{
            e.preventDefault()
        }
    })
}

//Funcion para cambiar el contenido cada vez que se pulse en el menu
function onClicar(titulo, contra, datos){
    $("h4.cabecera").text(titulo);
    $("#form-contra").css("display",contra);
    $("#datos").css("display",datos);
}
