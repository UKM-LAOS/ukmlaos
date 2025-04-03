<?php

namespace App\Models;

use App\Enums\Discount\TipeDiskonEnum;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $casts = [
        'tipe_diskon' => TipeDiskonEnum::class,
    ];

    public function setKodeAttribute($value)
    {
        $this->attributes['kode'] = strtoupper($value);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
