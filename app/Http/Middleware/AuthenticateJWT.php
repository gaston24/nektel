<?php

// app/Http/Middleware/AuthenticateJWT.php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateJWT
{
    public function handle($request, Closure $next)
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'Usuario no autenticado'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'No se pudo autenticar'], 500);
        }

        return $next($request);
    }
}
