<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RESTAURANTE</title>    
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script defer src="../css/fontawesome/js/all.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
</head>
<body>
    <header>
        <div class="header1">
            <div class="logo" onclick="volver_inicio()">
                    <img onclick="volver_inicio()" class="logoimagen" src="../img/logo.png">
            </div>
            <div class="inicio">
                <?php
                if (session('user')) {
                    $username_logged = session('user');
                    $tipo_user = session('tipo');
                    //print_r($username_logged);
                    //echo "Bienvenido: ".$username_logged->nombre_usuario;
                    echo '<button class="bienvenido" ><b>Bienvenido '.$username_logged.'</b></button>';
                    echo '<button class="iniciosesion" onclick="IWantToLogout(); return false;"><b>Logout</b></button>';
                }else{
                    echo '<button  class="iniciosesion" onclick="IWantToLogin(); return false;"><b>Iniciar sesión</b></button>';
                }
            ?>
            </div>
        </div>
    </header>
    <div class="main">
        <div class="menu">
            <ul>
                <li><a href="">Fotos</a></li>
                <li><a href="">Descripción</a></li>
                <li><a href="">Ubicación y contacto</a></li>
                <li><a href="">Opiniones</a></li>
            </ul>
        </div>
        <div class="info">
            <div class="titulores">
                <h1>{{$restaurante->nombre_restaurante}}</h1>
            </div>
            <div class="descripcion">
                <h4>{{$restaurante->descripcion_restaurante}}</h4>
                <input id="id" type="hidden" value="{{$restaurante->id_restaurante}}">
            </div>
        </div>
    </div>
    <div class="contenido">
        <div class="cuadros">
            <div class="fotos">
                <div class="fotoprincipal">
                    <img class="foto1" src="../{{$restaurante->url_foto_principal}}">
                </div>
                <div class="fotosecundaria">
                    <img class="foto2" src="../../{{$restaurante->url_foto1}}">
                    <img class="foto2" src="../../{{$restaurante->url_foto2}}">
                    <img class="foto2" src="../../{{$restaurante->url_foto3}}">
                    <img class="foto2" src="../../{{$restaurante->url_foto4}}">
                </div>
            </div>
        </div>
        <div class="cuadros">
            <div class="detalles">
                <h1>Sobre nosotros</h1>
                <p class="descripcion">{{$restaurante->desc_larga}}</p>
                <p class="descripcion">Telefono: {{$restaurante->telefono}}</p>
                <p class="descripcion">Email: {{$restaurante->email_dueño}}</p>
            </div>
        </div>
        <div class="cuadros">
            <div class="ubicacion">
                <p class="descripcion">{{$restaurante->loc_restaurante}}</p>
                <div id="map" style=" height: 200px; "></div>
            </div>
        </div>
        <div class="cuadros">
            <div class="opiniones">
                <h1>COMENTARIOS:</h1>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer">
            <p>Creado por Juan Carlos, Pol y Gerard</p>
        </div>
    </footer>

    <!--Modal boxes -->
    <!-- Aqui esta el modal -->
    <div class="modal" id="MyModal">
        <div class="modal-content" id="modal-content">
            <span class="close">&times;</span>
            <div class="logomodal">
                <img class="logo" src="../img/logo.png">
        </div>
        <h3 class="text_form">¡Hola de nuevo!</h3>
        <form action="" onsubmit="validacion_loginJS(); return false;">
            <p class="texto_form">Dirección de correo electrónico</p>
            <input type="email" name="email" id="email" autocomplete="off" autocorrect="off" autocapitalize="off" placeholder="Dirección de correo electrónico" class="input">
            <p class="texto_form">Contraseña</p>
            <input type="password" name="password" id="password" autocomplete="off" autocorrect="off" autocapitalize="off" placeholder="Contraseña" class="input">
            <div class="login_unete">
                <center>
                    <input type="submit" value="Login" class="login">
                    <p class="texto_form">No eres miembro?</p>
                    <button onclick="abrir_formularioJS(); return false;" class="unete">Únete</button>
                    <div class="texto_form" id="confirmacion">
                    </div>
                </center>
            </div>
        </form>
    </div>

    <div id="errores"></div>
    <div id="datos_user"></div>
    

    <div class="modal-content2" id="modal-content2">
        <span class="close">&times;</span>
        <div class="logomodal">
            <img class="logo" src="../img/logo.png">
        </div>
        <h3 class="text_form">Únete y descubre lo mejor de Tripadvisor</h3>
        <form action="" onsubmit="validacion_registroJS(); return false;">
            <p class="texto_form">Nombre</p>
            <input type="text" name="name_reg" id="name_reg" autocomplete="off" autocorrect="off" autocapitalize="off" placeholder="Nombre..." class="input">
            <p class="texto_form">Dirección de correo electrónico</p>
            <input type="email" name="email_reg" id="email_reg" autocomplete="off" autocorrect="off" autocapitalize="off" placeholder="Email..." class="input">
            <p class="texto_form">Contraseña</p>
            <input type = "password" name = "pass_reg" id = "pass_reg" autocomplete="off" autocorrect="off" autocapitalize="off" placeholder="Contraseña" class="input">
            <input type = "hidden" name="type_reg" id="type_reg" value=1>
            <p class="texto_form">Foto de perfil</p>
            <input type="file" name="photo_reg" id="photo_reg" class="input">
            <br>
            <center>
            <input class="registrar" type="submit" value="Registrar">
            <div id="confirmacion_reg">
                <p class="texto_form">¿Ya eres miembro?</p>
                <button onclick="abrir_loginJS(); return false;" class="registrar">Iniciar Sesión</button>
            </div>
            </center>
        </form>
    </div>
    <div id="errores_reg">
    </div>
    </div>
</div>
    <script src="../js/restaurante.js"></script>
</body>
</html>