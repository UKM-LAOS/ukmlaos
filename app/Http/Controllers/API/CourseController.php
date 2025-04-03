<?php

namespace App\Http\Controllers\API;

use App\Models\Course;
use App\Models\Discount;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseStudent;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::withCount(['courseChapters', 'courseMentors'])->paginate(6);
        return ResponseFormatterController::success($courses, 'Courses data retrieved successfully');
    }

    public function show($slug)
    {
        $course = Course::with(['courseChapters', 'courseMentors'])->with(['courseMentors', 'courseChapters.courseChapterLessons'])->where('slug', $slug)->first();
        if($course)
        {
            return ResponseFormatterController::success($course, 'Course data retrieved successfully');
        }
        else
        {
            return ResponseFormatterController::error('Course not found', 404);
        }
    }

    public function joinCourse(Request $request, $slug)
    {
        $validatedData = Validator::make($request->all(), [
            'discount_code' => 'nullable|string|exists:discounts,kode',
        ]);

        DB::beginTransaction();
        try {
            if ($validatedData->fails()) {
                DB::rollBack();
                return ResponseFormatterController::error($validatedData->errors(), 422);
            }

            $course = Course::where('slug', $slug)->first();

            $discount = null;
            if($request->discount_code) {
                $discount = Discount::where('kode', $request->discount_code)->first();
                if(!$discount) {
                    DB::rollBack();
                    return ResponseFormatterController::error('Discount not found', 404);
                }
            }

            $courseStudent = CourseStudent::create([
                'course_id' => $course->id,
                'student_id' => auth('api')->user()->id,
            ]);

            $transaction = Transaction::create([
                'order_id' => 'LAOS-' . Str::random(6),
                'student_id' => auth('api')->user()->id,
                'course_student_id' => $courseStudent->id,
                'discount_id' => $discount ? $discount->id : null,


            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseFormatterController::error($e->getMessage(), 500);
        }


    }
}
