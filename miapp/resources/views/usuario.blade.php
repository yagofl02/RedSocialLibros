<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
    <main class="pagina">
        <div class="bloque">
            <h1>Usuario {{ $usuario->id }}</h1>

            <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
            <p><strong>Email:</strong> {{ $usuario->email }}</p>
            <p><strong>ID:</strong> {{ $usuario->id }}</p>
        </div>

        <p><a href="/usuarios">Volver al listado</a></p>
    </main>
</body>
</html>
