<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AgendaController;
use App\Http\Controllers\admin\InstitutionController;
use App\Http\Controllers\Admin\MiembrosController;
use App\Http\Controllers\admin\ServiciosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$subdomainRoutes = function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('lang/{lang}', [LangController::class, 'change'])->name('changeLang');

    //ADMIN
    Route::get("admin", [AdminController::class, 'index'])->name('admin.index');
    Route::get("admin/institution", [InstitutionController::class, 'index'])->name('admin.institution.index');
    //Miembros
    Route::get("admin/miembros", [MiembrosController::class, 'index'])->name('admin.miembros.index');
    Route::get("admin/miembros/create", [MiembrosController::class, 'index'])->name('admin.miembros.create');
    Route::get("admin/cargo", [MiembrosController::class, 'cargo'])->name('admin.miembros.cargo');
    Route::get("admin/cargo/create", [MiembrosController::class, 'cargo'])->name('admin.miembros.cargo.create');
    //Servicios
    Route::get("admin/servicios", [ServiciosController::class, 'index'])->name('admin.servicios.index');
    Route::get("admin/servicios/create", [ServiciosController::class, 'index'])->name('admin.servicios.create');
    //Agenda
    Route::get("admin/agenda", [AgendaController::class, 'index'])->name('admin.agenda.index');
    // agenda paginas adicionales como tipo, modulo y horario
    Route::get("admin/agenda/horarios", [AgendaController::class, 'horarios'])->name('admin.agenda.horarios');
    Route::get("admin/agenda/horarios/create", [AgendaController::class, 'horarios'])->name('admin.agenda.horarios.create');
    Route::get("admin/agenda/horarios/edit/{horario}", [AgendaController::class, 'horarios'])->name('admin.agenda.horarios.edit');
    Route::get("admin/agenda/modulos", [AgendaController::class, 'modulos'])->name('admin.agenda.modulos');
    Route::get("admin/agenda/tipos", [AgendaController::class, 'tipos'])->name('admin.agenda.tipos');
    // correspondiente a agenda
    Route::get("admin/agenda/{servicio}", [AgendaController::class, 'show'])->name('admin.agenda.show');
    Route::get("admin/agenda/{servicio}/eventos", [AgendaController::class, 'eventos'])->name('admin.agenda.eventos.show');
    Route::get("admin/agenda/{servicio}/create", [AgendaController::class, 'eventos'])->name('admin.agenda.eventos.create');

    Route::get("admin/agenda/{servicio}/cursos", [AgendaController::class, 'cursos'])->name('admin.agenda.cursos.show');
    // Route::get("admin/servicios/create", [ServiciosController::class, 'index'])->name('admin.servicios.create');
};

Route::get('/', [LangController::class, 'index'])->name('raiz');
Route::domain('es.' . env('APP_URL'))->group($subdomainRoutes);
Route::domain('en.' . env('APP_URL'))->group($subdomainRoutes);
Route::domain('ki.' . env('APP_URL'))->group($subdomainRoutes);