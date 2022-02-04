window.onload = function() {
    leerJS(0)
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

function leerJS(valor) {
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
       formData.append('clave', valor);
       valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var tabla = document.getElementById("tabla");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    if(valor != 0){
        formData.append('filtro',valor);
        formData.append('tipo',1);
    }else{
        formData.append('filtro', document.getElementById('filtro').value);
        formData.append('tipo',0);
    }

    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();

    ajax.open("POST", "leer", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            var recarga = '';
            /* Leerá la respuesta que es devuelta por el controlador: */
            for (let i = 0; i < respuesta.length; i++) {
                recarga +='<button class="resbtn">'
                recarga +='<div>'
                recarga +='<img class="imagenres" src="img/'+respuesta[i].url_foto_principal+'">'
                recarga +='</div>'
                recarga +='<div class="titulo">'
                recarga +='<p>'+respuesta[i].nombre_restaurante+'</p>'
                recarga +='</div>'
                recarga +='<div class="estrellas">'
                recarga +='<p>'+respuesta[i].descripcion_restaurante+'</p>'
                recarga +='</div>'
                recarga +='<div class="desc">'
                recarga +='<p>Cocina '+respuesta[i].tipo_restaurante+'</p>'
                recarga +='</div>'
                recarga +='</button>'
            }
            tabla.innerHTML = recarga;
        
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
  enter.innerHTML = contenido;
}

// When the user clicks on <span> (x), close the modal
cerrar.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
