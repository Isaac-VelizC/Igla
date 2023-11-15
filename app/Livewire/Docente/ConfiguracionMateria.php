<?php

namespace App\Livewire\Docente;

use App\Models\CursoDocente;
use Livewire\Component;

class ConfiguracionMateria extends Component
{
    public CursoDocente $curso;

    public function mount($id)
    {
        $this->curso = CursoDocente::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.docente.configuracion-materia')->extends('profesor.cursos.curso')
            ->section('curso');
    }

    public function mostrarConfiguracion()
    {
        // Obtener el ID del curso
        $id = $this->curso->id;

        // Abrir el componente Livewire
        $this->emit('mostrarConfiguracion', $id);
    }
}

