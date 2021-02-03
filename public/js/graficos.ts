$(document).ready(function (){
    let selector= $("#selector").val();
    llamadaAjax(selector);
    $("#selector").on("change",function (){
        llamadaAjax($("#selector").val());
    })
})

function  llamadaAjax(filtro){
    $.ajax({
        url: "/graficos/"+filtro,
        method: "get",
        success: function (response){
            var tabla;
            switch ($("#selector").val()){
                case "estado":
                    tabla= estadoGrafica(response);
                    $("#graficos").append("<div id='estado'></div>")

                    var chart = new ApexCharts(document.querySelector("#estado"), tabla);
                    chart.render();
                    $("#temporada").remove();
                    $("#tipo").remove();
                    $("#carga").remove();

                    break;
                case "temporada":
                    tabla= temporadaGrafica(response);
                    $("#estado").remove();
                    $("#tipo").remove();
                    $("#carga").remove();

                    $("#graficos").append("<div id='temporada'></div>")
                    var chart = new ApexCharts(document.querySelector("#temporada"), tabla);
                    chart.render();


                    break;
                case "tipo":
                    tabla= tipoGrafica(response);
                    $("#estado").remove();
                    $("#temporada").remove();
                    $("#carga").remove();
                    $("#graficos").append("<div id='tipo'></div>")
                    var chart = new ApexCharts(document.querySelector("#tipo"), tabla);
                    chart.render();
                    break;
                default:
                    tabla= cargaGrafica(response);
                    $("#estado").remove();
                    $("#tipo").remove();
                    $("#temporada").remove();
                    $("#graficos").append("<div id='carga'></div>")
                    var chart = new ApexCharts(document.querySelector("#carga"), tabla);
                    chart.render();

            }
        }
    });
}


function estadoGrafica(datos){
    var graficaEstado = {
        series: [datos["creada"], datos["pendiente"], datos["aceptada"], datos["rechazada"],datos["finalizada"]],
        colors:["rgb(0,143,251)","rgb(254,176,25)","#009C8C","rgb(255,69,96)","rgb(119, 93, 208)"],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['Creado', 'Pendiente', 'Aceptado', 'Rechazado',"Finalizado"],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 350
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    return graficaEstado;
}
function temporadaGrafica(datos){
    var graficaTemporada = {
        colors: ["#009C8C"],
        series: [{
            name: 'Cantidad',
            data: [datos[0]["cantidad"], datos[1]["cantidad"], datos[2]["cantidad"], datos[3]["cantidad"], datos[4]["cantidad"], datos[5]["cantidad"], datos[6]["cantidad"], datos[7]["cantidad"], datos[8]["cantidad"], datos[9]["cantidad"], datos[10]["cantidad"], datos[11]["cantidad"]]
        }],
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    position: 'center', // top, center, bottom
                },
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val;
            },

            style: {
                fontSize: '12px',
                colors: ["#304758"]
            }
        },

        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            position: 'top',
            axisBorder: {
                show: true
            },
            axisTicks: {
                show: true
            },
            crosshairs: {
                fill: {
                    type: 'gradient',
                    gradient: {
                        colorFrom: '#D8E3F0',
                        colorTo: '#BED1E6',
                        stops: [0, 100],
                        opacityFrom: 0.4,
                        opacityTo: 0.5,
                    }
                }
            },
            tooltip: {
                enabled: true,
            }
        },
        yaxis: {
            axisBorder: {
                show: true
            },
            axisTicks: {
                show: true,
            },
            labels: {
                show: true,
                formatter: function (val) {
                    return val;
                }
            }

        },
        title: {
            text: 'Solicitudes de obras anuales',
            floating: true,
            offsetY: 330,
            align: 'center',
            style: {
                color: '#444'
            }
        }
    };
    return graficaTemporada;

}
function porcentajeDeObras(datos){
    let string= "[ ";
    for (let x=0; x<datos.length; x++){
        string= string + datos[x]["porcentaje"]+",";
    }
    alert(string);
    let porcentajes= string.substr(0,string.length-1)+"]";
    alert(porcentajes);
    return porcentajes ;
}

function tipoDeObras(datos){
    let string= "[ ";
    for (let x=0; x<datos.length; x++){
        string= string + datos[x]["tipo"]+",";

    }
    alert(string);
    let tipos= string.substr(0,string.length-1)+"]";
    alert(tipos);
    return tipos ;
}

function tipoGrafica(datos){

    var graficaTipo = {
        series:[datos[0]["porcentaje"],datos[1]["porcentaje"],datos[2]["porcentaje"]],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: [datos[0]["tipo"],datos[1]["tipo"],datos[2]["tipo"]],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 350
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    return graficaTipo;
}
function cargaGrafica(datos){

    var graficaCarga = {
        series: [datos[0]["porcentaje"],datos[1]["porcentaje"]],
        chart: {
            width: 380,
            type: 'donut',
        },
        labels: [datos[0]["tipo"], datos[1]["tipo"]],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 350
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    return graficaCarga;
}
