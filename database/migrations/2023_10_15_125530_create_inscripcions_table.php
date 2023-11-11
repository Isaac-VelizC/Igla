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
        Schema::create('inscripcions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
            $table->unsignedBigInteger('responsable_id');
            $table->foreign('responsable_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('materia_id')->nullable();
            $table->foreign('materia_id')->references('id')->on('curso_docentes')->onDelete('restrict');
            $table->datetime('inscrito')->default(now());
            $table->boolean('estado')->default(true);
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
        Schema::dropIfExists('inscripcions');
    }
};
