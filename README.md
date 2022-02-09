# BlazkAdvisor
# Projecte 03: Guia restaurants
Creació d'un lloc web que sigui una guia de restaurants de la nostra ciutat.
Hecho por Pol, Juan Carlos y Gerard

## Comenzando 🚀
Para poder utilizar una copia del proyecto operativa en tu máquina local para propósitos de desarrollo y pruebas, usaremos XAMPP para hacer la copia y probar. 
(En el siguiente paso explicaremos como instalar XAMPP). XAMPP nos genera localmente un servidor LAMP fácil de gestionar para desarrollar comodamente.

Además usaremos GitHub como portal de Git y asi llevar un control de versiones de la aplicación web.
Para ello, es necesario crear una cuenta en GitHub y tener un conocimiento básico de gestion de ficheros en tu sistema operativo.


### Pre-requisitos 📋

Comenzaremos instalando XAMPP para desplegar el entorno de desarrollo. Lo descargaremos primero [Windows](https://www.apachefriends.org/xampp-files/8.0.12/xampp-windows-x64-8.0.12-0-VS16-installer.exe) o [MacOS](https://www.apachefriends.org/xampp-files/8.0.12/xampp-osx-8.0.12-0-vm.dmg)

Una vez lo tengamos instalado, hemos de arrancar los servicios desde el panel de control de XAMPP en el apartado Manage Servers si tenemos el software en inglés o Administrar servicios en español. ![img](https://i.gyazo.com/406d2e3c6268130f0c0b0f49dca9393f.png)

Desde este apartado podemos arrancar o parar servicios e incluso configurar las aplicaciones, modificando puertos o incluso ver los logs que dejan estas aplicaciones.

Igual de importante es instalar el controlador de versions Git, para luego combinar con GitHub. [Windows](https://git-scm.com/downloads#:~:text=macOS-,Windows,-Linux/Unix) o [MacOS](https://git-scm.com/download/mac)

### Instalación 🔧

Una vez tengamos los softwares instalados y con los servicios arrancados como explicado anteriormente, hemos de importar el proyecto a nuestro entorno de desarrollo local.

Para ello iremos al directorio htdocs ubicado en la raiz de la aplicación XAMPP, una vez estemos posicionados desde el terminal de GIT en este directorio ejecutamos el siguiente comando

```
git clone https://github.com/JuanCarlosGundin/BlazkAdvisor.git
```
Ahora deberemos implementar en nuestro servidor de BBDD de XAMPP la base de datos del proyecto. Dentro de la carpeta bd que acabmos de importar desde github se encuentran dos archivos. **bd_pr03.sql**, nos permite generar la estructura de la base de datos y **bd_pr03.sql** ejecuta los inserts en la bbdd creada.

Ahora solo irnos a [este enlace](http://localhost/phpmyadmin/) para administrar las bases de datos en XAMPP usando PhpMyAdmin.

En este momento podremos hacer la importacion de dos maneras, podemos copiar el contenido del archivo sql y pegarlo en el campo de texto de SQL o importar directamente el archivo SQL pulsando en la pestaña Importar.
![img](https://i.gyazo.com/ef4852689af26a97e2f57f8490f43330.png)

Primero deberemos importar el archivo de estructuras y seguidamente el archivo de inserts. Una vez lo hayamos hecho tendremos la base de datos insertada en el servidor MySQL de XAMPP

## Despliegue 📦

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

Además para enlazar el sevridor MySQL de XAMPP con nuestro proyecto laravel deberemos modificar el archivo .env.example en función de los parametros que hayamos establecido a la hora de crear el servicio MySQL (puerto) y la base de datos (nombre de la base de datos)

Una vez tengamos el example hecho. Ejecutamos el siguiente comando para usar este archivo como el archivo de configuración.

```
mv .env.example .env
```

Por ultimo debemos ejecutar un comando en la base del proyecto para generar una nueva clave de entorno. El comando es el siguiente

```
php artisan key:generate
```
```

## Construido con 🛠️

_Las herramientas usada en este proyecto han sido 

* [Visual Studio Code](https://code.visualstudio.com/docs) - El editor de codigo usado para generar la BD, PHP y todos los elementos web en JS, CSS y HTML
* [MySQL](https://dev.mysql.com/doc/) - El gestor de base de datos usado
* [PHP](https://www.php.net/docs.php) - Lenguaje de programación basico para la formación del sitio
* [XAMPP](https://www.apachefriends.org/docs/) - Software de virtualización local de servidor LAMP
* [Laravel](https://laravel.com/docs/9.x) - Framework usado construir la pagina web
* [Ajax](https://www.w3schools.com/xml/ajax_intro.asp) - Framework usado construir la pagina web

## Contribuyendo 🖇️

Para contribuir a nuestro proyecto se pueden hacer pull requests sin problemas, que los aceptemos es otra cosa.

## Wiki 📖

Para encontrar mas documentación que en este README, lo cual es dificil. Puedes escribir un mail a gerard.gomez@dispostable.com o 6244.joan23@fje.edu o 100005882.joan23@fje.edu

## Versionado 📌

Usamos [GitHub](https://github.com/) para el versionado. Para todas las versiones disponibles, mira el apartado releases del repositorio en el que estás.

## Autores ✒️

_Menciona a todos aquellos que ayudaron a levantar el proyecto desde sus inicios_

* **Gerard Gómez** - * PHP + Ajax + Controller + HTML * - [gerard.gomez](https://github.com/100007217)
* **Gerard Gómez** - * PHP + Ajax + Controller + HTML * - [gerard.gomez](https://github.com/100007217)
* **Gerard Gómez** - * PHP + Ajax + Controller + HTML * - [gerard.gomez](https://github.com/100007217)

## Licencia 📄

Este proyecto está bajo la Licencia (Creative Commons). Puedes hacer lo que quieras con el codigo del repositorio

## Expresiones de Gratitud 🎁

* Spamea a tus amigos sobre este proyecto 📢
* Invita una cerveza 🍺 o un café ☕

