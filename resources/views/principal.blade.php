<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INICIO</title>    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script defer src="css/fontawesome/js/all.js"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
</head>
<body>
    <header>
        <div class="header">
            <div class="logo">
                <img class="logoimagen" src="img/logo.png" >
            </div>
            <div class="inicio">
                <?php
                if (session('user')) {
                    $username_logged = session('user');
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
        <!-- Aqui esta el modal -->
    <div class="modal" id="MyModal">
        <div class="modal-content" id="modal-content">
            <span class="close">&times;</span>
            <img src="https://static.tacdn.com/img2/brand_refresh/Tripadvisor_Logo_dark-bg_circle-green_horizontal-lockup_registered_RGB.svg" width="226" height="50" alt="">
            <h3 class="text_form">¡Hola de nuevo!</h3>
            <form action="" onsubmit="validacion_loginJS(); return false;">
                <p class="texto_form">Dirección de correo electrónico</p><br>
                <input type="email" name="email" id="email" placeholder="Dirección de correo electrónico" class="input">
                <br>
                <p class="texto_form">Contraseña</p><br>
                <input type="password" name="password" id="password" placeholder="Contraseña" class="input">
                <br>
                <a href="" class="olvido_contrasena">¿Olvidaste la contraseña?</a>
                <br>
                <center>
                <input type="submit" value="Login" class="iniciosesion">
                <p class="texto_form">No eres miembro?</p><br>
                <button onclick="abrir_formularioJS(); return false;" class="iniciosesion">Únete</button>
                <div id="confirmacion">
                </div>
                </center>
            </form>
            
        </div>

        <div id="errores"></div>
        <div id="datos_user"></div>

        <div class="modal-content" id="modal-content2">
            <span class="close">&times;</span>
            <img src="https://static.tacdn.com/img2/brand_refresh/Tripadvisor_Logo_dark-bg_circle-green_horizontal-lockup_registered_RGB.svg" width="226" height="50" alt="">
            <h3 class="text_form">Únete y descubre lo mejor de Tripadvisor</h3>
            
            
            <form action="" onsubmit="validacion_registroJS(); return false;">
                <p class="texto_form">Nombre</p>
                <input type="text" name="name_reg" id="name_reg" placeholder="Nombre..." class="input">
                <p class="texto_form">Dirección de correo electrónico</p>
                <input type="email" name="email_reg" id="email_reg" placeholder="Email..." class="input">
                <p class="texto_form">Contraseña</p>
                <input type = "password" name = "pass_reg" id = "pass_reg" placeholder="Contraseña" class="input">
                <input type = "hidden" name="type_reg" id="type_reg" value=1>
                <p class="texto_form">Foto de perfil</p>
                <input type="file" name="photo_reg" id="photo_reg" class="input">
                <br>
                <center>
                <input class="iniciosesion" type="submit" value="Registrar">
                <div id="confirmacion_reg">
                    <p class="texto_form">¿Ya eres miemnbro?</p>
                    <button onclick="abrir_loginJS(); return false;" class="iniciosesion">Inicia Sesión</button>
                </div>
                </center>
            </form>
        </div>
        <div id="errores_reg">
        </div>
        </div>
    </div>
    </header>
    <div class="main">
        <div class="tipos">
            <div class="botonestipos">
                <button class="tiposcomida" onclick="leerJS('Italiana');"><b>Italiana</b>
                    <div class="iconos">
                        <i class="fas fa-pizza-slice"></i>
                    </div>
                </button>
            </div>
            <div class="botonestipos">
                <button class="tiposcomida" onclick="leerJS('Española');"><b>Española</b>
                    <div class="iconos">
                        <i class="fas fa-utensils"></i>
                    </div>
                </button>
            </div>
            <div class="botonestipos">
                <button class="tiposcomida" onclick="leerJS('Mexicana');"><b>Mexicana</b>
                    <div class="iconos">
                        <i class="fas fa-pepper-hot"></i>
                    </div>
                </button>
            </div>
            <div class="botonestipos">
                <button class="tiposcomida" onclick="leerJS('Arabe');"><b>Arabe</b>
                    <div class="iconos">
                        <i class="fas fa-mosque"></i>
                    </div>
                </button>
            </div>
            <div class="botonestipos">
                <button class="tiposcomida" onclick="leerJS('China');"><b>China</b>
                    <div class="iconos">
                        <i class="far fa-star"></i>
                    </div>
                </button>
            </div>
            <div class="botonestipos">
                <button class="tiposcomida" data-toggle="dropdown" onclick=""><b>Mejor valorados</b>
                </button>
                <ul role="menu">
                    <li><a href="#">Acción #1</a></li>
                    <li><a href="#">Acción #2</a></li>
                    <li><a href="#">Acción #3</a></li>
                    <li><a href="#">Acción #4</a></li>
                </ul>
            </div>
        </div>
        <div class="filtro">
            <div class="imagenfiltro">
                <div class="filtroinput">
                    <i class="fas fa-search lupa"></i>
                    <input  id="filtro" onkeyup="leerJS(0)" class="input1" type="text" autocomplete="off" autocorrect="off" autocapitalize="off" placeholder="¿Donde quieres comer?">
                </div>
            </div>
        </div>
        <div class="topcontent">
            <div class="titulorestaurante">
                <h1>Restaurantes</h1>
                <h4>Los mejores restaurantes de la ciudad</h4>
            </div>
            <div class="inicio">
                <button class="crear" onclick="(); return false;"><b>CREAR</b></button>
            </div>
        </div>  
        <div id="tabla" class="restaurantes">
        </div>
    </div>
    <footer>
        <div class="footer">
            <p>Creado por Juan Carlos, Pol y Gerard</p>
        </div>
    </footer>
</body>
    <script src="js/principal.js"></script>
</body>
</html>