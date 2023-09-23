<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            // Se a solicitação espera uma resposta JSON (solicitação API),
            // não redirecione para a rota "entrar".
            return null;
        }

        // Se não for uma solicitação API, redirecione para a rota "entrar".
        return route('entrar');
    }
}
