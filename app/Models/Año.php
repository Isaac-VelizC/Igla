<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Año extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function periods()
    {
        return $this->hasMany(Periodo::class);
    }
}
