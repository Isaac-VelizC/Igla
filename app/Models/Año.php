<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Año extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "años";
    protected $primaryKey = "id";
    protected $fillable = ['nombre'];

    public function periods()
    {
        return $this->hasMany(Periodo::class);
    }
}
