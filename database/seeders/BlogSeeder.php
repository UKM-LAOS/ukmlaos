<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Divisi;
use App\Models\User;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $divisis = Divisi::all();
        $users = User::all();

        $categories = ['informasi', 'tutorial', 'mitos-fakta', 'tips-trik', 'press-release'];

        $sampleTitles = [
            'informasi' => [
                'Tips Desain UI/UX untuk UKM',
                'Pentingnya Digitalisasi dalam Bisnis Modern',
                'Tren Teknologi 2025 untuk UKM',
                'Memahami Customer Journey dalam Bisnis Digital'
            ],
            'tutorial' => [
                'Cara Membuat Website Sederhana untuk UKM',
                'Tutorial Social Media Marketing untuk Pemula',
                'Langkah-langkah Membangun Brand Identity',
                'Panduan Lengkap SEO untuk Website Bisnis'
            ],
            'mitos-fakta' => [
                'Mitos dan Fakta tentang Digital Marketing',
                'Kebenaran tentang E-commerce di Indonesia',
                'Fakta Menarik tentang Perilaku Konsumen Digital',
                'Membongkar Mitos Startup di Indonesia'
            ],
            'tips-trik' => [
                'Strategi Media Sosial untuk UKM',
                'Tips Meningkatkan Penjualan Online',
                'Trik Jitu Content Marketing',
                'Cara Efektif Mengelola Tim Remote'
            ],
            'press-release' => [
                'Peluncuran Program Baru UKM LAOS',
                'Kerjasama Strategis dengan Universitas Terkemuka',
                'Pencapaian Milestone UKM LAOS 2024',
                'Ekspansi Layanan ke Kota-kota Besar'
            ]
        ];

        foreach ($categories as $category) {
            $titles = $sampleTitles[$category];

            foreach ($titles as $title) {
                Blog::create([
                    'divisi_id' => $divisis->random()->id,
                    'author_id' => $users->random()->id ?? 1,
                    'judul' => $title,
                    'slug' => \Str::slug($title),
                    'kategori' => $category,
                    'konten' => $this->generateContent($faker, $category),
                    'meta_description' => $faker->sentence(15),
                    'is_unggulan' => $faker->boolean(20), // 20% chance of being featured
                    'status' => $faker->randomElement(['published', 'published', 'published', 'draft']), // 75% published
                    'views' => $faker->numberBetween(0, 1000),
                    'published_at' => $faker->dateTimeBetween('-6 months', 'now'),
                    'created_at' => $faker->dateTimeBetween('-6 months', 'now'),
                ]);
            }
        }

        for ($i = 0; $i < 20; $i++) {
            $category = $faker->randomElement($categories);

            Blog::create([
                'divisi_id' => $divisis->random()->id,
                'author_id' => $users->random()->id ?? 1,
                'judul' => $faker->sentence(4, true),
                'slug' => $faker->unique()->slug,
                'kategori' => $category,
                'konten' => $this->generateContent($faker, $category),
                'meta_description' => $faker->sentence(15),
                'is_unggulan' => $faker->boolean(15),
                'status' => $faker->randomElement(['published', 'published', 'draft']),
                'views' => $faker->numberBetween(0, 2000),
                'published_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }

    private function generateContent($faker, $category)
    {
        $paragraphs = [];

        $paragraphs[] = "<p>" . $faker->paragraph(4) . "</p>";

        switch ($category) {
            case 'tutorial':
                $paragraphs[] = "<h3>Langkah-langkah:</h3>";
                $paragraphs[] = "<ol>";
                for ($i = 1; $i <= 5; $i++) {
                    $paragraphs[] = "<li>" . $faker->sentence() . "</li>";
                }
                $paragraphs[] = "</ol>";
                break;

            case 'tips-trik':
                $paragraphs[] = "<h3>Tips Praktis:</h3>";
                $paragraphs[] = "<ul>";
                for ($i = 1; $i <= 4; $i++) {
                    $paragraphs[] = "<li>" . $faker->sentence() . "</li>";
                }
                $paragraphs[] = "</ul>";
                break;

            case 'mitos-fakta':
                $paragraphs[] = "<h3>Mitos:</h3>";
                $paragraphs[] = "<p>" . $faker->paragraph(3) . "</p>";
                $paragraphs[] = "<h3>Fakta:</h3>";
                $paragraphs[] = "<p>" . $faker->paragraph(3) . "</p>";
                break;

            default:
                $paragraphs[] = "<p>" . $faker->paragraph(5) . "</p>";
                $paragraphs[] = "<p>" . $faker->paragraph(4) . "</p>";
        }

        $paragraphs[] = "<p>" . $faker->paragraph(3) . "</p>";

        $paragraphs[] = "<p>" . $faker->paragraph(2) . "</p>";

        return implode("\n", $paragraphs);
    }
}
