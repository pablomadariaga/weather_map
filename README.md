<p align="center"><a href="https://browsertravelsolutions.com/" target="_blank"><img src="https://browsertravelsolutions.com/wp-content/uploads/2022/02/Logo-1.png" width="400" alt="Browser Travel Solutions"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Configuración del proyecto

De acuerdo a los requerimientos de la prueba para desarrollo práctico en el proceso de selección, estos son los puntos a seguir para la configuración del proyecto.

-   Se asume como primer punto que Apache2, MySQL y PHP 8.1> ya han sido instalados y configurados en el servidor.
-   Instalar composer de manera global para nuestro sistema operativo.
-   Crear la base de datos en nuestro MySQL.
-   Bajar el repositorio al servidor donde correremos nuestra aplicación.
-   Configurar el archivo con las variables de entorno para nuestra aplicación.
-   Bajar las dependencias del proyecto.
-   Realizar migraciones de las tablas a la base de datos y correr el proyecto.
-   Construir aplicación front

## Instalar composer

En el siguiente enlace podemos encontrar una guía completa sobre la instalación y configuración de Composer en nuestro S.O de manera global [composer](https://getcomposer.org/doc/00-intro.md).

## Crear base de datos

Creamos la base de datos para nuestra aplicación, a continuación podemos ver el comando para realizar esto en nuestro MySQL, `nombre_bd` puede ser cualquier denominación sin caracteres especiales ni espacios.

-   CREATE DATABASE `nombre_bd` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

### Clonar repositorio
Copiamos el repositorio al root de nuestro servidor apache, _weather_map_ puede ser cualquier denominación sin caracteres especiales.

-   git clone https://github.com/pablomadariaga/weather_map.git _weather_map_
-   Ahora ingresamos a nuestra carpeta **weather_map**, de aquí en adelante los pasos a seguir son dentro de esta ruta

## Configurar .env

Después de clonar nuestro repositorio, accedemos a nuestro proyecto desde la terminal, luego debemos duplicar el archivo **.env.example** con el nombre del nuevo archivo igual a **.env** y configurar las siguientes variables.

-   comando: cp .env.example .env
-   variables
    1. APP_NAME = 'El nombre que queramos para el proyecto'
    1. APP_URL = 'Url o IP designada para correr el proyecto'
    1. OPENWEATHERMAP_API_KEY = Credencial de OPEN WEATHER MAP, identificador del sitio.
    1. DB_HOST = HOST para nuestro servidor MySQL
    1. DB_PORT = PUERTO para nuestro servidor MySQL
    1. DB_DATABASE = Nombre de la base de datos que creamos
    1. DB_USERNAME = Nombre de usuario de MySQL
    1. DB_PASSWORD = Si el usuario tiene contraseña

## Dependencias

Ejecute los siguientes comandos desde la consola dentro de nuestra carpeta raíz del proyecto para instalar todas las dependencias de PHP.

-   composer i
-   php artisan config:cache
-   php artisan key:generate

## Correr migraciones para la base de datos y correr la aplicación

Ejecute los siguientes comandos desde la consola dentro de nuestra carpeta raíz del proyecto.

-   php artisan migrate:fresh --seed
    **Para finalizar corremos el servidor**
-   _php artisan serve_ , este comando no es necesario si tenemos un servidor para descubrir nuestras aplicaciones automáticamente, simplemente accedemos a la url configurada en nuestro servidor para la aplicación

## Construir aplicación front

Ejecute el siguiente comando instalar para construir nuestros módulos de JavaScript y CSS

-   npm install && npm run build

Ahora puede acceder a la aplicación *weather_map*, por medio de la ip o url designada.

Cualquier duda sobre la configuración del proyecto, puede comunicarse conmigo por medio de correo electrónico o celular. 
**+57 3117310930**
[juanpablomadariagacardona@gmail.com](mailto:mailjuanpablomadariagacardona@gmail.com)

## License

El Framework de Laravel es un software de código abierto con licencia bajo [MIT license](https://opensource.org/licenses/MIT).
