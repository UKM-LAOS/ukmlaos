@extends('layouts.cp.front')

@section('content')
    <!-- Hero Section -->
    <section
        class="relative overflow-hidden bg-gradient-to-b from-white via-green-50/30 to-green-100/20 pb-20 pt-20 dark:from-gray-900 dark:via-gray-800/30 dark:to-[#151E2E]">
        <!-- Background decorations -->
        <div class="pointer-events-none absolute inset-0">
            <div
                class="absolute right-0 top-0 h-[500px] w-[500px] rounded-full bg-green-200/30 blur-[120px] dark:bg-green-900/30">
            </div>
            <div
                class="absolute bottom-0 left-0 h-[500px] w-[500px] rounded-full bg-blue-200/20 blur-[120px] dark:bg-blue-900/20">
            </div>
            <img class="absolute right-32 top-32 hidden md:block" src="{{ asset('assets/cp/img/Icon-1.png') }}"
                alt="icon 1" />
            <img class="absolute right-[520px] top-20 hidden md:block" src="{{ asset('assets/cp/img/Icon-4.png') }}"
                alt="icon 2" />
            <img class="absolute right-[440px] top-52 hidden md:block" src="{{ asset('assets/cp/img/Icon-3.png') }}"
                alt="icon 4" />
            <img class="absolute bottom-0 left-0 z-0 w-full" src="{{ asset('assets/cp/img/Ornament.png') }}"
                alt="ornament" />
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 pt-20 md:grid-cols-2">
                <div class="space-y-8">

                    <!-- Hero Text -->
                    <h1 class="text-5xl font-bold leading-tight text-gray-900 md:text-6xl dark:text-white">
                        Penasaran
                        <span class="text-green-500">UKM LAOS</span>
                        <span> Ngapain Aja?</span>
                    </h1>

                    <p class="text-lg leading-relaxed text-gray-600 dark:text-gray-300">
                        UKM LAOS aktif dan inovatif dalam mengembangkan potensi anggota
                        dalam bidang ilmu komputer dengan menyelenggarakan berbagai program
                        kerja yang bermanfaat.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex items-center gap-6">
                        <a class="cursor-pointer rounded-full bg-green-500 px-8 py-4 font-medium text-white transition-all duration-300 hover:scale-105 hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-700"
                            href="#program-list">
                            Gabung Sekarang
                            <svg class="ml-2 inline-block h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Hero Image -->
                <div class="ml-26 relative hidden md:block xl:ml-32">
                    {{-- <div class="absolute inset-0 rounded-full bg-green-50 opacity-20 blur-3xl dark:bg-green-900/50">
                    </div>
                    <img class="relative z-10 h-auto transform transition-transform duration-500 hover:scale-105"
                        src="{{ asset('assets/cp/img/maskot-2.png') }}" alt="LAOS Mascot"> --}}

                    <div class="grid h-[28rem] grid-flow-col grid-cols-2 grid-rows-5 gap-4">
                        <div class="row-span-2 overflow-hidden rounded-2xl hover:scale-105 p-1 border border-gray-100 dark:border-gray-700">
                            <img class="h-full w-full object-cover rounded-xl" src="{{ asset('assets/cp/img/proker-hero/Gola.png') }}"
                                alt="">
                        </div>
                        <div class="col-start-1 row-start-3 overflow-hidden rounded-2xl hover:scale-105 p-1 border border-gray-100 dark:border-gray-700">
                            <img class="h-full w-full object-cover rounded-xl" src="{{ asset('assets/cp/img/proker-hero/Lawos.jpg') }}"
                                alt="">

                        </div>
                        <div class="col-start-2 row-span-3 row-start-1 overflow-hidden rounded-2xl hover:scale-105 p-1 border border-gray-100 dark:border-gray-700">
                            <img class="h-full w-full object-cover rounded-xl"
                                src="{{ asset('assets/cp/img/proker-hero/Bashrc.png') }}" alt="">

                        </div>
                        <div class="col-span-2 row-span-2 row-start-4 overflow-hidden rounded-2xl hover:scale-105 p-1 border border-gray-100 dark:border-gray-700">
                            <img class="h-full w-full object-cover rounded-xl object-center"
                                src="{{ asset('assets/cp/img/proker-hero/Lawos2.jpg') }}" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Programs Section -->
    <section
        class="relative overflow-hidden bg-gradient-to-b from-white via-green-50/30 to-green-100/20 py-20 md:py-24 dark:from-[#151E2E] dark:via-gray-800/30 dark:to-gray-900"
        id="program-list">
        <!-- Background decorations -->
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute right-0 top-0 h-72 w-72 rounded-full bg-green-200/30 blur-3xl dark:bg-green-900/30"></div>
            <div class="absolute bottom-0 left-0 h-72 w-72 rounded-full bg-blue-200/30 blur-3xl dark:bg-blue-900/30"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto mb-16 max-w-3xl text-center lg:mb-24">
                <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl lg:text-5xl dark:text-white">
                    Program Kerja <span class="text-primary-green-base">Kami</span>
                </h2>
                <p class="text-lg text-gray-600 md:text-xl dark:text-gray-300">
                    Program kami nggak cuma seru, tapi juga bikin kamu makin berkembang. Kepoin sekarang yuk!
                </p>
            </div>

            <section class="grid grid-cols-1 gap-8">
                @foreach ($programs as $program)
                    {{-- <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                        <div
                            class="flex h-full flex-col overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-xl dark:border-gray-700 dark:bg-gray-800">

                            <div class="relative aspect-video overflow-hidden">
                                <img class="h-full w-full object-cover transition-all duration-500 hover:scale-110"
                                    src="{{ $program->getFirstMediaUrl('program-thumbnail', 'thumb') }}"
                                    alt="{{ $program->judul_kegiatan }}" />
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent">
                                </div>
                            </div>

                            <div class="flex flex-grow flex-col p-6">
                                <h3
                                    class="mb-3 text-xl font-bold text-gray-900 transition-colors duration-300 hover:text-primary-green-base dark:text-white">
                                    {{ $program->judul_kegiatan }}
                                </h3>

                                <p class="mb-6 line-clamp-3 flex-grow text-gray-600 dark:text-gray-300">
                                    {{ strip_tags($program->konten) }}
                                </p>

                                <div class="mt-auto flex items-center justify-between">
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                        <svg class="mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $program->created_at->translatedFormat('d F Y') }}
                                    </div>

                                    <a class="rounded-lg border border-primary-green-base/20 bg-primary-green-base/10 px-4 py-2 font-medium text-primary-green-base transition-all duration-300 hover:bg-primary-green-base hover:text-white dark:text-white"
                                        href="{{ route('cp.program.show', $program->slug) }}">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="grid w-full grid-cols-1 gap-8 md:grid-cols-2">
                        <div class="rounded-xl border border-gray-100 p-2 shadow-lg dark:border-gray-700 dark:bg-gray-800 hover:scale-105">
                            <div class="relative">
                                <img class="h-full max-h-60 w-full rounded-lg object-cover transition-all duration-500 "
                                    src="{{ $program->getFirstMediaUrl('program-thumbnail', 'thumb') }}"
                                    alt="{{ $program->judul_kegiatan }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                            </div>
                        </div>

                        <div class="flex h-full flex-grow flex-col justify-between p-6">
                            <div>
                                <a class="mb-3 text-xl font-bold text-gray-900 transition-colors duration-300 hover:text-primary-green-base lg:text-3xl dark:text-white"
                                    href="{{ route('cp.program.show', $program->slug) }}">
                                    {{ $program->judul_kegiatan }}
                                </a>

                                <p class="mb-6 line-clamp-3 flex-grow text-gray-600 lg:text-xl dark:text-gray-300">
                                    {{ strip_tags($program->konten) }}
                                </p>

                            </div>

                            <div class="mt-auto flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                    <svg class="mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $program->created_at->translatedFormat('d F Y') }}
                                </div>

                                <a class="rounded-lg border border-primary-green-base/20 bg-primary-green-base/10 px-4 py-2 font-medium text-primary-green-base transition-all duration-300 hover:bg-primary-green-base hover:text-white dark:text-white"
                                    href="{{ route('cp.program.show', $program->slug) }}">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </section>
        </div>
    </section>
@endsection
