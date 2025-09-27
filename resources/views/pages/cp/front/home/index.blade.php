@extends('layouts.cp.front')

@section('content')
    <!-- Hero Section -->
    <section class="relative pt-28 pb-24 md:pt-36 md:pb-32 overflow-hidden bg-gradient-to-b from-white via-green-50/30 to-green-100/20 dark:from-gray-900 dark:via-gray-800/30 dark:to-[#151E2E]">
    <!-- Background decorations -->
     <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-green-200/30 dark:bg-green-900/30 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-200/20 dark:bg-blue-900/20 rounded-full blur-[120px]"></div>
        <img src="{{ asset('assets/cp/img/Icon-1.png') }}" alt="icon 1" class="hidden md:block absolute top-32 right-32" />
        <img src="{{ asset('assets/cp/img/Icon-4.png') }}" alt="icon 2" class="hidden md:block absolute top-20 right-[520px]" />
        <img src="{{ asset('assets/cp/img/Icon-3.png') }}" alt="icon 4" class="hidden md:block absolute top-52 right-[440px]" />
        <img src="{{ asset('assets/cp/img/Ornament.png') }}" alt="ornament" class="w-full absolute bottom-0 left-0 z-0" />

        <!-- SVG Pattern (pengganti Ornament.png) -->
        <svg class="absolute bottom-0 left-0 w-full h-full text-green-300 dark:text-green-800 opacity-40 dark:opacity-20"
             xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin slice">
            <defs>
                <pattern id="arcPattern" width="240" height="240" patternUnits="userSpaceOnUse">

                    <path d="M120 0 A120 120 0 0 1 240 120 L120 120 Z"
                          fill="currentColor" fill-opacity="0.15"/>

                    <path d="M0 120 A120 120 0 0 1 120 240 L0 240 Z"
                          fill="currentColor" fill-opacity="0.08"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#arcPattern)"></rect>
        </svg>
    </div>

   <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
    <div class="grid md:grid-cols-[1.1fr_1fr] gap-14 md:gap-16 items-center">
        <!-- Text Content - Digeser lebih ke kiri -->
        <div class="space-y-8 md:space-y-10 mr-0 md:-mr-8">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-50 dark:bg-green-900/50 rounded-full">
                <svg class="w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <span class="text-green-800 dark:text-green-300 font-medium">Tempatnya Anak TI Berkembang!</span>
            </div>

            <!-- Hero Text -->
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-[3.5rem] font-bold leading-tight text-gray-900 dark:text-white">
                Selamat Datang,
                <span class="text-green-500 dark:text-green-400">Laosars!</span>
            </h1>

            <p class="text-gray-600 dark:text-gray-300 text-lg md:text-xl leading-relaxed max-w-[30rem] ml-0 md:-ml-1">
                UKM LAOS adalah Unit Kegiatan Mahasiswa yang berfokus sebagai wadah untuk memajukan kreativitas dalam pengembangan Linux dan Open Source di Fakultas Ilmu Komputer Universitas Jember.
            </p>

            <!-- CTA Buttons -->
            <div class="flex items-center gap-6 pt-2">
                <a href="#manfaat" class="px-8 py-4 bg-green-500 dark:bg-green-600 text-white rounded-full hover:bg-green-600 dark:hover:bg-green-700 transition-all duration-300 hover:scale-105 font-medium cursor-pointer">
                    Lihat Selengkapnya
                    <svg class="w-5 h-5 ml-2 inline-block" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

            <!-- Hero Image - Mascot Grid -->
            <div class="relative hidden md:block ml-auto w-full max-w-lg">
                <!-- Background Glow Effect -->
                <div class="absolute inset-0 bg-green-50 dark:bg-green-900/50 rounded-full blur-3xl opacity-20 -right-10"></div>

                <!-- Mascot Grid Container -->
                <div class="relative z-10 grid grid-cols-2 gap-5 w-full">

                    <div class="aspect-square bg-green-500/10 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-lg transform translate-y-8">
                        <img src="{{ asset('assets/cp/img/avatar/avatar1.png') }}"
                             alt="LAOS Mascot 1"
                             class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">
                    </div>


                   <div class="aspect-square bg-green-500/10 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-lg transform translate-y-2">
                        <img src="{{ asset('assets/cp/img/avatar/avatar2.png') }}"
                             alt="LAOS Mascot 2"
                             class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">
                    </div>


                    <div class="aspect-square bg-green-500/10 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-lg transform translate-y-5">
                        <img src="{{ asset('assets/cp/img/avatar/avatar3.png') }}"
                             alt="LAOS Mascot 3"
                             class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">
                    </div>


                    <div class="aspect-square bg-green-500/10 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-lg transform translate-y-2">
                        <img src="{{ asset('assets/cp/img/avatar/avatar4.png') }}"
                             alt="LAOS Mascot 4"
                             class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Benefits Section -->
    <section class="py-24 relative overflow-hidden bg-gradient-to-b from-white via-green-50/30 to-green-100/20 dark:from-[#151E2E] dark:via-gray-800/30 dark:to-gray-900">
    <!-- Background decorations -->
    <div class="absolute inset-0">
        <!-- Slanted triangular background -->
       <div class="absolute bottom-0 left-0 w-full h-full bg-[#E3F7F2] dark:bg-green-900/20 clip-path-full-slant"></div>

        <div class="absolute top-0 right-0 w-72 h-72 bg-green-200/30 dark:bg-green-900/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-blue-200/30 dark:bg-blue-900/30 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-200/20 dark:bg-purple-900/20 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl font-bold mb-6 text-gray-900 dark:text-white">
                Manfaat Laosars
            </h2>
            <p class="text-gray-600 dark:text-gray-300 text-lg">
                Bergabung dengan UKM LAOS membuka berbagai peluang untuk pengembangan diri dan karir Anda
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Relasi Card -->
            <div class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 flex flex-col h-full overflow-hidden">
                <!-- Green glow on hover -->
                <div class="absolute inset-0 rounded-2xl bg-green-500/10 dark:bg-green-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <!-- Image Container -->
                <div class="w-full h-64 overflow-hidden relative">
                    <img src="{{ asset('assets/cp/img/manfaat/Relationship.png') }}" alt="Networking"
                        class="w-full h-full object-contain transform group-hover:scale-105 transition-transform duration-500 p-4" />
                </div>
                <!-- Content -->
                <div class="p-8 flex-grow relative">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Relasi</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-lg">
                        Menambah wawasan membebaskan dari permasalahan. Relasi yang tepat membuka ide, solusi, dan pengalaman berharga.
                    </p>
                </div>
            </div>

            <!-- Bakat Card -->
            <div class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 flex flex-col h-full overflow-hidden">
                <div class="absolute inset-0 rounded-2xl bg-green-500/10 dark:bg-green-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <!-- Image Container -->
                <div class="w-full h-64 overflow-hidden relative">
                    <img src="{{ asset('assets/cp/img/manfaat/Bakat.png') }}" alt="Cloud Data"
                        class="w-full h-full object-contain transform group-hover:scale-105 transition-transform duration-500 p-4" />
                </div>
                <!-- Content -->
                <div class="p-8 flex-grow relative">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Bakat</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-lg">
                        Meningkatkan dan mengembangkan potensi yang ada pada setiap mahasiswa secara optimal melalui berbagai kegiatan
                    </p>
                </div>
            </div>

            <!-- Sertifikat Card -->
            <div class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 flex flex-col h-full overflow-hidden">
                <!-- Green glow on hover -->
                <div class="absolute inset-0 rounded-2xl bg-green-500/10 dark:bg-green-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <!-- Image Container -->
                <div class="w-full h-64 overflow-hidden relative">
                    <img src="{{ asset('assets/cp/img/manfaat/Sertifikat.png') }}" alt="License"
                        class="w-full h-full object-contain transform group-hover:scale-105 transition-transform duration-500 p-4" />
                </div>
                <!-- Content -->
                <div class="p-8 flex-grow relative">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Sertifikat</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-lg">
                        Dapatkan sertifikat keaktifan sebagai anggota UKM LAOS, dukung CV kamu agar jauh lebih baik lagi
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
    .clip-path-full-slant {
        clip-path: polygon(0 100%, 100% 0, 100% 100%);
        height: 100%;
        top: 0;
    }
