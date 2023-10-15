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
        Schema::create('periodos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->date('inicio');
            $table->date('fin');
            $table->unsignedBigInteger('anio_id')->nullable();
            $table->integer('orden')->nullable();
        });

        Schema::table('cursos', function (Blueprint $table) {
            $table->foreign('periodo_id')
            ->references('id')->on('periodos')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('periodos');
    }
};
