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
        Schema::create('docentes', function (Blueprint $table) {
            //$table->increments('id');
            $table->unsignedBigInteger('id')->nullable();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('contratado_en')->nullable();
            $table->decimal('max_hora_trabajos', 4, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('cursos', function (Blueprint $table) {
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('restrict');
        });

        Schema::table('evento_remotos', function (Blueprint $table) {
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
        });

        Schema::table('nivels', function (Blueprint $table) {
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
        });

        Schema::table('eventos', function (Blueprint $table) {
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('docentes');
    }
};
