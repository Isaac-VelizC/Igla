<?php

namespace App\Http\Controllers\docente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    public function recetas() {
        return view('profesor.recetas.index');
    }
}
