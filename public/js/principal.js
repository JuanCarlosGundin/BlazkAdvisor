window.onload = function() {
    leerJS(0)
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

function leerJS(valor) {
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
       formData.append('clave', valor);
       valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var tabla = document.getElementById("tabla");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    //estoy filtrando el valor, si es 0 es el valor del texto
    // y si es diferente de 0 es el valor de los botones "String"
    if(valor != 0){
        formData.append('comida',valor);
        formData.append('filtro', document.getElementById('filtro').value);
        formData.append('tipo',2);
    }else{
        formData.append('filtro', document.getElementById('filtro').value);
        formData.append('tipo',1);
    }

    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();
    //abrimos la ruta web pasando el objeto ajax con todas las variables
    ajax.open("POST", "leer", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            console.log(respuesta)
            var recarga = '';
            /* Leerá la respuesta que es devuelta por el controlador y empezare a cargar la variable
             que contiene todo el contenido de la propia web*/
            for (let i = 0; i < respuesta.length; i++) {
                recarga += '<div class="restaurante">'
                recarga += '<button class="resbtn" onclick="window.location.href = \'restaurante/' + respuesta[i].id_restaurante + '\'">'
                recarga += '<div>'
                recarga += '<img class="imagenres" src="img/' + respuesta[i].url_foto_principal + '">'
                recarga += '</div>'
                recarga += '<div class="titulo">'
                recarga += '<p>' + respuesta[i].nombre_restaurante + '</p>'
                recarga += '</div>'
                recarga += '<div class="estrellas">'
                recarga += '<p>' + respuesta[i].descripcion_restaurante + '</p>'
                recarga += '</div>'
                recarga += '<div class="desc">'
                recarga += '<p>Cocina ' + respuesta[i].tipo_restaurante + '</p>'
                recarga += '</div>'
                recarga += '</button>'
                recarga += '<button class="modificar" onclick="editarModalRestaurante(' + respuesta[i].id_restaurante + ',' + respuesta[i].nombre_restaurante + ',' + respuesta[i].loc_lat_restaurante + ',' + respuesta[i].descripcion_restaurante + ',' + respuesta[i].email_dueño + ',' + respuesta[i].loc_alt_restaurante + ',' + respuesta[i].loc_restaurante + ',' + respuesta[i].tipo_restaurante + ',' + respuesta[i].dieta_especial + ',' + respuesta[i].comidas_restaurante + ',' + respuesta[i].activo_restaurante + ',' + respuesta[i].precio_restaurante + ',' + respuesta[i].desc_larga + ',' + respuesta[i].telefono + ');return false;">EDITAR</button>'
                recarga += '<button class="eliminar" onclick="desactivarActivarRestaurante(' + respuesta[i].id_restaurante + '); return false;">DESACTIVAR</button>'
                recarga += '<div id="desactivar_errores"></div>'
                recarga += '<div id="edicion_errores"></div>'
                recarga += '</div>'
            }
            tabla.innerHTML = recarga;
        
        }
    }

    ajax.send(formData);
}

//cambiar de pagina a restaurante en cuestion
function restaurante(id) {
    alert("Llegamos")
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('id',id);
    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();
    //abrimos la ruta web pasando el objeto ajax con todas las variables
    ajax.open("POST", "restaurante", true);
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


//Ajax de Login

//alert("llego")
function IWantToLogin() {
    modal = document.getElementById('MyModal')
    modal.style.display = "block";
}

function IWantToLogout() {
    //Hacemos un flush y que nos devuelva al home. Por ahora solo al login
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));

    var ajax = objetoAjax();
    //Abrimos comunicacion para el controller
    ajax.open("POST", "logout", true);

    ajax.send(formData);
    redirect_homeJS()
}



//Funcion de validacion del login
function validacion_loginJS() {
    var fails = document.getElementById('confirmacion')
    if (document.getElementById('password').value == "" && document.getElementById('email').value == "") {
        fails.innerHTML = "<p style='color:red'>Falta el mail y password</p>"
    } else if (document.getElementById('password').value == "") {
        fails.innerHTML = "<p style='color:red'>Falta el password</p>"
    } else if (document.getElementById('email').value == "") {
        fails.innerHTML = "<p style='color:red'>Falta el mail</p>"
    } else {
        //Si todo sale bien llama a la funcion que hace el login
        loginJS();
    }
}

