@extends('layouts.cp.front')

@section('content')
    <div class="min-h-screen bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200">
        <div class="max-w-6xl mx-auto px-4 py-10">
            <!-- Program Header -->
            <div
                class="bg-gray-100 dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden mb-8">
                <!-- Program Image Banner -->
                <div class="relative h-64 md:h-80 w-full overflow-hidden">
                    <img src="{{ $program->getFirstMediaUrl('program-thumbnail') }}" alt="{{ $program->judul_kegiatan }}"
                        class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 w-full p-6 text-white">
                        <div class="flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-green-base" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="text-sm font-medium">Detail Program</span>
                        </div>
                        <h1 class="text-3xl md:text-4xl font-bold">
                            {{ $program->judul_kegiatan }}
                        </h1>
                    </div>
                </div>

                <!-- Program Info -->
                <div class="p-6">
                    <div class="flex items-center gap-4">
                        <img src="https://ui-avatars.com/api/?name={{ $program->division->nama }}&background=374151&color=D1D5DB&size=48"
                            alt="Divisi {{ $program->division->nama }}" class="w-12 h-12 rounded-full object-cover" />
                        <div>
                            <p class="text-base text-gray-800 dark:text-gray-200">
                                Program dari
                                <span class="font-semibold text-primary-green-base">Divisi
                                    {{ $program->division->nama }}</span>
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Periode 2024/2025
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- About Program Section -->
                    <section
                        class="bg-gray-100 dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="flex items-center gap-2 p-6 border-b border-gray-200 dark:border-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-green-base" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h2 class="text-xl font-medium">
                                Tentang <span class="text-primary-green-base">Program</span>
                            </h2>
                        </div>

                        <div class="p-6">
                            <div
                                class="prose prose-sm md:prose max-w-none text-gray-300 prose-headings:text-gray-100 prose-a:text-primary-green-base">
                                {!! $program->konten !!}
                            </div>
                        </div>
                    </section>

                    <!-- Documentation Section -->
                    <section
                        class="bg-gray-100 dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="flex items-center gap-2 p-6 border-b border-gray-200 dark:border-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-green-base" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <h2 class="text-xl font-medium">
                                Dokumentasi <span class="text-primary-green-base">Program</span>
                            </h2>
                        </div>

                        <div class="p-6">
                            @if (isset($documentations) && count($documentations) > 0)
                                <div class="relative">
                                    <!-- Thumbnails Gallery -->
                                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-4">
                                        @foreach ($documentations as $index => $documentation)
                                            <div class="aspect-square rounded-lg overflow-hidden cursor-pointer hover:opacity-80 transition-opacity border border-gray-700 shadow-md"
                                                onclick="openGallerySlide({{ $index }})">
                                                <img src="{{ $documentation['url'] }}" alt="{{ $program->judul_kegiatan }}"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div
                                    class="py-16 text-center text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-850 rounded-xl border border-gray-200 dark:border-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4 text-gray-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <h3 class="text-xl font-medium">Dokumentasi Belum Tersedia</h3>
                                    <p class="mt-2 text-gray-400">Foto dan dokumentasi kegiatan akan ditampilkan di sini.
                                    </p>
                                </div>
                            @endif
                        </div>
                    </section>
                </div>

                <!-- Sidebar Content -->
                <div class="space-y-8">
                    <!-- Time & Schedule Section  -->
                    <section
                        class="bg-gray-100 dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="flex items-center gap-2 p-6 border-b border-gray-200 dark:border-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-green-base" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h2 class="text-xl font-medium">
                                Jadwal <span class="text-primary-green-base">Kegiatan</span>
                            </h2>
                        </div>

                        <div class="p-6">
                            <!-- Schedule Timeline -->
                            <div
                                class="relative pl-8 space-y-8 before:absolute before:inset-y-0 before:left-3 before:w-0.5 before:bg-gray-600">
                                @if (isset($program->schedules) && count($program->schedules) > 0)
                                    @foreach ($program->schedules as $key => $schedule)
                                        <div class="relative">
                                            <div
                                                class="absolute left-[-32px] top-0 w-6 h-6 rounded-full bg-amber-500 flex items-center justify-center">
                                                <div class="w-3 h-3 rounded-full bg-gray-800"></div>
                                            </div>
                                            <div>
                                                <h3 class="font-medium text-gray-200">
                                                    {{ $schedule->title ?? 'Jadwal' }}
                                                </h3>
                                                <p class="mt-1 text-sm text-gray-400">
                                                    {{ $schedule->date ?? 'Tanggal belum ditentukan' }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="relative">
                                        <div
                                            class="absolute left-[-32px] top-0 w-6 h-6 rounded-full bg-amber-500 flex items-center justify-center">
                                            <div class="w-3 h-3 rounded-full bg-gray-800"></div>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-200">
                                                Jadwal belum tersedia
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-400">
                                                Jadwal kegiatan akan diumumkan segera
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </section>

                    <!-- Location Section -->
                    <section
                        class="bg-gray-100 dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="flex items-center gap-2 p-6 border-b border-gray-200 dark:border-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-green-base"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <h2 class="text-xl font-medium">
                                Lokasi <span class="text-primary-green-base">Kegiatan</span>
                            </h2>
                        </div>

                        <div class="p-6">
                            <div class="w-full h-[200px] rounded-lg overflow-hidden shadow-md mb-4">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3000!2d{{ $program->long ?? '113.71468551429643' }}!3d{{ $program->lat ?? '-8.165987594122345' }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6943505e30a6d%3A0x4a4df80f122d472f!2sFakultas%20Ilmu%20Komputer%20Universitas%20Jember!5e0!3m2!1sid!2sid!4v1679940967047!5m2!1sid!2sid"
                                    width="100%" height="100%" style="border: 0" allowfullscreen="true"
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                            <h3 class="font-medium text-gray-200">
                                {{ $program->location_name ?? 'Fakultas Ilmu Komputer Universitas Jember' }}
                            </h3>
                            <p class="mt-1 text-sm text-gray-400">
                                {{ $program->location_address ?? 'Kampus Tegalboto, Jl. Kalimantan No.37, Krajan Timur, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121' }}
                            </p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
