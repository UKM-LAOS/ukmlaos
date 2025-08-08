<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
