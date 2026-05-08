<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();

        return view('usuarios', ['usuarios' => $usuarios]);
    }

    public function show($id)
    {
        $usuario = User::findOrFail($id);

        return view('usuario', ['usuario' => $usuario]);
    }

    public function create()
    {
        return view('crear-usuario');
    }

    public function store(StoreUserRequest $request)
    {
        $datos = $request->validated();

        User::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password']),
        ]);

        return redirect('/usuarios');
    }
}
