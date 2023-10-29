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
            $table->string('nombre');
            $table->bigInteger('precio')->nullable();
            $table->unsignedBigInteger('aula_id')->nullable();
            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('restrict');
            $table->unsignedBigInteger('periodo_id')->nullable();
            $table->foreign('periodo_id')->references('id')->on('periodos')->onDelete('restrict');
            $table->string('color')->nullable();
            $table->boolean('marcado')->default(false);
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
