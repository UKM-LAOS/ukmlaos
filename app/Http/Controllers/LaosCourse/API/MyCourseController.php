<?php

namespace App\Http\Controllers\LaosCourse\API;

use App\Models\Kursus;
use App\Models\KursusMurid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Helpers\ResponseFormatterController;

class MyCourseController extends Controller
{
    public function index()
    {
        $enrolledKursus = KursusMurid::with([
            'kursus' => function($q)
            {
                $q->with(['media'])->withCount(['mentors', 'materi']);
            },
            'progres' => function($q)
            {
                $q->with('materi')->where('is_current', true);
            },
        ])
        ->withCount('progres')
        ->whereStudentId(Auth::guard('api')->user()->id)
        ->latest()
        ->paginate(6);
        return ResponseFormatterController::success($enrolledKursus,  'Berhasil mendapatkan data kursus yang terdaftar');
    }

    public function search(Request $request)
    {
        $enrolledKursus = KursusMurid::with([
            'kursus' => function($q) use ($request)
            {
                $q->with(['media'])->withCount(['mentors', 'materi']);
            },
            'progres' => function($q)
            {
                $q->with('materi')->where('is_current', true);
            },
        ])
        ->withCount('progres')
        ->whereStudentId(Auth::guard('api')->user()->id)
        ->whereHas('kursus', function($q) use ($request)
        {
            $q->where('judul', 'LIKE', '%'.$request->judul.'%');
        })
        ->latest()
        ->paginate(6);
        return ResponseFormatterController::success($enrolledKursus,  'Berhasil mendapatkan data kursus yang terdaftar');
    }

    public function createTestimoni(Request $request, $slug)
    {
        // dd($request->all());
        $request->validate([
            'rating_value' => 'required|numeric|min:1|max:5',
            'komentar' => 'required|string',
        ], [
            'rating_value.required' => 'Rating tidak boleh kosong',
            'komentar.required' => 'Testimoni tidak boleh kosong',
            'rating_value.min' => 'Rating minimal 1',
            'rating_value.max' => 'Rating maksimal 5',
        ]);

        $kursus = Kursus::whereIsPublished(true)
            ->whereSlug($slug)
            ->first();

        if(!$kursus)
        {
            return ResponseFormatterController::error('Kursus tidak ditemukan', 404);
        }

        // dd($kursus->id);

        DB::beginTransaction();
        try
        {
            $kursusMurid = KursusMurid::whereKursusId($kursus->id)
                ->whereStudentId(Auth::guard('api')->user()->id)
                ->first();

            if(!$kursusMurid)
            {
                return ResponseFormatterController::error('Anda tidak terdaftar di kursus ini', 404);
            }

            if($kursusMurid->rating)
            {
                return ResponseFormatterController::error('Anda sudah memberikan testimoni', 422);
            }

            $kursusMurid->update([
                'rating' => $request->rating_value,
                'komentar' => $request->komentar,
            ]);

            DB::commit();
            return ResponseFormatterController::success(null, 'Berhasil memberikan testimoni');
        }catch(\Exception $e)
        {
            DB::rollBack();
            return ResponseFormatterController::error('Gagal memberikan testimoni ' . $e->getMessage(), 500);
        }
    }
}
