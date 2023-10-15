<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipo_calificacions', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->integer('total');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('curso_calificacion_tipo', function (Blueprint $table) {
            $table->unsignedBigInteger('curso_id')->nullable();
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->unsignedBigInteger('calificacion_tipo_id')->nullable();
            $table->foreign('calificacion_tipo_id')->references('id')->on('tipo_calificacions')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('nota_tipo_categorias', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
        });
        DB::table('nota_tipo_categorias')->insert(['id' => 1, 'nombre' => 'Evaluación continua']);

        Schema::table('calificacions', function (Blueprint $table) {
            $table->foreign('nota_tipo_id')
            ->references('id')->on('tipo_calificacions')
            ->onDelete('restrict');
        });

        Schema::table('tipo_calificacions', function (Blueprint $table) {
            $table->unsignedBigInteger('nota_tipo_categoria_id')->references('id')->on('nota_tipo_categorias')->onDelete('restrict')->after('id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('tipo_calificacions');
        Schema::dropIfExists('curso_calificacion_tipo');
        Schema::dropIfExists('nota_tipo_categoria');
    }
};
