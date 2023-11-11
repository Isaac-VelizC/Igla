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
        Schema::create('miembros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pers_id')->nullable();
            $table->foreign('pers_id')->references('id')->on('personas')->onDelete('cascade');
            $table->date('fecha_contratado')->default(now());
            $table->decimal('sueldo', 10, 2)->nullable();
            $table->string('rol')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('miembros');
    }
};
