<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Ejemplo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Ejemplo de condición: validar si el parámetro 'token' es correcto
        if ($request->input('token') !== '123456') {
            return response('Acceso denegado por middleware.', 403);
        }

        // Si la condición pasa, continúa al controlador
        return $next($request);
    }
}
