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
        Schema::create('document_trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('url', 255);
            $table->dateTime('fecha')->default(now());
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('trabajo_id')->nullable();
            $table->foreign('trabajo_id')->references('id')->on('trabajos')->onDelete('cascade');
            $table->unsignedBigInteger('trabajo_estudiante_id')->nullable();
            $table->foreign('trabajo_estudiante_id')->references('id')->on('trabajo_estudiantes')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_trabajos');
    }
};
