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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id')->nullable();
            $table->foreign('estudiante_id')
            ->references('id')->on('estudiantes')->onDelete('cascade');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('idnumero')->nullable();
            $table->string('direccion')->nullable();
            $table->string('email')->nullable(); // if null; look in the users table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('contactos');
    }
};
