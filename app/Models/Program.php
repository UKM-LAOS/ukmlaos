<?php

namespace App\Models;

use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;

class Program extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'divisi_id',
        'judul_program',
        'judul_kegiatan',
        'slug',
        'konten',
        'open_regis_panitia',
        'close_regis_panitia',
        'gform_panitia',
        'open_regis_peserta',
        'close_regis_peserta',
        'gform_peserta',
        'location',
        'lat',
        'long',
        'location_name',
        'location_address',
        'jadwal_kegiatan',
    ];

    protected $casts = [
        'location' => 'json',
        'jadwal_kegiatan' => 'json',
        'open_regis_panitia' => 'date',
        'close_regis_panitia' => 'date',
        'open_regis_peserta' => 'date',
        'close_regis_peserta' => 'date',
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

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getThumbnailUrlAttribute()
    {
        return $this->getFirstMediaUrl('program-thumbnail');
    }

    public function getDokumentasiAttribute()
    {
        return $this->getMedia('program-dokumentasi')->map(function ($item) {
            return [
                'id' => $item->id,
                'url' => $item->getUrl(),
                'name' => $item->file_name,
            ];
        });
    }
}
