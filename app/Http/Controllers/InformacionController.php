<?php

namespace App\Http\Controllers;

use App\Models\Informacion;
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
}
