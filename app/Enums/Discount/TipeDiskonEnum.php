<?php

namespace App\Enums\Discount;

enum TipeDiskonEnum: string
{
    case DIBATASI_TANGGAL = 'dibatasi_tanggal';
    case DIBATASI_KUOTA = 'dibatasi_kuota';

    public function label(): string
    {
        return match ($this) {
            self::DIBATASI_TANGGAL => 'Dibatasi Tanggal',
            self::DIBATASI_KUOTA => 'Dibatasi Kuota',
        };
    }
}
