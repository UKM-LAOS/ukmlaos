<?php

namespace App\Http\Controllers\CP\Front;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        $availablePeriods = Pengurus::getAvailablePeriods();

        if (empty($availablePeriods)) {
            $availablePeriods = ['2024-2025'];
        }

        $selectedPeriod = $request->get('periode', $availablePeriods[0]);

        if (!in_array($selectedPeriod, $availablePeriods)) {
            $selectedPeriod = $availablePeriods[0];
        }

        $pengurus = Pengurus::getByPeriode($selectedPeriod);

        return view('pages.cp.front.tentang-kami.index', [
            'title' => 'Tentang Kami',
            'pengurus' => $pengurus,
            'selectedPeriod' => $selectedPeriod,
            'availablePeriods' => $availablePeriods,
        ]);
    }
}
