<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aula;
use App\Models\Curso;
use App\Models\CursoDocente;
use App\Models\Docente;
use App\Models\Horario;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $docentes = Docente::all();
        $cursos = Curso::all();
        $horarios = Horario::all();
        $isEditing = false;
        return view('admin.materias.asignar_curso', compact('docentes', 'cursos', 'horarios', 'isEditing'));
    }

    public function asignarGuardarCurso(Request $request) {
        $this->validate($request, [
            'id_docente' => 'required|string|max:255',
            'id_curso' => 'string|numeric',
            'horario' => 'string|numeric',
            'cupo' => 'string|numeric',
        ]);
        dd($request);
        $curso = new CursoDocente();
        $curso->docente_id = $request->id_docente;
        $curso->curso_id = $request->id_curso;
        $curso->responsable_id = auth()->user()->id;
        $curso->horario_id = $request->horario;
        //$curso->doc_id = $request->;
        //$curso->commet_id = $request->;
        $curso->descripcion = $request->descripcion;
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $nombreArchivo = uniqid() . '.' . $request->file('imagen')->extension();
            $archivoPath = $request->file('imagen')->storeAs('img/cursos', $nombreArchivo, 'public');
            $curso->imagen = 'storage/' . $archivoPath;
        }
        $curso->fecha_ini = $request->fInicio;
        $curso->fecha_fin = $request->fFin;
        $curso->asistencia_exacta = $request->cupo;
        $curso->save();
        return redirect()->route('')->with('success', 'El curso se habilito con éxito.');
    }
    public function asignarActualizarCurso(Request $request, $id) {
        dd($request);
        $this->validate($request, [
            'id_docente' => 'required|string|max:255',
            'id_curso' => 'string|numeric',
            'horario' => 'string|numeric',
            'cupo' => 'string|numeric',
        ]);
        $curso = CursoDocente::find($id);
        $curso->docente_id = $request->id_docente;
        $curso->curso_id = $request->id_curso;
        $curso->responsable_id = auth()->user()->id;
        $curso->horario_id = $request->horario;
        $curso->descripcion = $request->descripcion;
        $curso->imagen = $request->imagen;
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $rutaImagenAnterior = $curso->imagen;
            $nombreArchivo = uniqid() . '.' . $request->file('imagen')->extension();
            $archivoPath = $request->file('imagen')->storeAs('img/cursos', $nombreArchivo, 'public');
            $curso->imagen = 'storage/' . $archivoPath;
            if ($rutaImagenAnterior && Storage::disk('public')->exists($rutaImagenAnterior)) {
                Storage::disk('public')->delete($rutaImagenAnterior);
            }
        }
        $curso->fecha_ini = $request->fInicio;
        $curso->fecha_fin = $request->fFin;
        $curso->asistencia_exacta = $request->cupo;
        $curso->update();
        return redirect()->route('')->with('success', 'El curso se actualizo con éxito.');
    }
}
