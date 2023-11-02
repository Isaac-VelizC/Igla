<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $table = "docentes";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'contratado_en', 'max_hora_trabajos'];

}
