<?php
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controldatos;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('PrimerPag');
})->name('home');

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

//
Route::get('parcelas/', [Controldatos::class, 'create']);
Route::post('/parcelas/select', [Controldatos::class, 'select'])->name('parcelas.select');

//DAtos prueba
Route::get('/datos', [RegisterController::class, 'registerUser'])->name('registerUser');

Route::middleware('auth')->group(function () {
    Route::get('/home', [Controldatos::class, 'index'])->name('home');
    Route::post('/parcelas', [Controldatos::class, 'store'])->name('parcelas.store');
});


require __DIR__.'/auth.php';
