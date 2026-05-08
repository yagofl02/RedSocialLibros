<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreValoracionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'comentario' => ['required', 'string'],
            'puntuacion' => ['required', 'integer', 'min:1', 'max:5'],
        ];
    }
}
