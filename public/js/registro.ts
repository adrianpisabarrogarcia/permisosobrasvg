///<reference path="../../node_modules/@types/jquery/index.d.ts" />
$(document).ready(function (){
    calcularfecha();
});

//Función que se crea para saber la fecha de hace 18 años
function calcularfecha(){
    //Declaracion de variables
    let fechahoy:Date = new Date();
    let fechamayoredad:String;

    //Comprobar si el mes es menor a 10 para introducir un 0 antes de dicho numero
    fechamayoredad = (fechahoy.getFullYear() - 18).toString() + "-" + ('0' + fechahoy.getMonth() + 1).slice(-2).toString() + "-" + ('0' + fechahoy.getDate()).slice(-2).toString();

    //Asignar el atributo max al input con id fecha_nac
    $("#fecha_nac").attr('max',String(fechamayoredad));
}


function registro() {
    //recojo los datos
    let dni: string = $("#dni").val().toString()
    let password: string = $("#contra").val().toString()
    let passwordRep: string = $("#repcontra").val().toString()
    if (dni != "" && password != "" && passwordRep != "") {

        //cuando de errores
        let errores: boolean = false
        let textoErrores: string = "Revise estos campos, son erróneos:<br>"


        try {

            //compruebo DNI
            let dniSinLetra: string = ""
            for (let i = 0; i < (dni.length - 1); i++) {
                dniSinLetra += dni.charAt(i)
            }
            let comprobacionDni: number = parseInt(dniSinLetra) % 23
            let letrasDNI: string[] = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T']
            if (letrasDNI[comprobacionDni].toUpperCase() != dni.charAt(8).toUpperCase()) {
                textoErrores = textoErrores + " DNI <br>"
                errores = true
            }

            //compruebo password
            if (password != passwordRep) {
                textoErrores = textoErrores + " Las contraseñas no coinciden <br>"
                errores = true
            }

            //comprueblo si ha habido errores
            if (errores) {
                throw textoErrores
            }

        } catch (err) {
            $("#erroresTypescript").html("<div class='alert alert-danger text-center' role='alert'>"+ textoErrores + " </div>")
            event.preventDefault()
        }

    } else {
        event.preventDefault()
    }

}
