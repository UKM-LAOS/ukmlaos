<?php

namespace App\Http\Controllers\LaosCourse\API;

use App\Models\KursusMurid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ResponseFormatterController;
use Illuminate\Support\Facades\Auth;

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
}
