<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CocinaController extends Controller
{
    public function allIngredientes() {
        return view('admin.inventario.ingredientes');
    }
    public function recetas() {
        return view('');
    }
}
