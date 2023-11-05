<?php

use App\Models\Factura;
use App\Models\Inscripcion;
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
        Schema::create('factura_inscripcions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inscrito_id')->nullable();
            $table->foreign('inscrito_id')->references('id')->on('inscripcions')->onDelete('cascade');
            $table->datetime('fecha')->default(now());
            $table->string('codigo');
            $table->boolean('estado')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura_inscripcions');
    }
};
