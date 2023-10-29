<?php

namespace App\Http\Controllers\docente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index() {
        return view('profesor.cursos.index');
    }
}
