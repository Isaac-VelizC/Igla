<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function index() {
        return view('admin.calendario.index');
    }
}