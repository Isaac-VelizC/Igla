<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = "personas";
    protected $primaryKey = "id";
    protected $fillable = ['user_id', 'idnumber', 'nombre', 'ap_paterno', 'ap_materno', 'ci','genero', 'email', 'photo'];

}
