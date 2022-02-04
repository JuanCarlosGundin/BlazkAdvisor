<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
        session_start();
        if (session('user')) {
            if (session('tipo')==1) {
                echo "You are raso";
            }else{
                echo "You are admin";
            }
            $username_logged = session('user');
            //print_r($username_logged);
            //echo "Bienvenido: ".$username_logged->nombre_usuario;
            echo "Bienvenido: ".$username_logged;
            echo '<button onclick="IWantToLogout(); return false;">Logout</button>';
        }else{
            echo '<button onclick="IWantToLogin(); return false;">Iniciar sesión</button>';
        }
        ?>
    </div>

    <div id="form_login">
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

    <div id="form">
        <form action="" onsubmit="validacion_registroJS(); return false;"><input type="text" name="name_reg" id="name_reg" placeholder="Nombre...">
            <br><input type="email" name="email_reg" id="email_reg" placeholder="Email..."><br><input type = "password" name = "pass_reg" id = "pass_reg" placeholder="password">
            <input type = "hidden" name="type_reg" id="type_reg" value=1><br><input type="file" name="photo_reg" id="photo_reg">
            <br><input type="submit" value="Registrar"></form>
    </div>
    
    <div id="errores_reg"></div>
</body>
<script src="./js/script.js"></script>
</html>