<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    $nombre = 'Clase de Laravel';

    return view('hola', ['nombre' => $nombre]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/libros', [LibroController::class, 'index']);
    Route::get('/libros/crear', [LibroController::class, 'create']);
    Route::post('/libros', [LibroController::class, 'store']);
    Route::get('/libros/importar-csv', [LibroController::class, 'importarCsv']);
    Route::get('/libros/{id}', [LibroController::class, 'show']);
    Route::get('/libros/{id}/editar', [LibroController::class, 'edit']);
    Route::put('/libros/{id}', [LibroController::class, 'update']);
    Route::delete('/libros/{id}', [LibroController::class, 'destroy']);
    Route::get('/libros/{id}/valoraciones/crear', [LibroController::class, 'createValoracion']);
    Route::post('/libros/{id}/valoraciones', [LibroController::class, 'storeValoracion']);
    Route::get('/libros/{libroId}/valoraciones/{valoracionId}', [LibroController::class, 'showValoracion']);

    Route::get('/usuarios', [UserController::class, 'index']);
    Route::get('/usuarios/crear', [UserController::class, 'create']);
    Route::post('/usuarios', [UserController::class, 'store']);
    Route::get('/usuarios/{id}', [UserController::class, 'show']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
