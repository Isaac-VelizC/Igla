<?php

namespace App\Livewire\Docente\Trabajo;

use App\Models\CursoDocente;
use App\Models\Documentos;
use App\Models\Trabajo;
use App\Models\TrabajoEstudiante;
use Livewire\Component;

class ShowTarea extends Component
{
    public $tareaId;
    public Trabajo $tarea;
    public $entregas, $estudiantes, $filesTarea;
    public function mount($id) {
        $this->tareaId = $id;
        $this->tarea = Trabajo::find($id);
        $this->entregas = TrabajoEstudiante::where('tarea_id', $id)->get();
        $this->filesTarea = Documentos::where('tarea_id', $id)->get();
        $curso = CursoDocente::with('inscripciones.estudiante')->find($this->tarea->curso->id);
        $this->estudiantes = $curso->inscripciones->pluck('estudiante');
    }
    public function render()
    {
        return view('livewire.docente.trabajo.show-tarea')->extends('layouts.app')
        ->section('content');
    }
}
