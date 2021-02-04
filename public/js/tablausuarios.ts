//Funcion para mostrar las tablas de los tecnicos
function tablaTecnico():void{
    mostrar('d-none','d-block','d-none','d-block','d-none');
}

//Funcion para mostrar la tabla de todos
function tablaTodos():void{
    mostrar('d-block','d-none','d-block','d-none','d-block');
    $('.tablatodos').removeClass('d-none')
    $('#btntablastecnicos').removeClass('d-none')
}

//Funcion para no repetir codigo
function mostrar(valor1,valor2,valor4,valor5,valor6):void{
    $('.tablatecnicos').removeClass(valor1);
    $('.tablatecnicos').addClass(valor2);
    $('.tablatodos').removeClass(valor2);
    $('.tablatodos').addClass(valor1);
    $('#btntablastodos').removeClass(valor4);
    $('#btntablastodos').addClass(valor5);
    $('#btntablastecnicos').addClass(valor6);
}

function prueba(event){
    //Funcion para saber si estas seguro de eliminar el usuario
    if (!confirm("¿Estas segur@ que deseas eliminar a este usuario?"))
        event.preventDefault();
}

