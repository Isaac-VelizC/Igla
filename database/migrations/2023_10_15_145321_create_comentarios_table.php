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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->boolean('privacidad')->default(false);
            $table->text('body');
            $table->boolean('action')->default(false)->nullable();
            $table->unsignedBigInteger('autor_id')->nullable();
            $table->foreign('autor_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('materia_id')->nullable();
            $table->foreign('materia_id')->references('id')->on('curso_docentes')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('comentarios');
    }
};
