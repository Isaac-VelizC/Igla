<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ChefsController extends Controller
{
    public function index() {
        $chefRole = Role::where('name', 'chef')->first();
        if ($chefRole) {
            $chefs = User::role($chefRole)->get();
            return view('admin.usuarios.chefs.index', compact('chefs'));
        }
        return view('admin.usuarios.chefs.index');
    }

    public function allDocentes() {
        $docentes = User::all();
        return view('admin.usuarios.chefs.index', compact('docentes'));
    }
    public function create()
    {
        $isEditing = false;
        return view('admin.usuarios.chefs.create', compact('isEditing'));
    }
    public function edit($id)
    {
        $docente = Docente::find($id);
        $isEditing = true;
        return view('admin.materias.create', compact('docente', 'isEditing'));
    }
    public function store(Request $request) {
        dd($request);
        return back();
    }
    public function update(Request $request, $id) {
        dd($request);
        return back();
    }
}
