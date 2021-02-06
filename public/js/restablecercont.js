$("#form-contra").on('submit', function (event) {
    //Función para validar si las contraseñas coinciden o si no se ha introducido ningun valor
    var cont = $("#passnew").val().toString();
    var repcont = $("#repnew").val().toString();
    try {
        if (cont == "" || repcont == "")
            throw 'Campos Obligatorios';
        if (cont != repcont)
            throw 'Las contraseñas no coinciden';
    }
    catch (err) {
        $("#erroresTypescript").html("<div class='alert alert-danger text-center' role='alert'>" + err + "</div>");
        event.preventDefault();
    }
});
