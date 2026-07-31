<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Events\ClientCreated;
use App\Http\Requests\StoreClientRequest;

class ClientController extends Controller
{
    public function store(StoreClientRequest $request)
    {
        // 1. Guardamos al cliente validado
        $client = Client::create($request->validated());

        // 2. Disparamos el evento para encolar el Job en segundo plano
        ClientCreated::dispatch($client);

        // 3. Retornamos a la vista con mensaje de éxito
        return redirect()->back()->with('success', '¡Cliente registrado con éxito! La factura y el correo están en proceso.');
    }
}