<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumTelefono extends Model
{
    use HasFactory;
    protected $table = "num_telefonos";
    protected $primaryKey = "id";
    protected $fillable = ['numero_tel'];
}
