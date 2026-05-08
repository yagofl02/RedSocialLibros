<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Libro extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'descripcion',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function valoraciones(): HasMany
    {
        return $this->hasMany(Valoracion::class);
    }
}
