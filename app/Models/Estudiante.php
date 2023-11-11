<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $table = "estudiantes";
    protected $primaryKey = "id";
    protected $fillable = ['pers_id', 'contact_id', 'turno_id', 'direccion', 'fecha_nacimiento', 'estado', 'titulo', 'graduado'];

    public function contacto()
    {
        return $this->hasOne(Contacto::class, 'estudiante_id');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'estudiante_id');
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'pers_id');
    }
}
