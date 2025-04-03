<?php

namespace App\Models;

use App\Enums\Course\TipeKontenEnum;
use Illuminate\Database\Eloquent\Model;

class CourseChapterLesson extends Model
{
    protected $casts = [
        'tipe_konten' => TipeKontenEnum::class,
    ];

    public function courseChapter()
    {
        return $this->belongsTo(CourseChapter::class, 'course_chapter_id');
    }
}
