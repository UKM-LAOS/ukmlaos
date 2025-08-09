@extends('layouts.cp.front')

@section('content')
    <section class="relative bg-gray-50 dark:bg-gray-900 overflow-hidden">
        <div class="mt-12">
            <div class="absolute inset-0">
                <img src="{{ asset('assets/cp/hero/hero-transparant.png') }}" alt="Background Faces"
                    class="w-full h-full object-cover opacity-30 dark:opacity-10">
            </div>

            <div class="relative container mx-auto px-6 md:px-12 grid md:grid-cols-4 items-center gap-3">
                <div class="text-left md:col-span-2">
                    <h1 class="text-4xl md:text-5xl font-extrabold leading-tight dark:text-white">
                        Kenali yuk dengan <span class="text-green-500 dark:text-emerald-400">UKM LAOS</span>
                    </h1>
                    <p class="mt-4 text-gray-700 dark:text-gray-300 text-lg max-w-md">
                        Tempat bagi kamu yang ingin belajar, berkreasi, dan berkontribusi di dunia digital.
                        Yuk, jadi bagian dari gerakan teknologi yang inovatif!
                    </p>
                    <a href="{{ route('cp.program.index') }}"
                        class="inline-block mt-6 bg-green-500 hover:bg-green-600 dark:bg-emerald-600 dark:hover:bg-emerald-700 text-white px-6 py-3 rounded-full shadow-lg transition">
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
        <h2 class="text-2xl font-bold mb-4 dark:text-white">Tentang Kami</h2>
        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
            Unit Kegiatan Mahasiswa Linux and Open Source atau disebut juga UKM LAOS merupakan salah satu organisasi
            yang berfokus untuk memajukan kreativitas dalam pengembangan Linux dan Open Source di Fakultas Ilmu Komputer
            Universitas Jember. UKM LAOS berada di bawah naungan BEM Fakultas Ilmu Komputer. UKM LAOS didirikan pada tanggal
            19 Desember 2009 dengan berasaskan "Pancasila" dan bersifat "Kekeluargaan".
        </p>
    </section>

    <section class="py-12">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-4 dark:text-white">Makna Logo</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-6">
                Logo UKM LAOS memiliki dua warna utama dengan makna simbolis:
            </p>
        </div>
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-4 items-center">
            <div class="flex justify-center">
                <img src="{{ asset('logo.png') }}" alt="Logo UKM LAOS" class="w-64 md:w-72 lg:w-80">
            </div>
            <div class="space-y-6">
                <div class="flex items-start">
                    <span class="text-2xl font-bold mr-4 leading-none dark:text-gray-200">Aa</span>
                    <p class="text-gray-700 dark:text-gray-300">
                        <span class="font-semibold">Tipografi:</span> Font yang digunakan tampak modern dan bersih,
                        mencerminkan kesan sederhana, dan mudah dikenali
                    </p>
                </div>
                <div class="flex items-start">
                    <span class="text-yellow-500 dark:text-yellow-400 mr-4 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 3C7.03 3 3 7.03 3 12c0 2.21 1.79 4 4 4h1a1 1 0 0 1 1 1v1c0 2.21 1.79 4 4 4 4.97 0 9-4.03 9-9s-4.03-9-9-9zm-5 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm3-4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm4 0a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm3 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                        </svg>
                    </span>
                    <p class="text-gray-700 dark:text-gray-300">
                        <span class="font-semibold">Warna:</span> "Kuning" melambangkan dasar Universitas Jember yang
                        berarti "Kejayaan"
                    </p>
                </div>
                <div class="flex items-start">
                    <span class="text-green-500 dark:text-emerald-400 mr-4 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2a10 10 0 0 0-3 19.5l2-5.2a3 3 0 1 1 2 0l2 5.2A10 10 0 0 0 12 2z" />
                        </svg>
                    </span>
                    <p class="text-gray-700 dark:text-gray-300">
                        <span class="font-semibold">Gambar:</span> berwarna "Hijau" merupakan logo Open Source
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-6 dark:text-white">Visi UKM LAOS</h2>
            <div
                class="bg-white dark:bg-gray-800 rounded-lg border dark:border-gray-700 p-8 flex flex-col items-center shadow-sm">
                <div class="text-green-500 dark:text-emerald-400 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M19.14,12.94a7.43,7.43,0,0,0,.06-1,7.43,7.43,0,0,0-.06-1l2.11-1.65a.5.5,0,0,0,.12-.63l-2-3.46a.5.5,0,0,0-.6-.22l-2.49,1a7.28,7.28,0,0,0-1.73-1L14.46,2.5a.5.5,0,0,0-.5-.5H10a.5.5,0,0,0-.5.5L9,5.02a7.28,7.28,0,0,0-1.73,1l-2.49-1a.5.5,0,0,0-.6.22l-2,3.46a.5.5,0,0,0,.12.63L4.41,10a7.43,7.43,0,0,0,0,2l-2.11,1.65a.5.5,0,0,0-.12.63l2,3.46a.5.5,0,0,0,.6.22l2.49-1a7.28,7.28,0,0,0,1.73,1l.46,2.52a.5.5,0,0,0,.5.5h4a.5.5,0,0,0,.5-.5l.46-2.52a7.28,7.28,0,0,0,1.73-1l2.49,1a.5.5,0,0,0,.6-.22l2-3.46a.5.5,0,0,0-.12-.63ZM12,15.5A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                    </svg>
                </div>
                <p class="text-gray-600 dark:text-gray-300 text-center">
                    Mendukung, mengenalkan dan mengembangkan Linux dan Open Source pada masyarakat luas khususnya Fakultas
                    Ilmu Komputer.
                </p>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-8 dark:text-white">Misi UKM LAOS</h2>
            <div class="grid md:grid-cols-3 gap-6 text-gray-700 dark:text-gray-300">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm flex flex-col items-center">
                    <div class="text-green-500 dark:text-emerald-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2C9 2 7 4.5 7 7v2c0 1.5.5 2.5 1 3-2 1-4 3.5-4 6 0 2.5 2 4 4 4h8c2 0 4-1.5 4-4 0-2.5-2-5-4-6 .5-.5 1-1.5 1-3V7c0-2.5-2-5-5-5z" />
                        </svg>
                    </div>
                    <p class="text-center">
                        Menjadi relasi berbagai pihak yang mendukung dan mengimplementasikan Linux dan Open Source
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm flex flex-col items-center">
                    <div class="text-green-500 dark:text-emerald-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z" />
                        </svg>
                    </div>
                    <p class="text-center">
                        Mengenalkan Linux dan Open Source software kepada masyarakat khususnya pada instansi pendidikan
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm flex flex-col items-center">
                    <div class="text-green-500 dark:text-emerald-400 mb-4">
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

    <section class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2
                    class="inline-block px-6 py-2 border-2 border-gray-300 dark:border-gray-600 rounded-full text-gray-700 dark:text-gray-300 font-semibold">
                    <span
                        class="bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-500 dark:from-emerald-400 dark:to-green-300">
                        Struktur Pengurus {{ $selectedPeriod }}
                    </span>
                </h2>
                <div class="mt-3">
                    <span class="inline-block h-1 w-20 rounded-full bg-emerald-500 dark:bg-emerald-400"></span>
                    <span class="inline-block h-1 w-8 rounded-full bg-emerald-300 dark:bg-emerald-300 mx-1"></span>
                    <span class="inline-block h-1 w-4 rounded-full bg-emerald-200 dark:bg-emerald-200"></span>
                </div>
                <p class="mt-6 max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                    Susunan Pengurus UKM LAOS Tahun Masa Bhakti {{ $selectedPeriod }}
                </p>

                {{-- Dropdown Pemilihan Periode --}}
                <div class="mt-8 flex justify-center">
                    <div class="relative inline-block">
                        <select id="periodSelector" onchange="changePeriod()"
                            class="bg-white dark:bg-gray-800 border-2 border-green-300 dark:border-emerald-600 text-gray-700 dark:text-gray-300 px-6 py-3 pr-10 rounded-full focus:outline-none focus:border-green-500 dark:focus:border-emerald-400 focus:ring-2 focus:ring-green-200 dark:focus:ring-emerald-800 transition-all duration-200 cursor-pointer shadow-md hover:shadow-lg">
                            @foreach ($availablePeriods as $period)
                                <option value="{{ $period }}" {{ $period == $selectedPeriod ? 'selected' : '' }}>
                                    Periode {{ $period }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                            <svg class="w-4 h-4 text-green-500 dark:text-emerald-400" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($pengurus as $p)
                    <div class="relative group">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-green-400 to-emerald-500 dark:from-emerald-500 dark:to-green-400 rounded-3xl opacity-75 group-hover:opacity-100 blur transition duration-500">
                        </div>

                        <div
                            class="relative h-full bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden transition-all duration-300 group-hover:shadow-2xl group-hover:-translate-y-2 flex flex-col">
                            <div
                                class="relative bg-gradient-to-r from-emerald-500 to-green-400 dark:from-emerald-600 dark:to-green-500 h-48 p-4 overflow-hidden">
                                <div
                                    class="absolute bg-white/10 dark:bg-gray-900/20 w-24 h-24 rounded-lg -top-4 -left-16 transform rotate-45 animate-float">
                                </div>
                                <div
                                    class="absolute bg-white/10 dark:bg-gray-900/20 w-28 h-28 rounded-lg -bottom-16 right-4 transform rotate-12 animate-float-delay">
                                </div>
                                <div
                                    class="absolute bg-white/5 dark:bg-gray-900/10 w-20 h-20 rounded-full top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 animate-pulse">
                                </div>

                                <div class="relative flex items-center -mt-10 justify-center space-x-3 h-full">
                                    <div
                                        class="bg-white dark:bg-gray-900 w-10 h-10 rounded-md flex items-center justify-center shadow-sm transform group-hover:rotate-12 transition duration-300">
                                        <img src="{{ asset('logo.png') }}" alt="Logo" class="w-6 h-6 object-contain">
                                    </div>
                                    <span class="text-white font-bold text-xl drop-shadow-md">UKM LAOS</span>
                                </div>
                            </div>

                            <div class="relative px-6 -mt-20 flex-grow flex flex-col">
                                <div class="relative flex justify-center">
                                    <div
                                        class="bg-white dark:bg-gray-900 p-1.5 rounded-2xl shadow-lg transform group-hover:scale-105 transition duration-300">
                                        <div class="relative overflow-hidden w-28 h-28 sm:w-32 sm:h-32 rounded-xl">
                                            <img src="{{ asset($p['foto']) }}" alt="Foto Profil {{ $p['nama'] }}"
                                                class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-5">
                                    <h2
                                        class="text-xl sm:text-2xl font-bold text-gray-800 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition duration-300">
                                        {{ $p['nama'] }}
                                    </h2>
                                    <p
                                        class="text-gray-500 dark:text-gray-400 mt-1 group-hover:text-gray-700 dark:group-hover:text-gray-300 transition duration-300">
                                        {{ $p['jabatan'] }}
                                    </p>
                                </div>

                                <div class="flex justify-center items-center space-x-3 mt-auto pt-6 pb-4">
                                    <a href="{{ $p['sosmed']['instagram'] ?? '#' }}" title="Instagram"
                                        class="w-9 h-9 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 flex items-center justify-center hover:bg-gradient-to-br hover:from-pink-600 hover:to-amber-500 hover:text-white transition-all duration-300 transform hover:-translate-y-1 shadow-sm">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                        </svg>
                                    </a>

                                    <a href="{{ $p['sosmed']['facebook'] ?? '#' }}" title="Facebook"
                                        class="w-9 h-9 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all duration-300 transform hover:-translate-y-1 shadow-sm">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M22.675 0h-21.35C.732 0 .192.593.192 1.325v21.351c0 .731.54 1.324 1.213 1.324h11.495v-9.294H9.77v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.673 0 1.213-.593 1.213-1.325V1.325C23.888.593 23.348 0 22.675 0z" />
                                        </svg>
                                    </a>

                                    <a href="{{ $p['sosmed']['github'] ?? '#' }}" title="GitHub"
                                        class="w-9 h-9 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 flex items-center justify-center hover:bg-gray-800 hover:text-white transition-all duration-300 transform hover:-translate-y-1 shadow-sm">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
                                        </svg>
                                    </a>

                                    <a href="{{ $p['sosmed']['linkedin'] ?? '#' }}" title="LinkedIn"
                                        class="w-9 h-9 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 flex items-center justify-center hover:bg-blue-700 hover:text-white transition-all duration-300 transform hover:-translate-y-1 shadow-sm">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5V5c0-2.761-2.238-5-5-5zM8 19H5V8h3v11zM6.5 6.732c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764S7.466 6.732 6.5 6.732zM20 19h-3v-5.604c0-3.368-4-3.113-4 0V19h-3V8h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
