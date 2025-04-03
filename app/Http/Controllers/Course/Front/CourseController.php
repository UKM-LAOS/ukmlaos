<?php

namespace App\Http\Controllers\Course\Front;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public $title = 'Courses';

    public function index()
    {
        return view('pages.course.front.course.index', [
            'title' => $this->title,
            'courses' => Course::withCount(['courseMentors', 'courseStudents'])->with('courseChapterLessons')->whereIsPublished(true)->latest()->paginate(6),
        ]);
    }

    public function filter(Request $request)
    {
        $kategori = $request->has('kategori') ? explode(',', $request->kategori) : [];

        $courses = Course::withCount(['courseMentors', 'courseStudents'])
            ->whereIsPublished(true)
            ->when(!empty($kategori), function ($query) use ($kategori) {
                return $query->whereIn('kategori', $kategori);
            })
            ->latest()
            ->paginate(6);

        // Preserve query parameters in pagination links
        $courses->appends($request->all());

        if ($request->ajax()) {
            return view('pages.course.front.course.index', [
                'title' => $this->title,
                'courses' => $courses,
                'selectedCategory' => $kategori,
            ]);
        }

        return view('pages.course.front.course.index', [
            'title' => $this->title,
            'courses' => $courses,
            'selectedCategory' => $request->kategori,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Ensure query is at least 3 characters
        if (!$query || strlen($query) < 3) {
            return response()->json(['courses' => []]);
        }
        
        // Get matching courses
        $courses = Course::whereIsPublished(true)
                        ->where('judul', 'like', "%{$query}%")
                        ->orWhere('kategori', 'like', "%{$query}%")
                        ->limit(8) // Limit to 8 results for better UX
                        ->get()
                        ->map(function($course) {
                            return [
                                'id' => $course->id,
                                'title' => $course->judul,
                                'slug' => $course->slug,
                                'category' => $course->kategori,
                                'thumbnail' => $course->getFirstMediaUrl('course-thumbnail'),
                                'price' => $course->price ? 'Rp ' . number_format($course->harga, 0, ',', '.') : 'Free',
                                'url' => route('course.show', $course->slug), // Change this to the actual course URL
                            ];
                        });
        // dd($courses);
        
        return response()->json(['courses' => $courses]);
    }

    public function show($slug)
    {
        $course = Course::with(['media', 'courseChapters.courseChapterLessons', 'courseMentors', 'techStacks', 'courseChapterLessons'])->withCount(['courseChapters', 'courseMentors', 'courseChapterLessons'])->whereSlug($slug)->whereIsPublished(true)->first();
        if(!$course) {
            return redirect()->back()->with('error', 'Course tidak ditemukan');
        }
        return view('pages.course.front.course.show', [
            'title' => $course->judul,
            'course' => $course,
        ]);
    }
}