</style>
</section>
    <!-- Program Section -->
    <section
        class="py-24 relative overflow-hidden bg-gradient-to-b from-white via-green-50/30 to-green-100/20 dark:from-gray-900 dark:via-gray-800/30 dark:to-[#151E2E]">
        <!-- Background decorations -->
        <div class="absolute inset-0">
            <div class="absolute top-0 right-0 w-72 h-72 bg-green-200/30 dark:bg-green-900/30 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-blue-200/30 dark:bg-blue-900/30 rounded-full blur-3xl"></div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-yellow-200/20 dark:bg-yellow-900/20 rounded-full blur-3xl">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-6 text-gray-900 dark:text-white">
                    Program <span class="gradient-text">Kerja</span>
                </h2>
                <p class="text-gray-600 dark:text-gray-300 text-lg">
                    Program kerja unggulan kami untuk mengembangkan potensi anggota
                </p>
            </div>

            <div class="w-full h-[209px] md:h-[309px] relative">
                @if (count($programs) > 0)
                    <!-- Swiper when programs exist -->
                    <div class="swiper mySwiper w-full max-w-[300px] sm:max-w-[650px] lg:max-w-[986px] h-full">
                        <div class="swiper-wrapper">
                            @foreach ($programs as $program)
                                <div class="swiper-slide h-full group">
                                    <a href="#" class="block h-full relative overflow-hidden rounded-3xl">
                                        <div
                                            class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                            <span
                                                class="text-white text-xl font-bold transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                                {{ $program->judul_program }}
                                            </span>
                                        </div>
                                        <img src="{{ $program->getFirstMediaUrl('program-thumbnail') }}"
                                            alt="{{ $program->judul_program }}"
                                            class="w-full h-full object-cover rounded-3xl transform group-hover:scale-105 transition-transform duration-500">
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <!-- Enhanced Navigation Arrows -->
                        <div class="swiper-button-prev absolute z-20 left-4 lg:left-8 top-1/2 transform -translate-y-1/2">
                            <div
                                class="w-12 h-12 flex items-center justify-center bg-white/90 dark:bg-gray-800/90 rounded-full shadow-lg backdrop-blur-sm transition-all duration-300 hover:bg-green-500 group">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white group-hover:text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                            </div>
                        </div>
                        <div
                            class="swiper-button-next absolute z-20 right-4 lg:right-8 top-1/2 transform -translate-y-1/2">
                            <div
                                class="w-12 h-12 flex items-center justify-center bg-white/90 dark:bg-gray-800/90 rounded-full shadow-lg backdrop-blur-sm transition-all duration-300 hover:bg-green-500 group">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white group-hover:text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>

                        <!-- Add pagination -->
                        <div class="swiper-pagination !-bottom-12"></div>
                    </div>
                @else
                    <!-- Enhanced empty state -->
                    <div
                        class="flex flex-col items-center justify-center h-full bg-gray-50 dark:bg-gray-800/50 rounded-3xl p-8">
                        <svg class="w-16 h-16 text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Program Kerja Belum Tersedia
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 text-center">Program kerja akan segera ditambahkan</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Division Section -->
  
