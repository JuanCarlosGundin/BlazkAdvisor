<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<<<<<<< HEAD
    <title>INICIO</title>
=======
<<<<<<<< HEAD:resources/views/index.blade.php
    <title>ADMIN</title>
========
    <title>INICIO</title>
>>>>>>>> origin/pol:resources/views/login.blade.php
>>>>>>> origin/pol
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script defer src="css/fontawesome/js/all.js"></script>

</head>
<body>
    <header>
        <div class="header">
            <div class="logo">
                    <img class="logoimagen" src="img/logo.png">
            </div>
            <div class="inicio">
                <?php
                    session_start();
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
    </header>
    <!-- Aqui esta el modal -->
    <div class="modal" id="MyModal">
        <div class="modal-content" id="modal-content">
            <span class="close">&times;</span>
<<<<<<< HEAD
            <img src="https://static.tacdn.com/img2/brand_refresh/Tripadvisor_Logo_dark-bg_circle-green_horizontal-lockup_registered_RGB.svg" width="226" height="50" alt="">
            <h1 class="text_form">¡Hola de nuevo!</h1>
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
=======
            <img src="img/logo.png" class="modallogo" alt="">
            <br>
            <br>
            <h1 class="text_form">¡Hola de nuevo!</h1>
            <form action="" onsubmit="validacion_loginJS(); return false;">
                <p class="texto_form">Dirección de correo electrónico</p>
                <input type="email" name="email" id="email" autocomplete="off" autocorrect="off" autocapitalize="off" placeholder="Dirección de correo electrónico" class="input">
                <br>
                <p class="texto_form">Contraseña</p>
                <input type="password" name="password" id="password" autocomplete="off" autocorrect="off" autocapitalize="off" placeholder="Contraseña" class="input">
                <br>
                <a href="" class="olvido_contrasena">¿Olvidaste la contraseña?</a>
                <br>
                <div class="login">
                    <input type="submit" value="Login" class="iniciosesion">
                </div>
                <p class="no_miembro">No eres miembro?</p>
                <br>
                <div class="unete">
                    <button onclick="abrir_formularioJS(); return false;" class="iniciosesion">Únete</button>
                </div>
                <div id="confirmacion">
                </div>
>>>>>>> origin/pol
            </form>
            
        </div>

        <div id="errores"></div>
        <div id="datos_user"></div>

        <div class="modal-content" id="modal-content2">
            <span class="close">&times;</span>
            <img src="https://static.tacdn.com/img2/brand_refresh/Tripadvisor_Logo_dark-bg_circle-green_horizontal-lockup_registered_RGB.svg" width="226" height="50" alt="">
            <h1 class="text_form">Únete y descubre lo mejor de Tripadvisor</h1>
            
            
            <form action="" onsubmit="validacion_registroJS(); return false;">
                <p class="texto_form">Nombre</p>
<<<<<<< HEAD
                <input type="text" name="name_reg" id="name_reg" placeholder="Nombre..." class="input">
                <p class="texto_form">Dirección de correo electrónico</p>
                <input type="email" name="email_reg" id="email_reg" placeholder="Email..." class="input">
                <p class="texto_form">Contraseña</p>
                <input type = "password" name = "pass_reg" id = "pass_reg" placeholder="Contraseña" class="input">
=======
                <input type="text" name="name_reg" id="name_reg" autocomplete="off" autocorrect="off" autocapitalize="off" placeholder="Nombre..." class="input">
                <p class="texto_form">Dirección de correo electrónico</p>
                <input type="email" name="email_reg" id="email_reg" autocomplete="off" autocorrect="off" autocapitalize="off" placeholder="Email..." class="input">
                <p class="texto_form">Contraseña</p>
                <input type = "password" name = "pass_reg" id = "pass_reg" autocomplete="off" autocorrect="off" autocapitalize="off" placeholder="Contraseña" class="input">
>>>>>>> origin/pol
                <input type = "hidden" name="type_reg" id="type_reg" value=1>
                <p class="texto_form">Foto de perfil</p>
                <input type="file" name="photo_reg" id="photo_reg" class="input">
                <br>
                <center>
                <input class="iniciosesion" type="submit" value="Registrar">
                <div id="confirmacion_reg">
                    <p class="texto_form">¿Ya eres miemnbro?</p>
                    <button onclick="abrir_loginJS(); return false;" class="iniciosesion">Inicia Sesión</button>
