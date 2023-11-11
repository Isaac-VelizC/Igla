<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "temas";
    protected $primaryKey = "id";
    protected $fillable = ['tema', 'curso_id', 'estado'];

}
