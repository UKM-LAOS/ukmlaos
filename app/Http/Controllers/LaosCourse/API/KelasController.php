<?php

namespace App\Http\Controllers\LaosCourse\API;

use App\Models\Kursus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ResponseFormatterController;

class KelasController extends Controller
{
    public function index()
    {
        $kursus = Kursus::withCount(['mentors', 'students', 'media'])
            ->with(['materi', 'flashSale', 'media' => fn($q) => $q->whereCollectionName('kursus-thumbnail')])->withAvg('reviews as avg_rating', 'kursus_murids.rating')
            ->whereIsPublished(true)
            ->latest()
            ->paginate(6);
        return ResponseFormatterController::success($kursus, 'Kursus retrieved successfully');
    }

    public function filter(Request $request)
    {
        $kategori = $request->has('kategori') ? explode(',', $request->kategori) : [];

        $kursus = Kursus::with(['flashSale', 'materi', 'media' => fn($q) => $q->whereCollectionName('kursus-thumbnail')])->withCount(['mentors', 'students'])
            ->whereIsPublished(true)
            ->withAvg('reviews as avg_rating', 'kursus_murids.rating')
            ->when(!empty($kategori), function ($query) use ($kategori) {
                return $query->whereIn('kategori', $kategori);
            })
            ->latest()
            ->paginate(6);

        // Preserve query parameters in pagination links
        $kursus->appends($request->all());

        return ResponseFormatterController::success($kursus, 'Kursus retrieved successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Ensure query is at least 3 characters
        if (!$query || strlen($query) < 3) {
            return ResponseFormatterController::error('Query must be at least 3 characters', 400);
        }
        
        // Get matching courses
        $kursus = Kursus::with(['media' => fn($q) => $q->whereCollectionName('kursus-thumbnail')])->whereIsPublished(true)
                        ->where('judul', 'like', "%{$query}%")
                        ->orWhere('kategori', 'like', "%{$query}%")
                        ->limit(8) // Limit to 8 results for better UX
                        ->get()
                        ->map(function($course) {
                            return [
                                'id' => $course->id,
                                'title' => $course->judul,
                                'slug' => $course->slug,
                                'category' => $course->kategori->getLabel(),
                                'thumbnail' => $course->getFirstMediaUrl('kursus-thumbnail'),
                                'price' => $course->price ? 'Rp ' . number_format($course->harga, 0, ',', '.') : 'Free',
                                'url' => route('course.kelas.show', $course->slug), // Change this to the actual course URL
                            ];
                        });
        if ($kursus->isEmpty()) {
            return ResponseFormatterController::error('No courses found', 404);
        }
        
        return ResponseFormatterController::success($kursus, 'Courses retrieved successfully');
    }

    public function show($slug)
    {
        $kursus = Kursus::with(['media' => fn($q) => $q->whereCollectionName('kursus-thumbnail'), 'bab.materi', 'mentors', 'techStacks.media', 'materi', 'reviews' => function ($query) {
                $query->with('student');
            }, 'flashSale'])
            ->withCount(['bab', 'mentors', 'students', 'materi', 'reviews'])
            ->withAvg('reviews as avg_rating', 'kursus_murids.rating')
            ->whereSlug($slug)
            ->first();
        
        if(!$kursus)
        {
            return ResponseFormatterController::error('Course not found', 404); 
        }

        return ResponseFormatterController::success($kursus, 'Course retrieved successfully');
    }
}
