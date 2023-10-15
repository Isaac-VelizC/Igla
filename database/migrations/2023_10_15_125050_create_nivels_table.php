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
        Schema::create('nivels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('referencia')->nullable();
            $table->unsignedBigInteger('docente_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('cursos', function (Blueprint $table) {
            $table->foreign('nivel_id')
            ->references('id')->on('nivels')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('nivels');
    }
};