<<<<<<< HEAD
                    <p> Al continuar, declaras tu conformidad con nuestras Condiciones de uso y confirmas que has leído nuestra Declaración de privacidad y cookies.</p>
=======
>>>>>>> origin/pol
                </div>
                </center>
            </form>

                
        </div>
        
        <div id="errores_reg"></div>
    </div>
        </div>
    </header>
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
                    <div class="iconos">
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
<<<<<<< HEAD
        <div class="restaurantes">
            <h1>Restaurantes</h1>
            <button onclick="crearModalRestaurante(); return false;" class="iniciosesion">Crear Restaurante</button>
            <div id="creacion_bien"></div>
=======
        <div class="topcontent">
            <div class="titulorestaurante">
                <h1>Restaurantes</h1>
                <h4>Los mejores restaurantes de la ciudad</h4>
            </div>
            <div class="inicio">
                <button class="crear" onclick="(); return false;"><b>CREAR</b></button>
            </div>
        </div>        
        <div class="restaurantes">
<<<<<<<< HEAD:resources/views/index.blade.php
            <?php

            ?>
            @foreach($listarestaurantes as $restaurante)
            <div class="restaurante">
                <button class="resbtn">
                        <div class="imagenres">{{$restaurante->imagen_restaurante}}</div>
                        <div class="titulo">{{$restaurante->nombre_restaurante}}</div>
                        <div class="estrellas">{{$restaurante->puntuacion}}</div>
                        <div class="desc">{{$restaurante->descripcion_restaurante}}</div>
                        <form action="{{url('modificar/'.$restaurante->id)}}" method="GET">
                            <button class="modificar" onclick="editarModalRestaurante(1,'Tio Bigotes', '2', 'muy cuco','joselito@a.com','2','Hospi','italiano','ninguna especial','patats',1,33); return false;">MODIFICAR</button>
                        </form>
                        <form action="{{url('eliminar/'.$restaurante->id)}}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                            <button class="eliminar" onclick="(); return false;"><b>ELIMINAR</b></button>
                        </form>
                </button>
========
            <h1>Restaurantes</h1>
>>>>>>> origin/pol
            <h4>Los mejores restaurantes de la ciudad</h4>
                <div class="restaurante">
                    <button class="resbtn">
                            <div>
<<<<<<< HEAD
                                <img class="imagenres" src="img/2.jpg"><br>
                                
                                <button onclick="editarModalRestaurante(1,'Tio Bigotes', '2', 'muy cuco','joselito@a.com','2','Hospi','italiano','ninguna especial','patats',1,33,'dexcripcion larga muestra','987654321'); return false;">EDITAR</button>
                                <!-- INICIO DESACTIVAR RESTAURANTE-->
                                <button onclick="desactivarActivarRestaurante(1); return false;">DESACTIVAR</button>
                                <div id="desactivar_errores"></div>
                                <!-- FINAL DESACTIVAR RESTAURANTE-->
                                <div id="edicion_errores"></div>
                            </div>
                            <!-- AQUI VIENEN MAS REST -->
                </div>
            </div>
        </div>
    </div>

    <!-- INICIO MODAL EDITAR RESTAURANTE-->
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
    <!-- FINAL MODAL EDITAR RESTAURANTE-->

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


=======
                                <img class="imagenres" src="img/2.jpg">
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
                            <div>
                                <img class="imagenres" src="img/2.jpg">
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
                            <div>
                                <img class="imagenres" src="img/2.jpg">
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
                            <div>
                                <img class="imagenres" src="img/2.jpg">
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
                            <div>
                                <img class="imagenres" src="img/2.jpg">
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
                            <div>
                                <img class="imagenres" src="img/2.jpg">
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
                            <div>
                                <img class="imagenres" src="img/2.jpg">
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
                            <div>
                                <img class="imagenres" src="img/2.jpg">
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
                            <div>
                                <img class="imagenres" src="img/2.jpg">
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
                            <div>
                                <img class="imagenres" src="img/2.jpg">
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
                            <div>
                                <img class="imagenres" src="img/2.jpg">
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
                            <div>
                                <img class="imagenres" src="img/2.jpg">
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
>>>>>>>> origin/pol:resources/views/login.blade.php
            </div>
            @endforeach
        </div>
    </div>
>>>>>>> origin/pol
    <footer>
        <div class="footer">
            <p>Creado por Juan Carlos, Pol y Gerard</p>
        </div>
    </footer>
</body>
<script src="./js/script.js"></script>

</html>