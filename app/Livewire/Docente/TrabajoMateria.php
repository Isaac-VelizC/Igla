<?php

namespace App\Livewire\Docente;

use App\Models\CursoDocente;
use App\Models\Tema;
use Livewire\Component;

class TrabajoMateria extends Component
{
    public $tema, $idCurso;
    public CursoDocente $materia;
    public function mount($id)
    {
        $this->idCurso = $id;
        $this->materia = CursoDocente::findOrFail($id);
    }
    public function formTarea()
    {
        //$this->showModalTarea = true;
    }
    public function formTema()
    {
        $this->validate([
            'tema' => 'required|string|max:255',
        ]);
        Tema::create([
            'tema' => $this->tema,
            'curso_id' => $this->idCurso,
        ]);
        session()->flash('message', 'El Tema se creo con éxito');
        $this->tema = '';
    }
    public function render()
    {
        return view('livewire.docente.trabajo-materia');
    }
}
