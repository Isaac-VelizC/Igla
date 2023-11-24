<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;
    protected $table = "trabajos";
    protected $primaryKey = "id";
    protected $fillable = ['tipo_id',
        'curso_id',
        'user_id',
        'cat_crit_id',
        'tema_id',
        'titulo',
        'descripcion',
        'cantidad',
        'inicio',
        'con_limite',
        'fin',
        'con_nota',
        'nota',
        'visible',
        'estado'
    ];

}
