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
        Schema::create('curso_docentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docente_id')->nullable();
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('restrict');
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->unsignedBigInteger('responsable_id');
            $table->foreign('responsable_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('horario_id')->nullable();
            $table->foreign('horario_id')->references('id')->on('horarios')->onDelete('restrict');
            $table->unsignedBigInteger('doc_id')->nullable();
            $table->foreign('doc_id')->references('id')->on('documentos')->onDelete('cascade');
            $table->unsignedBigInteger('aula_id');
            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('restrict');
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->string('whatsapp', 100);
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso_docentes');
    }
};
