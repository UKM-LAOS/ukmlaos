<?php

namespace App\Http\Controllers\CP\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $pengurus = [
            [
                'nama' => 'Farah Fairuz',
                'jabatan' => 'Sekretaris',
                'foto' => 'assets/cp/img/foto-pengurus/2324/Bashori1.png'
            ],
            [
                'nama' => 'Irfan Rafif Gunawan',
                'jabatan' => 'Ketua Umum',
                'foto' => 'assets/cp/img/foto-pengurus/2324/Bashori1.png'
            ],
            [
                'nama' => 'Suhailah Nuryah Fahma',
                'jabatan' => 'Wakil Ketua Umum',
                'foto' => 'assets/cp/img/foto-pengurus/2324/Bashori1.png'
            ],
        ];

        return view('pages.cp.front.tentang-kami.index', [
            'title' => 'Tentang Kami',
            'pengurus' => $pengurus,
        ]);
    }
}
