<?php

namespace App\Livewire\Docente\Trabajo;

use App\Models\CursoDocente;
use App\Models\Pregunta;
use App\Models\PreguntaEstudiante;
use Livewire\Component;

class ShowPregunta extends Component
{
    public $preguntaId;
    public Pregunta $pregunta;
    public $respuestas, $estudiantes;
    public function mount($id) {
        $this->preguntaId = $id;
        $this->pregunta = Pregunta::find($id);
        $this->respuestas = PreguntaEstudiante::where('pregunta_id', $id)->get();
        $curso = CursoDocente::with('inscripciones.estudiante')->find($this->pregunta->curso->id);
        $this->estudiantes = $curso->inscripciones->pluck('estudiante');
    }
    public function render()
    {
        return view('livewire.docente.trabajo.show-pregunta')
        ->extends('layouts.app')
        ->section('content'); 
    }
}
