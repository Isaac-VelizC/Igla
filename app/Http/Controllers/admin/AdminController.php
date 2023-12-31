<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Miembro;
use App\Models\NumTelefono;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index() {
        $users = User::all();
        $estudiantes = Estudiante::all();
        $docentes = Docente::all();
        $materias = Curso::all();
        return view('admin.home', compact('users', 'estudiantes', 'docentes', 'materias'));
    }

    public function allPersonal() {
        $personals = Miembro::all();
        $formType = false;
        return view('admin.usuarios.administrador.index', compact('personals', 'formType'));
    }

    public function store(Request $request) {
        $rules = [
            'nombre' => 'required|string',
            'ap_pat' => 'nullable|string',
            'ap_mat' => 'nullable|string',
            'ci' => 'required|string|unique:personas,ci',
            'genero' => 'required|in:Mujer,Hombre',
            'email' => 'required|email|unique:personas,email',
            'telefono' => 'nullable|string',
            'perfil' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:max_width=2000,max_height=2000',
            'rol' => 'required|string',
        ];
        $request->validate($rules);
        if ($request->fails()) {
            return redirect()->back()->withErrors($request)->withInput();
        }
        dd($request);
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
        $user->assignRole('Chef');
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
        $doc = new Miembro();
        $doc->id_persona = $pers->id;
        $doc->contratado_en = $request->contrato;
        $doc->save();
        // Redirige de vuelta a la página anterior
        return redirect()->route('admin.docentes')->with('success', 'La información se guardo con éxito.');
    }

    public function allUsers() {
        $users = Persona::join('users', 'personas.user_id', '=', 'users.id')->select('personas.*')->get();
        return view('admin.usuarios.lista_users', compact('users'));
    }
    public function showPersonal($id) {
        $estadoRol = true;
        $item = Persona::find($id);
        $rol = "personal";
        $roles = Role::all();
        return view('admin.usuarios.chefs.show', compact('item', 'rol', 'estadoRol', 'roles'));
    }
    
    public function update(Request $request, $id) {
        dd($request . 'update');
    }
    public function darBajaPersonal($id) {
        $persona = Persona::find($id);
        if ($persona) {
            $persona->update(['estado' => false]);
            Miembro::where('pers_id', $id)->update(['estado' => false]);
            return back()->with('success', 'Se dio de baja al personal');
        } else {
            return back()->with('error', 'No se encontró la persona');
        }
    }
    public function darAltaPersonal($id) {
        $persona = Persona::find($id);
        if ($persona) {
            $persona->update(['estado' => true]);
            Miembro::where('pers_id', $id)->update(['estado' => true]);
            return back()->with('success', 'Se dio de Alta al personal');
        } else {
            return back()->with('error', 'No se encontró la persona');
        }
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
    public function cambiarRol(Request $request, $id) {
        $user = User::find($id);
        $request->validate([
            'rol' => 'required|string|exists:roles,name',
        ]);
        $nuevoRol = $request->input('rol');
        $user->roles()->detach();
        $user->assignRole($nuevoRol);
        return back()->with('success', 'Rol cambiado con éxito.');
    }
}
