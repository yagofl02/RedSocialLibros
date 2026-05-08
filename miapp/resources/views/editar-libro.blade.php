<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar libro</title>
    <link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
    <main class="pagina">
        <a class="volver" href="/libros/{{ $libro->id }}">Volver al libro</a>

        <h1>Editar libro</h1>

        @if ($errors->any())
            <ul class="errores">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="/libros/{{ $libro->id }}">
            @csrf
            @method('PUT')

            <div class="campo">
                <label for="titulo">Titulo</label>
                <input id="titulo" type="text" name="titulo" value="{{ old('titulo', $libro->titulo) }}">
            </div>

            <div class="campo">
                <label for="autor">Autor</label>
                <input id="autor" type="text" name="autor" value="{{ old('autor', $libro->autor) }}">
            </div>

            <div class="campo">
                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="descripcion">{{ old('descripcion', $libro->descripcion) }}</textarea>
            </div>

            <button type="submit">Actualizar</button>
        </form>
    </main>
</body>
</html>
