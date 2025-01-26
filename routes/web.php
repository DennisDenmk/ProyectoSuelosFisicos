<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Encargadosuelos;
use App\Http\Controllers\VistaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('PrimerPag');
});
Route::get('/Informacion', function () {
    return view('InfoSuelo');
});
Route::get('/Vision', function () {
    return view('Vision');
});
Route::get('/Mision', function () {
    return view('Mision');
});
Route::get('/Contactos', function () {
    return view('Integrantes');
});
//login
Route::get('login', [ProfileController::class, 'show'])->name('login');
Route::post('login', [ProfileController::class, 'login']);


//ingreso a primera
Route::get('/suelofisico', function () {
    return view('SueloFisico'); 
})->name('SueloFisico');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//DAtos prueba
Route::get('/datos', [RegisterController::class, 'registerUser'])->name('registerUser');


Route::middleware(['auth'])->group(function () {
    Route::get('/Perfil', [ProfileController::class, 'showPerfil'])->name('perfil');
    Route::post('/Perfil/ActualizarDatos', [ProfileController::class, 'actualizarNombres'])->name('perfil.actualizarnombre');
    Route::post('/Perfil/Actualizar', [ProfileController::class, 'cambiarContrasena'])->name('perfil.actualizarContrasena');
    Route::get('/Docente', [Encargadosuelos::class, 'create'])->name('parcelas');

    Route::get('/RegistrarDatos', [Encargadosuelos::class, 'misParcelas'])->name('muestras');
    Route::post('/RegistrarDatos/CrearParcela', [Encargadosuelos::class, 'crear'])->name('parcelas.crear');
    Route::post('/RegistrarDatos/CrearMuestra', [Encargadosuelos::class, 'crearMuestras'])->name('muestras.create');

    Route::get('/TusMuestras', [VistaController::class, 'mostrarMuestras'])->name('verregistro');
    //Estudiante
    Route::get('/ParcelasEstudiante', [Encargadosuelos::class, 'ParcelasEstudiante'])->name('parcelasestudiante'); 
    Route::get('/MuestrasEstudiante', [VistaController::class, 'mostrarMuestrasEstudiente'])->name('muestrasestudiante');
    Route::get('/Estudiante/Perfil', [ProfileController::class, 'showPerfilEstudiante'])->name('perfil.estudiante');


});

Route::get('/Estudiante', [ProfileController::class, 'showEstudiante'])->name('verEstudiante');


require __DIR__ . '/auth.php';
