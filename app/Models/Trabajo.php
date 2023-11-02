<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;
    protected $table = "trabajos";
    protected $primaryKey = "id";
    protected $fillable = ['tipo_id', 'curso_id', 'user_id', 'titulo', 'descripcion', 'doc_id', 'cantidad', 'inicio', 'fin', 'visible', 'whatsapp'];

}
