function tablaTecnico(){
    $('.tablatecnicos').removeClass('d-none')
    $('.tablatecnicos').addClass('d-block')
    $('.tablatodos').addClass('d-none')
    $('#btntablastodos').removeClass('d-none')
    $('#btntablastodos').addClass('d-block')
    $('#btntablastecnicos').addClass('d-none')
}
function tablaTodos(){
    $('.tablatecnicos').removeClass('d-block')
    $('.tablatecnicos').addClass('d-none')
    $('.tablatodos').removeClass('d-none')
    $('.tablatodos').addClass('d-block')
    $('#btntablastodos').removeClass('d-block')
    $('#btntablastodos').addClass('d-none')
    $('#btntablastecnicos').removeClass('d-none')
    $('#btntablastecnicos').addClass('d-block')
}

function prueba(event){
    if (!confirm("¿Estas segur@ que deseas eliminar a este usuario?"))
        event.preventDefault();
}

