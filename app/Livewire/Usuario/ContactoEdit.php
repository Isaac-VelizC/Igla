<?php

namespace App\Livewire\Usuario;

use App\Models\Contacto;
use App\Models\Estudiante;
use App\Models\NumTelefono;
use App\Models\Persona;
use Livewire\Component;

class ContactoEdit extends Component
{
    public Contacto $contacto;
    public $num;
    public $contactId = '';

    public $contactoEdit = [
        'nombre' => '',
        'paterno' => '',
        'materno' => '',
        'cedula' => '',
        'genero' => '',
        'celular' => '',
        'email' => '',
    ];

    public function mount(Estudiante $estudiante)
    {
        $this->contacto = Contacto::find($estudiante->contact_id);
        $this->num = NumTelefono::where('id_persona', $this->contacto->persona->id)->first();
        if (!$this->contacto) {
            abort(404, 'Contacto no encontrado');
        }
        $this->contactId = $this->contacto->id;
        $this->edit();
    }

    public function edit() {
        $this->contactoEdit['nombre'] = $this->contacto->persona->nombre;
        $this->contactoEdit['paterno'] = $this->contacto->persona->ap_paterno;
        $this->contactoEdit['materno'] = $this->contacto->persona->ap_materno;
        $this->contactoEdit['cedula'] = $this->contacto->persona->ci;
        $this->contactoEdit['genero'] = $this->contacto->persona->genero;  
        $this->contactoEdit['celular'] = $this->num->numero_tel;  
        $this->contactoEdit['email'] = $this->contacto->persona->email;  
    }

    public function update() {
        $cont = Contacto::find($this->contactId);
        /*$rules = [
            'nombre' => 'required|string',
            'ap_pat' => 'string',
            'ap_mat' => 'string',
            'ci' => 'required|string|unique:personas,ci,' . $cont->pers_id,
            'genero' => 'required|in:Mujer,Hombre',
            'email' => 'nullable|email|unique:personas,email,' . $cont->pers_id,
        ];
        $request->validate($rules);*/
        $pers = Persona::find($cont->pers_id);
        $pers->update([
            'nombre' => $this->contactoEdit['nombre'],
            'ap_paterno' => $this->contactoEdit['paterno'],
            'ap_materno' => $this->contactoEdit['materno'],
            'ci' => $this->contactoEdit['cedula'],
            'genero' => $this->contactoEdit['genero'],
            'email' => $this->contactoEdit['email'],
        ]);

        NumTelefono::updateOrInsert(
            ['id_persona' => $pers->id],
            ['numero_tel' => $this->contactoEdit['celular'],]
        );
        $this->contacto = Contacto::find($this->contactId);
        $this->num = NumTelefono::where('id_persona', $this->contacto->persona->id)->first();
        return back()->with('success', 'La informacion del contacto se actualizo con éxito.');
    }

    public function render()
    {
        return view('livewire.usuario.contacto-edit');
    }
}