//LOGICA DE LOGIN, EN LOS RESULTADOS DEL IF Se pondrán las funciones que redirigan a funciones de controller con el index
function loginJS() {
    //datos.innerHTML = "hello"
    //Introducimos en el formdata los values del formulario
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('email_user', document.getElementById('email').value);
    formData.append('password_user', document.getElementById('password').value);

    var ajax = objetoAjax();
    //Abrimos comunicacion para el controller
    ajax.open("POST", "login_ajax", true);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            console.log(respuesta)
            if (respuesta.length > 0) {
                if (respuesta[0].perfil_usuario == 1) {
                    //ADMIN
                } else if (respuesta[0].perfil_usuario == 2) {
                    //USER
                } else {
                    var fails = document.getElementById('confirmacion')
                    fails.innerHTML = "<p style='color:red'>Error de autenticación</p>"
                }
                closeModal()
                redirect_homeJS()
            } else {
                var fails = document.getElementById('confirmacion')
                fails.innerHTML = "<p style='color:red'>Usuario no encontrado</p>"
            }



            /* AQUI LEEREMOS LO REPSUESTO EN FORMA DE JSON


            if (respuesta == 1) {
                //LOGIN CON EXITO
                recarga += '<p>BINGO</p>'
            } else {
                //LOGIN FRACASO
                recarga += '<p>Usuario no encontrado</p>'
            }
            */
            /* Leerá la respuesta que es devuelta por el controlador: */
        }
    }
    ajax.send(formData);
}


function abrir_formularioJS() {
    var modal = document.getElementById("modal-content");
    modal.style.display = "none";

    formulario_html = document.getElementById('modal-content2')
    formulario_html.style.display = "block";
}

function abrir_loginJS() {
    var modal = document.getElementById("modal-content2");
    modal.style.display = "none";

    formulario_html = document.getElementById('modal-content')
    formulario_html.style.display = "block";
}


/*Close modal*/
var span0 = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close")[1];
span0.onclick = function() {
    var modal = document.getElementById("MyModal");
    modal.style.display = "none";
}
span1.onclick = function() {
    var modal = document.getElementById("MyModal");
    modal.style.display = "none";
}


// When the user clicks anywhere outside of the modal, close it

window.onclick = function(event) {
    var modal = document.getElementById("MyModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function closeModal() {
    var modal = document.getElementById("MyModal");
    modal.style.display = "none";
}
/*FIN CLOSE MODAL*/


function validacion_registroJS() {
    var confirmacion = document.getElementById('confirmacion_reg')

    photo_reg = document.getElementById('photo_reg').files[0]
    name_reg = document.getElementById('name_reg').value
    email_reg = document.getElementById('email_reg').value
    pass_reg = document.getElementById('pass_reg').value
    type_reg = document.getElementById('type_reg').value

    if (name_reg == "" && email_reg == "" && pass_reg == "") {
        confirmacion.innerHTML = "<p style='color:red'>Falta todo</p>"
    } else if (name_reg == "" && email_reg == "") {
        confirmacion.innerHTML = "<p style='color:red'>Falta nombre y mail</p>"
    } else if (email_reg == "" && pass_reg == "") {
        confirmacion.innerHTML = "<p style='color:red'>Falta mail y pass</p>"
    } else if (name_reg == "" && pass_reg == "") {
        confirmacion.innerHTML = "<p style='color:red'>Falta nombre y pass</p>"
    } else if (name_reg == "" && pass_reg == "") {
        confirmacion.innerHTML = "<p style='color:red'>Falta nombre y pass</p>"
    } else if (pass_reg == "") {
        confirmacion.innerHTML = "<p style='color:red'>Falta pass</p>"
    } else if (name_reg == "") {
        confirmacion.innerHTML = "<p style='color:red'>Falta nombre</p>"
    } else if (email_reg == "") {
        confirmacion.innerHTML = "<p style='color:red'>Falta email</p>"
    } else {
        registroJS(name_reg, email_reg, pass_reg, type_reg, photo_reg);
    }
}

function registroJS(name_reg, email_reg, pass_reg, type_reg, photo_reg) {
    var fails = document.getElementById('confirmacion_reg')

    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('email', email_reg);
    formData.append('password', pass_reg);
    formData.append('name', name_reg);
    formData.append('type', type_reg);
    formData.append('photo', photo_reg);

    var ajax = objetoAjax();
    //Abrimos comunicacion para el controller
    ajax.open("POST", "registro_ajax", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            /* Leerá la respuesta que es devuelta por el controlador: */
            if (respuesta.mismo_mail == 'NOK') {
                console.log(respuesta)
                fails.innerHTML = "<p style='color:red'>El mail ya ha sido introducido ¿Eres tú?</p>"
            } else {
                if (respuesta.resultado == 'OK') {
                    console.log(respuesta)
                        //redirect_homeJS();
                } else {
                    console.log(respuesta)
                    fails.innerHTML = "Fallo en la inserción";
                }
            }

        }
    }
    ajax.send(formData);
    console.log(name_reg, email_reg, pass_reg, type_reg, photo_reg)
}