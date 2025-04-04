<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseChapter extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function courseChapterLessons()
    {
        return $this->hasMany(CourseChapterLesson::class);
    }
}
