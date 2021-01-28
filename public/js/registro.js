///<reference path="../../node_modules/@types/jquery/index.d.ts" />
function registro() {
    //recojo los datos
    var dni = $("#dni").val().toString();
    var password = $("#contra").val().toString();
    var passwordRep = $("#repcontra").val().toString();
    if (dni != "" && password != "" && passwordRep != "") {
        //cuando de errores
        var errores = false;
        var textoErrores = "Revise estos campos, son erróneos:<br>";
        try {
            //compruebo DNI
            var dniSinLetra = "";
            for (var i = 0; i < (dni.length - 1); i++) {
                dniSinLetra += dni.charAt(i);
            }
            var comprobacionDni = parseInt(dniSinLetra) % 23;
            var letrasDNI = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
            if (letrasDNI[comprobacionDni].toUpperCase() != dni.charAt(8).toUpperCase()) {
                textoErrores = textoErrores + " DNI <br>";
                errores = true;
            }
            //compruebo password
            if (password != passwordRep) {
                textoErrores = textoErrores + " Las contraseñas no coinciden <br>";
                errores = true;
            }
            //comprueblo si ha habido errores
            if (errores) {
                throw textoErrores;
            }
        }
        catch (err) {
            console.log(textoErrores);
            $("#erroresTypescript").html("<div class='alert alert-danger text-center' role='alert'>" + textoErrores + " </div>");
            event.preventDefault();
        }
    }
    else {
        event.preventDefault();
    }
}
