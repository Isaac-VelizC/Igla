<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoDocente extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "curso_docentes";
    protected $primaryKey = "id";
    protected $fillable = ['docente_id',
        'curso_id',
        'responsable_id',
        'horario_id',
        'doc_id',
        'commet_id',
        'descripcion',
        'imagen',
        'fecha_ini',
        'fecha_fin',
        'asistencia_exacta',
        'inicio',
        'fin',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'docente_id');
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'horario_id');
    }

    public function documento()
    {
        return $this->belongsTo(Documentos::class, 'doc_id');
    }

}
