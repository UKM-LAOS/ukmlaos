<?php

namespace Database\Seeders;

use App\Models\Pengurus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengurusData = [
            [
                'nama' => 'Irfan Rafif Gunawan',
                'jabatan' => 'Ketua Umum',
                'periode' => '2024-2025',
                'foto' => 'assets/cp/img/foto-pengurus/2425/irfan.png',
                'sosmed' => [
                    'instagram' => 'https://instagram.com/irfanrafif',
                    'facebook' => 'https://facebook.com/irfanrafif',
                    'github' => 'https://github.com/irfanrafif',
                    'linkedin' => 'https://linkedin.com/in/irfanrafif'
                ],
                'urutan' => 1,
                'aktif' => true
            ],
            [
                'nama' => 'Suhailah Nuryah Fahma',
                'jabatan' => 'Wakil Ketua Umum',
                'periode' => '2024-2025',
                'foto' => 'assets/cp/img/foto-pengurus/2425/suhailah.png',
                'sosmed' => [
                    'instagram' => 'https://instagram.com/suhailah',
                    'facebook' => 'https://facebook.com/suhailah',
                    'github' => 'https://github.com/suhailah',
                    'linkedin' => 'https://linkedin.com/in/suhailah'
                ],
                'urutan' => 2,
                'aktif' => true
            ],
            [
                'nama' => 'Farah Fairuz',
                'jabatan' => 'Sekretaris',
                'periode' => '2024-2025',
                'foto' => 'assets/cp/img/foto-pengurus/2425/farah.png',
                'sosmed' => [
                    'instagram' => 'https://instagram.com/farahfairuz',
                    'facebook' => 'https://facebook.com/farahfairuz',
                    'github' => 'https://github.com/farahfairuz',
                    'linkedin' => 'https://linkedin.com/in/farahfairuz'
                ],
                'urutan' => 3,
                'aktif' => true
            ],
            [
                'nama' => 'Ahmad Rizki',
                'jabatan' => 'Bendahara',
                'periode' => '2024-2025',
                'foto' => 'assets/cp/img/foto-pengurus/2425/rizki.png',
                'sosmed' => [
                    'instagram' => 'https://instagram.com/ahmadrizki',
                    'facebook' => 'https://facebook.com/ahmadrizki',
                    'github' => 'https://github.com/ahmadrizki',
                    'linkedin' => 'https://linkedin.com/in/ahmadrizki'
                ],
                'urutan' => 4,
                'aktif' => true
            ],

            [
                'nama' => 'Bashori Al-Munir',
                'jabatan' => 'Ketua Umum',
                'periode' => '2023-2024',
                'foto' => 'assets/cp/img/foto-pengurus/2324/Bashori1.png',
                'sosmed' => [
                    'instagram' => 'https://instagram.com/bashori',
                    'facebook' => 'https://facebook.com/bashori',
                    'github' => 'https://github.com/bashori',
                    'linkedin' => 'https://linkedin.com/in/bashori'
                ],
                'urutan' => 1,
                'aktif' => true
            ],
            [
                'nama' => 'Sarah Putri',
                'jabatan' => 'Wakil Ketua Umum',
                'periode' => '2023-2024',
                'foto' => 'assets/cp/img/foto-pengurus/2324/sarah.png',
                'sosmed' => [
                    'instagram' => 'https://instagram.com/sarahputri',
                    'facebook' => 'https://facebook.com/sarahputri',
                    'github' => 'https://github.com/sarahputri',
                    'linkedin' => 'https://linkedin.com/in/sarahputri'
                ],
                'urutan' => 2,
                'aktif' => true
            ],
            [
                'nama' => 'Dimas Prakoso',
                'jabatan' => 'Sekretaris',
                'periode' => '2023-2024',
                'foto' => 'assets/cp/img/foto-pengurus/2324/dimas.png',
                'sosmed' => [
                    'instagram' => 'https://instagram.com/dimasprakoso',
                    'facebook' => 'https://facebook.com/dimasprakoso',
                    'github' => 'https://github.com/dimasprakoso',
                    'linkedin' => 'https://linkedin.com/in/dimasprakoso'
                ],
                'urutan' => 3,
                'aktif' => true
            ],

            [
                'nama' => 'Lisa Permata',
                'jabatan' => 'Ketua Umum',
                'periode' => '2022-2023',
                'foto' => 'assets/cp/img/foto-pengurus/2223/lisa.png',
                'sosmed' => [
                    'instagram' => 'https://instagram.com/lisapermata',
                    'facebook' => 'https://facebook.com/lisapermata',
                    'github' => 'https://github.com/lisapermata',
                    'linkedin' => 'https://linkedin.com/in/lisapermata'
                ],
                'urutan' => 1,
                'aktif' => true
            ],
            [
                'nama' => 'Andi Firmansyah',
                'jabatan' => 'Wakil Ketua Umum',
                'periode' => '2022-2023',
                'foto' => 'assets/cp/img/foto-pengurus/2223/andi.png',
                'sosmed' => [
                    'instagram' => 'https://instagram.com/andifirmansyah',
                    'facebook' => 'https://facebook.com/andifirmansyah',
                    'github' => 'https://github.com/andifirmansyah',
                    'linkedin' => 'https://linkedin.com/in/andifirmansyah'
                ],
                'urutan' => 2,
                'aktif' => true
            ]
        ];

        foreach ($pengurusData as $pengurus) {
            Pengurus::create($pengurus);
        }
    }
}
