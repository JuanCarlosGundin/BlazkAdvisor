<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
    <form action="" onsubmit="loginJS(); return false;">
        <input type="email" name="email" id="email" placeholder="email...">
        <br>
        <input type="password" name="password" id="password">password
        <br>
        <input type="submit" value="Login">
    </form>
    <div id="datos_user">Aqui vendran</div>
</body>
<script src="./js/script.js"></script>
</html>