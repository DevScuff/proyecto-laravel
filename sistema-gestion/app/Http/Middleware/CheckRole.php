<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle($request, \Closure $next, string $role)
{
    // Si el usuario no está logueado, o su rol no coincide con el exigido, lo bloqueamos
    if (!auth()->check() || auth()->user()->role !== $role) {
        abort(403, 'Acceso denegado: No tienes permiso para ver esta sección.');
    }

    return $next($request);
}
}
