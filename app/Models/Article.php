<?php

namespace App\Models;

use App\Enums\Article\KategoriEnum;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $casts = [
        'kategori' => KategoriEnum::class,
    ];

    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = ucwords($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
