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
        Schema::create('docentes', function (Blueprint $table) {
            //$table->increments('id');
            $table->unsignedBigInteger('id')->nullable();
            $table->foreign('id')->references('id')->on('personas')->onDelete('cascade');
            $table->timestamp('contratado_en')->nullable();
            $table->decimal('max_hora_trabajos', 4, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};