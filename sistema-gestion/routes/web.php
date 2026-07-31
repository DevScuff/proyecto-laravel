<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

// Si entran a la raíz '/', evaluamos si está logueado:
// - Si NO está logueado, lo manda directo al Login.
// - Si YA está logueado, lo manda al Dashboard.
Route::get('/', function () {
    return auth()->check() 
        ? redirect()->route('dashboard') 
        : redirect()->route('login');
});

// Todas estas rutas EXIGEN iniciar sesión obligatoriamente
Route::middleware('auth')->group(function () {
    
    // Ruta para registrar clientes desde la web (protegida)
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');

    // Dashboard principal del sistema
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Gestión de perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';