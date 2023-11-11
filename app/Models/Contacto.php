<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "contactos";
    protected $primaryKey = "id";
    protected $fillable = ['pers_id', 'direccion', 'estado'];

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'estudiante_id');
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'pers_id');
    }

}
