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
            'auth' => App\Http\Middleware\LaosCourse\Web\AuthMiddleware::class,
            'guest' => App\Http\Middleware\LaosCourse\Web\GuestMiddleware::class,
            'auth.api' => App\Http\Middleware\LaosCourse\API\AuthMiddleware::class,
            'guest.api' => App\Http\Middleware\LaosCourse\API\GuestMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
