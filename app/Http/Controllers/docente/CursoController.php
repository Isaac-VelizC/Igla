<?php

namespace App\Http\Controllers\docente;

use App\Http\Controllers\Controller;
use App\Models\CursoDocente;
use App\Models\Documentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;

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
    public function cursoConfiguracion($id) {
        $files = Documentos::latest()->where('materia_id', $id)->get();
        $curso = CursoDocente::find($id);
        return view('profesor.cursos.configuracion.index', compact('curso', 'files'));
    }
    public function uploadDocuments(Request $request, $id) {
        $request->validate([
            'file' => 'required|file|max:2048'
        ]);

        $user_id = Auth::id();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->storeAs('public/img/documents', 'documento_' . time() . '.' . $file->getClientOriginalExtension());
    
            $url = Storage::url($path);
            Documentos::create([
                'archivo' => $url,
                'materia_id' => $id,
                'user_id' => $user_id,
            ]);
            return back()->with('success', '¡Archivos cargados con éxito!');
        } else {
            return back()->with('error', '¡No se ha seleccionado ningún archivo!');
        }
    }

    public function uploads(Request $request) {
        dd($request);
        CursoDocente::find()->create([]);
        return back();
    }
}
