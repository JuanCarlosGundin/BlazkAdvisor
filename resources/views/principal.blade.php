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
                    <img class="logoimagen" src="img/logo.png">
            </div>
            <div class="inicio">
                <button class="iniciosesion"><b>Iniciar sesión</b></button>
            </div>
        </div>
    </header>
    <div class="main">
        <div class="tipos">
            <div class="botonestipos">
                <button class="tiposcomida" onclick="leerJS('Italiana');"><b>Comida Italiana</b>
                    <div class="iconos">
                        <i class="fas fa-pizza-slice"></i>
                    </div>
                </button>
            </div>
            <div class="botonestipos">
                <button class="tiposcomida" onclick="leerJS('Española');"><b>Comida Española</b>
                    <div class="iconos">
                        <i class="fas fa-utensils"></i>
                    </div>
                </button>
            </div>
            <div class="botonestipos">
                <button class="tiposcomida" onclick="leerJS('Mexicana');"><b>Comida Mexicana</b>
                    <div class="iconos">
                        <i class="fas fa-pepper-hot"></i>
                    </div>
                </button>
            </div>
            <div class="botonestipos">
                <button class="tiposcomida" onclick="leerJS('Arabe');"><b>Comida arabe</b>
                    <div class="iconos">
                        <i class="fas fa-mosque"></i>
                    </div>
                </button>
            </div>
            <div class="botonestipos">
                <button class="tiposcomida" onclick="leerJS('China');"><b>Comida china</b><div class="iconos">
                    <i class="far fa-star"></i>
                </div>
            </button>
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
        <div class="restaurantes">
            <h1>Restaurantes</h1>
            <h4>Los mejores restaurantes de la ciudad</h4>
                <div id="tabla"class="restaurante">
                </div>
            </div>
        </div>
    </div>
    <script src="js/principal.js"></script>
</body>
</html>