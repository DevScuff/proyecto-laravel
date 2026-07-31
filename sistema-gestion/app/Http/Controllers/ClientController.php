<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Events\ClientCreated; // Tu evento
use App\Http\Requests\StoreClientRequest; // Tu form request de seguridad

class ClientController extends Controller
{
    public function store(StoreClientRequest $request)
    {
        // 1. Guardamos al cliente en la base de datos
        $client = Client::create($request->validated());

        // 2. AQUÍ VA EL DISPATCH: Disparamos el evento que encolará el Job
        ClientCreated::dispatch($client);

        // Retornamos una respuesta de éxito
        return response()->json(['message' => 'Cliente creado y factura en proceso.'], 201);
    }
}