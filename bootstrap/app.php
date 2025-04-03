<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'auth.api' => \App\Http\Middleware\API\AuthMiddleware::class,
            'guest.api' => \App\Http\Middleware\API\GuestMiddleware::class,
            'auth' => \App\Http\Middleware\Course\AuthenticateMiddleware::class,
            'guest' => \App\Http\Middleware\Course\RedirectIfAuthenticatedMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
