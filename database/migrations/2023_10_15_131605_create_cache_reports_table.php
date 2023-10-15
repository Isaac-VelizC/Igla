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
        Schema::create('cache_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anio_id')->nullable();
            $table->unsignedBigInteger('periodo_id')->nullable();
            $table->string('periodo_nombre');
            $table->integer('estudiantes');
            $table->integer('inscripciones');
            $table->decimal('acquisition_rate')->nullable();
            $table->integer('new_students')->nullable();
            $table->decimal('taught_hours');
            $table->decimal('sold_hours');
            $table->decimal('takings')->nullable();
            $table->decimal('avg_takings')->nullable();
            $table->timestamp('updated_at');
            $table->integer('orden')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache_reports');
    }
};
