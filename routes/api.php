<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\MidtransPaymentService;

Route::prefix('course')->group(function()
{
    Route::prefix('auth')->group(function()
    {
        Route::middleware('guest.api')->group(function()
        {
            Route::post('register', [\App\Http\Controllers\API\AuthController::class, 'register']);
            Route::post('login', [\App\Http\Controllers\API\AuthController::class, 'login']);
        });

        Route::middleware('auth.api')->group(function()
        {
            Route::get('me', [\App\Http\Controllers\API\AuthController::class, 'me']);
            Route::post('logout', [\App\Http\Controllers\API\AuthController::class, 'logout']);
        });
    });

    Route::get('/', [\App\Http\Controllers\API\CourseController::class, 'index']);
    Route::get('{slug}', [\App\Http\Controllers\API\CourseController::class, 'show']);

    Route::middleware('auth.api')->group(function()
    {
        Route::post('join/{slug}', [\App\Http\Controllers\API\CourseController::class, 'joinCourse']);
    });
});

// Midtrans Callback
Route::post('/midtrans/callback', [MidtransPaymentService::class, 'midtransCallback']);
