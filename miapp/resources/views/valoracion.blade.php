<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valoracion</title>
    <link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
    <main class="pagina">
        <h1>Valoracion de {{ $libro->titulo }}</h1>

        <div class="bloque">
            <p class="estrellas">
                @for ($i = 1; $i <= 5; $i++)
                    {!! $i <= $valoracion->puntuacion ? '&#9733;' : '&#9734;' !!}
                @endfor
            </p>
            <p><strong>Comentario:</strong> {{ $valoracion->comentario }}</p>
            <p><strong>Usuario:</strong> {{ $valoracion->user->name }}</p>
        </div>

        <p><a href="/libros/{{ $libro->id }}">Volver al libro</a></p>
    </main>
</body>
</html>
