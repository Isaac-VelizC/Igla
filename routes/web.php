<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ChefsController;
use App\Http\Controllers\admin\EstudianteController;
use App\Http\Controllers\ChefController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin-usuarios', [ChefsController::class, 'index'])->name('admin.index');
    Route::get('/admin-estudiantes', [EstudianteController::class, 'index'])->name('admin.estudinte');
});

Route::middleware(['auth', 'role:chef'])->group(function () {
    Route::get('/chef-dashboard', [ChefController::class, 'index'])->name('chef.home');
});

Route::middleware(['auth', 'role:estudiante'])->group(function () {
    Route::get('/estud-dashboard', 'EstudController@index')->name('estudiante.home');
});
