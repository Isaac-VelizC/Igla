<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index() {
        $cursos = Curso::all();
        return view('admin.materias.index', compact('cursos'));
    }
    public function create() {
        return view('admin.materias.create');
    }

    public function allPagos() {
        return View('admin.pagos.index');
    }

    public function asignarCurso() {
        return view('admin.materias.asignar_curso');
    }
}
