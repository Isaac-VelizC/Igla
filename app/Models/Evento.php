<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = "eventos";
    protected $primaryKey = "id";
    protected $fillable = ['responsable_id', 'archivos_id', 'curso_id', 'comienzo', 'termina', 'inicio', 'fin', 'nombre', 'descripcion'];

}
