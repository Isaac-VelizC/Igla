<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contacto;
use App\Models\Estudiante;
use App\Models\NumTelefono;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EstudianteController extends Controller
{
    public function index() {
        $estudiantes = Estudiante::with('persona')->get();
        return view('admin.usuarios.estudiantes.index', compact('estudiantes'));
    }

    public function formInscripcion() {
        return view('admin.inscripciones.form_inscripcion');
    }

    public function inscripcion(Request $request) {

        $username = $this->generateUniqueUsername($request->nombre);
        $count = User::where('name', $username)->count();
        if ($count > 0) {
            $username = $this->makeUsernameUnique($username, $count);
        }
        // Crea el nuevo usuario
        $user = User::create([
            'name' => $username,
            'email' => $request->email,
            'password' => Hash::make('u.'.$request->ci)
        ]);
        $user->assignRole('estudiante');
        // Crea y guarda la información personal
        $pers = new Persona();
        $pers->user_id = $user->id;
        $pers->nombre = $request->nombre;
        $pers->ap_paterno = $request->ap_pat;
        $pers->ap_materno = $request->ap_mat;
        $pers->ci = $request->ci;
        $pers->genero = $request->genero;
        $pers->email = $request->email;
        $pers->save();
        // Crea y guarda el número de teléfono
        $numT = new NumTelefono();
        $numT->id_persona = $pers->id;
        $numT->numero_tel = $request->telefono;
        $numT->save();
        // Crea y guarda la información del docente
        $estud = new Estudiante();
        $estud->pers_id = $pers->id;
        $estud->direccion = $request->direccion;
        $estud->fecha_nacimiento = $request->fNac;
        $estud->estado = $request->estado;
        $estud->save();

        $contacto = new Persona();
        $contacto->nombre = $request->nombreC;
        $contacto->ap_paterno = $request->ap_patC;
        $contacto->ap_materno = $request->ap_matC;
        $contacto->ci = $request->ciC;
        $contacto->genero = $request->generoC;
        $contacto->email = $request->emailC;
        $contacto->save();

        $numC = new NumTelefono();
        $numC->id_persona = $contacto->id;
        $numC->numero_tel = $request->telefonoC;
        $numC->save();

        $contac = new Contacto();
        $contac->estudiante_id = $estud->id;
        $contac->pers_id = $contacto->id;
        $contac->save();
        // Redirige de vuelta a la página anterior
        return back()->with('success', 'La inscripción se ejecuto con éxito.');
    }
    private function generateUniqueUsername($nombre) {
        $username = strtolower($nombre);
        $numeroAleatorio = mt_rand(1000, 9999);
        return $username . $numeroAleatorio;
    }
    
    private function makeUsernameUnique($username, $count) {
        return $username . $count;
    }

    public function showEstudiante($id) {
        $estudiante = Persona::find($id);
        $est = Estudiante::where('pers_id', $estudiante->id)->first();
        $contac = Contacto::where('estudiante_id', $est->id)->first();
        $num = NumTelefono::where('id_persona', $contac->persona->id)->first();
        return view('admin.usuarios.estudiantes.show', compact('estudiante', 'est', 'contac', 'num'));
    }

    public function update(Request $request, $id) {
        /*$rules = [
            'pass' => 'required|min:8',
            'passConfirm' => 'required|same:pass',
        ];
        $request->validate($rules);*/
        // Crea y guarda la información del docente
        $estud = Estudiante::find($id);
        $estud->direccion = $request->direccion;
        $estud->fecha_nacimiento = $request->fnac;
        $estud->update();
        $pers = Persona::find($estud->persona->id);
        $pers->nombre = $request->nombre;
        $pers->ap_paterno = $request->ap_pat;
        $pers->ap_materno = $request->ap_mat;
        $pers->ci = $request->ci;
        $pers->genero = $request->genero;
        $pers->email = $request->email;
        $pers->update();
        // Crea y guarda el número de teléfono
        $numT = NumTelefono::where('id_persona', $pers->id)->first();
        $numT->numero_tel = $request->telefono;
        $numT->update();
        
        return back()->with('success', 'La informacion se actualizo con éxito.');
    }
    public function updateContacto(Request $request, $id) {
        /*$rules = [
            'pass' => 'required|min:8',
            'passConfirm' => 'required|same:pass',
        ];
        $request->validate($rules);*/
        $cont = Contacto::find($id);
        $pers = Persona::find($cont->pers_id);
        $pers->nombre = $request->nombre;
        $pers->ap_paterno = $request->ap_pat;
        $pers->ap_materno = $request->ap_mat;
        $pers->ci = $request->ci;
        $pers->genero = $request->genero;
        $pers->email = $request->email;
        $pers->save();

        NumTelefono::updateOrInsert(
            ['id_persona' => $pers->id],
            ['numero_tel' => $request->telefono]
        );
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
}
