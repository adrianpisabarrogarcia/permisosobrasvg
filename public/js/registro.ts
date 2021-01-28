///<reference path="../../node_modules/@types/jquery/index.d.ts" />

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
            console.log(textoErrores)
            $("#erroresTypescript").html("<div class='alert alert-danger text-center' role='alert'>"+ textoErrores + " </div>")
            event.preventDefault()

        }

    } else {
        event.preventDefault()
    }

}
