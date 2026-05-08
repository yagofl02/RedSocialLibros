<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear libro</title>
    <link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
    <main class="pagina">
        <a class="volver" href="/libros">Volver al listado</a>

        <h1>Crear libro</h1>

        @if ($errors->any())
            <ul class="errores">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="/libros">
            @csrf

            <div class="campo">
                <label for="titulo">Titulo</label>
                <input id="titulo" type="text" name="titulo" value="{{ old('titulo') }}">
            </div>

            <div class="campo">
                <label for="autor">Autor</label>
                <input id="autor" type="text" name="autor" value="{{ old('autor') }}">
            </div>

            <div class="campo">
                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
            </div>

            <button type="submit">Guardar</button>
        </form>
    </main>
</body>
</html>
