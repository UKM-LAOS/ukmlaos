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
                'nama' => 'Divisi Teknologi Informasi',
                'slug' => 'teknologi-informasi',
                'deskripsi' => 'Divisi yang menangani pengembangan teknologi dan sistem informasi'
            ],
            [
                'nama' => 'Divisi Pemasaran',
                'slug' => 'pemasaran',
                'deskripsi' => 'Divisi yang menangani strategi pemasaran dan branding'
            ],
            [
                'nama' => 'Divisi Keuangan',
                'slug' => 'keuangan',
                'deskripsi' => 'Divisi yang menangani pengelolaan keuangan dan akuntansi'
            ],
            [
                'nama' => 'Divisi Operasional',
                'slug' => 'operasional',
                'deskripsi' => 'Divisi yang menangani operasional harian dan administrasi'
            ],
            [
                'nama' => 'Divisi Penelitian dan Pengembangan',
                'slug' => 'penelitian-pengembangan',
                'deskripsi' => 'Divisi yang menangani penelitian dan pengembangan produk/layanan'
            ]
        ];

        foreach ($divisis as $divisi) {
            Divisi::create($divisi);
        }
    }
}

