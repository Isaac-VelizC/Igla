<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\TipoEvento;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function index() {
        $categorias = TipoEvento::all();
        return view('admin.calendario.index', compact('categorias'));
    }

    public function store(Request $request) {
        request()->validate(Evento::$rules);
        Evento::create([
            'responsable_id' => auth()->user()->id,
            'tipo_id' => $request->tipo_id,
            'start' => $request->start,
            'end' => $request->end,
            'title' => $request->title,
            'descripcion' => $request->descripcion
        ]);
    }
    public function update(Request $request, $id) {
        dd($request);
    }
    public function delete($id) {
        dd($id);
    }
    public function show($id) {
        dd($id);
    }
}
