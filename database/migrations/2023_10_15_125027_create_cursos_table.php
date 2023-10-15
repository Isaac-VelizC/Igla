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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nivel_id');
            $table->integer('volume')->nullable();
            $table->string('nombre');
            $table->bigInteger('precio')->nullable();
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->unsignedBigInteger('aula_id')->nullable();
            $table->unsignedBigInteger('docente_id')->nullable();
            $table->unsignedBigInteger('parent_course_id')->nullable();
            $table->boolean('asistencia_exacta')->nullable();
            $table->unsignedBigInteger('periodo_id')->nullable();
            $table->decimal('precio_b', 8, 2)->nullable();
            $table->decimal('precio_c', 8, 2)->nullable();
            $table->string('color')->nullable();
            $table->bigInteger('precio_hora')->nullable();
            $table->boolean('marcado')->default(false);
            $table->decimal('remoto_volumen', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
