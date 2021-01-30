$(document).ready(function () {
    guardardato();
    botonmodoscyclaro();
    var x = window.matchMedia("(max-width:992px");
    propiedadesCssMenu(x);
    x.addListener(propiedadesCssMenu);
});

function propiedadesCssMenu(ventana):void {
    if (ventana.matches) {
        $("body").removeClass('sb-sidenav-toggled');
    }
    else
        $("body").addClass('sb-sidenav-toggled');
}

function guardardato():void{
    let localstorage:string = localStorage.getItem("modo");
    if (localstorage != null && localstorage === "oscuro"){
        $("body").addClass('dark');
        $("#switch").addClass("active");
        modooscyclaro("img/principal/logo-oscuro.png","oscuro");
    }
    else
    {
        $("body").removeClass('dark');
        $("#switch").removeClass("active");
        modooscyclaro("img/principal/logo-claro.png","claro");
    }
}

function botonmodoscyclaro():void{
    var boton = document.querySelector('#switch');
    boton.addEventListener('click', function () {
        document.body.classList.toggle('dark');
        boton.classList.toggle('active');

        let body = document.getElementById('bod');
        if (body.classList.contains('dark'))
            modooscyclaro("img/principal/logo-oscuro.png","oscuro");
        else
            modooscyclaro("img/principal/logo-claro.png","claro");
    });
}

function modooscyclaro(url,modo):void{
    $(".logo").attr('src',url);
    localStorage.setItem("modo",modo);
}


$(".filtro").on('click',function (event){
    $("#estado").val($(this).attr("id"));
    event.preventDefault();
    document.getElementById("form-estado").submit();
});


function marginmenu(){
    let submenu = document.getElementById('submenu');
    contador=0;
    if (submenu.classList.contains('show'))
    {
        $(".filtrar").removeClass('filtrado');
    }
    else
        $(".filtrar").addClass('filtrado');
}
function marginsubmenu(){
    let submenu = document.getElementById('submenu');
    contador++;
    if (submenu.classList.contains('show') && contador%2!=0)
    {
        $(".filtrar").addClass('filtrado');
    }
    else
        $(".filtrar").removeClass('filtrado');
}
