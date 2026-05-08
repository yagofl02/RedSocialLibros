<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
    <main class="pagina">
        <div class="cabecera">
            <h1>Usuarios</h1>

            <div class="acciones">
                <a class="boton" href="/">Inicio</a>
                <a class="boton" href="/usuarios/crear">Crear usuario</a>
            </div>
        </div>

        <ul class="lista-simple">
            @foreach ($usuarios as $usuario)
                <li class="fila">
                    <a class="nombre" href="/usuarios/{{ $usuario->id }}">{{ $usuario->name }}</a>
                    <span class="email">- {{ $usuario->email }}</span>
                </li>
            @endforeach
        </ul>
    </main>
</body>
</html>
