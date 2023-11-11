<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajoEstudiante extends Model
{
    use HasFactory;
    protected $table = "trabajo_estudiantes";
    protected $primaryKey = "id";
    protected $fillable = ['tarea_id', 'estudiante_id', 'descripcion', 'cod_id', 'estado', 'nota'];

}
