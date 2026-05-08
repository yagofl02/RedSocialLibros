<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Asete</title>
    <link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
    <main class="pagina">
        <section class="caja">
            <h1>Biblioteca Asete</h1>
            <p>Mini red social de libros con usuarios, comentarios y puntuaciones.</p>

            <div class="acciones">
                @auth
                    <a class="boton" href="/libros">Ver libros</a>
                    <a class="boton" href="/usuarios">Ver usuarios</a>
                @else
                    <a class="boton" href="/login">Iniciar sesion</a>
                    <a class="boton" href="/register">Registrarse</a>
                @endauth
            </div>
        </section>
    </main>
</body>
</html>
