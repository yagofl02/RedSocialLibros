# Biblioteca Asete

Mini aplicacion Laravel de libros con usuarios y valoraciones.

## Funcionalidad

- Registro e inicio de sesion con Laravel Breeze.
- Listado de usuarios.
- CRUD de libros.
- Comentarios y puntuaciones de 1 a 5 para cada libro.
- Importacion de libros desde `database/data/libros.csv`.

## Docker

El proyecto incluye un Docker Compose sencillo con solo dos servicios:

- `app`: Laravel con PHP 8.4 y Apache.
- `mysql`: base de datos MySQL 8.4.

## Requisitos

- Docker Desktop iniciado.
- Node.js `20.19` o superior dentro de la rama 20, o Node.js `22.12` o superior.
- npm `10` o superior.

## Puesta en marcha

Ejecuta los comandos desde la carpeta `miapp`.

En Windows:

```bat
copy .env.example .env
docker compose -f docker-compose.local.yml up -d --build
docker compose -f docker-compose.local.yml exec app php artisan key:generate
docker compose -f docker-compose.local.yml exec app php artisan migrate
docker compose -f docker-compose.local.yml exec app php artisan db:seed
docker compose -f docker-compose.local.yml exec app php artisan optimize:clear
npm.cmd install
npm.cmd run build
```

En macOS/Linux cambia `copy` y `npm.cmd` por:

```sh
cp .env.example .env
npm install
npm run build
```

La aplicacion estara disponible en:

```text
http://localhost:8000
```

## Rutas principales

- `/register`: registrar usuario.
- `/login`: iniciar sesion.
- `/libros`: listado de libros.
- `/libros/crear`: crear libro.
- `/libros/importar-csv`: importar libros del CSV.
- `/usuarios`: listado de usuarios.

Las rutas de libros, valoraciones y usuarios estan protegidas con `auth`.

Importacion del csv

1. Inicia sesion en la aplicacion.
2. Entra en `/libros`.
3. Pulsa `Importar CSV`.


Usuario de prueba

```text
Correo: demo@biblioteca.test
Contrasena: password
```
