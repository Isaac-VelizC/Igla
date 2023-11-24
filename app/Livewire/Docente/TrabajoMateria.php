<?php

namespace App\Livewire\Docente;

use App\Models\CursoDocente;
use App\Models\Documentos;
use App\Models\Tema;
use App\Models\TipoTrabajo;
use App\Models\Trabajo;
use Livewire\Component;
use Livewire\WithFileUploads;

class TrabajoMateria extends Component
{
    use WithFileUploads;
    public $tema, $idCurso, $temasCurso, $tipoTrabajo, $idTarea;
    public $AD1 = false, $AD2 = false, $AD3 = false;
    public CursoDocente $materia;
    public $tarea = ['titulo' => '', 'tipo' => '', 'tema' => '', 'fin' => '', 'con_nota' => false, 'nota' => '100'];
    public $pregunta = ['titulo' => ''];
    public $files = [], $filesTarea;
    public function mount($id)
    {
        $this->idCurso = $id;
        $this->materia = CursoDocente::findOrFail($id);
        $this->temasCurso = Tema::where('curso_id', $id)->get();
        $this->tipoTrabajo = TipoTrabajo::all();
    }
    public function formTarea()
    {
        $this->AD2 = false;
        $this->AD3 = false;
        $tarea = Trabajo::create([
            'curso_id' => $this->idCurso,
            'user_id' => auth()->user()->id,
            'titulo' => ' ',
        ]);
        $this->AD1 = true;
        $this->tarea['tipo'] = $this->tipoTrabajo->first()->id;
        $this->idTarea = $tarea->id;
    }
    public function guardarTarea()
    {
        if ($this->tarea['nota'] === '' || (floatval($this->tarea['nota']) === 0 || !ctype_digit((string)$this->tarea['nota']))) {
            $this->tarea['nota'] = '100';
        }
        $this->validate([
            'tarea.tipo' => 'required|numeric',
            'tarea.tema' => 'nullable|numeric',
            'tarea.titulo' => 'required|string|max:255',
            'tarea.fin' => 'nullable|date',
            'tarea.con_nota' => 'required|boolean',
            'tarea.nota' => $this->tarea['con_nota'] ? 'required|numeric' : 'nullable|numeric',
        ]);
        
        $tarea = Trabajo::find($this->idTarea);
        $tarea->fill([
            'tipo_id' => $this->tarea['tipo'],
            'titulo' => $this->tarea['titulo'],
            'inico' => date('Y-m-d H:i:s'),
            'fin' => $this->tarea['fin'],
            'con_nota' => $this->tarea['con_nota'],
            'nota' => $this->tarea['nota'],
            'estado' => 'Publicado',
        ]);
        if ($this->tarea['tema'] !== '') {
            $tarea->tema_id = $this->tarea['tema'];
        }
        $tarea->save();
        $this->AD1 = false;
        session()->flash('message', 'La tarea se publicó con éxito');
    }
    public function cancelarTarea() {
        Trabajo::find($this->idTarea)->delete();
        $this->resetearForm();
    }
    public function formPregunta()
    {
        $this->AD1 = false;
        $this->AD2 = true;
        $this->AD3 = false;
    }
    public function guardarPregunta()
    {
        $this->AD2 = false;
    }
    public function abrirFormTema()
    {
        $this->AD1 = false;
        $this->AD2 = false;
        $this->AD3 = true;
    }
    public function formTema()
    {
        $this->validate([
            'tema' => 'required|string|max:255',
        ]);
        Tema::create(['tema' => $this->tema, 'curso_id' => $this->idCurso,]);
        $this->AD3 = false;
        session()->flash('message', 'El Tema se creo con éxito');
        $this->tema = '';
    }
    public function updatedFiles()
    {
        foreach ($this->files as $file) {
            $originalName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public/files', $originalName);
            $url = 'storage/' . $filePath;
            Documentos::create([
                'nombre' => $originalName,
                'url' => $url,
                'fecha' => now(),
                'materia_id' => $this->idCurso,
                'user_id' => auth()->user()->id,
            ]);
        }
        $this->files = [];
        $this->archivosTarea($this->idTarea);
    }

    public function archivosTarea() {
        $this->filesTarea = Documentos::where('materia_id', $this->idCurso)->get();
    }
    public function resetearForm() {
        $this->AD1 = false;
        $this->AD2 = false;
        $this->AD3 = false;
        $this->tema = '';
        $this->tarea = ['titulo' => '', 'tipo' => '', 'tema' => '', 'fin' => '', 'con_nota' => false, 'nota' => '100'];
        $this->pregunta = ['titulo' => ''];
    }
    public function render()
    {
        return view('livewire.docente.trabajo-materia');
    }
}
