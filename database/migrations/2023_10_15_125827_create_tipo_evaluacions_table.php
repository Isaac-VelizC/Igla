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
        Schema::create('tipo_evaluacions', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
        });

        Schema::create('curso_evaluacion_tipos', function (Blueprint $table) {
            
            $table->unsignedBigInteger('curso_id')->nullable();
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');

            $table->unsignedBigInteger('evaluacion_tipo_id')->nullable();
            $table->foreign('evaluacion_tipo_id')->references('id')->on('tipo_evaluacions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('tipo_evaluacions');
        Schema::dropIfExists('curso_evaluacion_tipos');
    }
};
