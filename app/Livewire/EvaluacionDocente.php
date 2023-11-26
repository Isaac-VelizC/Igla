<?php

namespace App\Livewire;

use Livewire\Component;

class EvaluacionDocente extends Component
{
    public function render()
    {
        return view('livewire.evaluacion-docente')->extends('layouts.app')
        ->section('content');
    }
}
