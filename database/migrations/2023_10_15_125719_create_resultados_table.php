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
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inscripción_id')->nullable()->unique();
            $table->unsignedBigInteger('tipo_result_id')->nullable();
            $table->timestamps();
        });

        Schema::create('tipo_results', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->text('descripcion')->nullable();
            $table->string('clase')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        Schema::table('resultados', function (Blueprint $table) {
            $table->foreign('tipo_result_id')
            ->references('id')->on('tipo_results')
            ->onDelete('restrict');

            $table->foreign('inscripción_id')
            ->references('id')->on('inscripcions')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('resultados');
        Schema::dropIfExists('tipo_results');
    }
};
