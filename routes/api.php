<?php

use App\Service\MidtransPaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('payment-callback', [MidtransPaymentService::class, 'midtransCallback']);
