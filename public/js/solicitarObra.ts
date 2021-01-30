$(document).ready(function(){
    var fecha:Date= new Date();
    var datos:string = "";
    var lat:number;
    var lng:number;
    var cp:string;

    /***
     * @author WeApp
     */

    (function() {
        var placesAutocomplete = places({
            appId: 'plEHFE8OXN3L',
            apiKey: 'a6eb12d44e181f3c3c3d02bd7cf7b2fd',
            container: document.querySelector('#address'),
        });
        placesAutocomplete.on('change', function(e) {
            datos = e.suggestion.name;
            console.log(e.suggestion);
            lat = e.suggestion.latlng.lat;
            lng = e.suggestion.latlng.lng;
            cp= e.suggestion.postcode;
        });
        $("#enviar").on("click",function (e){
            let dato = $("#address").val();
            let eje = ",";
            let contador = 0;
            for (let i = 0; i<dato.length;i++){
                if (dato.charAt(i) === eje)
                    contador++;
            }
            dato = dato.substring(0,dato.indexOf(","));
            if (dato!== datos || contador < 3)
            {
                alert("Error");
                e.preventDefault();
            }
            else {
                $("#lat").val(lat);
                $("#lng").val(lng);
                $("#codigopostal").val(cp);
                let date= new Date();
                let ano= date.getFullYear();
                let mes= date.getMonth() +1;
                let dia= date.getUTCDate();
                let hora=date.getHours();
                let minutos= date.getMinutes();
                let segundos= date.getSeconds();
                let fecha= ano+"-"+mes+"-"+dia+" "+hora+":"+minutos+":"+segundos;
                $("#fecha").val(fecha);
            }
        })
    })();
});
