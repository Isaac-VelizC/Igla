<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile() {
        $user = auth()->user();
        $info = Persona::where('user_id', $user->id)->first();
        $famil = Contacto::where('estudiante_id', $user->id)->first();
        return view('profile.edit', compact('user', 'info', 'famil'));
    }
}
