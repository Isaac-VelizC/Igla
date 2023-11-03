<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aula;
use App\Models\Curso;
use App\Models\Periodo;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index() {
        $cursos = Curso::all();
        return view('admin.materias.index', compact('cursos'));
    }
    public function create()
    {
        $aulas = Aula::all();
        $modulos = Periodo::all();
        $isEditing = false;
        return view('admin.materias.create', compact('aulas', 'modulos', 'isEditing'));
    }

    public function edit($id)
    {
        $aulas = Aula::all();
        $isEditing = true;
        return view('admin.materias.create', compact('aulas', 'isEditing'));
    }
    public function guardarCurso(Request $request)
    {
        dd($request);
    }

    public function actualizarCurso(Request $request, $id)
    {
        dd($request);
    }


    public function allPagos() {
        return View('admin.pagos.index');
    }

    public function asignarCurso() {
        return view('admin.materias.asignar_curso');
    }
}
