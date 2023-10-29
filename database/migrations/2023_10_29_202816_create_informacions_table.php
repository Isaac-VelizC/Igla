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
        Schema::create('informacions', function (Blueprint $table) {
            $table->id();
            $table->string('logo', 254)->nullable();
            $table->string('imagen1', 254)->nullable();
            $table->string('imagen2', 254)->nullable();
            $table->string('nombre', 50);
            $table->string('titulo', 50);
            $table->string('subtitulo1', 50)->nullable();
            $table->string('subtitulo2', 50)->nullable();
            $table->text('descripcion1')->nullable();
            $table->text('descripcion2')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('correo', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('youtube', 100)->nullable();
            $table->string('twitter', 100)->nullable();
            $table->string('instagram', 100)->nullable();
            $table->string('linkedln', 100)->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacions');
    }
};
