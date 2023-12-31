<?php

namespace App\Http\Controllers\docente;

use App\Http\Controllers\Controller;
use App\Models\CursoDocente;
use App\Models\Documentos;
use App\Models\Trabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CursoController extends Controller
{
    public function index() {
        $cursos_A = CursoDocente::where('estado', true)->get();
        $cursos_I = CursoDocente::where('estado', false)->get();
        return view('profesor.cursos.index', compact('cursos_A', 'cursos_I'));
    }

    public function curso($id) {
        $user = Auth::user();
        $role = $user->roles->first();
        $curso = CursoDocente::find($id);
        return view('profesor.cursos.curso', compact('curso', 'role'));
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
        
        /*if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
        $nombreArchivo = uniqid() . '.' . $request->file('imagen')->extension();
        $archivoPath = $request->file('imagen')->storeAs('img/cursos', $nombreArchivo, 'public');
        $curso->imagen = 'storage/' . $archivoPath;
        }*/
        /**
         * 
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $rutaImagenAnterior = $curso->imagen;
            $nombreArchivo = uniqid() . '.' . $request->file('imagen')->extension();
            $archivoPath = $request->file('imagen')->storeAs('img/cursos', $nombreArchivo, 'public');
            $curso->imagen = 'storage/' . $archivoPath;
            if ($rutaImagenAnterior && Storage::disk('public')->exists($rutaImagenAnterior)) {
                Storage::disk('public')->delete($rutaImagenAnterior);
            }
        }
         */
        return back();
    }
}
