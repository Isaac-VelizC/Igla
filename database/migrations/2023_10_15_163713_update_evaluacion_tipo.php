<?php

use App\Models\Curso;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->integer('tipo_evaluacion_id')
                ->references('id')->on('tipo_evaluacions')
                ->onDelete('restrict')
                ->after('color')
                ->nullable();
        });

        foreach (DB::table('curso_evaluacion_tipos')->get() as $course_eval) {
            Curso::find($course_eval->curso_id)->update(['tipo_evaluacion_id' => $course_eval->evaluacion_tipo_id]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        //
    }
};
