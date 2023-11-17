<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contacto;
use App\Models\Curso;
use App\Models\CursoDocente;
use App\Models\Estudiante;
use App\Models\Horario;
use App\Models\NumTelefono;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EstudianteController extends Controller
{
    public function index() {
        $estudiantes = Estudiante::with('persona')->orderBy('created_at', 'desc')->get();
        return view('admin.usuarios.estudiantes.index', compact('estudiantes'));
    }
    public function formInscripcion() {
        $horarios = Horario::all();
        return view('admin.inscripciones.form_inscripcion', compact('horarios'));
    }
    public function inscripcion(Request $request) {
        $rules = [
            'nombre' => 'required|string',
            'ci' => 'required|string|unique:personas,ci|unique:personas,email|unique:personas',
            'genero' => 'required|in:Mujer,Hombre',
            'email' => 'required|email',
            'telefono' => 'nullable|string',
            'direccion' => 'required|string',
            'fNac' => 'required|date',
            'nombreC' => 'required|string',
            'ciC' => 'required|string|unique:personas,ci',
            'generoC' => 'required|in:Mujer,Hombre',
            'emailC' => 'nullable|email',
            'telefonoC' => 'required|string',
            'horario' => 'required|numeric',
        ];

        $request->validate($rules);
        $user = User::firstOrCreate(
            ['name' => $this->generateUniqueUsername($request->nombre)],
            ['email' => $request->email, 'password' => Hash::make('u.'.$request->ci)]
        );
        $user->assignRole('Estudiante');
        $pers = $user->persona()->create([
            'nombre' => $request->nombre,
            'ap_paterno' => $request->ap_pat,
            'ap_materno' => $request->ap_mat,
            'ci' => $request->ci,
            'genero' => $request->genero,
            'email' => $request->email,
        ]);
        $pers->numTelefono()->create(['numero_tel' => $request->telefono]);

        $contacto = Persona::create([
            'nombre' => $request->nombreC,
            'ap_paterno' => $request->ap_patC,
            'ap_materno' => $request->ap_matC,
            'ci' => $request->ciC,
            'genero' => $request->generoC,
            'email' => $request->emailC,
            'tipo_pers' => 'F',
        ]);

        $contacto->numTelefono()->create(['numero_tel' => $request->telefonoC]);

        $contac = $contacto->contacto()->create();

        $pers->estudiante()->create([
            'direccion' => $request->direccion,
            'fecha_nacimiento' => $request->fNac,
            'contact_id' => $contac->id,
            'turno_id' => $request->horario,
        ]);

        return redirect()->route('admin.estudinte')->with('success', 'La inscripción se ejecutó con éxito.');
    }
    private function generateUniqueUsername($nombre) {
        $username = strtolower($nombre);
        $numeroAleatorio = mt_rand(1000, 9999);
        return $username . $numeroAleatorio;
    }
    public function showEstudiante($id) {
        $estudiante = Persona::find($id);
        $est = Estudiante::where('pers_id', $estudiante->id)->first();
        $horarios = Horario::all();
        $roles = Role::all();
        $materias = CursoDocente::all();
        return view('admin.usuarios.estudiantes.show', compact('estudiante', 'est', 'horarios', 'roles', 'materias'));
    }
    public function update(Request $request, $id) {
        
        $estud = Estudiante::find($id);
        $rules = [
            'nombre' => 'required|string',
            'ap_pat' => 'nullable|string',
            'ap_mat' => 'nullable|string',
            'ci' => 'required|string|unique:personas,ci,' . $estud->persona->id,
            'genero' => 'required|in:Mujer,Hombre',
            'email' => 'required|email|unique:personas,email,' . $estud->persona->id,
            'direccion' => 'required|string',
            'telefono' => 'nullable|string',
            'fnac' => 'required|date',
            'horario' => 'required|numeric',
        ];
        $request->validate($rules);
        $estud->direccion = $request->direccion;
        $estud->fecha_nacimiento = $request->fnac;
        $estud->turno_id = $request->horario;
        $estud->update();
        $pers = Persona::find($estud->persona->id);
        $pers->nombre = $request->nombre;
        $pers->ap_paterno = $request->ap_pat;
        $pers->ap_materno = $request->ap_mat;
        $pers->ci = $request->ci;
        $pers->genero = $request->genero;
        $pers->email = $request->email;
        $pers->update();
        NumTelefono::where('id_persona', $pers->id)->update(['numero_tel' => $request->telefono]);

        return back()->with('success', 'La informacion se actualizo con éxito.');
    }

    public function cambiarPass(Request $request, $id) {
        $rules = [
            'pass' => 'required|min:8',
            'passConfirm' => 'required|same:pass',
        ];
        $request->validate($rules);
        $estud = User::find($id);
        $estud->password = Hash::make($request->input('passConfirm'));
        $estud->save();
        return back()->with('success', 'La contraseña se cambio con éxito.');
    }
    public function darBajaEstudiante($id) {
        $persona = Persona::find($id);
        if ($persona) {
            $persona->update(['estado' => false]);
            Estudiante::where('pers_id', $id)->update(['estado' => false]);
            return back()->with('success', 'Se dio de baja al estudiante');
        } else {
            return back()->with('error', 'No se encontró la persona');
        }
    }
    public function darAltaEstudiante($id) {
        $persona = Persona::find($id);
        if ($persona) {
            $persona->update(['estado' => true]);
            Estudiante::where('pers_id', $id)->update(['estado' => true]);
            return back()->with('success', 'Se dio de Alta al estudiante');
        } else {
            return back()->with('error', 'No se encontró la persona');
        }
    }
}
