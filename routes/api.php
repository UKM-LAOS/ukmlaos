<?php

use App\Http\Controllers\LaosCourse\API\AuthController;
use App\Service\MidtransPaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Guest Middleware
Route::prefix('course')->name('course.')->group(function()
{
    Route::middleware('guest.api')->group(function()
    {
        // Midtrans Callback
        Route::post('payment-callback', [MidtransPaymentService::class, 'midtransCallback']);

        // Auth Routes
        Route::prefix('auth')->name('auth.')->group(function()
        {
            Route::post('register', [AuthController::class, 'register']);
            Route::post('login', [AuthController::class, 'login']);        });
    });

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

// Auth Middleware
