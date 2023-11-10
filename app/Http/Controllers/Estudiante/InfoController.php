<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index() {
        return view('estudiante.home');
    }

    public function cursos() {
        return view('estudiante.cursos.index');
    }
}
