<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $users = User::all();
        $estudiantes = Estudiante::all();
        $docentes = Docente::all();
        return view('admin.home', compact('users', 'estudiantes', 'docentes'));
    }

    public function allPersonal() {
        $personals = User::all();
        return view('admin.usuarios.administrador.index', compact('personals'));
    }

    public function allUsers() {
        $users = Persona::all();
        return view('admin.usuarios.lista_users', compact('users'));
    }
}
