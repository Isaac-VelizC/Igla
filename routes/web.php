<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\CalendarioController;
use App\Http\Controllers\admin\ChefsController;
use App\Http\Controllers\Admin\CocinaController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\admin\EstudianteController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\docente\CursoController as DocenteCursoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\UserController;
use App\Models\Informacion;
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
    $info = Informacion::first();
    return view('welcome', compact('info'));
});

Auth::routes();

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.home');
    //Estudiantes
    Route::get('/admin-estudiantes', [EstudianteController::class, 'index'])->name('admin.estudinte');
    Route::get('/admin-inscripcions', [EstudianteController::class, 'formInscripcion'])->name('admin.inscripcion');
    //Docentes
    Route::get('/admin-docentes', [ChefsController::class, 'allDocentes'])->name('admin.docentes');
    Route::get('/create-docentes', [ChefsController::class, 'create'])->name('create.docentes');
    Route::post('/create-docentes', [ChefsController::class, 'store'])->name('store.docentes');
    //Users
    Route::get('/admin-users', [AdminController::class, 'allUsers'])->name('admin.users');
    //Personals
    Route::get('/admin-personal', [AdminController::class, 'allPersonal'])->name('admin.personal');
    
    //Perfil de Usuario
    Route::get('/profile', [UserController::class, 'profile'])->name('users.profile');
    
    //Calendario
    Route::get('/calendar', [CalendarioController::class, 'index'])->name('admin.calendario');
    //Cursos
    Route::get('/admin-cursos', [CursoController::class, 'index'])->name('admin.cursos');
    Route::post('/curso-info', [CursoController::class, 'guardarCurso'])->name('admin.guardar-curso');
    Route::put('/curso-info/{id}/edit', [CursoController::class, 'actualizarCurso'])->name('admin.actualizar-curso');
    Route::get('/admin-cursos-new', [CursoController::class, 'create'])->name('admin.cursos.new');
    Route::get('/admin-pagos-all', [CursoController::class, 'allPagos'])->name('admin.lista.pagos');
    Route::get('/asignando-curso', [CursoController::class, 'asignarCurso'])->name('admin.asignar.curso');

    //Cocina
    Route::get('/ingretientes-all', [CocinaController::class, 'allIngredientes'])->name('admin.ingredientes');
    //Acerda de IGLA
    Route::get('/informacion', [HomeController::class, 'acercaDe'])->name('admin.ajustes');
    Route::post('/guardar-info', [InformacionController::class, 'guardarInformacion'])->name('admin.guardar-registro');
    Route::put('/actualizar-info/{id}', [InformacionController::class, 'actualizarInformacion'])->name('admin.actualizar-registro');
    //Administracion de informacion
    Route::get('/administrar-info', [InformacionController::class, 'adminstrarInfo'])->name('admin.administracion');
    Route::post('/administrar-aula-add', [InformacionController::class, 'storeAula'])->name('admin.guardar-aula');
    Route::put('/administrar-aula/{id}/edit', [InformacionController::class, 'updateAula'])->name('admin.actualizar-aula');
    Route::post('/administrar-modalidad-add', [InformacionController::class, 'storeModalidad'])->name('admin.guardar-modalidad');
    Route::put('/administrar-modalidad/{id}/edit', [InformacionController::class, 'updateModalidad'])->name('admin.actualizar-modalidad');
    Route::post('/administrar-horario-add', [InformacionController::class, 'storeHorario'])->name('admin.guardar-horario');
    Route::put('/administrar-horario/{id}/edit', [InformacionController::class, 'updateHorario'])->name('admin.actualizar-horario');

});

Route::middleware(['auth', 'role:chef'])->group(function () {
    Route::get('/chef-dashboard', [ChefController::class, 'index'])->name('chef.home');
    //Cursos
    Route::get('/cursos', [DocenteCursoController::class, 'index'])->name('chef.cursos');
    Route::get('/curso', [DocenteCursoController::class, 'curso'])->name('cursos.curso');
});

Route::middleware(['auth', 'role:estudiante'])->group(function () {
    Route::get('/estud-dashboard', 'EstudController@index')->name('estudiante.home');
});
