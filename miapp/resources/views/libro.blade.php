<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $libro->titulo }}</title>
    <link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
    <main class="pagina">
        <a class="volver" href="/libros">Volver al listado</a>

        <section class="bloque">
            <h1>{{ $libro->titulo }}</h1>

            <p class="dato"><strong>Autor:</strong> {{ $libro->autor }}</p>
            <p>{{ $libro->descripcion }}</p>

            <div class="acciones">
                <a class="boton" href="/libros/{{ $libro->id }}/editar">Editar libro</a>
                <a class="boton" href="/libros/{{ $libro->id }}/valoraciones/crear">Comentar libro</a>

                <form class="borrar" method="POST" action="/libros/{{ $libro->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Borrar libro</button>
                </form>
            </div>
        </section>

        <section>
            <h2>Valoraciones</h2>

            @if ($valoraciones->isEmpty())
                <p class="vacio">Todavia no hay valoraciones.</p>
            @else
                <ul class="valoraciones">
                    @foreach ($valoraciones as $valoracion)
                        <li class="valoracion">
                            <p class="puntuacion">
                                <span class="estrellas">
                                    @for ($i = 1; $i <= 5; $i++)
                                        {!! $i <= $valoracion->puntuacion ? '&#9733;' : '&#9734;' !!}
                                    @endfor
                                </span>
                            </p>
                            <p class="comentario">{{ $valoracion->comentario }}</p>
                            <p>
                                <a href="/libros/{{ $libro->id }}/valoraciones/{{ $valoracion->id }}">
                                    Ver valoracion
                                </a>
                            </p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>
    </main>
</body>
</html>
