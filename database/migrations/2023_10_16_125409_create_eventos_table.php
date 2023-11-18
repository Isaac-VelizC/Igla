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
        Schema::create('tipo_eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
        
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('responsable_id')->nullable();
            $table->foreign('responsable_id')->references('id')->on('users')->onDelete('cascade');
            //$table->unsignedBigInteger('archivos_id')->nullable();
            //$table->foreign('archivos_id')->references('id')->on('documentos')->onDelete('cascade');
            //$table->unsignedBigInteger('curso_id')->nullable();
            //$table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->datetime('comienzo');
            $table->datetime('termina')->nullable();
            $table->time('inicio');
            $table->time('fin');
            $table->mediumText('nombre');
            $table->text('descripcion')->nullable();
            $table->boolean('estado')->default(true);
            $table->boolean('todoeldia')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('tipo_eventos');
        Schema::dropIfExists('eventos');
    }
};
