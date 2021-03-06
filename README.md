# BlazkAdvisor
# Projecte 03: Guia restaurants
Creaci贸 d'un lloc web que sigui una guia de restaurants de la nostra ciutat.
Hecho por Pol, Juan Carlos y Gerard

## Comenzando 馃殌
Para poder utilizar una copia del proyecto operativa en tu m谩quina local para prop贸sitos de desarrollo y pruebas, usaremos XAMPP para hacer la copia y probar. 
(En el siguiente paso explicaremos como instalar XAMPP). XAMPP nos genera localmente un servidor LAMP f谩cil de gestionar para desarrollar comodamente.

Adem谩s usaremos GitHub como portal de Git y asi llevar un control de versiones de la aplicaci贸n web.
Para ello, es necesario crear una cuenta en GitHub y tener un conocimiento b谩sico de gestion de ficheros en tu sistema operativo.


### Pre-requisitos 馃搵

Comenzaremos instalando XAMPP para desplegar el entorno de desarrollo. Lo descargaremos primero [Windows](https://www.apachefriends.org/xampp-files/8.0.12/xampp-windows-x64-8.0.12-0-VS16-installer.exe) o [MacOS](https://www.apachefriends.org/xampp-files/8.0.12/xampp-osx-8.0.12-0-vm.dmg)

Una vez lo tengamos instalado, hemos de arrancar los servicios desde el panel de control de XAMPP en el apartado Manage Servers si tenemos el software en ingl茅s o Administrar servicios en espa帽ol. ![img](https://i.gyazo.com/406d2e3c6268130f0c0b0f49dca9393f.png)

Desde este apartado podemos arrancar o parar servicios e incluso configurar las aplicaciones, modificando puertos o incluso ver los logs que dejan estas aplicaciones.

Igual de importante es instalar el controlador de versions Git, para luego combinar con GitHub. [Windows](https://git-scm.com/downloads#:~:text=macOS-,Windows,-Linux/Unix) o [MacOS](https://git-scm.com/download/mac)

### Instalaci贸n 馃敡

Una vez tengamos los softwares instalados y con los servicios arrancados como explicado anteriormente, hemos de importar el proyecto a nuestro entorno de desarrollo local.

Para ello iremos al directorio htdocs ubicado en la raiz de la aplicaci贸n XAMPP, una vez estemos posicionados desde el terminal de GIT en este directorio ejecutamos el siguiente comando

```
git clone https://github.com/JuanCarlosGundin/BlazkAdvisor.git
```
Ahora deberemos implementar en nuestro servidor de BBDD de XAMPP la base de datos del proyecto.

Ahora solo irnos a [este enlace](http://localhost/phpmyadmin/) para administrar las bases de datos en XAMPP usando PhpMyAdmin.

Deberemos crear una bbdd y luego usar el archivo sql ubicado en /backupdb  y pulsar el bot贸n importar una vez dentro de la BD.
![img](https://i.gyazo.com/a78485d38c6a1a0cc68a04bd3c4e8a4e.png)
Una vez lo hayamos hecho tendremos la base de datos insertada en el servidor MySQL de XAMPP

## Despliegue 馃摝

Una vez hayamos implementado la BBDD en nuestro servidor MySQL en XAMPP y hayamos clonado la estructura de ficheros en el directorio del proyecto. Deberemos hacer ajustes de Laravel usando el terminal para que el proyecto se despliegue correctamente. En primer lugar ejecutamos el siguiente comando.

```
php artisan storage:link
```
Con esto habremos hecho un softlink de la carpeta storage en public, ahora deberemos crear la carpeta img, para manetener un orden en la estructura de archivos que subamos al servidor. Para crearla, desde la raiz del proyecto hacemos:

```
mkdir public/storage/img
```

Ya tenemos el proyecto preparado para trabajar con fotos en servidor local. Ahora instalaremos dependencias necesarias de Laravel para que nos funcione el proyecto. En caso de no funcionar solo con el primer comando, deberemos ejecutar el segundo.
```
composer install
composer update
```

Adem谩s para enlazar el sevridor MySQL de XAMPP con nuestro proyecto laravel deberemos modificar el archivo .env.example en funci贸n de los parametros que hayamos establecido a la hora de crear el servicio MySQL (puerto) y la base de datos (nombre de la base de datos)

Una vez tengamos el example hecho. Ejecutamos el siguiente comando para usar este archivo como el archivo de configuraci贸n.

```
mv .env.example .env
```

Por ultimo debemos ejecutar un comando en la base del proyecto para generar una nueva clave de entorno. El comando es el siguiente

```
php artisan key:generate
```
```

## Construido con 馃洜锔?

_Las herramientas usada en este proyecto han sido 

* [Visual Studio Code](https://code.visualstudio.com/docs) - El editor de codigo usado para generar la BD, PHP y todos los elementos web en JS, CSS y HTML
* [MySQL](https://dev.mysql.com/doc/) - El gestor de base de datos usado
* [PHP](https://www.php.net/docs.php) - Lenguaje de programaci贸n basico para la formaci贸n del sitio
* [XAMPP](https://www.apachefriends.org/docs/) - Software de virtualizaci贸n local de servidor LAMP
* [Laravel](https://laravel.com/docs/9.x) - Framework usado construir la pagina web
* [Ajax](https://www.w3schools.com/xml/ajax_intro.asp) - Framework usado construir la pagina web

## Contribuyendo 馃枃锔?

Para contribuir a nuestro proyecto se pueden hacer pull requests sin problemas, que los aceptemos es otra cosa.

## Wiki 馃摉

Para encontrar mas documentaci贸n que en este README, lo cual es dificil. Puedes escribir un mail a gerard.gomez@dispostable.com o 6244.joan23@fje.edu o 100005882.joan23@fje.edu

## Versionado 馃搶

Usamos [GitHub](https://github.com/) para el versionado. Para todas las versiones disponibles, mira el apartado releases del repositorio en el que est谩s.

## Autores 鉁掞笍

_Menciona a todos aquellos que ayudaron a levantar el proyecto desde sus inicios_

* **Gerard G贸mez** - * PHP + Ajax + Controller + HTML * - [gerard.gomez](https://github.com/100007217)
* **Pol Garc铆a** - * PHP + JS + CSS + HTML * - [pol.garcia](https://github.com/PolGarcia3)
* **Juan Carlos Gund铆n** - * PHP + Ajax + Controller + HTML * - [juan.carlos.gundin](https://github.com/JuanCarlosGundin)

## Licencia 馃搫

Este proyecto est谩 bajo la Licencia (Creative Commons). Puedes hacer lo que quieras con el codigo del repositorio

## Expresiones de Gratitud 馃巵

* Spamea a tus amigos sobre este proyecto 馃摙
* Invita una cerveza 馃嵑 o un caf茅 鈽?
