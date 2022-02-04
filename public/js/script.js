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
            if (respuesta.length > 0) {
                console.log(respuesta[0].perfil_usuario)
                if (respuesta[0].perfil_usuario == 1) {
                    //ADMIN
                } else if (respuesta[0].perfil_usuario == 2) {
                    //USER
                } else {
                    var fails = document.getElementById('confirmacion')
                    fails.innerHTML = "<p style='color:red'>Error de autenticación</p>"
                }
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