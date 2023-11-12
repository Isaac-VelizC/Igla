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
use Throwable;

class ChefsController extends Controller
{
    public function index() {
        $chefRole = Role::where('name', 'Chef')->first();
        if ($chefRole) {
            $chefs = User::role($chefRole)->get();
            return view('admin.usuarios.chefs.index', compact('chefs'));
        }
        return view('admin.usuarios.chefs.index');
    }
    public function allDocentes() {
        $docentes = Persona::whereHas('docente')->get();
        $formType = true;
        return view('admin.usuarios.chefs.index', compact('docentes', 'formType'));
    }
    public function store(Request $request) {

        $rules = [
            'nombre' => 'required|string',
            'ap_pat' => 'nullable|string',
            'ap_mat' => 'nullable|string',
            'ci' => 'required|string|unique:personas,ci',
            'genero' => 'required|in:Mujer,Hombre',
            'email' => 'required|email|unique:personas,email',
            'contrato' => 'required|date',
            'telefono' => 'nullable|string',
            'perfil' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:max_width=2000,max_height=2000',
        ];
        $request->validate($rules);

        $username = $this->generateUniqueUsername($request->nombre);
        // Verifica si el nombre de usuario ya existe
        $count = User::where('name', $username)->count();
        if ($count > 0) {
            $username = $this->makeUsernameUnique($username, $count);
        }
        $user = User::create([
            'name' => $username,
            'email' => $request->email,
            'password' => Hash::make('u.'.$request->ci)
        ]);
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
        $pers->tipo_pers = 'D';
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
        $rules = [
            'nombre' => 'required|string',
            'ap_pat' => 'nullable|string',
            'ap_mat' => 'nullable|string',
            'ci' => 'required|string|unique:personas,ci,' . $id,
            'genero' => 'required|in:Mujer,Hombre',
            'email' => 'required|email|unique:personas,email,' . $id,
            'contrato' => 'required|date',
            'telefono' => 'nullable|string',
            //'perfil' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:max_width=2000,max_height=2000|max:2048',
        ];
        $request->validate($rules);
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
            NumTelefono::create(['id_persona' => $id, 'numero_tel' => $request->telefono]);
        }
        // Crea y guarda la información del docente
        $doc = Docente::where('id_persona', $id)->first();
        if ($doc !== null) {
            $doc->contratado_en = $request->contrato;
            $doc->update();
        } else {
            return back()->with('success', 'Lo siento hubo problemas para actualizar la informacion del docente.');
        }
        // Redirige de vuelta a la página anterior
        return back()->with('docente', $docente)->with('success', 'La información se actualizo con éxito.');
    }
    public function darBajaDocente($id) {
        $persona = Persona::find($id);
        if ($persona) {
            $persona->update(['estado' => false]);
            Docente::where('id_persona', $id)->update(['estado' => false]);
            return back()->with('success', 'Se dio de baja al docente');
        } else {
            return back()->with('error', 'No se encontró la persona');
        }
    }
    public function darAltaDocente($id) {
        $persona = Persona::find($id);
        if ($persona) {
            $persona->update(['estado' => true]);
            Docente::where('id_persona', $id)->update(['estado' => true]);
            return back()->with('success', 'Se dio de Alta al docente');
        } else {
            return back()->with('error', 'No se encontró la persona');
        }
    }
    public function showDocente($id) {
        $estadoRol = false;
        $item = Persona::find($id);
        $rol = "docente";
        $roles = Role::all();
        return view('admin.usuarios.chefs.show', compact('item', 'estadoRol', 'rol', 'roles'));
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
