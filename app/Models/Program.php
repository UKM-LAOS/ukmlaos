<?php

namespace App\Models;

use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;

class Program extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $casts = [
        'location' => 'json',
        'jadwal_kegiatan' => 'json',
    ];

    public function setJudulProgramAttribute($value)
    {
        $this->attributes['judul_program'] = ucwords($value);
        $this->attributes['slug'] = str($value)->slug();
    }

    public function setJudulKegiatanAttribute($value)
    {
        $this->attributes['judul_kegiatan'] = ucwords($value);
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
