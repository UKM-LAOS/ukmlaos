<?php

namespace App\Http\Controllers\Course\Front;

use Exception;
use App\Models\Course;
use App\Models\Discount;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseStudent;
use App\Enums\Course\TipeEnum;
use Illuminate\Support\Facades\DB;
use App\Contracts\PaymentInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Enums\Transaction\StatusEnum;
use App\Enums\Discount\TipeDiskonEnum;
use App\Http\Controllers\API\ResponseFormatterController;

class TransaksiController extends Controller
{
    public function __construct(
        private PaymentInterface $paymentService
    )
    {}

    public function index($slug)
    {
        $course = Course::with('courseMentors')->withCount(['courseChapterLessons', 'courseChapters', 'courseMentors'])->whereSlug($slug)->whereIsPublished(true)->first();

        $this->deleteUnpaidTransaction($course);

        // cek apakah course yang dibeli adalah course yang dibuat oleh dia sendiri
        if(checkIfCourseIsCreatedByUser($course))
        {
            return redirect()->back()->with('error', 'Anda tidak bisa membeli course yang anda buat sendiri');
        }

        // cek apakah sudah terdaftar
        if(checkIsRegistered($course))
        {
            return redirect()->route('course.dashboard.my-courses.show', $course->slug);
        }

        return view('pages.course.front.checkout.index', [
            'title' => 'Checkout',
            'course' => $course,
        ]);
    }

    // fungsi untuk membeli course premium
    public function beli(Request $request, $slug)
    {
        $request->validate([
            'kode' => 'nullable|string|exists:discounts,kode',
        ], [
            'kode.string' => 'Kode diskon harus berupa teks',
            'kode.exists' => 'Kode diskon tidak ditemukan',
        ]);

        $diskon = null;

        // Cek kode diskon
        if($request->kode)
        {
            $diskon = Discount::whereKode($request->kode)->first();
            if(!checkDiskon($diskon))
            {
                return ResponseFormatterController::error('Kode diskon tidak valid', 400);
            }
        }

        $course = Course::whereSlug($slug)->whereIsPublished(true)->first();

        // cek apakah course yang dibeli adalah course yang dibuat oleh dia sendiri
        if(checkIfCourseIsCreatedByUser($course))
        {
            return ResponseFormatterController::error('Anda tidak bisa membeli course yang anda buat sendiri', 400);
        }

        // cek apakah sudah terdaftar
        if(checkIsRegistered($course))
        {
            return ResponseFormatterController::error('Anda sudah terdaftar di course ini', 400);
        }

        // hapus transaksi yang belum dibayar
        $this->deleteUnpaidTransaction($course);

        // buat snap token atau transaksi
        $snapToken = $this->paymentService->pay($course, $diskon);

        // jika snap token tidak berhasil dibuat
        if(!$snapToken)
        {
            return ResponseFormatterController::error('Gagal membuat transaksi', 400);
        }

        // jika berhasil
        return ResponseFormatterController::success([
            'snap_token' => $snapToken,
        ], 'Transaksi berhasil dibuat');
    }

    // fungsi untuk membeli course gratis
    public function daftar($slug)
    {
        $course = Course::whereSlug($slug)->whereIsPublished(true)->first();

        // cek apakah course yang dibeli adalah course yang dibuat oleh dia sendiri
        if(checkIfCourseIsCreatedByUser($course))
        {
            return redirect()->back()->with('error', 'Anda tidak bisa membeli course yang anda buat sendiri');
        }
        // cek apakah sudah terdaftar
        if(checkIsRegistered($course))
        {
            // dd('sudah terdaftar');
            return redirect()->route('course.dashboard.my-courses.show', $course->slug);
        }
        DB::beginTransaction();
        try
        {
            // buat transaksi
            Transaction::create([
                'order_id' => 'LAOS-' . Str::random(6),
                'student_id' => auth()->id(),
                'course_student_id' => CourseStudent::create([
                    'course_id' => $course->id,
                    'student_id' => auth()->id(),
                ])->id,
                'discount_id' => null,
                'total_harga' => 0,
                'status' => StatusEnum::SUKSES,
            ]);

            DB::commit();

            return redirect()->route('course.pembayaran.sukses');
        }catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('course.pembayaran.gagal');
        }
        
    }

    public function pembayaranSukses()
    {
        return view('pages.course.front.pembayaran.sukses', [
            'title' => 'Pembayaran Sukses',
        ]);
    }

    public function pembayaranGagal()
    {
        return view('pages.course.front.pembayaran.gagal', [
            'title' => 'Pembayaran Gagal',
        ]);
    }

    private function deleteUnpaidTransaction($course)
    {
        $transaction = Transaction::whereStudentId(Auth::user()->id)->whereHas('courseStudent', function($query) use ($course)
        {
            $query->whereCourseId($course->id);
        })->whereNot('status', StatusEnum::SUKSES)->first();
        if($transaction)
        {
            CourseStudent::whereCourseId($course->id)->whereStudentId(Auth::user()->id)->delete();
        }
    }
}
