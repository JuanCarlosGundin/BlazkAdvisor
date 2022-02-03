//alert("llego")


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
            if (respuesta == 1) {
                //LOGIN CON EXITO
                recarga += '<p>BINGO</p>'
            } else {
                //LOGIN FRACASO
                recarga += '<p>Usuario no encontrado</p>'
            }
            /* Leerá la respuesta que es devuelta por el controlador: */

            datos.innerHTML = recarga;
        }
    }
    ajax.send(formData);
}

function abrir_formularioJS() {
    formulario_html = document.getElementById('form')
    formulario_html.innerHTML = '<form action="" onsubmit="validacion_registroJS(); return false;"><input type="text" name="name_reg" id="name_reg" placeholder="Nombre...">'
    formulario_html.innerHTML += '<input type="email" name="email_reg" id="email_reg" placeholder="Email..."><br><input type = "password" name = "pass_reg" id = "pass_reg" placeholder="password">'
    formulario_html.innerHTML += '<input type = "hidden" name="type_reg" id="type_reg" value=1><br><input type="file" name="photo_reg" id="photo_reg"></form>'
}