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
            <div class="logo">
                    <img class="logoimagen" src="../img/logo.png">
            </div>
            <div class="inicio">
                <button class="iniciosesion"><b>Iniciar sesión</b></button>
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
                    <img class="foto1" src="../img/{{$restaurante->url_foto_principal}}">
                </div>
                <div class="fotosecundaria">
                    <img class="foto2" src="../img/2.jpg">
                    <img class="foto2" src="../img/2.jpg">
                    <img class="foto2" src="../img/2.jpg">
                    <img class="foto2" src="../img/2.jpg">
                </div>
            </div>
        </div>
        <div class="cuadros">
            <div class="detalles">
                <h1>TEXTO DE MUESTRA</h1>
                <p class="descripcion">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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
                <h1>TEXTO DE MUESTRA</h1>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer">
            <p>Creado por Juan Carlos, Pol y Gerard</p>
        </div>
    </footer>
    <script src="../js/restaurante.js"></script>
</body>
</html>