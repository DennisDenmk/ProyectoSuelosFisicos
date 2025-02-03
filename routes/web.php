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
Route::get('/FormaUso', function () {
    return view('FormaUso');
});
Route::get('/Contactos', function () {
    return view('Integrantes');
});

//Recuperar contraseña
Route::get('/Olvidaste-tu-contrasena', function() {
    return view('recuperarcontrasena');
});
// Verificar usuario y redirigir al formulario de cambio de contraseña
Route::post('/password-recovery', [VistaController::class, 'verifyUser'])->name('password.verify');

// Mostrar formulario para cambiar la contraseña
Route::get('/password-change/{id}', [VistaController::class, 'showChangePasswordForm'])->name('password.change');

// Actualizar la contraseña
Route::put('/password-change/{id}', [VistaController::class, 'updatePassword'])->name('password.update');




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

//Registrar
Route::get('/RegistrarNuevoUsuario', [RegisterController::class, 'show'])->name('register.show');
Route::post('/RegistrarNuevoUsuario', [RegisterController::class, 'registerUsuario'])->name('register.create');
//Docentes


Route::middleware(['auth'])->group(function () {
    Route::get('/Perfil', [ProfileController::class, 'showPerfil'])->name('perfil');
    Route::post('/Perfil/ActualizarDatos', [ProfileController::class, 'actualizarNombres'])->name('perfil.actualizarnombre');
    Route::post('/Perfil/Actualizar', [ProfileController::class, 'cambiarContrasena'])->name('perfil.actualizarContrasena');
    
    //Docente
    Route::get('/Docente', [Encargadosuelos::class, 'create'])->name('parcelas');
    
    Route::get('/RegistrarDatos', [Encargadosuelos::class, 'misParcelas'])->name('muestras');
    Route::post('/RegistrarDatos/CrearParcela', [Encargadosuelos::class, 'crear'])->name('parcelas.crear');

    Route::get('/RegistrarDatos/CrearMuestra/{parcela_id}', [Encargadosuelos::class, 'muestras'])->name('muestras.show');

    Route::post('/RegistrarDatos/CrearMuestra', [Encargadosuelos::class, 'crearMuestras'])->name('muestras.create');
    //eliminar parcela
    Route::delete('/BorrarParcela/{id}', [Encargadosuelos::class, 'parcelaDestroy'])->name('borrar.parcela');
    Route::delete('/BorrarMuestra/{id}', [Encargadosuelos::class, 'muestradestroy'])->name('borrar.muestra');

    Route::get('/Docente/Muestras', [VistaController::class, 'mostrarMuestras'])->name('verregistro');
    Route::get('/ParcelasDocente',[VistaController::class, 'mostrarParcelasDocente'])->name('parcelas.docente');
    //Estudiante
    Route::get('/ParcelasEstudiante', [Encargadosuelos::class, 'ParcelasEstudiante'])->name('parcelasestudiante');
    Route::get('/MuestrasEstudiante', [VistaController::class, 'mostrarMuestrasEstudiente'])->name('muestrasestudiante');
    Route::get('/Estudiante/Perfil', [ProfileController::class, 'showPerfilEstudiante'])->name('perfil.estudiante');


});

Route::get('/Estudiante', [ProfileController::class, 'showEstudiante'])->name('verEstudiante');


require __DIR__ . '/auth.php';
