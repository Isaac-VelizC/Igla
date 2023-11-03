<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "cursos";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'precio', 'aula_id', 'periodo_id', 'color', 'marcado'];

    public function aula()
    {
        return $this->belongsTo(Aula::class, 'aula_id');
    }
    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodo_id');
    }
}
