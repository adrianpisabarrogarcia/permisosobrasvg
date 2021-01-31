$("#form-contra").on('submit',function (event){
    let cont:string = $("#passnew").val().toString();
    let repcont:string = $("#repnew").val().toString();

    try {
        if (cont == "" || repcont == "")
            throw 'Campos Obligatorios';

        if (cont != repcont)
            throw 'Las contraseñas no coinciden';
    }
    catch (err){
        $("#erroresTypescript").html("<div class='alert alert-danger text-center' role='alert'>" + err + "</div>")
        event.preventDefault();
    }
})

