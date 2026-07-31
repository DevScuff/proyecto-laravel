<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TicketController;

// Aquí está la línea corregida que protege las rutas con Sanctum
Route::middleware('auth:sanctum')->group(function () {
    
    // Endpoint para listar tickets: GET /api/tickets
    Route::get('/tickets', [TicketController::class, 'index']);
    
    // Endpoint para actualizar estado: PUT /api/tickets/{id}
    Route::put('/tickets/{ticket}', [TicketController::class, 'update']);
    
});
