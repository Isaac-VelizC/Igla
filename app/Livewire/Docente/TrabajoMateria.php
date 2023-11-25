<?php

namespace App\Livewire\Docente;

use App\Models\CursoDocente;
use App\Models\Documentos;
use App\Models\Pregunta;
use App\Models\Tema;
use App\Models\TipoTrabajo;
use App\Models\Trabajo;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class TrabajoMateria extends Component
{
    use WithFileUploads;
    public $tema, $idCurso, $idTarea, $idFiles, $temasCurso, $tipoTrabajo, $tareas, $preguntas;
    public $AD1 = false, $AD2 = false, $AD3 = false, $temaEditando = null;
    public CursoDocente $materia;
    public $temaEditado = '';
    public $tarea = ['titulo' => '', 'tipo' => '', 'tema' => '', 'fin' => '', 'con_nota' => false, 'nota' => '100'];
    public $pregunta = ['pregunta' => '', 'tema' => '', 'limite' => '', 'con_nota' => false, 'nota' => '100'];
    public $files = [], $filesTarea, $temasEditados = [];
    public function mount($id) {
        $this->idCurso = $id;
        $this->materia = CursoDocente::findOrFail($id);
        $this->temasCurso = Tema::where('curso_id', $id)->get();
        $this->tipoTrabajo = TipoTrabajo::all();
        $this->temasEditados = $this->temasCurso->pluck('tema', 'id')->toArray();
        $allTareas = Trabajo::where('curso_id', $id)->get();
        $allPreguntas = Pregunta::where('curso_id', $id)->get();
        $this->tareas = collect($allTareas)->groupBy('tema_id');
        $this->preguntas = collect($allPreguntas)->groupBy('tema_id');
    }
    public function formTarea() {
        $this->resetearForm();
        $this->AD2 = false;
        $this->AD3 = false;
        $tarea = Trabajo::create([
            'curso_id' => $this->idCurso, 'user_id' => auth()->user()->id, 'titulo' => ' '
        ]);
        $this->tarea['tipo'] = optional($this->tipoTrabajo->first())->id;
        $this->idTarea = $tarea->id;
        $this->AD1 = true;
    }
    public function guardarTarea() {
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
            'inico' => now(),
            'fin' => $this->tarea['fin'],
            'con_nota' => $this->tarea['con_nota'],
            'nota' => $this->tarea['nota'],
            'estado' => 'Publicado',
            'tema_id' => $this->tarea['tema'] ?: null,
        ])->save();
        $this->resetearForm();
        session()->flash('message', 'La tarea se publicó con éxito');
    }
    public function cancelarTarea() {
        Trabajo::find($this->idTarea)->delete();
        $this->resetearForm();
    }
    public function formPregunta() {
        $this->resetearForm();
        $this->AD2 = true;
    }
    public function guardarPregunta() {
        if ($this->pregunta['nota'] === '' || (floatval($this->pregunta['nota']) === 0 || !ctype_digit((string)$this->pregunta['nota']))) {
            $this->pregunta['nota'] = '100';
        }
        $this->validate([
            'pregunta.pregunta' => 'required|string|max:255',
            'pregunta.tema' => 'nullable|numeric',
            'pregunta.limite' => 'nullable|date',
            'pregunta.con_nota' => 'required|boolean',
            'pregunta.nota' => $this->pregunta['con_nota'] ? 'required|numeric' : 'nullable|numeric',
        ]);
        Pregunta::create([
            'pregunta' => $this->pregunta['pregunta'],
            'curso_id' => $this->idCurso,
            'con_nota' => $this->pregunta['con_nota'],
            'nota' => $this->pregunta['nota'],
            'limite' => $this->pregunta['limite'],
            'tema_id' => $this->pregunta['tema'] ?: null,
            'estado' => 'Publicado',
        ])->save();
        $this->resetearForm();
        session()->flash('message', 'La pregunta se realizo con éxito');
    }
    public function abrirFormTema() {
        $this->resetearForm();
        $this->AD3 = true;
    }
    public function formTema() {
        $this->validate(['tema' => 'required|string|max:255']);
        Tema::create(['tema' => $this->tema, 'curso_id' => $this->idCurso,]);
        session()->flash('message', 'El Tema se creo con éxito');
        $this->tema = '';
        $this->AD3 = false;
        $this->mount($this->idCurso);
    }
    public function updatedFiles() {
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
                'tarea_id' => $this->idTarea
            ]);
        }
        $this->files = [];
        $this->archivosTarea();
    }
    public function eliminarFile($id) {
        Documentos::find($id)->delete();
        $this->archivosTarea();
    }
    public function archivosTarea() {
        $this->filesTarea = Documentos::where('tarea_id', $this->idCurso)->get();
    }
    public function resetearForm() {
        $this->AD1 = false;
        $this->AD2 = false;
        $this->AD3 = false;
        $this->idTarea = null;
        $this->idFiles = null;
        $this->tarea = [ 'titulo' => '', 'tipo' => '', 'tema' => '', 'fin' => '', 'con_nota' => false, 'nota' => '100'];
        $this->pregunta = [ 'pregunta' => '', 'tema' => '', 'limite' => '', 'con_nota' => false, 'nota' => '100'];
        $this->files = [];
        $this->filesTarea = collect([]);
    }
    public function eliminarTarea($id) {
        $tarea = Trabajo::find($id);
        try {
            if ($tarea) {
                $docs = Documentos::where('tarea_id', $tarea->id)->get();
                if ($docs->isNotEmpty()) {
                    foreach ($docs as $doc) {
                        if (Storage::exists($doc->url)) {
                            Storage::delete($doc->url);
                        }
                        $doc->delete();
                    }
                }
                $tarea->delete();
                $this->mount($this->idCurso);
                session()->flash('message', 'Se eliminó la tarea con éxito');
            } else {
                session()->flash('error', 'No se encontró la tarea que intentas eliminar.');
            }
        } catch (\Exception $e) {
            session()->flash('error',  $e->getMessage());
        }
    }
    public function eliminarPregunta($id) {
        Pregunta::find($id)->delete();
        session()->flash('message', 'Se elimino la pregunta con éxito');
        $this->mount($this->idCurso);
    }
    public function editarTema($itemId) {
        $this->temaEditando = $itemId;
        $this->temaEditado = Tema::find($itemId)->tema;
    }
    public function actualizarTema($itemId) {
        $tema = Tema::find($itemId);
        if ($tema) {
            $tema->tema = $this->temasEditados[$itemId];
            $tema->update();
        }
        $this->temaEditando = null;
    }
    public function borrarTema($id) {
        Tema::find($id)->delete();
        $this->mount($this->idCurso);
    }
    public function render()
    {
        return view('livewire.docente.trabajo-materia');
    }
}
