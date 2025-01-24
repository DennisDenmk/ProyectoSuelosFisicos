<?php
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Encargadosuelos;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('PrimerPag');
});

Route::get('/muestra', function () {
    return view('Muestra');
})-> name('muestra');


//login
Route::get('login', [ProfileController::class, 'show'])->name('login');
Route::post('login', [ProfileController::class, 'login']);

//ingreso a primera
Route::get('/suelofisico', function () {
    return view('SueloFisico'); // Asegúrate de tener una vista 'suelofisico.blade.php'
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
    Route::get('/parcelas', [Encargadosuelos::class, 'create'])->name('parcelas');
    Route::post('/parcelas/create', [Encargadosuelos::class, 'crear'])->name('parcelas.create');

    Route::get('/RegistroMuestra', [Encargadosuelos::class, 'misParcelas'])->name('parcelas.mis_parcelas');
    Route::post('/RegistroMuestra', [Encargadosuelos::class, 'crearMuestras'])->name('muestras.create');
});





require __DIR__.'/auth.php';
