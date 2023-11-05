<?php

namespace App\Http\Controllers\docente;

use App\Http\Controllers\Controller;
use App\Models\CursoDocente;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index() {
        $cursos_A = CursoDocente::where('estado', true)->get();
        $cursos_I = CursoDocente::where('estado', false)->get();
        return view('profesor.cursos.index', compact('cursos_A', 'cursos_I'));
    }

    public function curso($id) {
        $curso = CursoDocente::find($id);
        return view('profesor.cursos.curso', compact('curso'));
    }

    public function cursoAistencia($id) {
        $curso = CursoDocente::find($id);
        return view('profesor.cursos.asistencias.index', compact('curso'));
    }
    public function cursoEstudiantes($id) {
        $curso = CursoDocente::find($id);
        return view('profesor.cursos.estudiantes.index', compact('curso'));
    }
    public function cursoTrabajos($id) {
        $curso = CursoDocente::find($id);
        return view('profesor.cursos.trabajos.index', compact('curso'));
    }
}
