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
                    $tipo_user = session('tipo');
                    //print_r($username_logged);
                    //echo "Bienvenido: ".$username_logged->nombre_usuario;
                    echo '<button class="bienvenido" ><b>Bienvenido '.$username_logged.'</b></button>';
                    echo '<button class="iniciosesion" onclick="IWantToLogout(); return false;"><b>Logout</b></button>';
                }else{
                    echo '<button  class="iniciosesion" onclick="IWantToLogin(); return false;"><b>Iniciar sesión</b></button>';
                }
            ?>
            <input id="typeUser" type="hidden" value="<?php if(isset($tipo_user)){echo $tipo_user;}else{echo "nada";}?>">
            </div>
        </div>
        <!-- Aqui esta el modal -->
        <div class="modal" id="MyModal">
            <div class="modal-content" id="modal-content">
                <span class="close">&times;</span>
                <div class="logomodal">
                    <img class="logo" src="img/logo.png">
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
                <img class="logo" src="img/logo.png">
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
                <button onclick="desplegable()" class="tiposcomida"><b>Por Precio</b>
                    <div class="iconos">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </button>
                <div id="Dropdown" class="dropdown-content">
                    <ul>
                        <li>
                            <a href="#" onclick="leerJS(1)">
                                <div class="iconos">
                                    <i class="fas fa-star"></i>
                                </div>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#" onclick="leerJS(2)">
                                <div class="iconos">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#" onclick="leerJS(3)">
                                <div class="iconos">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
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
                <!--Aqui seteamos el boton de crear dependiendo del tipo de usuario que seamos-->
                <?php if(isset($tipo_user)){if($tipo_user==1){echo "<button class=\"crear\" onclick=\"crearModalRestaurante(); return false;\"><b>CREAR</b></button>";}}?>
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
    <div class="modal" id="MyModalEditar">
        <div class="modal-content" id="modal-content-editar">
            <span class="close">&times;</span>
            <img src="https://static.tacdn.com/img2/brand_refresh/Tripadvisor_Logo_dark-bg_circle-green_horizontal-lockup_registered_RGB.svg" width="226" height="50" alt="">
            <h1 class="text_form">Editar valores Restaurante</h1>
            
            
            <form action="" onsubmit="validacion_modificadorJS(); return false;">
                <p class="texto_form">Nombre</p>
                <input type="text" name="nombre_mod" id="nombre_mod" placeholder="Nombre..." class="input">
                <p class="texto_form">Tipo Restaurante</p>
                <input list="tipo_mod" class="input">
                    <datalist id="tipo_mod">
                        <option value="Italiana">
                        <option value="Española">
                        <option value="Mexicana">
                        <option value="Arabe">
                        <option value="China">
                    </datalist>
                <p class="texto_form">Localidad</p>
                <input type="text" name="localidad_mod" id="localidad_mod" placeholder="Localidad..." class="input">
                <p class="texto_form">Latitud</p>
                <input type="text" name="latitud_mod" id="latitud_mod" placeholder="Latitud..." class="input">
                <p class="texto_form">Altitud</p>
                <input type="text" name="altitud_mod" id="altitud_mod" placeholder="Altitud..." class="input">
                <p class="texto_form">Dirección de correo electrónico</p>
                <input type="email" name="email_mod" id="email_mod" placeholder="Email..." class="input">
                <p class="texto_form">Telefono</p>
                <input type="text" name="telefono_mod" id="telefono_mod" placeholder="Telefono..." class="input">
                <p class="texto_form">Dieta</p>
                <input type="text" name="dieta_mod" id="dieta_mod" placeholder="Dieta..." class="input">
                <p class="texto_form">Comidas</p>
                <input type="text" name="comidas_mod" id="comidas_mod" placeholder="Comidas..." class="input">
                <p class="texto_form">Descripcion</p>
                <input type="textarea" name="descripcion_mod" id="descripcion_mod" placeholder="Descripicón..." class="input">
                <p class="texto_form">Descripcion larga</p>
                <input type="textarea" name="descripcion_larga_mod" id="descripcion_larga_mod" placeholder="Descripicón larga..." class="input">
                <p class="texto_form">Precio</p>
                <input type="range" name="precio_mod" id="precio_mod" placeholder="Precio..." class="input" max=3 min=1>
                <p class="texto_form">Activo?</p>
                <p class="texto_form">Foto de perfil</p>
                <!--<input type="file" name="photo_mod" id="photo_mod" class="input">-->
                <!--<input type="text" name="activo_mod" id="activo_mod" placeholder="Activo..." class="input">-->
                <label for="activo_mod">Des / Activar</label>
                    <select name="activo_mod" id="activo_mod" data-role="slider">
                        <option value="0">Desactivo</option>
                        <option value="1">Activo</option>
                    </select> 
                <input type="hidden" name="id_mod" id="id_mod" value=1>
        
                <br>
                <center>
                <input class="iniciosesion" type="submit" value="Editar">
                <div id="fallo_validacion">
                </div>
                </center>
            </form>

                
        </div>
        
        <div id="errores_reg"></div>
    </div>
    <!-- INICIO MODAL CREAR RESTAURANTE-->
    <div class="modal" id="MyModalCrear">
        <div class="modal-content" id="modal-content-crear">
            <span class="close">&times;</span>
            <img src="https://static.tacdn.com/img2/brand_refresh/Tripadvisor_Logo_dark-bg_circle-green_horizontal-lockup_registered_RGB.svg" width="226" height="50" alt="">
            <h1 class="text_form">Crear Restaurante</h1>
            
            
            <form action="" onsubmit="validacion_creadorJS(); return false;">
                <p class="texto_form">Nombre</p>
                <input type="text" name="nombre_crear" id="nombre_crear" placeholder="Nombre..." class="input">
                <p class="texto_form">Tipo Restaurante</p>
                <input list="tipos" class="input" id="tipo_crear">
                    <datalist id="tipos">
                        <option value="Italiana">
                        <option value="Española">
                        <option value="Mexicana">
                        <option value="Arabe">
                        <option value="China">
                    </datalist>
                <p class="texto_form">Localidad</p>
                <input type="text" name="localidad_crear" id="localidad_crear" placeholder="Localidad..." class="input">
                <p class="texto_form">Latitud</p>
                <input type="text" name="latitud_crear" id="latitud_crear" placeholder="Latitud..." class="input">
                <p class="texto_form">Altitud</p>
                <input type="text" name="altitud_crear" id="altitud_crear" placeholder="Altitud..." class="input">
                <p class="texto_form">Dirección de correo electrónico</p>
                <input type="email" name="email_crear" id="email_crear" placeholder="Email..." class="input">
                <p class="texto_form">Telefono</p>
                <input type="text" name="telefono_crear" id="telefono_crear" placeholder="Telefono..." class="input">
                <p class="texto_form">Dieta</p>
                <input type="text" name="dieta_crear" id="dieta_crear" placeholder="Dieta..." class="input">
                <p class="texto_form">Comidas</p>
                <input type="text" name="comidas_crear" id="comidas_crear" placeholder="Comidas..." class="input">
                <p class="texto_form">Descripcion</p>
                <input type="textarea" name="descripcion_crear" id="descripcion_crear" placeholder="Descripicón..." class="input">
                <p class="texto_form">Descripcion larga</p>
                <input type="textarea" name="descripcion_larga_crear" id="descripcion_larga_crear" placeholder="Descripicón larga..." class="input">
                <p class="texto_form">Precio</p>
                <input type="range" name="precio_crear" id="precio_crear" placeholder="Precio..." class="input" max=3 min=1>
                <input type="file" name="foto_crear" id="foto_crear" class="input">
                <input type="file" name="foto_crear2" id="foto_crear2" class="input">
                <input type="file" name="foto_crear3" id="foto_crear3" class="input">
                <input type="file" name="foto_crear4" id="foto_crear4" class="input">
                <input type="file" name="foto_crear5" id="foto_crear5" class="input">
                <p class="texto_form">Activo?</p>
                <!--<input type="text" name="activo_crear" id="activo_crear" placeholder="Activo..." class="input">-->
                <label for="activo_crear">Des / Activar</label>
                    <select name="activo_crear" id="activo_crear" data-role="slider">
                        <option value="0">Desactivo</option>
                        <option value="1">Activo</option>
                    </select> 
        
                <br>
                <center>
                <input class="iniciosesion" type="submit" value="Crear">
                <div id="creacion_errores">
                </div>
                </center>
            </form>

                
        </div>
    </div>
    <!-- FINAL MODAL CREAR RESTAURANTE-->
</body>
    <script src="js/principal.js"></script>
</body>
</html>