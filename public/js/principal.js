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
    if(valor == 0){
        formData.append('filtro', document.getElementById('filtro').value);
        formData.append('tipo',1);
    }
     else if(valor > 0){
        formData.append('dinero',valor);
        formData.append('filtro', document.getElementById('filtro').value);
        formData.append('tipo',3);
    }else{
        formData.append('comida',valor);
        formData.append('filtro', document.getElementById('filtro').value);
        formData.append('tipo',2);
    }
    usuario=document.getElementById('typeUser').value
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
                //si la tabla esta activada se suma, si no fuera
                if (usuario == 1) {
                    if(respuesta[i].activo_restaurante==1){
                    //si el usuario es administrador injecta esto, en el caso contrario injecta la normal sin edición
                recarga += '<div class="restaurante">'
                recarga += '<button class="resbtn" onclick="window.location.href = \'restaurante/' + respuesta[i].id_restaurante + '\'">'
                recarga += '<div>'
                recarga += '<img class="imagenres" src="storage/'+ respuesta[i].url_foto_principal + '">'
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
                recarga += '<button class="modificar" onclick="editarModalRestaurante(' + respuesta[i].id_restaurante + ',\'' + respuesta[i].nombre_restaurante + '\',' + respuesta[i].loc_lat_restaurante + ',\'' + respuesta[i].descripcion_restaurante + '\',\'' + respuesta[i].email_dueño + '\',' + respuesta[i].loc_alt_restaurante + ',\'' + respuesta[i].loc_restaurante + '\',\'' + respuesta[i].tipo_restaurante + '\',\'' + respuesta[i].dieta_especial + '\',\'' + respuesta[i].comidas_restaurante + '\',' + respuesta[i].activo_restaurante + ',' + respuesta[i].precio_restaurante + ',\'' + respuesta[i].desc_larga + '\',\'' + respuesta[i].telefono +'\');return false;">EDITAR</button>'
                recarga += '<button class="eliminar" onclick="desactivarActivarRestaurante(' + respuesta[i].id_restaurante + '); return false;">DESACTIVAR</button>'
                recarga += '<div id="desactivar_errores"></div>'
                recarga += '<div id="edicion_errores"></div>'
                recarga += '</div>'
                }else{console.log("Easter egg")}   
                }else{
                    if(respuesta[i].activo_restaurante==1){
                    recarga += '<div class="restaurante">'
                    recarga += '<button class="resbtn" onclick="window.location.href = \'restaurante/' + respuesta[i].id_restaurante + '\'">'
                    recarga += '<div>'
                    recarga += '<img class="imagenres" src="storage/'+ respuesta[i].url_foto_principal + '">'
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
                    recarga += '<div id="desactivar_errores"></div>'
                    recarga += '<div id="edicion_errores"></div>'
                    recarga += '</div>'
                }
                }
            }
            
            tabla.innerHTML = recarga;
        
        }
    }

    ajax.send(formData);
}



///EDITAR UN RESTAURANTE

function editarModalRestaurante(id, nombre, latitud, descripcion, email, altitud, localidad, tipo, dieta, comidas, activo, precio, desc_larga, telefono) {
    console.log(tipo)
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
    document.getElementById('descripcion_larga_mod').value = desc_larga
    document.getElementById('telefono_mod').value = telefono
    modal.style.display = "block";
}

function validacion_modificadorJS() {
    var edicion_errores = document.getElementById('edicion_errores');

    id = document.getElementById('id_mod').value
    nombre = document.getElementById('nombre_mod').value
    latitud = document.getElementById('latitud_mod').value
    descripcion = document.getElementById('descripcion_mod').value
    descripcion_larga = document.getElementById('descripcion_larga_mod').value
    email = document.getElementById('email_mod').value
    telefono = document.getElementById('telefono_mod').value
    altitud = document.getElementById('altitud_mod').value
    localidad = document.getElementById('localidad_mod').value
    tipo = document.getElementById('tipo_mod').value
    dieta = document.getElementById('dieta_mod').value
    comidas = document.getElementById('comidas_mod').value
    activo = document.getElementById('activo_mod').value
    precio = document.getElementById('precio_mod').value

    if (id == "" || nombre == "" || latitud == "" || descripcion == "" || descripcion_larga == "" || email == "" || telefono == "" || altitud == "" || localidad == "" || tipo == "" || dieta == "" || comidas == "" || activo == "" || precio == "") {
        edicion_errores.innerHTML = "<p style='color:red'>Falta algún dato</p>"
    } else {
        edicionRestauranteJS(id, nombre, latitud, altitud, localidad, email, telefono, descripcion, descripcion_larga, tipo, dieta, comidas, activo, precio)
    }
}

