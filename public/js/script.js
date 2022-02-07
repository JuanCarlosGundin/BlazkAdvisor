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


/*Close modal*/
var span0 = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close")[1];
var span2 = document.getElementsByClassName("close")[2];
var span3 = document.getElementsByClassName("close")[3];
span0.onclick = function() {
    let modal = document.getElementById("MyModal");
    modal.style.display = "none";
}
span1.onclick = function() {
    let modal = document.getElementById("MyModal");
    modal.style.display = "none";
}
span2.onclick = function() {
    let modal = document.getElementById("MyModalEditar");
    modal.style.display = "none";
}
span3.onclick = function() {
    let modal = document.getElementById("MyModalCrear");
    modal.style.display = "none";
}


// When the user clicks anywhere outside of the modal, close it

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

function redirect_homeJS() {
    //Aqui redirigimos al home
    window.location.href = "./";
}

//INICIO MODAL EDITAR RESTAURNATE
/*
id_restaurante nombre_restaurante  loc_lat_restaurante  descripcion_restaurante 
email_dueño loc_alt_restaurante  loc_restaurante   tipo_restaurante 
dieta_especial  comidas_restaurante  activo_restaurante   precio_restaurante
*/
function editarModalRestaurante(id, nombre, latitud, descripcion, email, altitud, localidad, tipo, dieta, comidas, activo, precio) {
    let modal = document.getElementById('MyModalEditar')
        //RECOPILamos valores del restaurante
    document.getElementById('id_mod').value = id
    document.getElementById('nombre_mod').value = nombre
    document.getElementById('latitud_mod').value = latitud
    document.getElementById('descripcion_mod').value = descripcion
    document.getElementById('email_mod').value = email
    document.getElementById('altitud_mod').value = altitud
    document.getElementById('localidad_mod').value = localidad
    document.getElementById('tipo_mod').value = tipo
    document.getElementById('dieta_mod').value = dieta
    document.getElementById('comidas_mod').value = comidas
    document.getElementById('activo_mod').value = activo
    document.getElementById('precio_mod').value = precio


    modal.style.display = "block";
}

function validacion_modificadorJS() {
    var edicion_errores = document.getElementById('edicion_errores');

    id = document.getElementById('id_mod').value
    nombre = document.getElementById('nombre_mod').value
    latitud = document.getElementById('latitud_mod').value
    descripcion = document.getElementById('descripcion_mod').value
    email = document.getElementById('email_mod').value
    altitud = document.getElementById('altitud_mod').value
    localidad = document.getElementById('localidad_mod').value
    tipo = document.getElementById('tipo_mod').value
    dieta = document.getElementById('dieta_mod').value
    comidas = document.getElementById('comidas_mod').value
    activo = document.getElementById('activo_mod').value
    precio = document.getElementById('precio_mod').value

    if (id == "" || nombre == "" || latitud == "" || descripcion == "" || email == "" || altitud == "" || localidad == "" || tipo == "" || dieta == "" || comidas == "" || activo == "" || precio == "") {
        edicion_errores.innerHTML = "<p style='color:red'>Falta algún dato</p>"
    } else {
        edicionRestauranteJS(id, nombre, latitud, altitud, localidad, email, descripcion, tipo, dieta, comidas, activo, precio)
    }
}

