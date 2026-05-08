<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Valoracion extends Model
{
    protected $table = 'valoraciones';

    protected $fillable = [
        'libro_id',
        'user_id',
        'comentario',
        'puntuacion',
    ];

    public function libro(): BelongsTo
    {
        return $this->belongsTo(Libro::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
