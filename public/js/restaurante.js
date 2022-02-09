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
    formData.append('tipo',"mapa");
    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();
    ajax.open("POST", "../leer", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            console.log("llega")
            var respuesta = JSON.parse(this.responseText);
            var map = L.map('map').setView([respuesta[0].loc_lat_restaurante,  respuesta[0].loc_alt_restaurante], 13);
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1Ijoic2hha3RlcmlubyIsImEiOiJja3pmbjZ4cjEwM3FpMm9wZG5mdDUwc2M5In0.BbZoJpCDkLq19X-t7ezqbg'
            }).addTo(map);
            L.marker([respuesta[0].loc_lat_restaurante, respuesta[0].loc_alt_restaurante]).addTo(map);
        }
    }

    ajax.send(formData);
}
//funcion volver al inicio
function volver_inicio() {
    window.location.href = "../";
}

function IWantToLogout() {
    //Hacemos un flush y que nos devuelva al home. Por ahora solo al login
    var id = document.getElementById("id").value;
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));

    var ajax = objetoAjax();
    //Abrimos comunicacion para el controller
    ajax.open("POST", "../logout", true);
    ajax.onreadystatechange = function() {
    if (ajax.readyState == 4 && ajax.status == 200) {
        window.location.href="./"+id
    }
}
    ajax.send(formData);
}


//REVISAR
//Cerrar Modal en click outside el modal
window.onclick = function(event) {
    let modalCrear = document.getElementById("MyModalCrear");
    if (event.target == modalCrear) {
        modalCrear.style.display = "none";
    }
}

function closeModalCreacion() {
    let modalCrear = document.getElementById("MyModalCrear");
    modalCrear.style.display = "none";
}

//MODAL DE LOGIN
function redirect_homeJS() {
    //Aqui redirigimos al home
    var id = document.getElementById("id").value;
    window.location.href = "./"+id;
}
function IWantToLogin() {
    modal = document.getElementById('MyModal')
    modal.style.display = "block";
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
    ajax.open("POST", "../login_ajax", true);

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

function closeModal() {
    let modallogin = document.getElementById("MyModal");
    modallogin.style.display = "none";
}


var span0 = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close")[1];
span0.onclick = function() {
    let modal = document.getElementById("MyModal");
    modal.style.display = "none";
}
span1.onclick = function() {
    let modal = document.getElementById("MyModal");
    modal.style.display = "none";
}
window.onclick = function(event) {
    let modallogin = document.getElementById("MyModal");
    if (event.target == modal) {
        modallogin.style.display = "none";
    }
}

function closeModal() {
    let modallogin = document.getElementById("MyModal");
    modallogin.style.display = "none";
}

//Registrarse

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
    ajax.open("POST", "../registro_ajax", true);
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
                    document.getElementById('email').value = email_reg
                    document.getElementById('password').value = pass_reg
                    loginJS()
                        //closemodal()

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

//CAMBIAR ENTRE LOGIN Y REGISTRO
function abrir_formularioJS() {
    let modal = document.getElementById("modal-content");
    modal.style.display = "none";

    formulario_html = document.getElementById('modal-content2')
    formulario_html.style.display = "block";
}

function abrir_loginJS() {
    let modal = document.getElementById("modal-content2");
    modal.style.display = "none";

    formulario_html = document.getElementById('modal-content')
    formulario_html.style.display = "block";
}