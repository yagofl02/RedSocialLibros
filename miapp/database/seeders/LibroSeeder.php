<?php

namespace Database\Seeders;

use App\Models\Libro;
use App\Models\User;
use App\Models\Valoracion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LibroSeeder extends Seeder
{
    public function run(): void
    {
        $usuario = User::firstOrCreate(
            ['email' => 'demo@biblioteca.test'],
            [
                'name' => 'Usuario Demo',
                'password' => Hash::make('password'),
            ]
        );

        $ruta = database_path('data/libros.csv');
        $archivo = fopen($ruta, 'r');
        $cabecera = fgetcsv($archivo, 0, ',', '"', '\\');

        while (($fila = fgetcsv($archivo, 0, ',', '"', '\\')) !== false) {
            $datos = array_combine($cabecera, $fila);

            Libro::firstOrCreate(
                [
                    'titulo' => $datos['titulo'],
                    'autor' => $datos['autor'],
                ],
                [
                    'descripcion' => $datos['descripcion'],
                    'user_id' => $usuario->id,
                ]
            );
        }

        fclose($archivo);

        $libro = Libro::first();

        if ($libro) {
            Valoracion::firstOrCreate(
                [
                    'libro_id' => $libro->id,
                    'user_id' => $usuario->id,
                ],
                [
                    'comentario' => 'Muy buen libro para empezar la biblioteca.',
                    'puntuacion' => 5,
                ]
            );
        }
    }
}
