<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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

    public function create() {
        return view('admin.usuarios.chefs.create');
    }

    public function store(Request $request) {
        dd($request);
        return back();
    }
}
