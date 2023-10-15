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
        Schema::create('años', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
        });

        Schema::table('periodos', function (Blueprint $table) {
            $table->foreign('anio_id')
            ->references('id')->on('años')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('años');
    }
};
