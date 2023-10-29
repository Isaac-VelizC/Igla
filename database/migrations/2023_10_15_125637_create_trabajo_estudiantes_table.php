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
        Schema::create('trabajo_estudiantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tarea_id')->nullable();
            $table->foreign('tarea_id')->references('id')->on('trabajos')->onDelete('cascade');
            $table->unsignedBigInteger('estudiante_id')->nullable();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('doc_id')->nullable();
            $table->foreign('doc_id')->references('id')->on('documentos')->onDelete('cascade');
            $table->unsignedBigInteger('commet_id')->nullable();
            $table->foreign('commet_id')->references('id')->on('comentarios')->onDelete('cascade');
            $table->decimal('nota')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajo_estudiantes');
    }
};
