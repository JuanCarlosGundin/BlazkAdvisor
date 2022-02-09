# ABP-Inscripcion
Inscripción de voluntarios en eventos benéficos
Hecho por ALfredo y Gerard

## Comenzando 🚀
Para obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas, usaremos XAMPP para hacer la copia y probar. 
(En el siguiente paso explicaremos como instalar XAMPP). XAMPP nos genera localmente un sevridor LAMP fácil de gestionar para desarrollar comodamente.

Además usaremos GitHub como portal de Git y asi llevar un control de versiones de la aplicación web.
Para ello, es necesario crear una cuenta en GitHub y tener un conocimiento básico de gestion de ficheros en tu sistema operativo.


### Pre-requisitos 📋

Comenzaremos instalando XAMPP para desplegar el entorno de desarrollo. Lo descargaremos primero [Windows](https://www.apachefriends.org/xampp-files/8.0.12/xampp-windows-x64-8.0.12-0-VS16-installer.exe) o [MacOS](https://www.apachefriends.org/xampp-files/8.0.12/xampp-osx-8.0.12-0-vm.dmg)

Una vez lo tengamos instalado, hemos de arrancar los servicios desde el panel de control de XAMPP en el apartado Manage Servers si tenemos el software en inglés o Administrar servicios en español. ![img](https://i.gyazo.com/406d2e3c6268130f0c0b0f49dca9393f.png)

Desde este apartado podemos arrancar o parar servicios e incluso configurar las aplicaciones, modificando puertos o incluso ver los logs que dejan estas aplicaciones.

Igual de importante es instalar el controlador de versions Git, para luego combinar con GitHub. [Windows](https://git-scm.com/downloads#:~:text=macOS-,Windows,-Linux/Unix) o [MacOS](https://git-scm.com/download/mac)

### Instalación 🔧

Una vez tengamos los softwares instalados y con los servicios arrancados como explicado anteriormente, hemos de importar el proyecto a nuestro entorno de desarrollo local.

Para ello iremos al directorio htdocs hubicaod en la raiz de la aplicación XAMPP, una vez estemos posicionados desde el terminal de GIT en este directorio ejecutamos el siguiente comando

```
git clone https://github.com/100007217/ABP-Inscripcion.git
```
Ahora deberemos implementar en nuestro servidor de BBDD de XAMPP la base de datos del proyecto. Dentro de la carpeta bd que acabmos de importar desde github se encuentran dos archivos. **bd_bar.sql**, nos permite generar la estructura de la base de datos y **bd_bar_inserts.sql** ejecuta los inserts en la bbdd creada.

Ahora solo irnos a [este enlace](http://localhost/phpmyadmin/) para administrar las bases de datos en XAMPP usando PhpMyAdmin.

En este momento podremos hacer la importacion de dos maneras, podemos copiar el contenido del archivo sql y pegarlo en el campo de texto de SQL o importar directamente el archivo SQL pulsando en la pestaña Importar.
![img](https://i.gyazo.com/ef4852689af26a97e2f57f8490f43330.png)

Primero deberemos importar el archivo de estructuras y seguidamente el archivo de inserts. Una vez lo hayamos hecho tendremos la base de datos insertada en el servidor MySQL de XAMPP

## Despliegue 📦

_Ahora desplegaremos el sitio web sobre una pagina de hosting como 000webhost, la cual permite tener un servidor LAMP de manera gratuita con algunas limitaciones.

Una vez hayamos creado el sitio web desde el Wizard que ofrece 000Webhost, nos iremos a la herramienta "File Manager" dentro del sitio web.
Ahora iremos al apartado "public_html\" y depslegaremos todos los archivos que hayamos clonado desde el GitHub. Este directorio actua como la carpeta htdocs en XAMPP que hemos visto anteriormente.
![img](https://i.gyazo.com/9d4eaaf2409b16aa2b5161bf8f0e4274.png)


Una vez hayamos subido los archivos del repositorio, implementaremos la bd en el servidor usando la herramienta "Database Manager", aqui crearemos la base de datos.
¡¡IMPORTANTE!! A la hora de crear la base de datos se generará un nombre y un usuario, que serán importantes más adelante para configurar la conexión a la bd, así como el host. 

![img](https://i.gyazo.com/232e6e0ffb8a23a3a9335184f42bc189.png)

Ahora procederemos a importar la base de datos, el gestor de la bbdd es PHPMyAdmin con lo cual podemos ver el apartado anterior para ver como desplegarla.

Una vez hayamos importado la bbdd, debemos modificar el archivo services/config.php y aqui ingresaremos los datos obtenidos al generar la bd.
![img](https://i.gyazo.com/b21498a3e849d49fcc40c0e454952066.png)


Aqui tienes el enlace al hosting creado por mi, se debería ver igual [enlace](https://morfeo21.000webhostapp.com/)

## Construido con 🛠️

_Las herramientas usada en este proyecto han sido 

* [Visual Studio Code](https://code.visualstudio.com/docs) - El editor de codigo usado para generar la BD, PHP y todos los elementos web en JS, CSS y HTML
* [MySQL](https://dev.mysql.com/doc/) - El gestor de base de datos usado
* [PHP](https://www.php.net/docs.php) - Lenguaje de programación basico para la formación del sitio
* [XAMPP](https://www.apachefriends.org/docs/) - Software de virtualización local de servidor LAMP
* [000Webhost](https://www.000webhost.com/website-faq) - Hosting usado para alojar el sitio web

## Contribuyendo 🖇️

Para contribuir a nuestro proyecto se pueden hacer pull requests sin problemas, que los aceptemos es otra cosa.

## Wiki 📖

Para encontrar mas documentación que en este README, lo cual es dificil. Puedes escribir un mail a gerard.gomez@dispostable.com

## Versionado 📌

Usamos [GitHub](https://github.com/) para el versionado. Para todas las versiones disponibles, mira el apartado releases del repositorio en el que estás.

## Autores ✒️

_Menciona a todos aquellos que ayudaron a levantar el proyecto desde sus inicios_

* **Gerard Gómez** - * PHP + Backend + Frontend * - [gerard.gomez](https://github.com/100007217)
* ** Alfredo Blum** - * PHP + Backend * - [alfredo.blum](https://github.com/blumal)

## Licencia 📄

Este proyecto está bajo la Licencia (Creative Commons). Puedes hacer lo que quieras con el codigo del repositorio

## Expresiones de Gratitud 🎁

* Spamea a tus amigos sobre este proyecto 📢
* Invita una cerveza 🍺 o un café ☕

