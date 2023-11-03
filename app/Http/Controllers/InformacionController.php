<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Horario;
use App\Models\Informacion;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformacionController extends Controller
{
    public function guardarInformacion(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
        ]);
        $nuevaInformacion = new Informacion();
        $nuevaInformacion->nombre = $request->nombre;
        $nuevaInformacion->titulo = $request->titulo;
        $nuevaInformacion->subtitulo1 = $request->sub1;
        $nuevaInformacion->subtitulo2 = $request->sub2;
        $nuevaInformacion->descripcion1 = $request->descrip1;
        $nuevaInformacion->descripcion2 = $request->descrip2;
        $nuevaInformacion->telefono = $request->telefono;
        $nuevaInformacion->correo = $request->email;
        $nuevaInformacion->facebook = $request->facebook;
        $nuevaInformacion->twitter = $request->twitter;
        $nuevaInformacion->instagram = $request->instagram;
        $nuevaInformacion->linkedin = $request->linkedin;
        $nuevaInformacion->latitud = $request->latitud;
        $nuevaInformacion->longitud = $request->longitud;
        if ($request->hasFile('file1') && $request->file('file1')->isValid()) {
            $nombreArchivo = uniqid() . '.' . $request->file('file1')->extension();
            $archivoPath = $request->file('file1')->storeAs('img', $nombreArchivo, 'public');
            $nuevaInformacion->logo = 'storage/' . $archivoPath;
        }
        if ($request->hasFile('file2') && $request->file('file2')->isValid()) {
            $nombreArchivo = uniqid() . '.' . $request->file('file2')->extension();
            $archivoPath = $request->file('file2')->storeAs('img', $nombreArchivo, 'public');
            $nuevaInformacion->imagen1 = 'storage/' . $archivoPath;
        }
        $nuevaInformacion->save();
        return back()->with('success', 'La información se ha guardado con éxito.');
    }

    public function actualizarInformacion(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
        ]);
        
        $nuevaInformacion = Informacion::find($id);
        $nuevaInformacion->nombre = $request->nombre;
        $nuevaInformacion->titulo = $request->titulo;
        $nuevaInformacion->subtitulo1 = $request->sub1;
        $nuevaInformacion->subtitulo2 = $request->sub2;
        $nuevaInformacion->descripcion1 = $request->descrip1;
        $nuevaInformacion->descripcion2 = $request->descrip2;
        $nuevaInformacion->telefono = $request->telefono;
        $nuevaInformacion->correo = $request->email;
        $nuevaInformacion->facebook = $request->facebook;
        $nuevaInformacion->twitter = $request->twitter;
        $nuevaInformacion->instagram = $request->instagram;
        $nuevaInformacion->linkedin = $request->linkedin;
        $nuevaInformacion->latitud = $request->latitud;
        $nuevaInformacion->longitud = $request->longitud;
        if ($request->hasFile('file1') && $request->file('file1')->isValid()) {
            // Obtener la ruta de la imagen anterior desde la base de datos
            $rutaImagenAnterior = $nuevaInformacion->logo;
            // Guardar la nueva imagen
            $nombreArchivo = uniqid() . '.' . $request->file('file1')->extension();
            $archivoPath = $request->file('file1')->storeAs('img', $nombreArchivo, 'public');
            $nuevaInformacion->logo = 'storage/' . $archivoPath;
            // Borrar la imagen anterior (si existe)
            if ($rutaImagenAnterior && Storage::disk('public')->exists($rutaImagenAnterior)) {
                Storage::disk('public')->delete($rutaImagenAnterior);
            }
        }
        if ($request->hasFile('file2') && $request->file('file2')->isValid()) {
            // Obtener la ruta de la imagen anterior desde la base de datos
            $rutaImagenAnterior = $nuevaInformacion->imagen1;
            // Guardar la nueva imagen
            $nombreArchivo = uniqid() . '.' . $request->file('file2')->extension();
            $archivoPath = $request->file('file2')->storeAs('img', $nombreArchivo, 'public');
            $nuevaInformacion->imagen1 = 'storage/' . $archivoPath;
            // Borrar la imagen anterior (si existe)
            if ($rutaImagenAnterior && Storage::disk('public')->exists($rutaImagenAnterior)) {
                Storage::disk('public')->delete($rutaImagenAnterior);
            }
        }
        $nuevaInformacion->update();
        return back()->with('success', 'La información se ha actualizado con éxito.');
    }

    public function adminstrarInfo() {
        $horarios = Horario::all();
        $aulas = Aula::all();
        $modulos = Periodo::all();
        return view('admin.administracion.index', compact('aulas', 'horarios', 'modulos'));
    }

    public function storeAula(Request $request) {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'capacidad' => 'required|numeric',
        ]);
        $aula = new Aula();
        $aula->nombre = $request->nombre;
        $aula->codigo = $request->codigo;
        $aula->capacidad = $request->capacidad;
        $aula->save();
        return back()->with('success', 'La información se ha guardado con éxito.');
    }

    public function updateAula(Request $request, $id) {
        dd($request);
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'capacidad' => 'required|numeric',
        ]);
        $aula = Aula::find($id);
        $aula->nombre = $request->nombre;
        $aula->codigo = $request->codigo;
        $aula->capacidad = $request->capacidad;
        $aula->update();
        return back()->with('success', 'La información se ha actualizado con éxito.');
    }

    public function storeHorario(Request $request) {
        $this->validate($request, [
            'horarios' => 'required|string|max:255',
        ]);
        $hora = new Horario();
        $hora->horarios = $request->horarios;
        $hora->save();
        return back()->with('success', 'La información se ha guardado con éxito.');
    }

    public function updateHorario(Request $request, $id) {
        dd($request);
        $this->validate($request, [
            'horarios' => 'required|string|max:255',
        ]);
        $hora = Horario::find($id);
        $hora->horarios = $request->horarios;
        $hora->update();
        return back()->with('success', 'La información se ha actualizado con éxito.');
    }

    public function storeModalidad(Request $request) {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'descrip' => 'string|max:255',
        ]);
        $modulo = new Periodo();
        $modulo->nombre = $request->nombre;
        $modulo->costo = $request->costo;
        $modulo->descripcion = $request->descrip;
        $modulo->save();
        return back()->with('success', 'La información se ha guardado con éxito.');
    }

    public function updateModalidad(Request $request, $id) {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'descrip' => 'string|max:255',
        ]);
        $modulo = Periodo::find($id);
        $modulo->nombre = $request->nombre;
        $modulo->costo = $request->costo;
        $modulo->descripcion = $request->descrip;
        $modulo->update();
        return back()->with('success', 'La información se ha guardado con éxito.');
    }
}
