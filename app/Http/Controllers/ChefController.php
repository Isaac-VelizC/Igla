<?php

namespace App\Http\Controllers;

use App\Models\CursoDocente;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function index() {
        $cursos = CursoDocente::where('docente_id', auth()->user()->persona->docente->id)->get();
        return view('profesor.home', compact('cursos'));
    }
}
