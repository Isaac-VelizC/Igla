<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('evaluacion_tipo_presets', function (Blueprint $table) {
            $table->unsignedBigInteger('evaluacion_tipo_id');
            $table->string('tipo_preestablecido');
            $table->unsignedBigInteger('preestablecido_id');
            $table->integer('orden')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        //
    }
};
