<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentar libro</title>
    <link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
    <main class="pagina">
        <a class="volver" href="/libros/{{ $libro->id }}">Volver al libro</a>

        <h1>Comentar {{ $libro->titulo }}</h1>

        @if ($errors->any())
            <ul class="errores">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="/libros/{{ $libro->id }}/valoraciones">
            @csrf

            <div class="campo">
                <label for="comentario">Comentario</label>
                <textarea id="comentario" name="comentario">{{ old('comentario') }}</textarea>
            </div>

            <div class="campo">
                <label>Puntuacion</label>
                <div class="selector-estrellas">
                    @for ($i = 5; $i >= 1; $i--)
                        <input
                            id="estrella-{{ $i }}"
                            type="radio"
                            name="puntuacion"
                            value="{{ $i }}"
                            @checked((int) old('puntuacion') === $i)
                        >
                        <label for="estrella-{{ $i }}">&#9733;</label>
                    @endfor
                </div>
            </div>

            <button type="submit">Guardar valoracion</button>
        </form>
    </main>
</body>
</html>
