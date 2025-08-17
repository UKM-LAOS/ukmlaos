<?php

namespace App\Models;

use App\Enums\CP\Blog\KategoriEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Blog extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasSlug;

    protected $fillable = [
        'divisi_id',
        'judul',
        'slug',
        'kategori',
        'konten',
        'is_unggulan',
        'status',
        'author_id',
        'views',
        'meta_description',
        'published_at'
    ];

    protected $casts = [
        'kategori' => KategoriEnum::class, // Cast ke enum
        'is_unggulan' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'published_at' => 'datetime'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('judul')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('blog-thumbnail') // Sesuaikan dengan BlogResource
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp']);

        $this->addMediaCollection('featured_image')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp']);

        $this->addMediaCollection('gallery')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp']);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(200)
            ->sharpen(10)
            ->performOnCollections('blog-thumbnail', 'featured_image', 'gallery');

        $this->addMediaConversion('large')
            ->width(800)
            ->height(600)
            ->quality(85)
            ->performOnCollections('blog-thumbnail', 'featured_image', 'gallery');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->where('approved', true)->latest();
    }

    public function allComments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function scopeUnggulan(Builder $query): Builder
    {
        return $query->where('is_unggulan', true);
    }

    public function scopeByKategori(Builder $query, KategoriEnum|string $kategori): Builder
    {
        $kategoriValue = $kategori instanceof KategoriEnum ? $kategori->value : $kategori;
        return $query->where('kategori', $kategoriValue);
    }

    public function getFormattedDateAttribute(): string
    {
        return $this->created_at->translatedFormat('d F Y');
    }

    public function getExcerptAttribute(): string
    {
        return strip_tags(substr($this->konten, 0, 150)) . '...';
    }

    public function getCategoryLabelAttribute(): string
    {
        return $this->kategori->getLabel();
    }

    public function getFeaturedImageUrlAttribute(): string
    {
        $media = $this->getFirstMedia('blog-thumbnail') ?? $this->getFirstMedia('featured_image');

        if ($media) {
            return $media->getUrl();
        }

        return $this->getDummyImageByCategory();
    }

    public function getFeaturedImageThumbAttribute(): string
    {
        $media = $this->getFirstMedia('blog-thumbnail') ?? $this->getFirstMedia('featured_image');

        if ($media) {
            return $media->getUrl('thumb');
        }

        return $this->getDummyImageByCategory();
    }

    public function getGalleryImagesAttribute()
    {
        return $this->getMedia('gallery');
    }

    private function getDummyImageByCategory(): string
    {
        $images = [
            'informasi' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60',
            'tutorial' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60',
            'mitos-fakta' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60',
            'tips-trik' => 'https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60',
            'press-release' => 'https://images.unsplash.com/photo-1507679799987-c73779587ccf?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
        ];

        $kategoriValue = $this->kategori instanceof KategoriEnum ? $this->kategori->value : $this->kategori;
        return $images[$kategoriValue] ?? 'https://images.unsplash.com/photo-1586281380349-632531db7ed4?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60';
    }
}
