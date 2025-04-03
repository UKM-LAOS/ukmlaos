<?php

namespace App\Http\Controllers\Course\Front;

use App\Enums\Discount\TipeDiskonEnum;
use App\Http\Controllers\API\ResponseFormatterController;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiskonController extends Controller
{
    public function diskonCheck(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|exists:discounts,kode',
        ], [
            'kode.required' => 'Kode diskon harus diisi',
            'kode.string' => 'Kode diskon harus berupa teks',
            'kode.exists' => 'Kode diskon tidak ditemukan',
        ]);

        $diskon = Discount::whereKode($request->kode)->first();

        if(!checkDiskon($diskon))
        {
            return ResponseFormatterController::error('Kode diskon tidak valid', 400);
        }
        
        // Jika semua pengecekan berhasil, kembalikan data diskon
        return ResponseFormatterController::success($diskon, 'Kode diskon berhasil ditemukan');
    }
}
