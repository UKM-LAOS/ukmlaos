<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Service\MidtransPaymentService;
use App\Http\Controllers\LaosCourse\API\AuthController;
use App\Http\Controllers\LaosCourse\API\KelasController;

Route::post('payment-callback', [MidtransPaymentService::class, 'midtransCallback']);
Route::prefix('course')->name('course.')->group(function()
{
    // Guest Middleware
    Route::middleware('guest.api')->group(function()
    {
        // Auth Routes
        Route::prefix('auth')->name('auth.')->group(function()
        {
            Route::post('register', [AuthController::class, 'register']);
            Route::post('login', [AuthController::class, 'login']);        
        });

        // Kelas Routes
        Route::prefix('kelas')->name('kelas.')->group(function()
        {
            Route::get('/', [KelasController::class, 'index']);
            Route::get('/filter', [KelasController::class, 'filter']);
            Route::get('/search', [KelasController::class, 'search']);
            Route::get('/{slug}', [KelasController::class, 'show']);
        });
    });

    // Auth Middleware
    Route::middleware('auth.api')->group(function()
    {
        // Auth Routes
        Route::prefix('auth')->name('auth.')->group(function()
        {
            Route::get('me', [AuthController::class, 'me']);
            Route::post('logout', [AuthController::class, 'logout']);
            Route::post('refresh', [AuthController::class, 'refresh']);
        });
    });
});

