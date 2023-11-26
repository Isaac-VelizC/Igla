<?php

namespace App\Livewire\Estudiante;

use App\Models\DocumentTrabajo;
use App\Models\Trabajo;
use App\Models\TrabajoEstudiante;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubirTarea extends Component
{
    use WithFileUploads;
    public $idTarea, $authid;
    public Trabajo $trabajo;
    public $files = [], $filesTarea, $idTareaEstudiante = '', $descripcion = '';
    public function mount($id) {
        if (auth()->check() && auth()->user()->persona && auth()->user()->persona->estudiante) {
            $this->authid = auth()->user()->persona->estudiante->id;
        }
        $this->idTarea = $id;
        $this->trabajo = Trabajo::find($id);
        $this->archivosTarea();
    }
    public function render()
    {
        return view('livewire.estudiante.subir-tarea')->extends('layouts.app')
        ->section('content');
    }
    public function updatedFiles() {
        if ($this->idTareaEstudiante == '') {
            $this->crearNuevo();
        }
        foreach ($this->files as $file) {
            $originalName = $file->getClientOriginalName();
            $filePath = $file->storeAs('trabajos', $originalName);
            $url = 'storage/' . $filePath;
            DocumentTrabajo::create([
                'nombre' => $originalName,
                'url' => $url,
                'fecha' => now(),
                'trabajo_estudiante_id' => $this->idTareaEstudiante,
                'user_id' => auth()->user()->id,
                'trabajo_id' => $this->idTarea
            ]);
        }
        $this->files = [];
        $this->archivosTarea();
    }
    public function enviarTarea() {
        if ($this->idTareaEstudiante == '') {
            $this->crearNuevo();
        }
        TrabajoEstudiante::find($this->idTareaEstudiante)->update([
            'descripcion' => $this->descripcion,
            'estado' => 'Entregado',
        ]);
        $this->resetForm();
        return redirect()->route('show.tarea', ['id' => $this->idTarea]);
    }
    public function crearNuevo() {
        $tarea = TrabajoEstudiante::create([
            'tarea_id' => $this->idTarea,
            'estudiante_id' => $this->authid,
        ]);
        $this->idTareaEstudiante = $tarea->id;
    }
    public function eliminarFile($id) {
        DocumentTrabajo::find($id)->delete();
        $this->archivosTarea();
    }
    public function archivosTarea() {
        $this->filesTarea = DocumentTrabajo::where([
            'trabajo_estudiante_id' => $this->idTareaEstudiante,
            'trabajo_id' => $this->idTarea
        ])->get();
    }
    public function resetForm() {
        $this->files = []; 
        $this->filesTarea = collect();
        $this->idTareaEstudiante = '';
        $this->descripcion = '';
    }
}
