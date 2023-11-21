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
        Schema::create('temas', function (Blueprint $table) {
            $table->id();
            $table->string('tema');
            $table->unsignedBigInteger('curso_id')->nullable();
            $table->foreign('curso_id')->references('id')->on('curso_docentes')->onDelete('cascade');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });

        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->text('pregunta');
            $table->unsignedBigInteger('curso_id')->nullable();
            $table->foreign('curso_id')->references('id')->on('curso_docentes')->onDelete('cascade');
            $table->boolean('con_nota')->default(true);
            $table->bigInteger('nota')->nullable();
            $table->dateTime('limite')->nullable();
            $table->unsignedBigInteger('tema_id')->nullable();
            $table->foreign('tema_id')->references('id')->on('temas')->onDelete('cascade');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });

        Schema::create('tipo_trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('trabajos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipo_trabajos')->onDelete('cascade');
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('curso_docentes')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('cat_crit_id');
            $table->foreign('cat_crit_id')->references('id')->on('categorias_criterio')->onDelete('cascade');
            $table->string('titulo', 100);
            $table->text('descripcion')->nullable();
            $table->integer('cantidad')->default(1);
            $table->dateTime('inico')->default(now());
            $table->dateTime('fin');
            $table->boolean('con_nota')->default(true);
            $table->bigInteger('nota')->nullable();
            $table->boolean('visible')->default(false);
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temas');
        Schema::dropIfExists('preguntas');
        Schema::dropIfExists('tipo_trabajos');
        Schema::dropIfExists('trabajos');
    }
};
