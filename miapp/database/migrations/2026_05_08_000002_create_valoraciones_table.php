<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('valoraciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('libro_id')->constrained('libros')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('comentario');
            $table->unsignedTinyInteger('puntuacion');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('valoraciones');
    }
};
