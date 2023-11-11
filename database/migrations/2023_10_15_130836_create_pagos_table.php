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
        Schema::create('metodo_pagos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('sigla')->unique();
            $table->timestamps();
        });

        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('responsable_id')->nullable();
            $table->foreign('responsable_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('metodo_id')->nullable();
            $table->foreign('metodo_id')->references('id')->on('metodo_pagos')->onDelete('restrict');
            $table->unsignedBigInteger('factura_id');
            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('cascade');
            $table->dateTime('fecha');
            $table->decimal('valor', 10, 2);
            $table->boolean('estado')->default(true);
            $table->text('comentario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metodo_pagos');
        Schema::dropIfExists('pagos');
    }
};
