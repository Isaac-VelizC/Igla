<?php

namespace App\Livewire\Docente;

use App\Models\Asistencia;
use App\Models\CursoDocente;
use Livewire\Component;

class AsistenciaMateria extends Component
{
    public CursoDocente $materia;
    public $estudiantes, $num = 1, $fechaAsistencia, $idCurso;
    public $asistencia;

    public function mount($id) {
        $this->idCurso = $id;
        $curso = CursoDocente::with('inscripciones.estudiante')->find($id);
        $this->estudiantes = $curso->inscripciones->pluck('estudiante');
        setlocale(LC_TIME, 'es_ES.utf8', 'es_ES', 'esp');
        $this->fechaAsistencia = now()->toDateString();
        $this->cargarAsistencia();
    }
    public function cargarAsistencia() {
        $asistencias = Asistencia::where('curso_id', $this->idCurso)
            ->where('fecha', $this->fechaAsistencia)
            ->get()
            ->pluck('asistencia', 'estudiante_id')
            ->toArray();
        $this->asistencia = count($asistencias) > 0 ? $asistencias : $this->inicializarAsistenciaPorDefecto();
    }
    public function render()
    {
        return view('livewire.docente.asistencia-materia');
    }
    public function guardarAsistencia() {
        $this->validate([
            'fechaAsistencia' => 'required|date',
        ]);
        foreach ($this->asistencia as $estudianteId => $estado) {
            $asistenciaExistente = Asistencia::where('curso_id', $this->idCurso)
                ->where('fecha', $this->fechaAsistencia)
                ->where('estudiante_id', $estudianteId)->first();
            if ($asistenciaExistente) {
                $asistenciaExistente->update([
                    'asistencia' => $estado,
                ]);
            } else {
                Asistencia::create([
                    'estudiante_id' => $estudianteId,
                    'curso_id' => $this->idCurso,
                    'asistencia' => $estado,
                    'fecha' => $this->fechaAsistencia,
                ]);
            }
        }
        $this->cargarAsistencia();
        $this->reset(['fechaAsistencia']);
        session()->flash('message', 'Asistencia guardada con éxito');
    }
    public function inicializarAsistenciaPorDefecto() {
        $asistenciaPorDefecto = [];
    
        foreach ($this->estudiantes as $estudiante) {
            $asistenciaPorDefecto[$estudiante->id] = 'P';
        }
    
        return $asistenciaPorDefecto;
    }
}
