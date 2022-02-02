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
            /* Leerá la respuesta que es devuelta por el controlador: */
            for (let i = 0; i < respuesta.length; i++) {
                recarga += '<tr>';
                recarga += '<td>' + respuesta[i].email + '</td>'
                recarga += '</tr>';
            }
            datos.innerHTML = recarga;
            console.log(respuesta)
        }
    }

    ajax.send(formData);
}