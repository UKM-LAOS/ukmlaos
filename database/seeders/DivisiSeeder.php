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
                'deskripsi' => 'Divisi yang menangani pengembangan teknologi dan sistem informasi',
                'logo'      => null,
            ],
            [
                'nama' => 'Divisi Pemasaran',
                'slug' => 'pemasaran',
                'deskripsi' => 'Divisi yang menangani strategi pemasaran dan branding',
                'logo'      => null,
            ],
            [
                'nama' => 'Divisi Keuangan',
                'slug' => 'keuangan',
                'deskripsi' => 'Divisi yang menangani pengelolaan keuangan dan akuntansi',
                'logo'      => null,
            ],
            [
                'nama' => 'Divisi Operasional',
                'slug' => 'operasional',
                'deskripsi' => 'Divisi yang menangani operasional harian dan administrasi',
                'logo'      => null,
            ],
            [
                'nama' => 'Divisi Penjualan',
                'slug' => 'penjualan',
                'deskripsi' => 'Divisi yang menangani penjualan produk dan layanan kepada konsumen',
                'logo'      => null,
            ],
            [
                'nama' => 'Divisi Penelitian dan Pengembangan',
                'slug' => 'penelitian-pengembangan',
                'deskripsi' => 'Divisi yang menangani penelitian dan pengembangan produk/layanan',
                'logo'      => null,
            ]

        ];

        foreach ($divisis as $divisi) {
            Divisi::create($divisi);
        }
    }
}

