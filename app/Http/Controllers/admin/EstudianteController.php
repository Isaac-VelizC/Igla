<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index() {
        $estudiantes = User::all();
        return view('admin.usuarios.estudiantes.index', compact('estudiantes'));
    }

    public function formInscripcion() {
        return view('admin.inscripciones.form_inscripcion');
    }
}
