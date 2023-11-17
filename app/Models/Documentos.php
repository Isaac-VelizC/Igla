<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    use HasFactory;
    protected $table = "documentos";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'url', 'fecha', 'estado', 'trabajo_id', 'materia_id', 'trabajo_estudiante_id', 'user_id', 'eval_id'];

}