function edicionRestauranteJS(id, nombre, latitud, altitud, localidad, email, telefono, descripcion, descripcion_larga, tipo, dieta, comidas, activo, precio) {
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
    formData.append('telefono', telefono);
    formData.append('dieta', dieta);
    formData.append('comidas', comidas);
    formData.append('descripcion', descripcion);
    formData.append('descripcion_larga', descripcion_larga);
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
                leerJS(0)
                closeModalEdicion()

            } else {
                console.log(respuesta)
                fails.innerHTML = "<p style='color:red'>Edición no registrada, fallo de datos o servidor</p>";
            }


        }
    }
    ajax.send(formData);
}


//CERRAR MODAL DE EDICION
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
var span2 = document.getElementsByClassName("close")[2];
span2.onclick = function() {
    let modal = document.getElementById("MyModalEditar");
    modal.style.display = "none";
}

//DESACTIVAR UN RESTAURANTE

function desactivarActivarRestaurante(id) {

    var formData = new FormData();

    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('id', id);

    var ajax = objetoAjax();

    ajax.open("POST", "desactivar_activar_ajax", true);
    notas_desactivar = document.getElementById('desactivar_errores');
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            /* Leerá la respuesta que es devuelta por el controlador: */
            if (respuesta.activo_restaurante == 0) {
                console.log(respuesta)

            } else if (respuesta.activo_restaurante == 1) {
                console.log(respuesta)
            }
            leerJS(0)
        }
    }
    ajax.send(formData);
}

//JS CREAR

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
    descripcion_larga = document.getElementById('descripcion_larga_crear').value
    email = document.getElementById('email_crear').value
    telefono = document.getElementById('telefono_crear').value
    altitud = document.getElementById('altitud_crear').value
    localidad = document.getElementById('localidad_crear').value
    tipo = document.getElementById('tipo_crear').value
    dieta = document.getElementById('dieta_crear').value
    comidas = document.getElementById('comidas_crear').value
    activo = document.getElementById('activo_crear').value
    foto = document.getElementById('foto_crear').files[0]
    foto2 = document.getElementById('foto_crear2').files[0]
    foto3 = document.getElementById('foto_crear3').files[0]
    foto4 = document.getElementById('foto_crear4').files[0]
    foto5 = document.getElementById('foto_crear5').files[0]
    precio = document.getElementById('precio_crear').value

    if (nombre == "" || latitud == "" || descripcion == "" || descripcion_larga == "" || email == "" || telefono == "" || altitud == "" || localidad == "" || tipo == "" || dieta == "" || comidas == "" || activo == "" || precio == "") {
        creacion_errores.innerHTML = "<p style='color:red'>Falta algún dato</p>"
    } else {
        creacionRestauranteJS(foto, nombre, latitud, altitud, localidad, email, telefono, descripcion, descripcion_larga, tipo, dieta, comidas, activo, precio, foto2, foto3, foto4, foto5)
    }

}
//INSERTAMOS DATOS DEL FORMULARIO SUANDO EL CONTROLLER MEDIANTE OBJETO AJAX
function creacionRestauranteJS(foto, nombre, latitud, altitud, localidad, email, telefono, descripcion, descripcion_larga, tipo, dieta, comidas, activo, precio, foto2, foto3, foto4, foto5) {
    var formData = new FormData();

    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('foto', foto);
    formData.append('foto2', foto2);
    formData.append('foto3', foto3);
    formData.append('foto4', foto4);
    formData.append('foto5', foto5);
    formData.append('nombre', nombre);
    formData.append('latitud', latitud);
    formData.append('altitud', altitud);
    formData.append('localidad', localidad);
    formData.append('tipo', tipo);
    formData.append('email', email);
    formData.append('telefono', telefono);
    formData.append('descripcion_larga', descripcion_larga);
    formData.append('dieta', dieta);
    formData.append('comidas', comidas);
    formData.append('descripcion', descripcion);
    formData.append('activo', activo);
    formData.append('precio', precio);

    var ajax = objetoAjax();
    //Abrimos comunicacion para el controller
    validacion_crear = document.getElementById('creacion_errores')
    creacion_bien = document.getElementById('creacion_bien')
    ajax.open("POST", "creacion_restaurante_ajax", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            /* Leerá la respuesta que es devuelta por el controlador: */
            if (respuesta.resultado == 'OK') {
                console.log(respuesta)
               leerJS(0)
                closeModalCreacion()

            } else {
                console.log(respuesta)
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

//MODAL DE LOGIN
function redirect_homeJS() {
    //Aqui redirigimos al home
    window.location.href = "./";
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

function closeModal() {
    let modallogin = document.getElementById("MyModal");
    modallogin.style.display = "none";
}
//Logout
function IWantToLogout() {
    //Hacemos un flush y que nos devuelva al home. Por ahora solo al login
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));

    var ajax = objetoAjax();
    //Abrimos comunicacion para el controller
    ajax.open("POST", "logout", true);
    ajax.onreadystatechange = function() {
    if (ajax.readyState == 4 && ajax.status == 200) {
        window.location.href="./"
    }
}
    ajax.send(formData);
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

//DESPLEGABLE DE VALORACIONES
function desplegable() {
    document.getElementById("Dropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.tiposcomida')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

function volver_inicio() {
    window.location.href = "./";
}