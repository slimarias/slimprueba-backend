# slimprueba-frontend

Backend del proyecto para administrar los hoteles y sus respectivas habitaciones del consorcio Decameron

## Instalación inicial

Recomendación: para ambientes de desarrollo en windows, se recomienda descargar e instalar laragon desde la siguiente ubicación:

https://github.com/leokhoa/laragon/releases/download/6.0.0/laragon-wamp.exe

Luego de instalado y ejecutado, se debe ir a herramientas, quick add, y hacemos clic en postgresql-14 para instalar el entorno de basde de datos

luego vamos a cmd y ejecutamos

```sh
psql postgres
```

y creamos la base de datos con el siguiente comando

```sh
create database ejemplo;
```

y salimos del postgres con el comando

```sh
\q
```

luego de instalar el entorno bd y web, se procede a instalar el proyecto con sus vendors con el siguiente comando:

```sh
composer install
```

## Configuracion de .env

el .env debe quedar desde la linea 11 hasta la 16 de la siguiente manera:

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=ejemplo
DB_USERNAME=postgres
DB_PASSWORD=

## Instalar migraciones

luego, procedemos a instalar las migraciones de base de datos con el siguiente comando:

```sh
php artisan migrate --seed
```

y por último desplegamos el servicio en desarrollo:

```sh
php artisan serve
```

ahora pasamos al proyecto de frontend y copiamos en su .env la ruta que nos muestra la consola de comandos, en la variable VITE_API_URL

## 