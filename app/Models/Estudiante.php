<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $table = "estudiantes";
    protected $primaryKey = "id";
    protected $fillable = ['pers_id', 'direccion', 'fecha_nacimiento', 'estado', 'titulo_cuente'];

}
