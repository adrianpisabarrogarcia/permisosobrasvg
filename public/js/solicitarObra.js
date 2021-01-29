$(document).ready(function () {
    var fecha = new Date();
    var datos = "";
    var lat;
    var lng;
    var cp;
    /***
     * @author WeApp
     */
    (function () {
        var placesAutocomplete = places({
            appId: 'plEHFE8OXN3L',
            apiKey: 'a6eb12d44e181f3c3c3d02bd7cf7b2fd',
            container: document.querySelector('#address'),
        });
        placesAutocomplete.on('change', function (e) {
            datos = e.suggestion.name;
            console.log(e.suggestion);
            lat = e.suggestion.latlng.lat;
            lng = e.suggestion.latlng.lng;
            cp = e.suggestion.postcode;
        });
        $("#enviar").on("click", function (e) {
            var dato = $("#address").val();
            var eje = ",";
            var contador = 0;
            for (var i = 0; i < dato.length; i++) {
                if (dato.charAt(i) === eje)
                    contador++;
            }
            dato = dato.substring(0, dato.indexOf(","));
            if (dato !== datos || contador < 3) {
                alert("Error");
                e.preventDefault();
            }
            else {
                $("#lat").val(lat);
                $("#lng").val(lng);
                $("#codigopostal").val(cp);
                var date = new Date();
                var ano = date.getFullYear();
                var mes = date.getMonth() + 1;
                var dia = date.getUTCDate();
                var hora = date.getHours();
                var minutos = date.getMinutes();
                var segundos = date.getSeconds();
                var fecha_1 = ano + "-" + mes + "-" + dia + " " + hora + ":" + minutos + ":" + segundos;
                $("#fecha").val(fecha_1);
            }
        });
    })();
});
