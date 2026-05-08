<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLibroRequest;
use App\Http\Requests\StoreValoracionRequest;
use App\Models\Libro;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::all();

        return view('libros', ['libros' => $libros]);
    }

    public function show($id)
    {
        $libro = Libro::findOrFail($id);

        return view('libro', [
            'libro' => $libro,
            'valoraciones' => $libro->valoraciones,
        ]);
    }

    public function create()
    {
        return view('crear-libro');
    }

    public function store(StoreLibroRequest $request)
    {
        $datos = $request->validated();
        $datos['user_id'] = Auth::id();

        Libro::create($datos);

        return redirect('/libros');
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);

        return view('editar-libro', ['libro' => $libro]);
    }

    public function update(StoreLibroRequest $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->validated());

        return redirect('/libros/'.$libro->id);
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect('/libros');
    }

    public function createValoracion($id)
    {
        $libro = Libro::findOrFail($id);

        return view('crear-valoracion', ['libro' => $libro]);
    }

    public function storeValoracion(StoreValoracionRequest $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $datos = $request->validated();

        $libro->valoraciones()->create([
            'user_id' => Auth::id(),
            'comentario' => $datos['comentario'],
            'puntuacion' => $datos['puntuacion'],
        ]);

        return redirect('/libros/'.$libro->id);
    }

    public function showValoracion($libroId, $valoracionId)
    {
        $libro = Libro::findOrFail($libroId);
        $valoracion = $libro->valoraciones()->findOrFail($valoracionId);

        return view('valoracion', [
            'libro' => $libro,
            'valoracion' => $valoracion,
        ]);
    }

    public function importarCsv()
    {
        $ruta = database_path('data/libros.csv');

        if (! file_exists($ruta)) {
            return redirect('/libros')->with('mensaje', 'No existe el archivo database/data/libros.csv');
        }

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
                    'user_id' => Auth::id(),
                ]
            );
        }

        fclose($archivo);

        return redirect('/libros')->with('mensaje', 'Libros importados correctamente');
    }
}
