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
        $curso = Curso::find($id);
        $aulas = Aula::all();
        $modulos = Periodo::all();
        $isEditing = true;
        return view('admin.materias.create', compact('curso', 'aulas', 'isEditing', 'modulos'));
    }
    public function guardarCurso(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'aula_id' => 'string|numeric',
            'modulo_id' => 'string|numeric',
        ]);
        $curso = new Curso();
        $curso->nombre = $request->nombre;
        $curso->aula_id = $request->aula_id;
        $curso->periodo_id = $request->modulo_id;
        $curso->color = $request->color;
        $curso->save();
        return back()->with('success', 'La información se ha guardado con éxito.');
    }

    public function actualizarCurso(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'aula_id' => 'string|numeric',
            'modulo_id' => 'string|numeric',
        ]);
        $curso = Curso::find($id);
        $curso->nombre = $request->nombre;
        $curso->aula_id = $request->aula_id;
        $curso->periodo_id = $request->modulo_id;
        $curso->color = $request->color;
        $curso->update();
        return redirect()->route('admin.cursos')->with('success', 'La información se ha actualizado con éxito.');
    }

    public function deleteCurso(Request $request, $id) {
        $curso = Curso::find($request->curso_id);
        $curso->delete();
        return back()->with('success', 'El curso se ha eliminado con éxito.');
    }
    public function showCurso($id) {
        $curso = Curso::find($id);
        return view('admin.materias.show', compact('curso'));
    }

    public function allPagos() {
        return View('admin.pagos.index');
    }

    public function asignarCurso() {
        return view('admin.materias.asignar_curso');
    }
}
