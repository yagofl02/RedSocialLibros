<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
    <main class="pagina pagina-ancha">
        <div class="cabecera">
            <div>
                <h1>Libros</h1>
                <p class="subtitulo">Listado de libros disponibles en la biblioteca.</p>
            </div>

            <div class="acciones">
                <a class="boton" href="/">Inicio</a>
                <a class="boton" href="/libros/crear">Crear libro</a>
                <a class="boton" href="/libros/importar-csv">Importar CSV</a>
            </div>
        </div>

        @if (session('mensaje'))
            <p class="mensaje">{{ session('mensaje') }}</p>
        @endif

        @if ($libros->isEmpty())
            <div class="vacio">
                No hay libros registrados todavia.
            </div>
        @else
            <ul class="listado">
                @foreach ($libros as $libro)
                    <li class="libro">
                        <h2>
                            <a href="/libros/{{ $libro->id }}">{{ $libro->titulo }}</a>
                        </h2>
                        <p class="autor">Autor: {{ $libro->autor }}</p>
                        <a class="ver" href="/libros/{{ $libro->id }}">Ver detalle</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </main>
</body>
</html>
