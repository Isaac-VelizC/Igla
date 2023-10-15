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
        Schema::create('becas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('beca_inscripcion', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('inscripcion_id')->nullable();
            $table->unsignedBigInteger('inscripcion_id')->references('id')->on('inscripcions')->onDelete('cascade');
            //$table->unsignedBigInteger('beca_id')->nullable();
            $table->unsignedBigInteger('beca_id')->references('id')->on('becas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('becas');
    }
};
