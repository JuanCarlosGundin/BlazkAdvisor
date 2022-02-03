window.onload = function() {
    leerJS()
    
}

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
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
       formData.append('clave', valor);
       valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var tabla = document.getElementById("main");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('filtro', document.getElementById('filtro').value);

    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();

    ajax.open("POST", "leer", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            var recarga = '';
            /* Leerá la respuesta que es devuelta por el controlador: */
            for (let i = 0; i < respuesta.length; i++) {
                recarga += '<tr>';
                recarga += '<td>' + respuesta[i].id_restaurante + '</td>'
                recarga += '<td>' + respuesta[i].nombre_restaurante + '</td>'
                recarga += '<td>' + respuesta[i].descripcion_restaurante + '</td>'
                recarga += '<td>' + respuesta[i].email_dueño + '</td>'
                recarga += '<td><div class="map" id="map'+i.toString()+'" style=" height: 500px; width: 500px;"></div></td>'
                recarga += '</tr>';
            }
            tabla.innerHTML = recarga;
            for (let i = 0; i < respuesta.length; i++) {
            var map = L.map('map'+i.toString()).setView([respuesta[i].loc_lat_restaurante,  respuesta[i].loc_alt_restaurante], 13);
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
             attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
             maxZoom: 18,
            id: 'mapbox/streets-v11',
             tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1Ijoic2hha3RlcmlubyIsImEiOiJja3o0ZzRzbjcwZXdlMm5rMm91bm1qaTI3In0.jgiCv-cyrWE1qvvKyns_AA'
            }).addTo(map);
            L.marker([respuesta[i].loc_lat_restaurante, respuesta[i].loc_alt_restaurante]).addTo(map);
        }
        }
    }

    ajax.send(formData);
}


//Modal BOX

// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var cerrar = document.getElementById("cerrar");

// When the user clicks the button, open the modal 
function abrir() {
  modal.style.display = "block";
  filtro=document.getElementById("filtro").value
  enter=document.getElementById("Aqui")
  var contenido=''
  contenido+='<form onsubmit="editar(); return false;">' 
  contenido+='<p>Nombre<p>'
  contenido+='<input type="text" id="nombreE">'
  contenido+='<p>Foto<p>'
  contenido+='<input type="file" id="fotoE">'
  contenido+='<input type="hidden" id="idE" ><br/><br/>'
  contenido+='<input type="submit">'
  contenido+='</form>'
  contenido+=''
  filtro.innerHTML = "SEXOOOOOOO";
  enter.innerHTML = contenido;
}

// When the user clicks on <span> (x), close the modal
cerrar.onclick = function() {
    filtro=document.getElementById("filtro").value
    filtro.innerHTML = "";
    leerJS()
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    filtro=document.getElementById("filtro").value
    filtro.innerHTML = "";
    leerJS()
    modal.style.display = "none";
  }
}