function edicionRestauranteJS(id, nombre, latitud, altitud, localidad, email, descripcion, tipo, dieta, comidas, activo, precio) {
    fails = document.getElementById('edicion_errores')
    fail_validacion = document.getElementById('fallo_validacion')

    var formData = new FormData();

    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('id', id);
    formData.append('nombre', nombre);
    formData.append('latitud', latitud);
    formData.append('altitud', altitud);
    formData.append('localidad', localidad);
    formData.append('tipo', tipo);
    formData.append('email', email);
    formData.append('dieta', dieta);
    formData.append('comidas', comidas);
    formData.append('descripcion', descripcion);
    formData.append('activo', activo);
    formData.append('precio', precio);

    var ajax = objetoAjax();
    //Abrimos comunicacion para el controller
    ajax.open("POST", "edicion_restaurante_ajax", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            /* Leerá la respuesta que es devuelta por el controlador: */
            if (respuesta.resultado == 'OK') {
                console.log(respuesta)
                fails.innerHTML = "<p style='color:green'>Edición registrada y correcta en BD</p>";
                closeModalEdicion()

            } else {
                console.log(respuesta)
                fails.innerHTML = "<p style='color:red'>Edición no registrada, fallo de datos o servidor</p>";
            }


        }
    }
    ajax.send(formData);
}
//Cerrar Modal en click outside el modal
window.onclick = function(event) {
    let modalEditar = document.getElementById("MyModalEditar");
    if (event.target == modalEditar) {
        modalEditar.style.display = "none";
    }
}

function closeModalEdicion() {
    let modalEditar = document.getElementById("MyModalEditar");
    modalEditar.style.display = "none";
}
//FINAL MODAL EDICIÓN
//INICIO MODAL CREACION
function crearModalRestaurante() {
    let modal = document.getElementById('MyModalCrear')
        //RECOPILamos valores del restaurante


    modal.style.display = "block";
}
//VALIDAMOS DATOS DEL FORMULARIO MODAL DE CREACION
function validacion_creadorJS() {
    var creacion_errores = document.getElementById('creacion_errores');

    nombre = document.getElementById('nombre_crear').value
    latitud = document.getElementById('latitud_crear').value
    descripcion = document.getElementById('descripcion_crear').value
    email = document.getElementById('email_crear').value
    altitud = document.getElementById('altitud_crear').value
    localidad = document.getElementById('localidad_crear').value
    tipo = document.getElementById('tipo_crear').value
    dieta = document.getElementById('dieta_crear').value
    comidas = document.getElementById('comidas_crear').value
    activo = document.getElementById('activo_crear').value
    precio = document.getElementById('precio_crear').value

    if (nombre == "" || latitud == "" || descripcion == "" || email == "" || altitud == "" || localidad == "" || tipo == "" || dieta == "" || comidas == "" || activo == "" || precio == "") {
        creacion_errores.innerHTML = "<p style='color:red'>Falta algún dato</p>"
    } else {
        creacionRestauranteJS(nombre, latitud, altitud, localidad, email, descripcion, tipo, dieta, comidas, activo, precio)
    }

}
//INSERTAMOS DATOS DEL FORMULARIO SUANDO EL CONTROLLER MEDIANTE OBJETO AJAX
function creacionRestauranteJS(nombre, latitud, altitud, localidad, email, descripcion, tipo, dieta, comidas, activo, precio) {
    var formData = new FormData();

    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('nombre', nombre);
    formData.append('latitud', latitud);
    formData.append('altitud', altitud);
    formData.append('localidad', localidad);
    formData.append('tipo', tipo);
    formData.append('email', email);
    formData.append('dieta', dieta);
    formData.append('comidas', comidas);
    formData.append('descripcion', descripcion);
    formData.append('activo', activo);
    formData.append('precio', precio);

    var ajax = objetoAjax();
    //Abrimos comunicacion para el controller
    validacion_crear = document.getElementById('fallo_validacion_crear')
    creacion_bien = document.getElementById('creacion_bien')
    ajax.open("POST", "creacion_restaurante_ajax", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            /* Leerá la respuesta que es devuelta por el controlador: */
            if (respuesta.resultado == 'OK') {
                console.log(respuesta)
                creacion_bien.innerHTML = "<p style='color:green'>Creacion registrada y correcta en BD</p>";
                closeModalCreacion()

            } else {
                console.log(respuesta)
                validacion_crear.innerHTML = "<p style='color:red'>Edición no registrada, fallo de datos o servidor</p>";
            }
        }
    }
    ajax.send(formData);
}
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