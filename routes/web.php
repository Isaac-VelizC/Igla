<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\CalendarioController;
use App\Http\Controllers\admin\ChefsController;
use App\Http\Controllers\Admin\CocinaController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\admin\EstudianteController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\docente\CursoController as DocenteCursoController;
use App\Http\Controllers\docente\RecetaController;
use App\Http\Controllers\Estudiante\InfoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\UserController;
use App\Models\Informacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $info = Informacion::first();
    return view('welcome', compact('info'));
});

Auth::routes();

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.home');
    //Estudiantes
    Route::get('/admin-estudiantes', [EstudianteController::class, 'index'])->name('admin.estudinte');
    Route::get('/admin-inscripcions', [EstudianteController::class, 'formInscripcion'])->name('admin.inscripcion');
    Route::post('/admin-inscripcions/store', [EstudianteController::class, 'inscripcion'])->name('admin.inscripcion.store');
    Route::get('/show/{id}/estudiante', [EstudianteController::class, 'showEstudiante'])->name('admin.estudiante.show');
    Route::put('/create-student-{id}-update', [EstudianteController::class, 'update'])->name('update.estudiantes');
    Route::put('/create-conctato-{id}-update', [EstudianteController::class, 'updateContacto'])->name('update.contacto');
    //Docentes
    Route::get('/admin-docentes', [ChefsController::class, 'allDocentes'])->name('admin.docentes');
    Route::post('/create-docentes-store', [ChefsController::class, 'store'])->name('store.docentes');
    Route::put('/create-docentes-{id}-update', [ChefsController::class, 'update'])->name('update.docentes');
    Route::delete('/docentes/{id}/baja', [ChefsController::class, 'darBajaDocente'])->name('admin.docentes.baja');
    Route::get('/show/{id}/docente', [ChefsController::class, 'showDocente'])->name('admin.docentes.show');
    //Personal de la institucion
    Route::post('/personal-new', [AdminController::class, 'store'])->name('admin.personal.store');
    Route::get('/admin-users', [AdminController::class, 'allUsers'])->name('admin.users');
    //Personals
    Route::get('/admin-personal', [AdminController::class, 'allPersonal'])->name('admin.personal');
    //Calendario
    Route::get('/calendar', [CalendarioController::class, 'index'])->name('admin.calendario');
    //Cursos
    Route::get('/admin-cursos', [CursoController::class, 'index'])->name('admin.cursos');
    Route::post('/curso-info', [CursoController::class, 'guardarCurso'])->name('admin.guardar-curso');
    Route::put('/curso-info/{id}/edit', [CursoController::class, 'actualizarCurso'])->name('admin.actualizar-curso');
    Route::get('/admin-cursos/{id}/edit', [CursoController::class, 'edit'])->name('admin.cursos.edit');
    Route::delete('admin/cursos/{id}', [CursoController::class, 'deleteCurso'])->name('admin.cursos.destroy');
    Route::get('admin/show/{id}', [CursoController::class, 'showCurso'])->name('admin.cursos.show');
    Route::get('/admin-cursos-new', [CursoController::class, 'create'])->name('admin.cursos.new');
    Route::get('/admin-pagos-all', [CursoController::class, 'allPagos'])->name('admin.lista.pagos');
    Route::get('/asignando-curso/{id}', [CursoController::class, 'asignarCurso'])->name('admin.asignar.curso');
    Route::post('/curso-info/asignar', [CursoController::class, 'asignarGuardarCurso'])->name('admin.asignar.guardar.curso');
    Route::put('/curso-info/{id}/edit/asignar', [CursoController::class, 'asignarActualizarCurso'])->name('admin.asignar.actualizar-curso');
    Route::get('/cursos-curso/meshgv', [CursoController::class, 'cursosActivos'])->name('admin.cursos.activos');
    Route::get('/asignados/cursos/{id}/edit', [CursoController::class, 'editCursoAsignado'])->name('admin.asigando.edit');
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

Route::middleware(['auth', 'role:Chef'])->group(function () {
    Route::get('/chef-dashboard', [ChefController::class, 'index'])->name('chef.home');
    //Cursos
    Route::get('/cursos', [DocenteCursoController::class, 'index'])->name('chef.cursos');
    Route::get('/curso/{id}/docente', [DocenteCursoController::class, 'curso'])->name('cursos.curso');
    //Rutas de curso
    Route::get('/curso/{id}/asistencia', [DocenteCursoController::class, 'cursoAistencia'])->name('cursos.asistencia');
    Route::get('/curso/{id}/estudiantes', [DocenteCursoController::class, 'cursoEstudiantes'])->name('cursos.estudiantes');
    Route::get('/curso/{id}/trabajos', [DocenteCursoController::class, 'cursoTrabajos'])->name('cursos.trabajos');
    //recetas
    Route::get('/recetas/chefs/lafff', [RecetaController::class, 'recetas'])->name('recetas');
});

Route::middleware(['auth', 'role:Estudiante'])->group(function () {
    Route::get('/estud-dashboard', [InfoController::class, 'index'])->name('estudiante.home');
});

Route::middleware(['auth'])->group(function () {
    Route::put('/reset/{id}/pass/est', [EstudianteController::class, 'cambiarPass'])->name('cambiar.password.Estudiante');
    Route::put('/reset/{id}/pass/dc', [ChefsController::class, 'cambiarPass'])->name('cambiar.password.Chef');
    Route::get('/profile', [UserController::class, 'profile'])->name('users.profile');
    Route::get('/cursos/carrera', [InfoController::class, 'cursos'])->name('cursos.carrera');
});
