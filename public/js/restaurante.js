window.onload = function() {
    leerJS()
}

//este es el objeto de ajax el cual nos permitira hacer todas las peticiones XMLHTTP
function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function leerJS() {
    var id = document.getElementById("id").value;
    console.log(id)
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
       formData.append('clave', valor);
       valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('filtro',id);
    formData.append('tipo',3);
    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();
    ajax.open("POST", "../leer", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            console.log(respuesta[0].loc_lat_restaurante)
            var map = L.map('map').setView([respuesta[0].loc_lat_restaurante,  respuesta[0].loc_alt_restaurante], 13);
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1Ijoic2hha3RlcmlubyIsImEiOiJja3o0ZzRzbjcwZXdlMm5rMm91bm1qaTI3In0.jgiCv-cyrWE1qvvKyns_AA'
            }).addTo(map);
            L.marker([respuesta[0].loc_lat_restaurante, respuesta[0].loc_alt_restaurante]).addTo(map);
        }
    }

    ajax.send(formData);
}