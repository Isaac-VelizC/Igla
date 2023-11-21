<?php

namespace App\Livewire\Docente;

use App\Models\CursoDocente;
use Livewire\Component;

class CalificacionMateria extends Component
{
    public CursoDocente $materia;
    public function mount($id) {
        $this->materia = CursoDocente::findOrFail($id);
    }
    public function render()
    {
        return view('livewire.docente.calificacion-materia');
    }
}
