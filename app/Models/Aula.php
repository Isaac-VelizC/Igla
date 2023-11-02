<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "aulas";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'codigo', 'capacidad'];

    protected $guarded = ['id'];

    public function events()
    {
        return $this->hasMany(Evento::class);
    }
}
