<?php

namespace App\Models;

use App\Enums\Course\KategoriEnum;
use App\Enums\Course\LevelEnum;
use App\Enums\Course\TipeEnum;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Course extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $casts = [
        'keypoints' => 'json',
        'kategori' => KategoriEnum::class,
        'level' => LevelEnum::class,
        'tipe' => TipeEnum::class,
    ];

    // protected $with = ['media'];

    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = ucwords($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    public function courseChapters()
    {
        return $this->hasMany(CourseChapter::class);
    }

    public function courseChapterLessons()
    {
        return $this->hasManyThrough(CourseChapterLesson::class, CourseChapter::class);
    }

    public function courseMentors()
    {
        return $this->belongsToMany(User::class, 'course_mentors', 'course_id', 'mentor_id');
    }

    public function courseStudents()
    {
        return $this->belongsToMany(User::class, 'course_students', 'course_id', 'student_id')->withPivot('id');
    }

    public function techStacks()
    {
        return $this->belongsToMany(TechStack::class, 'course_tech_stacks', 'course_id', 'tech_stack_id');
    }
}
