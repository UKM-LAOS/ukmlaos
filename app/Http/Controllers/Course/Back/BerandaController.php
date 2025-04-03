<?php

namespace App\Http\Controllers\Course\Back;

use App\Models\Course;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\CourseStudent;
use App\Http\Controllers\Controller;
use App\Models\CourseStudentProgres;
use Illuminate\Support\Facades\Auth;
use App\Enums\Transaction\StatusEnum;

class BerandaController extends Controller
{
    public $title = 'Dashboard';

    public function index()
    {
        $courses = CourseStudent::with([
            'course.courseMentors',
            'course.courseChapterLessons',
            'courseStudentProgres' => function($q) {
                $q->where('is_current', true);
            },
        ])
        ->withCount(['courseStudentProgres'])
        ->whereHas('transaction', function($q) {
            $q->whereStatus(StatusEnum::SUKSES);
        })
        ->where('student_id', Auth::id())
        ->latest()
        ->limit(3)
        ->get();

        return view('pages.course.back.beranda.index', [
            'title' => $this->title,
            'myCourses' => $courses,
        ]);
    }
}
