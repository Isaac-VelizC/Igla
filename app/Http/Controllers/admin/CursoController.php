<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aula;
use App\Models\Curso;
use App\Models\CursoDocente;
use App\Models\Docente;
use App\Models\Horario;
use App\Models\Pago;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CursoController extends Controller
{
    public function index() {
        $cursos = Curso::all();
        return view('admin.materias.index', compact('cursos'));
    }
    public function create()
    {
        $modulos = Periodo::all();
        $isEditing = false;
        return view('admin.materias.create', compact('modulos', 'isEditing'));
    }
    public function edit($id)
    {
        $curso = Curso::find($id);
        $modulos = Periodo::all();
        $isEditing = true;
        return view('admin.materias.create', compact('curso', 'isEditing', 'modulos'));
    }
    public function guardarCurso(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'modulo_id' => 'required|numeric',
        ]);
        $curso = new Curso();
        $curso->nombre = $request->nombre;
        $curso->periodo_id = $request->modulo_id;
        $curso->color = $request->color;
        $curso->descripcion = $request->descripcion;
        $curso->save();
        return back()->with('success', 'La materia ' . $curso->nombre . ' se registro con éxito.');
    }
    public function actualizarCurso(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'modulo_id' => 'numeric',
        ]);
        $curso = Curso::findOrFail($id);
        $curso->update([
            'nombre' => $request->nombre,
            'periodo_id' => $request->modulo_id,
            'color' => $request->color,
            'descripcion' => $request->descripcion,
        ]);
        return redirect()->route('admin.cursos')->with('success', 'La información se ha actualizado con éxito.');
    }
    public function darBajaCurso($id) {
        $curso = Curso::updateOrCreate(['id' => $id], ['estado' => false]);
        return back()->with('success', 'La materia '. $curso->nombre .' se dio de baja con éxito.');
    }
    public function deleteCurso($id) {
        Curso::where('id', $id)->delete();
        return back()->with('success', 'La materia se elimino con éxito.');
    }
    public function darAltaCurso($id) {
        $curso = Curso::updateOrCreate(['id' => $id], ['estado' => true]);
        return back()->with('success', 'La materia '. $curso->nombre .' se dio de alta con éxito.');
    }
    public function allPagos() {
        $pagos = Pago::all();
        return View('admin.pagos.index', compact('pagos'));
    }
    public function cursosActivos() {
        $cursos = CursoDocente::all();
        return view('admin.materias.curso_activo', compact('cursos'));
    }
    public function asignarCurso($id) {
        $docentes = Docente::where('estado', true)->get();
        $aulas = Aula::where('estado', true)->get();
        $horarios = Horario::all();
        $materia = Curso::find($id);
        $isEditing = false;
        return view('admin.materias.asignar_curso', compact('materia', 'docentes', 'aulas', 'horarios', 'isEditing'));
    }
    public function asignarGuardarCurso(Request $request) {
        $rules = [
            'docente' => 'required|string|max:255',
            'curso' => 'required|numeric',
            'horario' => 'required|numeric',
            'aula' => 'required|numeric',
            'fechaInico' => 'required|date',
            'fechaFin' => 'required|date|after:fInico',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg',
        ];
        $request->validate($rules);
        $docenteHorarioOcupado = CursoDocente::where('docente_id', $request->docente)
            ->where('horario_id', $request->horario)->first();
        if ($docenteHorarioOcupado && $docenteHorarioOcupado->fecha_fin < $request->fechaInico ) {
            return redirect()->back()->with('error', 'El docente ya está asignado en ese horario.');
        }
        $aulaHorarioOcupado = CursoDocente::where('aula_id', $request->aula)
            ->where('horario_id', $request->horario)->first();
        if ($aulaHorarioOcupado && $aulaHorarioOcupado->fecha_fin < $request->fechaInico ) {
            return redirect()->back()->with('error', 'El aula ya está ocupada en ese horario.');
        }
        $curso = new CursoDocente();
        $curso->docente_id = $request->docente;
        $curso->curso_id = $request->curso;
        $curso->responsable_id = auth()->user()->id;
        $curso->aula_id = $request->aula;
        $curso->horario_id = $request->horario;
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $nombreArchivo = uniqid() . '.' . $request->file('imagen')->extension();
            $archivoPath = $request->file('imagen')->storeAs('img/cursos', $nombreArchivo, 'public');
            $curso->imagen = 'storage/' . $archivoPath;
        }
        $curso->fecha_ini = $request->fechaInico;
        $curso->fecha_fin = $request->fechaFin;
        $curso->save();
        return redirect()->route('admin.cursos.activos')->with('success', 'El curso se habilito con éxito.');
    }
    public function editCursoAsignado($id) {
        $docentes = Docente::where('estado', true)->get();
        $aulas = Aula::where('estado', true)->get();
        $horarios = Horario::all();
        $asignado = CursoDocente::find($id);
        $materia = Curso::find($asignado->curso_id);
        $isEditing = true;
        return view('admin.materias.asignar_curso', compact('docentes', 'materia', 'horarios', 'isEditing', 'asignado', 'aulas'));
    }
    public function asignarActualizarCurso(Request $request, $id) {
        $this->validate($request, [
            'docente' => 'required|string|max:255',
            'curso' => 'required|numeric',
            'horario' => 'required|numeric',
            'aula' => 'required|numeric',
            'fechaInico' => 'required|date',
            'fechaFin' => 'required|date|after:fInico',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:max_width=2000,max_height=2000',
        ]);
        $docenteHorarioOcupado = CursoDocente::where('docente_id', $request->docente)
        ->where('horario_id', $request->horario)->first();
        if ($docenteHorarioOcupado && $docenteHorarioOcupado->fecha_fin < $request->fechaInico ) {
            return redirect()->back()->with('error', 'El docente ya está asignado en ese horario.');
        }
        $aulaHorarioOcupado = CursoDocente::where('aula_id', $request->aula)
            ->where('horario_id', $request->horario)->first();
        if ($aulaHorarioOcupado && $aulaHorarioOcupado->fecha_fin < $request->fechaInico ) {
            return redirect()->back()->with('error', 'El aula ya está ocupada en ese horario.');
        }
        $curso = CursoDocente::find($id);
        $curso->docente_id = $request->docente;
        $curso->curso_id = $request->curso;
        $curso->responsable_id = auth()->user()->id;
        $curso->aula_id = $request->aula;
        $curso->horario_id = $request->horario;
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $rutaImagenAnterior = $curso->imagen;
            $nombreArchivo = uniqid() . '.' . $request->file('imagen')->extension();
            $archivoPath = $request->file('imagen')->storeAs('img/cursos', $nombreArchivo, 'public');
            $curso->imagen = 'storage/' . $archivoPath;
            if ($rutaImagenAnterior && Storage::disk('public')->exists($rutaImagenAnterior)) {
                Storage::disk('public')->delete($rutaImagenAnterior);
            }
        }
        $curso->fecha_ini = $request->fechaInico;
        $curso->fecha_fin = $request->fechaFin;
        $curso->update();
        return redirect()->route('admin.cursos.activos')->with('success', 'El curso se actualizo con éxito.');
    }
    public function showCurso($id) {
        $curso = CursoDocente::find($id);
        return view('admin.materias.show', compact('curso'));
    }
    public function gestionarEstadoCurso(Request $request, $id) {
        $curso = CursoDocente::updateOrCreate(['id' => $id], ['estado' => $request->estado]);
        $action = $request->estado ? 'alta' : 'baja';
        return back()->with('success', "La materia {$curso->nombre} se dio de {$action} con éxito.");
    }
    public function deleteCursoActivo($id) {
        CursoDocente::where('id', $id)->delete();
        return back()->with('success', 'La materia se eliminó con éxito.');
    }
    public function guardarImprimirPago($id) {
        return back();
    }
    public function guardarPago($id) {
        return back();
    }
}
