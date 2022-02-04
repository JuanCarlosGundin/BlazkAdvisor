<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script defer src="css/fontawesome/js/all.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <!-- Botones de inicio de sesion -->
        <div class="header">
            <div class="logo">
                    <img class="logoimagen" src="img/logo.png">
            </div>
            <!-- Inicio de sesión -->
            <div class="inicio">
                <?php
                    session_start();
                    if (session('user')) {
                        if (session('tipo')==1) {
                            //POR AQUI VENGO SI SOY USER NORMAL
                        }else{
                            //POR AQUI VENGO SI SOY ADMIN
                        }
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
    </header>
    <!-- Aqui esta el modal -->
    <div class="modal" id="MyModal">
        MOdal padre
        <div id="modal-content">
            <form action="" onsubmit="validacion_loginJS(); return false;">
                <input type="email" name="email" id="email" placeholder="email...">
                <br>
                <input type="password" name="password" id="password">password
                <br>
                <input type="submit" value="Login">
                
            </form>
            <button onclick="abrir_formularioJS(); return false;">Me quiero registrar</button>
        </div>

        <div id="errores"></div>
        <div id="datos_user"></div>

        <div id="modal-content2">
            <form action="" onsubmit="validacion_registroJS(); return false;"><input type="text" name="name_reg" id="name_reg" placeholder="Nombre...">
                <br><input type="email" name="email_reg" id="email_reg" placeholder="Email..."><br><input type = "password" name = "pass_reg" id = "pass_reg" placeholder="password">
                <input type = "hidden" name="type_reg" id="type_reg" value=1><br><input type="file" name="photo_reg" id="photo_reg">
                <br><input type="submit" value="Registrar"></form>
        </div>
        
        <div id="errores_reg"></div>
    </div>
    <!-- Hasta aqui -->
    

    <div class="main">
        <div class="tipos">
            <div class="botonestipos">
                <button class="tiposcomida"><b>Comida Italiana</b>
                    <div class="iconos">
                        <i class="fas fa-pizza-slice"></i>
                    </div>
                </button>
            </div>
            <div class="botonestipos">
                <button class="tiposcomida"><b>Comida Española</b>
                    <div class="iconos">
                        <i class="fas fa-utensils"></i>
                    </div>
                </button>
            </div>
            <div class="botonestipos">
                <button class="tiposcomida"><b>Comida Mexicana</b>
                    <div class="iconos">
                        <i class="fas fa-pepper-hot"></i>
                    </div>
                </button>
            </div>
            <div class="botonestipos">
                <button class="tiposcomida"><b>Comida arabe</b>
                    <div class="iconos">
                        <i class="fas fa-mosque"></i>
                    </div>
                </button>
            </div>
            <div class="botonestipos">
                <button class="tiposcomida"><b>Comida china</b><div class="iconos">
                    <i class="far fa-star"></i>
                </div>
            </button>
            </div>
        </div>
        <div class="filtro">
            <div class="imagenfiltro">
                <div class="filtroinput">
                    <i class="fas fa-search lupa"></i>
                    <input class="input1" type="text" autocomplete="off" autocorrect="off" autocapitalize="off" placeholder="¿Donde quieres comer?">
                </div>
            </div>
        </div>
        <div class="restaurantes">
            <h1>Restaurantes</h1>
            <h4>Los mejores restaurantes de la ciudad</h4>
                <div class="restaurante">
                        <button class="resbtn">
                            <div class="imagen">
                                <p>IMAGEN</p>
                            </div>
                            <div class="titulo">
                                <p>TITULO DE MUESTRA</p>
                            </div>
                            <div class="estrellas">
                                <p>ESTRELLAS</p>
                            </div>
                            <div class="desc">
                                <p>DESCRIPCION</p>
                            </div>
                        </button>
                        <button class="resbtn">
                            <div class="imagen">
                                <p>IMAGEN</p>
                            </div>
                            <div class="titulo">
                                <p>TITULO DE MUESTRA</p>
                            </div>
                            <div class="estrellas">
                                <p>ESTRELLAS</p>
                            </div>
                            <div class="desc">
                                <p>DESCRIPCION</p>
                            </div>
                        </button>
                        <button class="resbtn">
                            <div class="imagen">
                                <p>IMAGEN</p>
                            </div>
                            <div class="titulo">
                                <p>TITULO DE MUESTRA</p>
                            </div>
                            <div class="estrellas">
                                <p>ESTRELLAS</p>
                            </div>
                            <div class="desc">
                                <p>DESCRIPCION</p>
                            </div>
                        </button>
                        <button class="resbtn">
                            <div class="imagen">
                                <p>IMAGEN</p>
                            </div>
                            <div class="titulo">
                                <p>TITULO DE MUESTRA</p>
                            </div>
                            <div class="estrellas">
                                <p>ESTRELLAS</p>
                            </div>
                            <div class="desc">
                                <p>DESCRIPCION</p>
                            </div>
                        </button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./js/script.js"></script>
</html>