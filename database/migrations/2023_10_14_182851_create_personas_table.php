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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('idnumber')->nullable();
            $table->foreign('idnumber')->references('id')->on('num_telefonos')->onDelete('cascade');
            $table->string('nombre', 50);
            $table->string('ap_paterno', 50)->nullable();
            $table->string('ap_materno', 50)->nullable();
            $table->enum('genero', ['Hombre', 'Mujer']);
            $table->string('email', 55)->nullable();
            $table->string('photo', 255)->default('user.jpg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};