@extends('layouts.cp.front')

@section('content')
    <!-- Hero Section -->
    <section
        class="relative pt-24 pb-16 min-h-[700px] overflow-hidden bg-gradient-to-b from-white via-green-50/30 to-green-100/20 dark:from-gray-900 dark:via-gray-800/30 dark:to-[#151E2E]">
        <!-- Background decorations -->
        <div class="absolute inset-0 pointer-events-none">
            <div
                class="absolute top-0 right-0 w-[500px] h-[500px] bg-green-200/30 dark:bg-green-900/30 rounded-full blur-[120px]">
            </div>
            <div
                class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-200/20 dark:bg-blue-900/20 rounded-full blur-[120px]">
            </div>
            <img src="{{ asset('laos-cp/Icon-1.png') }}" alt="icon 1" class="hidden md:block absolute top-32 right-32" />
            <img src="{{ asset('laos-cp/Icon-4.png') }}" alt="icon 2"
                class="hidden md:block absolute top-20 right-[520px]" />
            <img src="{{ asset('laos-cp/Icon-3.png') }}" alt="icon 4"
                class="hidden md:block absolute top-52 right-[440px]" />
            <img src="{{ asset('laos-cp/Ornament.png') }}" alt="ornament" class="w-full absolute bottom-0 left-0 z-0" />
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 text-center md:text-left mb-12 md:mb-0">
                <h1 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Penasaran
                    <span class="text-primary-green-base">kami ngapain</span> aja?
                </h1>
                <p class="mt-3 text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto md:mx-0 mb-8">
                    UKM LAOS aktif dan inovatif dalam mengembangkan potensi anggota
                    dalam bidang ilmu komputer dengan menyelenggarakan berbagai program
                    kerja yang bermanfaat.
                </p>
                <a href="#program-list"
                    class="inline-flex items-center px-6 py-3 border-2 border-primary-green-base bg-primary-green-base text-white font-medium rounded-lg hover:bg-primary-green-600 transition duration-300 ease-in-out">
                    Lihat Selengkapnya
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <div class="md:w-1/2 relative">
                <div
                    class="absolute -left-[40px] -bottom-2 -z-10 w-[379px] h-[379px] rounded-full bg-primary-green-200/50 dark:bg-primary-green-900/30 blur-lg">
                </div>
                <img src="{{ asset('laos-cp/maskot-2.png') }}" alt="Hero Image" class="max-w-lg mx-auto" />
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="program-list"
        class="py-20 md:py-24 relative overflow-hidden bg-gradient-to-b from-white via-green-50/30 to-green-100/20 dark:from-[#151E2E] dark:via-gray-800/30 dark:to-gray-900">
        <!-- Background decorations -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 right-0 w-72 h-72 bg-green-200/30 dark:bg-green-900/30 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-blue-200/30 dark:bg-blue-900/30 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="mx-auto max-w-3xl text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Program Kerja <span class="text-primary-green-base gradient-text">Kami</span>
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300">
                    Yuk kepoin program yang kami selenggarakan!
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($programs as $program)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 dark:border-gray-700 h-full flex flex-col">
                        <div class="relative overflow-hidden aspect-video">
                            <img src="{{ $program->getFirstMediaUrl('program-thumbnail') }}"
                                alt="{{ $program->judul_kegiatan }}"
                                class="w-full h-full object-cover transition-all duration-500 hover:scale-110" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent">
                            </div>
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h3
                                class="text-xl font-bold text-gray-900 dark:text-white mb-3 hover:text-primary-green-base transition-colors duration-300">
                                {{ $program->judul_kegiatan }}
                            </h3>

                            <p class="text-gray-600 dark:text-gray-300 mb-6 line-clamp-3 flex-grow">
                                {{ strip_tags($program->konten) }}
                            </p>

                            <div class="flex justify-between items-center mt-auto">
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $program->created_at->translatedFormat('d F Y') }}
                                </div>

                                <a href="{{ route('cp.program.show', $program->slug) }}"
                                    class="px-4 py-2 rounded-lg bg-primary-green-base/10 border border-primary-green-base/20 text-primary-green-base font-medium hover:bg-primary-green-base hover:text-white dark:text-white transition-all duration-300">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
