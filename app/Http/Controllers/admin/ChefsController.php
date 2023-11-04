<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use App\Models\NumTelefono;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class ChefsController extends Controller
{
    public function index() {
        $chefRole = Role::where('name', 'chef')->first();
        if ($chefRole) {
            $chefs = User::role($chefRole)->get();
            return view('admin.usuarios.chefs.index', compact('chefs'));
        }
        return view('admin.usuarios.chefs.index');
    }

    public function allDocentes() {
        $docentes = Persona::whereHas('docente')->get();
        return view('admin.usuarios.chefs.index', compact('docentes'));
    }
    public function create()
    {
        $isEditing = false;
        return view('admin.usuarios.chefs.create', compact('isEditing'));
    }
    public function edit($id)
    {
        $docente = Persona::find($id);
        $isEditing = true;
        return view('admin.usuarios.chefs.create', compact('docente', 'isEditing'));
    }
    public function store(Request $request) {
        // Genera el nombre de usuario basado en el nombre y un número aleatorio
        $username = $this->generateUniqueUsername($request->nombre);
        // Verifica si el nombre de usuario ya existe
        $count = User::where('name', $username)->count();
        if ($count > 0) {
            // Agrega un sufijo numérico si es necesario para hacerlo único
            $username = $this->makeUsernameUnique($username, $count);
        }
        // Crea el nuevo usuario
        $user = User::create([
            'name' => $username,
            'email' => $request->email,
            'password' => Hash::make('u.'.$request->ci)
        ]);
        // Asigna el rol 'chef' al usuario
        $user->assignRole('chef');
        // Crea y guarda la información personal
        $pers = new Persona();
        $pers->user_id = $user->id;
        $pers->nombre = $request->nombre;
        $pers->ap_paterno = $request->ap_pat;
        $pers->ap_materno = $request->ap_mat;
        $pers->ci = $request->ci;
        $pers->genero = $request->genero;
        $pers->email = $request->email;
        if ($request->hasFile('perfil') && $request->file('perfil')->isValid()) {
            $nombreArchivo = uniqid() . '.' . $request->file('perfil')->extension();
            $archivoPath = $request->file('perfil')->storeAs('img/perfil', $nombreArchivo, 'public');
            $pers->photo = 'storage/' . $archivoPath;
        }
        $pers->save();
        // Crea y guarda el número de teléfono
        $numT = new NumTelefono();
        $numT->id_persona = $pers->id;
        $numT->numero_tel = $request->telefono;
        $numT->save();
        // Crea y guarda la información del docente
        $doc = new Docente();
        $doc->id_persona = $pers->id;
        $doc->contratado_en = $request->contrato;
        $doc->max_hora_trabajos = $request->horas;
        $doc->save();
        // Redirige de vuelta a la página anterior
        return redirect()->route('admin.docentes')->with('success', 'La información se guardo con éxito.');
    }
    
    private function generateUniqueUsername($nombre) {
        $username = strtolower($nombre);
        $numeroAleatorio = mt_rand(1000, 9999);
        return $username . $numeroAleatorio;
    }
    
    private function makeUsernameUnique($username, $count) {
        return $username . $count;
    }
    
    public function update(Request $request, $id) {
        // Crea y guarda la información personal
        $docente = Persona::find($id);
        $docente->nombre = $request->nombre;
        $docente->ap_paterno = $request->ap_pat;
        $docente->ap_materno = $request->ap_mat;
        $docente->ci = $request->ci;
        $docente->genero = $request->genero;
        $docente->email = $request->email;
        if ($request->hasFile('perfil') && $request->file('perfil')->isValid()) {
            $rutaImagenAnterior = $docente->photo;
            $nombreArchivo = uniqid() . '.' . $request->file('perfil')->extension();
            $archivoPath = $request->file('perfil')->storeAs('img/perfil', $nombreArchivo, 'public');
            $docente->photo = 'storage/' . $archivoPath;
            // Borrar la imagen anterior (si existe)
            if ($rutaImagenAnterior && Storage::disk('public')->exists($rutaImagenAnterior)) {
                Storage::disk('public')->delete($rutaImagenAnterior);
            }
        }
        $docente->update();
        // Crea y guarda el número de teléfono
        $numT = NumTelefono::where('id_persona', $id)->first();
        if ($numT !== null) {
            $numT->numero_tel = $request->telefono;
            $numT->update();
        } else {
            return back()->with('success', 'Lo siento hubo problemas para actualizar.');
        }
        // Crea y guarda la información del docente
        $doc = Docente::where('id_persona', $id)->first();
        if ($doc !== null) {
            $doc->contratado_en = $request->contrato;
            $doc->max_hora_trabajos = $request->horas;
            $doc->update();
        } else {
            return back()->with('success', 'Lo siento hubo problemas para actualizar.');
        }
        // Redirige de vuelta a la página anterior
        return back()->with('docente', $docente)->with('success', 'La información se actualizo con éxito.');
    }

    public function darBajaDocente($id) {
        dd($id);
        return back()->with('success', 'Se dio de baja al docente');
    }
    public function showDocente($id) {
        $docente = Persona::find($id);
        return view('admin.usuarios.chefs.show', compact('docente'));
    }
    
    public function cambiarPass(Request $request, $id) {
        $rules = [
            'pass' => 'required|min:8',
            'passConfirm' => 'required|same:pass',
        ];
        $request->validate($rules);
        $doc = User::find($id);
        $doc->password = Hash::make($request->input('passConfirm'));
        $doc->save();
        $docente = Persona::find($doc->persona->id);
        return view('admin.usuarios.chefs.show', compact('docente'))->with('success', 'La información se actualizo con éxito.');;
    }

}
