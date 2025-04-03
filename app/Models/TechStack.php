<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TechStack extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = ucwords($value);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_tech_stacks', 'tech_stack_id', 'course_id');
    }
}
