<?php

namespace App\Livewire\Docente;

use App\Models\CursoDocente;
use App\Models\Tema;
use Livewire\Component;

class TrabajoMateria extends Component
{
    public $tema, $idCurso, $temasCurso;
    public CursoDocente $materia;
    public $tarea = [
        'titulo' => '',
        'nota' => '',
        'limite' => null,
        'tema' => '',
    ];
    public $pregunta = ['titulo' => ''];
    public function mount($id)
    {
        $this->idCurso = $id;
        $this->materia = CursoDocente::findOrFail($id);
        $this->temasCurso = Tema::where('curso_id', $id)->get();
    }
    public function formTarea()
    {
        //$this->showModalTarea = true;
    }
    public function formPregunta()
    {
        //$this->showModalTarea = true;
    }
    public function formTema()
    {
        $this->validate([
            'tema' => 'required|string|max:255',
        ]);
        Tema::create([
            'tema' => $this->tema,
            'curso_id' => $this->idCurso,
        ]);
        session()->flash('message', 'El Tema se creo con éxito');
        $this->tema = '';
    }
    public function resetearForm() {
        $this->tarea = ['titulo' => ''];
        $this->pregunta = ['titulo' => ''];
    }
    public function render()
    {
        return view('livewire.docente.trabajo-materia');
    }
}
