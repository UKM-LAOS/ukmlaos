<?php

namespace App\Models;

use App\Enums\Transaction\StatusEnum;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $casts = [
        'status' => StatusEnum::class
    ];

    public function courseStudent()
    {
        return $this->belongsTo(CourseStudent::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
