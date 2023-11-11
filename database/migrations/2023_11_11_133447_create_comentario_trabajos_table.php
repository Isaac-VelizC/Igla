<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comentario_trabajos', function (Blueprint $table) {
            $table->id();
            $table->boolean('privacidad')->default(false);
            $table->text('body');
            $table->boolean('action')->default(false)->nullable();
            $table->unsignedBigInteger('autor_id')->nullable();
            $table->foreign('autor_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('tarea_id')->nullable();
            $table->foreign('tarea_id')->references('id')->on('trabajo_estudiantes')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentario_trabajos');
    }
};
