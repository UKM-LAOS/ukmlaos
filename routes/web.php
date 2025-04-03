<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Course\Front\AuthController;
use App\Http\Controllers\Course\Front\HomeController;
use App\Http\Controllers\Course\Back\BerandaController;
use App\Http\Controllers\Course\Back\SettingController;
use App\Http\Controllers\Course\Front\CourseController;
use App\Http\Controllers\Course\Back\MyOrdersController;
use App\Http\Controllers\Course\Back\MyCoursesController;
use App\Http\Controllers\Course\Front\DiskonController;
use App\Http\Controllers\Course\Front\TransaksiController;

// Company Profile

// LAOS Course
Route::prefix('course')->name('course.')->group(function()
{
    // Back
    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function()
    {
        Route::get('/', [BerandaController::class, 'index'])->name('index');
        Route::prefix('my-courses')->name('my-courses.')->group(function()
        {
            Route::get('/', [MyCoursesController::class, 'index'])->name('index');
            Route::get('/search', [MyCoursesController::class, 'search'])->name('search');
            Route::get('/{slug}/learn', [MyCoursesController::class, 'show'])->name('show');
            Route::get('/{slug}/watch/{chapterId}/{lessonId}', [MyCoursesController::class, 'watch'])->name('watch');
        });
    
        Route::prefix('my-orders')->name('my-orders.')->group(function()
        {
            Route::get('/', [MyOrdersController::class, 'index'])->name('index');
        });
    
        Route::prefix('settings')->name('settings.')->group(function()
        {
            Route::get('/', [SettingController::class, 'index'])->name('index');
        });
        
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });

    // Front
    Route::middleware('guest')->group(function()
    {
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
        Route::get('register', [AuthController::class, 'register'])->name('register');
        Route::post('register', [AuthController::class, 'createAccount'])->name('create-account');
    });

    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/all', [CourseController::class, 'index'])->name('all');
    Route::get('/filter', [CourseController::class, 'filter'])->name('filter');
    Route::get('/search', [CourseController::class, 'search'])->name('search');
    Route::get('/detail', [CourseController::class, 'show'])->name('show');
    Route::get('/{slug}', [CourseController::class, 'show'])->name('show');

    Route::post('/{slug}/daftar', [TransaksiController::class, 'daftar'])->middleware(['auth', 'role:student'])->name('daftar');
    Route::get('/{slug}/checkout', [TransaksiController::class, 'index'])->middleware(['auth', 'role:student'])->name('checkout');
    Route::get('/diskon/check', [DiskonController::class, 'diskonCheck'])->middleware(['auth', 'role:student'])->name('diskon-check');
    Route::post('/{slug}/checkout', [TransaksiController::class, 'beli'])->middleware(['auth', 'role:student'])->name('beli');

    Route::prefix('pembayaran')->middleware('auth')->name('pembayaran.')->group(function()
    {
        Route::get('sukses', [TransaksiController::class, 'pembayaranSukses'])->name('sukses');
        Route::get('gagal', [TransaksiController::class, 'pembayaranGagal'])->name('gagal');
    });
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('tes', function()
{
    return view('pages.tes');
});
