<?php

namespace App\Http\Controllers\Course\Back;

use App\Models\Course;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\CourseChapter;
use App\Models\CourseStudent;
use Illuminate\Support\Facades\DB;
use App\Models\CourseChapterLesson;
use App\Http\Controllers\Controller;
use App\Models\CourseStudentProgres;
use App\Enums\Transaction\StatusEnum;
use Illuminate\Support\Facades\Auth;

class MyCoursesController extends Controller
{
    public $title = 'My Courses';

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
        ->paginate(6);
        
        return view('pages.course.back.my-courses.index', [
            'title' => $this->title,
            'courses' => $courses
        ]);
    }

    public function search(Request $request)
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
        ->whereHas('course', function($q) use ($request) {
            $q->where('judul', 'like', '%'.$request->judul.'%');
        })
        ->where('student_id', Auth::id())
        ->latest()
        ->paginate(6);
        

        return view('pages.course.back.my-courses.index', [
            'title' => $this->title,
            'courses' => $courses,
        ]);
    }

    // Optimized Course Controller
    public function show($slug)
    {
        // Get course with enrollment status in a single query
        $courseWithEnrollment = DB::table('courses')
            ->select([
                'courses.id',
                'courses.slug',
                'course_students.id as enrollment_id'
            ])
            ->leftJoin('course_students', function($join) {
                $join->on('courses.id', '=', 'course_students.course_id')
                    ->where('course_students.student_id', '=', auth()->id());
            })
            ->where('courses.slug', $slug)
            ->first();
            
        if (!$courseWithEnrollment) {
            return redirect()->route('course.dashboard.my-courses.index')
                ->with('error', 'Kursus tidak ditemukan.');
        }
        
        // If not enrolled, redirect with error
        if (!$courseWithEnrollment->enrollment_id) {
            return redirect()->route('course.dashboard.my-courses.index')
                ->with('error', 'Anda belum terdaftar di kursus ini.');
        }
        
        // Combined query for current progress and first lesson
        // This avoids two separate queries
        $courseData = DB::table('course_chapters')
            ->select([
                'course_chapters.id as chapter_id',
                'course_chapter_lessons.id as lesson_id',
                'course_student_progres.id as progress_id',
                'course_student_progres.is_current',
                DB::raw('ROW_NUMBER() OVER (PARTITION BY course_chapters.course_id ORDER BY course_chapters.id, course_chapter_lessons.id) as lesson_order')
            ])
            ->join('course_chapter_lessons', 'course_chapters.id', '=', 'course_chapter_lessons.course_chapter_id')
            ->leftJoin('course_student_progres', function($join) use ($courseWithEnrollment) {
                $join->on('course_chapter_lessons.id', '=', 'course_student_progres.course_chapter_lesson_id')
                    ->where('course_student_progres.course_student_id', '=', $courseWithEnrollment->enrollment_id);
            })
            ->where('course_chapters.course_id', $courseWithEnrollment->id)
            ->orderBy('course_chapters.id')
            ->orderBy('course_chapter_lessons.id')
            ->get();
        
        // Find current progress
        $currentProgress = $courseData->firstWhere('is_current', true);
        
        // If there's a current progress, redirect to that lesson
        if ($currentProgress) {
            return redirect()->route('course.dashboard.my-courses.watch', [
                'slug' => $slug,
                'chapterId' => $currentProgress->chapter_id,
                'lessonId' => $currentProgress->lesson_id
            ]);
        }
        
        // Otherwise, find the first lesson
        $firstLesson = $courseData->firstWhere('lesson_order', 1);
        
        // Create initial progress record
        DB::table('course_student_progres')->insert([
            'course_student_id' => $courseWithEnrollment->enrollment_id,
            'course_chapter_lesson_id' => $firstLesson->lesson_id,
            'is_current' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        return redirect()->route('course.dashboard.my-courses.watch', [
            'slug' => $slug,
            'chapterId' => $firstLesson->chapter_id,
            'lessonId' => $firstLesson->lesson_id
        ]);
        
        // Fallback
        return redirect()->route('course.dashboard.my-courses.index')
            ->with('error', 'Materi tidak ditemukan.');
    }

    public function watch($slug, $chapterId, $lessonId)
    {
        // Get course with enrollment status in a single query
        $courseData = DB::table('courses')
            ->select([
                'courses.id',
                'courses.slug',
                'course_students.id as enrollment_id'
            ])
            ->leftJoin('course_students', function($join) {
                $join->on('courses.id', '=', 'course_students.course_id')
                    ->where('course_students.student_id', '=', auth()->id());
            })
            ->where('courses.slug', $slug)
            ->first();
        
        if (!$courseData || !$courseData->enrollment_id) {
            return redirect()->route('course.dashboard.my-courses.index', $slug)
                ->with('error', 'Anda belum terdaftar di kursus ini.');
        }
        
        // First query: Get current lesson and chapter data
        $lessonData = DB::table('course_chapters')
            ->select([
                'course_chapters.id as chapter_id',
                'course_chapters.judul as chapter_title',
                'course_chapter_lessons.id as lesson_id',
                'course_chapter_lessons.judul as lesson_title',
                'course_chapter_lessons.youtube_url',
                'course_chapter_lessons.tipe_konten',
                'course_chapter_lessons.konten',
            ])
            ->join('course_chapter_lessons', 'course_chapters.id', '=', 'course_chapter_lessons.course_chapter_id')
            ->where('course_chapters.id', $chapterId)
            ->where('course_chapter_lessons.id', $lessonId)
            ->where('course_chapters.course_id', $courseData->id)
            ->first();
        
        if (!$lessonData) {
            return redirect()->route('course.dashboard.my-courses.index')
                ->with('error', 'Materi tidak ditemukan.');
        }
        
        // Second query: Get current progress and update lesson progress
        // Using a transaction to group the multiple update operations
        DB::transaction(function() use ($courseData, $lessonId) {
            // Get current active lesson before updating
            $currentProgress = DB::table('course_student_progres')
                ->where('course_student_id', $courseData->enrollment_id)
                ->where('is_current', true)
                ->first();
            
            // Mark previous lesson as done if exists and different from current lesson
            if ($currentProgress && $currentProgress->course_chapter_lesson_id != $lessonId) {
                DB::table('course_student_progres')
                    ->where('id', $currentProgress->id)
                    ->update([
                        'is_current' => false,
                        'updated_at' => now()
                    ]);
            }
            
            // Set all lessons as not current
            DB::table('course_student_progres')
                ->where('course_student_id', $courseData->enrollment_id)
                ->update(['is_current' => false]);
            
            // Create or update progress record for current lesson
            DB::table('course_student_progres')
                ->updateOrInsert(
                    [
                        'course_student_id' => $courseData->enrollment_id,
                        'course_chapter_lesson_id' => $lessonId,
                    ],
                    [
                        'is_current' => true,
                        'updated_at' => now()
                    ]
                );
        });
        
        // Third query: Get all course data in one efficient query
        $courseDataWithProgress = DB::select("
            WITH completed_lessons AS (
                SELECT course_chapter_lesson_id
                FROM course_student_progres
                WHERE course_student_id = ?
            ),
            last_lesson AS (
                SELECT ccl.id
                FROM course_chapter_lessons ccl
                JOIN course_chapters cc ON ccl.course_chapter_id = cc.id
                WHERE cc.course_id = ?
                ORDER BY cc.id DESC, ccl.id DESC
                LIMIT 1
            )
            SELECT 
                cc.id as chapter_id,
                cc.judul as chapter_title,
                ccl.id as lesson_id,
                ccl.tipe_konten,
                ccl.konten,
                ccl.youtube_url,
                ccl.judul as lesson_title,
                ccl.course_chapter_id,
                COUNT(ccl.id) OVER (PARTITION BY cc.id) as lesson_count,
                CASE WHEN cl.course_chapter_lesson_id IS NOT NULL THEN true ELSE false END as is_done,
                CASE WHEN ll.id = ccl.id THEN true ELSE false END as is_last_lesson
            FROM 
                course_chapters cc
            JOIN 
                course_chapter_lessons ccl ON cc.id = ccl.course_chapter_id
            LEFT JOIN 
                completed_lessons cl ON ccl.id = cl.course_chapter_lesson_id
            CROSS JOIN
                last_lesson ll
            WHERE 
                cc.course_id = ?
            ORDER BY 
                cc.id ASC, ccl.id ASC
        ", [$courseData->enrollment_id, $courseData->id, $courseData->id]);
        
        // Extract video ID
        $videoId = null;
        if ($lessonData->youtube_url) {
            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $lessonData->youtube_url, $matches);
            $videoId = $matches[1] ?? null;
        }
        
        // Structure the data properly for the view
        $chapters = [];
        $isLastLesson = false;
        
        foreach ($courseDataWithProgress as $item) {
            if (!isset($chapters[$item->chapter_id])) {
                $chapters[$item->chapter_id] = [
                    'id' => $item->chapter_id,
                    'judul' => $item->chapter_title,
                    'course_chapter_lessons_count' => $item->lesson_count,
                    'courseChapterLessons' => []
                ];
            }
            
            $chapters[$item->chapter_id]['courseChapterLessons'][] = [
                'id' => $item->lesson_id,
                'judul' => $item->lesson_title,
                'tipe_konten' => $item->tipe_konten,
                'konten' => $item->konten,
                'course_chapter_id' => $item->course_chapter_id,
                'youtube_url' => $item->youtube_url,
                'is_done' => $item->is_done
            ];
            
            if ($item->lesson_id == $lessonId && $item->is_last_lesson) {
                $isLastLesson = true;
            }
        }
        
        $chapters = array_values($chapters);
        
        // Prepare data for the view
        $course = (object)[
            'id' => $courseData->id,
            'slug' => $courseData->slug
        ];
        
        $currentChapter = (object)[
            'id' => $lessonData->chapter_id,
            'judul' => $lessonData->chapter_title
        ];
        
        $currentLesson = (object)[
            'id' => $lessonData->lesson_id,
            'judul' => $lessonData->lesson_title,
            'tipe_konten' => $lessonData->tipe_konten,
            'konten' => $lessonData->konten,
            'youtube_url' => $lessonData->youtube_url
        ];
        
        
        return view('pages.course.back.my-courses.show', compact(
            'course',
            'chapters',
            'currentChapter',
            'currentLesson',
            'videoId',
            'isLastLesson'
        ));
    }
}
