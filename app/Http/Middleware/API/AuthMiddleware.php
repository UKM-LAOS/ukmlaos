<?php

namespace App\Http\Middleware\API;

use App\Http\Controllers\API\ResponseFormatterController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth('api')->check()) {
            return $next($request);
        }

        return ResponseFormatterController::error('Unauthorized', 401);
    }
}
