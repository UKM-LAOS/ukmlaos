<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel programs.
     */
    public function run(): void
    {
        // Pastikan divisi_id yang digunakan sudah ada di tabel divisis
        $programs = [
            [
                'divisi_id' => 1,
                'judul_program' => 'Pelatihan Laravel',
                'slug' => 'pelatihan-laravel',
                'judul_kegiatan' => 'Workshop Laravel Dasar',
                'konten' => 'Pelatihan intensif framework Laravel untuk anggota divisi.',
                'lat' => -6.200000,
                'long' => 106.816666,
                'location' => json_encode(['alamat' => 'Jakarta', 'gedung' => 'Aula Utama']),
                'open_regis_panitia' => '2025-08-01',
                'close_regis_panitia' => '2025-08-10',
                'gform_panitia' => 'https://forms.gle/panitia1',
                'open_regis_peserta' => '2025-08-11',
                'close_regis_peserta' => '2025-08-20',
                'gform_peserta' => 'https://forms.gle/peserta1',
                'jadwal_kegiatan' => json_encode([
                    ['tanggal' => '2025-09-01', 'kegiatan' => 'Pembukaan'],
                    ['tanggal' => '2025-09-02', 'kegiatan' => 'Materi Laravel'],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'divisi_id' => 2,
                'judul_program' => 'Workshop UI/UX',
                'slug' => 'workshop-ui-ux',
                'judul_kegiatan' => 'Pelatihan Desain UI/UX',
                'konten' => 'Workshop desain UI/UX untuk meningkatkan skill anggota.',
                'lat' => -7.250445,
                'long' => 112.768845,
                'location' => json_encode(['alamat' => 'Surabaya', 'gedung' => 'Ruang Kreatif']),
                'open_regis_panitia' => '2025-09-01',
                'close_regis_panitia' => '2025-09-10',
                'gform_panitia' => 'https://forms.gle/panitia2',
                'open_regis_peserta' => '2025-09-11',
                'close_regis_peserta' => '2025-09-20',
                'gform_peserta' => 'https://forms.gle/peserta2',
                'jadwal_kegiatan' => json_encode([
                    ['tanggal' => '2025-10-01', 'kegiatan' => 'Pembukaan'],
                    ['tanggal' => '2025-10-02', 'kegiatan' => 'Materi UI/UX'],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert programs data
        DB::table('programs')->insert($programs);

        // Attach media to each program
        $program1 = Program::find(1);
        $program1->addMediaFromUrl("https://image.idntimes.com/post/20240426/untitled-e94e12b767c46b65da0ca8868bc0bd6c.png")
            ->toMediaCollection('program-thumbnail');

        $program2 = Program::find(2);
        $program2->addMediaFromUrl("https://otakuusamagazine.com/wp-content/uploads/2023/01/ousa_skill_hero.png")
            ->toMediaCollection('program-thumbnail');
    }
}