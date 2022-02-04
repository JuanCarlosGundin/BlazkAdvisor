//AJAX BASICO PARA SU FUNCIONAMIENTO
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
}

window.onload = function cerrar_formulario_loginJS() {
    formulario_html = document.getElementById('modal-content')
    formulario_html.style.display = "none";

    formulario_reg_html = document.getElementById('modal-content2')
    formulario_reg_html.style.display = "none";
}


//Funcion de validacion del login
function validacion_loginJS() {
    var fails = document.getElementById('errores')
    if (document.getElementById('password').value == "" && document.getElementById('email').value == "") {
        fails.innerHTML = "<p>Falta el mail y password</p>"
    } else if (document.getElementById('password').value == "") {
        fails.innerHTML = "<p>Falta el password</p>"
    } else if (document.getElementById('email').value == "") {
        fails.innerHTML = "<p>Falta el mail</p>"
    } else {
        //Si todo sale bien llama a la funcion que hace el login
        loginJS();
    }
}

//LOGICA DE LOGIN, EN LOS RESULTADOS DEL IF Se pondrán las funciones que redirigan a funciones de controller con el index
function loginJS() {
    var datos = document.getElementById("datos_user");
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
            var recarga = '';
            console.log(respuesta)

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

            datos.innerHTML = recarga;
        }
    }
    ajax.send(formData);
}


function abrir_formularioJS() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";

    formulario_html = document.getElementById('form')
    formulario_html.style.display = "block";
}


function validacion_registroJS() {
    var fails = document.getElementById('errores_reg')

    photo_reg = document.getElementById('photo_reg').files[0]
    name_reg = document.getElementById('name_reg').value
    email_reg = document.getElementById('email_reg').value
    pass_reg = document.getElementById('pass_reg').value
    type_reg = document.getElementById('type_reg').value

    if (name_reg == "" && email_reg == "" && pass_reg == "") {
        fails.innerHTML = "<p>Falta todo</p>"
    } else if (name_reg == "" && email_reg == "") {
        fails.innerHTML = "<p>Falta nombre y mail</p>"
    } else if (email_reg == "" && pass_reg == "") {
        fails.innerHTML = "<p>Falta mail y pass</p>"
    } else if (name_reg == "" && pass_reg == "") {
        fails.innerHTML = "<p>Falta nombre y pass</p>"
    } else if (name_reg == "" && pass_reg == "") {
        fails.innerHTML = "<p>Falta nombre y pass</p>"
    } else if (pass_reg == "") {
        fails.innerHTML = "<p>Falta pass</p>"
    } else if (name_reg == "") {
        fails.innerHTML = "<p>Falta nombre</p>"
    } else if (email_reg == "") {
        fails.innerHTML = "<p>Falta email</p>"
    } else {
        registroJS(name_reg, email_reg, pass_reg, type_reg, photo_reg);
    }
}

function registroJS(name_reg, email_reg, pass_reg, type_reg, photo_reg) {
    var fails = document.getElementById('errores_reg')

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
            if (respuesta.resultado == 'OK') {
                fails.innerHTML = "Inserción correcta."
                redirect_homeJS();
            } else {
                fails.innerHTML = "Fallo en la inserción";
            }
        }
    }
    ajax.send(formData);
    console.log(name_reg, email_reg, pass_reg, type_reg, photo_reg)
}

function redirect_homeJS() {
    //Aqui redirigimos al home
    window.location.href = "./loginPOST";
}