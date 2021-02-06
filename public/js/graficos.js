$(document).ready(function () {
    //Cuando carga la pagina ejecuta la llamada ajax para generar el grafico
    var selector = $("#selector").val();
    llamadaAjax(selector);
    //Cuando cambie la opcion select realizar la llamada ajax para generar el grafico dependiendo del valor
    $("#selector").on("change", function () {
        llamadaAjax($("#selector").val());
    });
});
function llamadaAjax(filtro) {
    $.ajax({
        url: "/graficos/" + filtro,
        method: "get",
        success: function (response) {
            $("#tecnicos").remove();
            //Gestionar los graficos dependiendo del valor
            var tabla;
            switch ($("#selector").val()) {
                case "estado":
                    tabla = estadoGrafica(response);
                    $("#graficos").append("<div id='estado'></div>");
                    var chart = new ApexCharts(document.querySelector("#estado"), tabla);
                    chart.render();
                    $("#temporada").remove();
                    $("#tipo").remove();
                    $("#individual").remove();
                    $("#general").remove();
                    break;
                case "temporada":
                    tabla = temporadaGrafica(response);
                    $("#estado").remove();
                    $("#tipo").remove();
                    $("#individual").remove();
                    $("#general").remove();
                    $("#graficos").append("<div id='temporada'></div>");
                    var chart = new ApexCharts(document.querySelector("#temporada"), tabla);
                    chart.render();
                    break;
                case "tipo":
                    tabla = tipoGrafica(response);
                    $("#estado").remove();
                    $("#temporada").remove();
                    $("#individual").remove();
                    $("#general").remove();
                    $("#graficos").append("<div id='tipo'></div>");
                    var chart = new ApexCharts(document.querySelector("#tipo"), tabla);
                    chart.render();
                    break;
                default:
                    tabla = cargaGrafica(response);
                    $("#estado").remove();
                    $("#tipo").remove();
                    $("#temporada").remove();
                    creacionSelect(response);
                    cargaGeneral(response);
                    $("#tecnicos").on("change", function () {
                        $.ajax({
                            url: "/graficos/" + filtro,
                            method: "get",
                            data: { valor: $("#tecnicos").val() },
                            success: function (response) {
                                if (response["listaTecnicos"] != null) {
                                    $("#general").remove();
                                    $("#individual").remove();
                                    cargaGeneral(response);
                                }
                                else {
                                    $("#individual").remove();
                                    $("#graficos").append("<div id='individual'></div>");
                                    $("#general").remove();
                                    var chart = new ApexCharts(document.querySelector("#individual"), cargaEmpleado(response));
                                    chart.render();
                                }
                            }
                        });
                    });
            }
        }
    });
}
//Grafico para los estados de las solicitudes
function estadoGrafica(datos) {
    $("#tecnicos").addClass("d-none");
    var graficaEstado = {
        series: [datos["creada"], datos["pendiente"], datos["aceptada"], datos["rechazada"], datos["finalizada"]],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['Creado', 'Pendiente', 'Aceptado', 'Rechazado', "Finalizado"],
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
//Grafica para sacar las solicitudes creadas por meses
function temporadaGrafica(datos) {
    $("#tecnicos").addClass("d-none");
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
                    position: 'center',
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
function tipoDeObras(datos) {
    $("#tecnicos").addClass("d-none");
    var string = "[ ";
    for (var x = 0; x < datos.length; x++) {
        string = string + datos[x]["tipo"] + ",";
    }
    var tipos = string.substr(0, string.length - 1) + "]";
    return tipos;
}
//Grafica para la tipo de obra
function tipoGrafica(datos) {
    $("#tecnicos").addClass("d-none");
    var graficaTipo = {
        series: [datos[0]["porcentaje"], datos[1]["porcentaje"], datos[2]["porcentaje"]],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: [datos[0]["tipo"], datos[1]["tipo"], datos[2]["tipo"]],
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
//Grafica para la carga de trabajo
function cargaGrafica(datos) {
    var graficaCarga = {
        series: [datos[0]["porcentaje"], datos[1]["porcentaje"]],
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
            }],
        fill: {
            type: 'gradient',
        },
    };
    return graficaCarga;
}
//Función para generar la select de la grafica de los tecnicos
function creacionSelect(datos) {
    $("#selects").append("<select class='ml-5 border m-2 border-primary p-0 pt-1 pb-1 card-footer rounded col-lg-2 col-md-3 col-sm-4 col-11' id='tecnicos' style='text-align-last: center'></select>");
    $("#tecnicos").append("<option class='usuariosTecnicos' value='general'>General</option>");
    datos["listaTecnicos"].forEach(function (tecnico) {
        var nombre = tecnico["nombre"] + " " + tecnico["apellido"];
        $("#tecnicos").append("<option class='usuariosTecnicos' value='" + tecnico["id"] + "'>" + nombre + "</option>");
    });
}
//Grafica para la carga de trabajo por cada empleado
function cargaEmpleado(datos) {
    var cargaEmple = {
        series: [{
                name: 'Aceptadas',
                data: [datos["enero"]["aceptados"], datos["febrero"]["aceptados"], datos["marzo"]["aceptados"], datos["abril"]["aceptados"], datos["mayo"]["aceptados"], datos["junio"]["aceptados"], datos["julio"]["aceptados"], datos["agosto"]["aceptados"], datos["septiembre"]["aceptados"], datos["octubre"]["aceptados"], datos["noviembre"]["aceptados"], datos["diciembre"]["aceptados"]]
            }, {
                name: 'Pendientes',
                data: [datos["enero"]["pendiente"], datos["febrero"]["pendiente"], datos["marzo"]["pendiente"], datos["abril"]["pendiente"], datos["mayo"]["pendiente"], datos["junio"]["pendiente"], datos["julio"]["pendiente"], datos["agosto"]["pendiente"], datos["septiembre"]["pendiente"], datos["octubre"]["pendiente"], datos["noviembre"]["pendiente"], datos["diciembre"]["pendiente"]]
            }, {
                name: 'Rechazadas',
                data: [datos["enero"]["rechazados"], datos["febrero"]["rechazados"], datos["marzo"]["rechazados"], datos["abril"]["rechazados"], datos["mayo"]["rechazados"], datos["junio"]["rechazados"], datos["julio"]["rechazados"], datos["agosto"]["rechazados"], datos["septiembre"]["rechazados"], datos["octubre"]["rechazados"], datos["noviembre"]["rechazados"], datos["diciembre"]["rechazados"]]
            }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        },
        yaxis: {
            title: {
                text: 'obras'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " obras";
                }
            }
        }
    };
    return cargaEmple;
}
function cargaGeneral(response) {
    $("#graficos").append("<div id='general'></div>");
    var chart = new ApexCharts(document.querySelector("#general"), cargaGrafica(response));
    chart.render();
}
