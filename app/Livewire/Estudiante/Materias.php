<?php

namespace App\Livewire\Estudiante;

use App\Models\Curso;
use App\Models\CursoDocente;
use App\Models\Horario;
use Livewire\Component;

class Materias extends Component
{
    public $materias, $materiaSeleccionada, $cursosActivos, $horarios, $tabActiva;

    public function mount($estudiante)
    {
        $this->materias = Curso::all();
        $this->horarios = Horario::all();
        $this->tabActiva = null;
        $this->cursosActivos = $this->obtenerCursosActivos();
    }


    public function render()
    {
        return view('livewire.estudiante.materias');
    }
    public function seleccionarMateria($materiaId)
    {
        $this->materiaSeleccionada = Curso::find($materiaId);
    }

    public function obtenerCursosActivos()
    {
        $cursosActivos = [];


        return $cursosActivos;
    }
    public function cursos($cursoId, $horaId)
    {
        $this->cursosActivos = CursoDocente::where('horario_id', $horaId)->where('curso_id', $cursoId)->get();
    }
}
