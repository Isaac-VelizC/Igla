<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use App\Models\NumTelefono;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $docente = Docente::find($id);
        $isEditing = true;
        return view('admin.materias.create', compact('docente', 'isEditing'));
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
        dd($request);
        return back();
    }
}
