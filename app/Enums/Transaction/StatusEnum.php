<?php

namespace App\Enums\Transaction;

enum StatusEnum: string
{
    case MENUNGGU = 'Menunggu';
    case SUKSES = 'Sukses';
    case GAGAL = 'Gagal';

    public function label(): string
    {
        return match ($this) {
            self::MENUNGGU => 'Menunggu',
            self::SUKSES => 'Sukses',
            self::GAGAL => 'Gagal',
        };
    }
}
