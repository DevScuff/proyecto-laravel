<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
{
    // Cambiamos esto a true para permitir que se ejecute la validación
    return true; 
}

    public function rules(): array
    {
    // Aquí definimos las reglas estrictas de entrada
    return [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:clients,email',
        'phone' => 'nullable|string|max:20',
        ];
    }
}
