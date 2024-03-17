<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MisPostulacionesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;
use App\Models\MisPostulaciones;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
Route::get("/",  HomeController::class )->name("home");

Route::get('/dashboard', [VacanteController::class, 'index'])->middleware(['auth', 'verified', 'rol.reclutador'])->name('vacantes.index');
Route::get('/vacantes/create', [VacanteController::class, 'create'])->middleware(['auth', 'verified', 'rol.reclutador'])->name('vacantes.create'); // Crear vacante
Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit'); // Modificar vacante
Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show'); // Mostrar vacante

Route::get('/candidatos/{vacante}', [CandidatoController::class, 'index'])->name('candidatos.index'); // Ver Candidatos

Route::get('/notificaciones', NotificationController::class)->middleware(['auth', 'verified', 'rol.reclutador'])->name('notificaciones.index'); // Mostrar vacante

Route::get('/mispostulaciones', [MisPostulacionesController::class, 'index'])->middleware(['auth', 'verified', 'postulante'])->name('postulaciones.index'); // Mostrar vacante

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
