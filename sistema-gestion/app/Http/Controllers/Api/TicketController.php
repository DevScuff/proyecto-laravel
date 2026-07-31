<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Http\Resources\TicketResource;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Endpoint 1: Listar todos los tickets
    public function index()
    {
        $tickets = Ticket::all();
        return TicketResource::collection($tickets);
    }

    // Endpoint 2: Actualizar el estado de un ticket específico
    public function update(Request $request, Ticket $ticket)
    {
        // Validamos que la App Móvil envíe obligatoriamente un estado
        $request->validate([
            'status' => 'required|string'
        ]);

        // Actualizamos en la base de datos y guardamos
        $ticket->status = $request->status;
        $ticket->save();

        // Retornamos el ticket actualizado formateado como JSON
        return new TicketResource($ticket);
    }
}