<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jabatan',
        'periode',
        'foto',
        'sosmed',
        'urutan',
        'aktif'
    ];

    protected $casts = [
        'sosmed' => 'array',
        'aktif' => 'boolean'
    ];

    public function scopePeriode($query, $periode)
    {
        return $query->where('periode', $periode);
    }

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public static function getAvailablePeriods()
    {
        return self::select('periode')
            ->distinct()
            ->orderBy('periode', 'desc')
            ->pluck('periode')
            ->toArray();
    }

    public static function getByPeriode($periode)
    {
        return self::periode($periode)
            ->aktif()
            ->orderBy('urutan')
            ->orderBy('nama')
            ->get();
    }
}
