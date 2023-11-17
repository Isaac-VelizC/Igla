<?php

namespace App\Livewire\Docente;

use App\Models\CursoDocente;
use App\Models\Documentos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ConfiguracionMateria extends Component
{
    use WithFileUploads;
    public CursoDocente $materia;
    public $files = [];

    public function mount($id)
    {
        $this->files = [];
        $this->materia = CursoDocente::findOrFail($id);
        $this->files = Documentos::latest()->where('materia_id', $id)->get();
    }

    public function uploadDocuments(Request $request)
    {
        $this->validate([
            'file' => 'required|file|max:2048',
        ]);

        $user_id = auth()->id();
        $nombre = 'documento_' . time() . '.' . $this->file->getClientOriginalExtension();

        $path = $this->file->storeAs('public/img/documents', $nombre);
        $url = asset(Storage::url($path));

        $documento = Documentos::create([
            'nombre' => $nombre,
            'url' => $url,
            'materia_id' => $this->id,
            'user_id' => $user_id,
        ]);

        array_push($this->files, $documento);
        
        session()->flash('success', '¡Archivos cargados con éxito!');
    }

    public function render()
    {
        return view('livewire.docente.configuracion-materia');
    }

}
/*
class ConfiguracionMateria extends Component
{
    use WithFileUploads; // Agrega esta línea

    public $file;
    public $curso;
    public $files;

    public function mount($id)
    {
        $this->curso = CursoDocente::find($id);
        $this->files = Documentos::latest()->where('materia_id', $id)->get();
    }

    public function uploadDocuments()
    {
        $this->validate([
            'file' => 'required|file|max:2048'
        ]);
        $user_id = Auth::id();
        if ($this->file) {
            $path = $this->file->storeAs('public/img/documents', 'documento_' . time() . '.' . $this->file->getClientOriginalExtension());
            $url = Storage::url($path);
            dd($url);
            Documentos::create([
                'archivo' => $url,
                'materia_id' => $this->curso->id,
                'user_id' => $user_id,
            ]);

            $this->file = null; // Limpiar el campo de archivo después de la carga exitosa

            session()->flash('success', '¡Archivos cargados con éxito!');
        } else {
            session()->flash('error', '¡No se ha seleccionado ningún archivo!');
        }
    }
    public function render()
    {
        return view('livewire.docente.configuracion-materia');
    }
}*/