<section class="py-24 relative overflow-hidden bg-[#E3F7F2] dark:bg-[#151E2E]">

    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-72 h-72 bg-purple-200/30 dark:bg-purple-900/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-green-200/30 dark:bg-green-900/30 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-blue-200/20 dark:bg-blue-900/20 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl font-bold mb-6 text-gray-900 dark:text-white">Divisi Kami</h2>
            <p class="text-gray-600 dark:text-gray-300 text-lg">
                Divisi unggulan yang bersinergi mengembangkan potensi dalam bidang teknologi
            </p>
        </div>

        @php

            $total   = $divisis->count();
            $top     = $total > 4 ? 4 : $total;
            $sisa    = $total - $top;
            $genap   = $total % 2 === 0;
        @endphp


        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8 max-w-[1200px] mx-auto">
            @foreach($divisis->take($top) as $d)
            <div class="w-full h-[240px]">
                <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 flex h-full">
                    <div class="w-1/3 p-6 flex items-center justify-center bg-green-300 dark:bg-green-900/30 rounded-l-2xl">
                        <img src="{{ $d->logo ? asset('storage/' . $d->logo) : asset('logo.png') }}"
                             alt="{{ $d->nama }}"
                             class="w-32 h-32 object-contain transform group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="w-2/3 p-8 flex flex-col justify-center">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">{{ $d->nama }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ $d->deskripsi }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        @if($sisa > 0)
            @if($sisa === 1 || !$genap)

                <div class="max-w-[562px] mx-auto h-[240px]">
                    @php $d = $divisis->slice($top)->first(); @endphp
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 flex h-full">
                        <div class="w-1/3 p-6 flex items-center justify-center bg-green-300 dark:bg-green-900/30 rounded-l-2xl">
                            <img src="{{ $d->logo ? asset('storage/' . $d->logo) : asset('logo.png') }}"
                                 alt="{{ $d->nama }}"
                                 class="w-32 h-32 object-contain transform group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="w-2/3 p-8 flex flex-col justify-center">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">{{ $d->nama }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $d->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @else

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-[1200px] mx-auto">
                    @foreach($divisis->slice($top) as $d)
                    <div class="w-full h-[240px]">
                        <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 flex h-full">
                            <div class="w-1/3 p-6 flex items-center justify-center bg-green-300 dark:bg-green-900/30 rounded-l-2xl">
                                <img src="{{ $d->logo ? asset('storage/' . $d->logo) : asset('logo.png') }}"
                                     alt="{{ $d->nama }}"
                                     class="w-32 h-32 object-contain transform group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="w-2/3 p-8 flex flex-col justify-center">
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">{{ $d->nama }}</h3>
                                <p class="text-gray-600 dark:text-gray-400">{{ $d->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        @endif
    </div>
</section>
@endsection
