<?php
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


//Rutas de prueba
Route::get('/', function () {
    return view('login');
});
Route::get('/muestra', function () {
    return view('Muestra');
})-> name('muestra');

Route::get('/home', function () {
    return view('PrimerPag');
})-> name('home');

Route::get('/Suelofisico', function () {
    return view('SueloFisico');
});

//login
Route::get('login', [ProfileController::class, 'show'])->name('login');

// Ruta para procesar los datos del formulario (POST)
Route::post('login', [ProfileController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/datos', [RegisterController::class, 'registerUser'])->name('registerUser');




require __DIR__.'/auth.php';
