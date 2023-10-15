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
        Schema::create('num_telefonos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('telefonot_id')->nullable();
            $table->string('tipo_telefono');
            $table->string('numero_tel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('num_telefonos');
    }
};
