<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;
    protected $table = "inscripcions";
    protected $primaryKey = "id";
    protected $fillable = ['estudiante_id', 'responsable_id', 'curso_id', 'inscrito'];

}
