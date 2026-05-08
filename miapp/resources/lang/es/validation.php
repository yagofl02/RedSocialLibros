<?php

return [
    'required' => 'El campo :attribute es obligatorio.',
    'string' => 'El campo :attribute debe ser texto.',
    'email' => 'El campo :attribute debe ser un correo electrónico válido.',
    'unique' => 'El valor del campo :attribute ya existe.',
    'max' => [
        'string' => 'El campo :attribute no debe superar :max caracteres.',
    ],
    'min' => [
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
        'numeric' => 'El campo :attribute debe ser como mínimo :min.',
    ],
    'integer' => 'El campo :attribute debe ser un número entero.',
    'attributes' => [
        'name' => 'nombre',
        'email' => 'correo electrónico',
        'password' => 'contraseña',
        'titulo' => 'título',
        'autor' => 'autor',
        'descripcion' => 'descripción',
        'comentario' => 'comentario',
        'puntuacion' => 'puntuación',
    ],
];
