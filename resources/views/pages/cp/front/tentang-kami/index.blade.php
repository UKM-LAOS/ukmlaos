@extends('layouts.cp.front')

@section('content')
    <section class="relative bg-gray-50 overflow-hidden">
        <div class="mt-12">
            <div class="absolute inset-0">
                <img src="{{ asset('assets/cp/hero/hero-transparant.png') }}" alt="Background Faces"
                    class="w-full h-full object-cover opacity-30">
            </div>

            <div class="relative container mx-auto px-6 md:px-12 grid md:grid-cols-4 items-center gap-3">
                <div class="text-left md:col-span-2">
                    <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
                        Kenali yuk dengan <span class="text-green-500">UKM LAOS</span>
                    </h1>
                    <p class="mt-4 text-gray-700 text-lg max-w-md">
                        Tempat bagi kamu yang ingin belajar, berkreasi, dan berkontribusi di dunia digital.
                        Yuk, jadi bagian dari gerakan teknologi yang inovatif!
                    </p>
                    <a href="{{ route('cp.program.index') }}"
                        class="inline-block mt-6 bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full shadow-lg transition">
                        Lihat Program Kami
                    </a>
                </div>

                <div class="flex justify-center md:justify-end pb-10 md:col-span-2">
                    <img src="{{ asset('assets/cp/hero/hero-about-us.png') }}" alt="Ilustrasi UKM"
                        class="relative z-10 w-full ml-10 h-auto transform hover:scale-105 transition-transform duration-500">
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 max-w-4xl mx-auto text-center">
        <h2 class="text-2xl font-bold mb-4">Tentang Kami</h2>
        <p class="text-gray-600 leading-relaxed">
            Unit Kegiatan Mahasiswa Linux and Open Source atau disebut juga UKM LAOS merupakan salah satu organisasi
            yang berfokus untuk memajukan kreativitas dalam pengembangan Linux dan Open Source di Fakultas Ilmu Komputer
            Universitas Jember. UKM LAOS berada di bawah naungan BEM Fakultas Ilmu Komputer. UKM LAOS didirikan pada tanggal
            19 Desember 2009 dengan berasaskan “Pancasila” dan bersifat “Kekeluargaan”.
        </p>
    </section>

    <section class="py-12">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-4">Makna Logo</h2>
            <p class="text-gray-600 mb-6">
                Logo UKM LAOS memiliki dua warna utama dengan makna simbolis:
            </p>
        </div>
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-4 items-center">
            <div class="flex justify-center">
                <img src="{{ asset('logo.png') }}" alt="Logo UKM LAOS" class="w-64 md:w-72 lg:w-80">
            </div>
            <div class="space-y-6">
                <div class="flex items-start">
                    <span class="text-2xl font-bold mr-4 leading-none">Aa</span>
                    <p class="text-gray-700">
                        <span class="font-semibold">Tipografi:</span> Font yang digunakan tampak modern dan bersih,
                        mencerminkan kesan sederhana, dan mudah dikenali
                    </p>
                </div>
                <div class="flex items-start">
                    <span class="text-yellow-500 mr-4 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 3C7.03 3 3 7.03 3 12c0 2.21 1.79 4 4 4h1a1 1 0 0 1 1 1v1c0 2.21 1.79 4 4 4 4.97 0 9-4.03 9-9s-4.03-9-9-9zm-5 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm3-4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm4 0a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm3 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                        </svg>
                    </span>
                    <p class="text-gray-700">
                        <span class="font-semibold">Warna:</span> “Kuning” melambangkan dasar Universitas Jember yang
                        berarti “Kejayaan”
                    </p>
                </div>
                <div class="flex items-start">
                    <span class="text-green-500 mr-4 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2a10 10 0 0 0-3 19.5l2-5.2a3 3 0 1 1 2 0l2 5.2A10 10 0 0 0 12 2z" />
                        </svg>
                    </span>
                    <p class="text-gray-700">
                        <span class="font-semibold">Gambar:</span> berwarna “Hijau” merupakan logo Open Source
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-6">Visi UKM LAOS</h2>
            <div class="bg-white rounded-lg border p-8 flex flex-col items-center shadow-sm">
                <div class="text-green-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M19.14,12.94a7.43,7.43,0,0,0,.06-1,7.43,7.43,0,0,0-.06-1l2.11-1.65a.5.5,0,0,0,.12-.63l-2-3.46a.5.5,0,0,0-.6-.22l-2.49,1a7.28,7.28,0,0,0-1.73-1L14.46,2.5a.5.5,0,0,0-.5-.5H10a.5.5,0,0,0-.5.5L9,5.02a7.28,7.28,0,0,0-1.73,1l-2.49-1a.5.5,0,0,0-.6.22l-2,3.46a.5.5,0,0,0,.12.63L4.41,10a7.43,7.43,0,0,0,0,2l-2.11,1.65a.5.5,0,0,0-.12.63l2,3.46a.5.5,0,0,0,.6.22l2.49-1a7.28,7.28,0,0,0,1.73,1l.46,2.52a.5.5,0,0,0,.5.5h4a.5.5,0,0,0,.5-.5l.46-2.52a7.28,7.28,0,0,0,1.73-1l2.49,1a.5.5,0,0,0,.6-.22l2-3.46a.5.5,0,0,0-.12-.63ZM12,15.5A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                    </svg>
                </div>
                <p class="text-gray-600 text-center">
                    Mendukung, mengenalkan dan mengembangkan Linux dan Open Source pada masyarakat luas khususnya Fakultas
                    Ilmu Komputer.
                </p>
            </div>
        </div>
    </section>

    <section class="py-12 ">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-8">Misi UKM LAOS</h2>
            <div class="grid md:grid-cols-3 gap-6 text-gray-700">
                <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col items-center">
                    <div class="text-green-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2C9 2 7 4.5 7 7v2c0 1.5.5 2.5 1 3-2 1-4 3.5-4 6 0 2.5 2 4 4 4h8c2 0 4-1.5 4-4 0-2.5-2-5-4-6 .5-.5 1-1.5 1-3V7c0-2.5-2-5-5-5z" />
                        </svg>
                    </div>
                    <p class="text-center">
                        Menjadi relasi berbagai pihak yang mendukung dan mengimplementasikan Linux dan Open Source
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col items-center">
                    <div class="text-green-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z" />
                        </svg>
                    </div>
                    <p class="text-center">
                        Mengenalkan Linux dan Open Source software kepada masyarakat khususnya pada instansi pendidikan
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col items-center">
                    <div class="text-green-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2a10 10 0 0 0 0 20 10 10 0 0 0 0-20zm0 3a7 7 0 0 1 0 14 7 7 0 0 1 0-14z" />
                        </svg>
                    </div>
                    <p class="text-center">
                        Ikut serta dan aktif bersama aktivis Linux se-Indonesia mengenalkan OS Linux kepada masyarakat
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="py-12">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-6">
                <span class="inline-block bg-gray-200 text-gray-800 px-4 py-1 rounded-full text-sm font-medium mb-2">
                    STRUKTUR PENGURUS
                </span>
                <h2 class="text-2xl font-bold">UKM LAOS Periode 2024 – 2025</h2>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($pengurus as $p)
                    <div class="bg-green-100 rounded-xl overflow-hidden shadow relative">
                        <div class="absolute top-2 left-2 z-10">
                            <img src="{{ asset('logo.png') }}" alt="Logo" class="w-8 h-8">
                        </div>
                        <img src="{{ asset($p['foto']) }}" alt="{{ $p['nama'] }}" class="w-full object-cover h-40">
                        <div class="p-4 text-center">
                            <h3 class="font-bold text-gray-800">{{ $p['nama'] }}</h3>
                            <p class="text-sm text-gray-600">{{ $p['jabatan'] }}</p>
                        </div>
                        <div class="flex justify-center gap-1 pb-3">
                            @for ($i = 0; $i < 4; $i++)
                                <span class="w-2 h-2 rounded-full {{ $i == 0 ? 'bg-green-500' : 'bg-gray-300' }}"></span>
                            @endfor
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
