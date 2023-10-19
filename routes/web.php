<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ChefsController;
use App\Http\Controllers\admin\EstudianteController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\HomeController;
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
    //Estudiantes
    Route::get('/admin-estudiantes', [EstudianteController::class, 'index'])->name('admin.estudinte');
    //Docentes
    Route::get('/admin-docentes', [ChefsController::class, 'allDocentes'])->name('admin.docentes');
    Route::get('/create-docentes', [ChefsController::class, 'create'])->name('create.docentes');
    Route::post('/create-docentes', [ChefsController::class, 'store'])->name('store.docentes');
    //Users
    Route::get('/admin-users', [AdminController::class, 'allUsers'])->name('admin.users');
    //Personals
    Route::get('/admin-personal', [AdminController::class, 'allPersonal'])->name('admin.personal');
    //Acerda de IGLA
    Route::get('/infomracion', [HomeController::class, 'acercaDe'])->name('admin.ajustes');
});

Route::middleware(['auth', 'role:chef'])->group(function () {
    Route::get('/chef-dashboard', [ChefController::class, 'index'])->name('chef.home');
});

Route::middleware(['auth', 'role:estudiante'])->group(function () {
    Route::get('/estud-dashboard', 'EstudController@index')->name('estudiante.home');
});
