<?php

namespace App\Http\Controllers\Course\Front;

use App\Enums\Course\KategoriEnum;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $title = 'Selamat Datang';

    public function index()
    {
        $courseCountsByCategory = Course::where('is_published', true)
            ->whereIn('kategori', [
                KategoriEnum::PROGRAMMING,
                KategoriEnum::CYBER_SECURITY,
                KategoriEnum::DESIGN,
                KategoriEnum::DIGITAL_MARKETING
            ])
            ->selectRaw('kategori, count(*) as total')
            ->groupBy('kategori')
            ->pluck('total', 'kategori')
            ->toArray();

        $latestCourses = Course::withCount(['courseChapters', 'courseMentors', 'courseStudents'])
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('pages.course.front.beranda.index', [
            'title' => $this->title,
            'courseCountsByCategory' => $courseCountsByCategory,
            'latestCourses' => $latestCourses
        ]);
    }
}
