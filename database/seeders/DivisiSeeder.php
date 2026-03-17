<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DivisiSeeder extends Seeder
{
    public function run()
    {
        $divisis = [
            [
                'nama' => 'Software Development',
                'slug' => 'software development',
                'deskripsi' => 'Divisi yang bertanggung jawab terhadap perancangan dan pengembangan website dari UKM LAOS',
                'logo'      => null,
            ],
            [
                'nama' => 'Cyber Security',
                'slug' => 'cyber security',
                'deskripsi' => 'Divisi Cyber Security merupakan divisi yang bertanggungjawab dalam menjaga keamanan serta keberlangsungan infrastuktur teknologi UKM LAOS',
                'logo'      => null,
            ],
            [
                'nama' => 'Multimedia',
                'slug' => 'multimedia',
                'deskripsi' => 'Divisi Multimedia bertanggungjawab dalam editing feed dan konten UKM LAOS',
                'logo'      => null,
            ],
            [
                'nama' => 'Humas',
                'slug' => 'humas',
                'deskripsi' => 'Divisi Humas merupakan divisi yang bertanggung jawab menjadi jembatan antara internal UKM dengan Pihak Eksternal sekaligus mengelola instagram UKM LAOS',
                'logo'      => null,
            ],
            [
                'nama' => 'HRM',
                'slug' => 'hrm',
                'deskripsi' => 'Human Resource Management merupakan divisi yang bertanggung jawab dalam mengelola pengembangan sumberdaya manusia yang ada dalam UKM LAOS',
                'logo'      => null,
            ],

        ];

        foreach ($divisis as $divisi) {
            Divisi::create($divisi);
        }
    }
}

