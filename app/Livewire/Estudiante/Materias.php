<?php

namespace App\Livewire\Estudiante;

use App\Models\Curso;
use App\Models\CursoDocente;
use App\Models\Horario;
use App\Models\Inscripcion;
use Livewire\Component;

class Materias extends Component
{
    public $materias, $materiaSeleccionada, $cursosActivos, $horarios, $tabActiva, $idEst;
    public $listeners = ['flash' => 'mostrarMensajeFlash'];
    public $showModal = false;
    public $estadoEst;

    public function mount($estudiante)
    {
        $this->idEst = $estudiante;
        $this->materias = Curso::all();
        $this->horarios = Horario::all();
        $this->tabActiva = null;
    }
    public function mostrarMensajeFlash($message)
    {
        session()->flash('message', $message);
    }
    public function render()
    {
        return view('livewire.estudiante.materias');
    }
    public function seleccionarMateria($materiaId)
    {
        $this->materiaSeleccionada = Curso::find($materiaId);
        $this->showModal = true;
    }
    public function cursos($cursoId, $horaId)
    {
        $this->tabActiva = $horaId;
        $this->cursosActivos = CursoDocente::where('horario_id', $horaId)->where('curso_id', $cursoId)->get();
        $this->estadoEst = true;
    }
    public function programarMateria($cursoDocenteId) {
        Inscripcion::create([
        'estudiante_id' => $this->idEst,
        'responsable_id' => auth()->user()->id,
        'materia_id' => $cursoDocenteId
        ]);
        $this->cerrarModal();
        $this->mostrarMensajeFlash('El curso se programo con exito.');
    }
    public function borrarProgramacion($cursoDocenteId) {
        Inscripcion::where('estudiante_id', $this->idEst)->where('materia_id', $cursoDocenteId)->delete();
        $this->cerrarModal();
        $this->mostrarMensajeFlash('El curso se programado se borro con exito.');
    }
    public function cerrarModal()
    {
        $this->showModal = false;
    }
}
