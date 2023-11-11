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
        Schema::create('calificacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
            $table->unsignedBigInteger('materia_id')->nullable();
            $table->foreign('materia_id')->references('id')->on('curso_docentes')->onDelete('restrict');
            $table->bigInteger('num_trabajos')->default(0);
            $table->bigInteger('num_evaluaciones')->default(0);
            $table->decimal('calificacion', 3, 2);
            $table->boolean('estado')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('calificacions');
    }
};
