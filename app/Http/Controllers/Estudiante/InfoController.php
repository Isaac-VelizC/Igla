<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use App\Models\CursoDocente;
use App\Models\Inscripcion;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index() {
        return view('estudiante.home');
    }

    public function cursos() {
        $cursos = Inscripcion::where('estudiante_id', auth()->user()->persona->estudiante->id)->get();
        return view('estudiante.cursos.index', compact('cursos'));
    }
}
