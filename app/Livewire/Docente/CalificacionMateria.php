<?php

namespace App\Livewire\Docente;

use App\Models\CursoDocente;
use Livewire\Component;

class CalificacionMateria extends Component
{
    public $estudiantes;
    public CursoDocente $materia;
    public function mount($id) {
        $curso = CursoDocente::with('inscripciones.estudiante')->find($id);
        $this->estudiantes = $curso->inscripciones->pluck('estudiante');
    }
    public function render()
    {
        return view('livewire.docente.calificacion-materia');
    }
}
