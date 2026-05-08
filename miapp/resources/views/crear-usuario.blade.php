<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
    <link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
    <main class="pagina">
        <h1>Crear usuario</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="/usuarios">
            @csrf

            <p>
                <label for="name">Nombre</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}">
            </p>

            <p>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}">
            </p>

            <p>
                <label for="password">Contrasena</label>
                <input id="password" type="password" name="password">
            </p>

            <button type="submit">Guardar</button>
        </form>

        <p><a href="/usuarios">Volver al listado</a></p>
    </main>
</body>
</html>
