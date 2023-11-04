<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = "personas";
    protected $primaryKey = "id";
    protected $fillable = ['user_id', 'nombre', 'ap_paterno', 'ap_materno', 'ci','genero', 'email', 'photo'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function docente()
    {
        return $this->hasOne(Docente::class, 'id_persona');
    }

    public function numTelefono()
    {
        return $this->hasOne(NumTelefono::class, 'id_persona');
    }
}
