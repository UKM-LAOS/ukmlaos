@extends('layouts.laos-course.front')
@php
    use App\Enums\LaosCourse\Kursus\KategoriEnum;
@endphp
@section('content')
    <!-- Hero Section -->
    <section class="relative pt-24 pb-32 overflow-hidden bg-white dark:bg-gray-900">
        <div class="absolute inset-0">
            <div
                class="absolute top-0 right-0 w-[500px] h-[500px] bg-green-200/30 dark:bg-green-900/30 rounded-full blur-[120px]">
            </div>
            <div
                class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-200/20 dark:bg-blue-900/20 rounded-full blur-[120px]">
            </div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight text-gray-900 dark:text-white">
                        Kuasai Keterampilan Baru untuk<br>
                        <span class="text-green-500 dark:text-green-400">Masa Depan Cerah</span>
                    </h1>

                    <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed">
                        Transformasikan karir Anda dengan kursus yang relevan dengan industri. Belajar dengan kecepatan
                        sendiri didampingi oleh ahli dan proyek langsung yang menantang.
                    </p>

                    <div class="flex flex-wrap items-center gap-4 mt-8">
                        <a href="#"
                            class="px-6 py-3 bg-green-500 dark:bg-green-600 text-white rounded-lg hover:bg-green-600 dark:hover:bg-green-700 transition-all duration-300 font-medium cursor-pointer">
                            Jelajahi Kursus
                        </a>
                        <button
                            class="flex items-center gap-2 px-6 py-3 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:text-green-500 dark:hover:text-green-400 transition-colors cursor-pointer">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Tonton Demo</span>
                        </button>
                    </div>
                    <div class="flex flex-wrap items-center gap-8 mt-12">
                        <div class="flex flex-col items-center gap-1">
                            <h3 class="text-3xl font-bold text-green-500 dark:text-green-400">50K+</h3>
                            <p class="text-gray-600 dark:text-gray-400">Mahasiswa Aktif</p>
                        </div>
                        <div class="flex flex-col items-center gap-1">
                            <h3 class="text-3xl font-bold text-green-500 dark:text-green-400">100+</h3>
                            <p class="text-gray-600 dark:text-gray-400">Mentor Ahli</p>
                        </div>
                        <div class="flex flex-col items-center gap-1">
                            <h3 class="text-3xl font-bold text-green-500 dark:text-green-400">200+</h3>
                            <p class="text-gray-600 dark:text-gray-400">Kursus Profesional</p>
                        </div>
                    </div>
                </div>
                <div class="relative hidden md:block h-full overflow-visible">
                    <div class="relative z-10 w-[120%] translate-x-[20%] scale-x-[-1]">
                        <img src="{{ asset('assets/laos-course/img/hero-ilustration.png') }}" alt="Hero Illustration"
                            class="w-full h-auto">
                    </div>
                    <div class="absolute z-20 bottom-[-60px] left-[10%] w-[60%] scale-110 rounded-lg overflow-hidden">
                        <img src="{{ asset('assets/laos-course/img/hero-ilustration-2.png') }}" alt="Secondary Image"
                            class="w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interest/Categories Section -->
    <section
        class="py-24 relative overflow-hidden bg-gradient-to-b from-green-50/30 dark:from-[#101828] to-white dark:to-gray-900">
        <div
            class="absolute inset-0 bg-gradient-to-b from-green-50/40 dark:from-gray-800/40 via-white dark:via-gray-900 to-white dark:to-gray-900">
        </div>
        <!-- Decorative background elements -->
        <div class="absolute inset-0">
            <div class="absolute top-0 right-0 w-72 h-72 bg-green-200/30 dark:bg-green-900/30 rounded-full blur-3xl">
            </div>
            <div class="absolute bottom-14 left-0 w-72 h-72 bg-blue-200/30 dark:bg-blue-900/30 rounded-full blur-3xl">
            </div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-200/20 dark:bg-purple-900/20 rounded-full blur-3xl">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-6 text-gray-900 dark:text-white">
                    Temukan Learning Path Yang Sempurna Untuk Anda
                </h2>
                <p class="text-gray-600 dark:text-gray-300 text-lg">
                    Pilih dari koleksi kursus IT unggulan kami yang dirancang khusus untuk memenuhi kebutuhan industri dan
                    mendukung tujuan karir Anda
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex flex-col space-y-8">
                    <div
                        class="group bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex items-center justify-between">
                        <div class="flex-1 pr-4">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Programming</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">
                                Cocok buat kamu yang ingin menjadi web developer, mobile app developer, atau automation
                                engineer.
                            </p>
                            <span class="text-xs text-green-500 dark:text-green-400 font-medium">
                                {{ $courseCountsByCategory[KategoriEnum::PROGRAMMING->value] ?? 0 }} Courses
                            </span>
                        </div>
                        <div
                            class="bg-green-100 dark:bg-green-700 rounded-xl w-20 h-20 flex items-center justify-center transform group-hover:rotate-6 transition-transform duration-300 flex-shrink-0">
                            <img src="{{ asset('assets/laos-course/img/programming.png') }}" alt="Programming"
                                class="w-12 h-12" />
                        </div>
                    </div>
                    <div
                        class="group bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex items-center justify-between">
                        <div class="flex-1 pr-4">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">UI/UX Design</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">
                                Cocok buat kamu yang tertarik dengan desain digital, psikologi pengguna, dan problem solving
                                melalui visual.
                            </p>
                            <span class="text-xs text-green-500 dark:text-green-400 font-medium">
                                {{ $courseCountsByCategory[KategoriEnum::DESIGN->value] ?? 0 }} Courses
                            </span>
                        </div>
                        <div
                            class="bg-purple-100 dark:bg-purple-700 rounded-xl w-20 h-20 flex items-center justify-center transform group-hover:rotate-6 transition-transform duration-300 flex-shrink-0">
                            <img src="{{ asset('assets/laos-course/img/design.png') }}" alt="UI/UX Design"
                                class="w-12 h-12" />
                        </div>
                    </div>
                </div>
                <div class="flex flex-col space-y-8">
                    <div
                        class="group bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex items-center justify-between">
                        <div class="flex-1 pr-4">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Cyber Security</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">
                                Cocok untuk kamu yang ingin jadi cyber analyst, security engineer, atau sekadar memahami
                                dunia hacker yang aktif.
                            </p>
                            <span class="text-xs text-green-500 dark:text-green-400 font-medium">
                                {{ $courseCountsByCategory[KategoriEnum::CYBER_SECURITY->value] ?? 0 }} Courses
                            </span>
                        </div>
                        <div
                            class="bg-blue-100 dark:bg-blue-700 rounded-xl w-20 h-20 flex items-center justify-center transform group-hover:rotate-6 transition-transform duration-300 flex-shrink-0">
                            <img src="{{ asset('assets/laos-course/img/cyber-security.png') }}" alt="Cyber Security"
                                class="w-12 h-12" />
                        </div>
                    </div>
                    <div
                        class="group bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex items-center justify-between">
                        <div class="flex-1 pr-4">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Digital Marketing</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">
                                Cocok buat kamu yang ingin jadi content strategist, social media specialist, atau digital
                                marketer professional.
                            </p>
                            <span class="text-xs text-green-500 dark:text-green-400 font-medium">
                                {{ $courseCountsByCategory[KategoriEnum::DIGITAL_MARKETING->value] ?? 0 }} Courses
                            </span>
                        </div>
                        <div
                            class="bg-yellow-100 dark:bg-yellow-700 rounded-xl w-20 h-20 flex items-center justify-center transform group-hover:rotate-6 transition-transform duration-300 flex-shrink-0">
                            <img src="{{ asset('assets/laos-course/img/digital-marketing.png') }}" alt="Digital Marketing"
                                class="w-12 h-12" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Courses Section -->
    <section
        class="py-24 relative overflow-hidden bg-gradient-to-b from-green-50/30 to-white dark:from-[#121828] dark:to-gray-900">
        <div
            class="absolute inset-0 bg-gradient-to-b from-[#FEFEFF] dark:from-[#121828] via-white dark:via-gray-900 to-white dark:to-gray-900">
        </div>
        <!-- Decorative background elements -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-72 h-72 bg-blue-200/30 dark:bg-blue-900/30 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-72 h-72 bg-green-200/30 dark:bg-green-900/30 rounded-full blur-3xl">
            </div>
            <div class="absolute top-1/2 right-1/3 w-96 h-96 bg-yellow-200/20 dark:bg-yellow-900/20 rounded-full blur-3xl">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-6 text-gray-900 dark:text-white">
                    Kursus Terbaru
                </h2>
                <p class="text-gray-600 dark:text-gray-300 text-lg">
                    Temukan peluang belajar terbaru kami yang dirancang untuk menjaga Anda tetap terdepan di bidang Anda
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($latestCourses as $course)
                    @CourseCardFrontCourse(['course' => $course])
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="inline-flex items-center px-8 py-4 bg-green-500 dark:bg-green-600 text-white rounded-full hover:bg-green-600 dark:hover:bg-green-700 transition-all duration-300 transform hover:scale-105 font-medium">
                    Lihat Kursus Lainnya
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    @VideoModalFrontCourse()
    <!-- Testimonials Section -->
    <section
        class="relative py-24 overflow-hidden bg-gradient-to-b from-white to-green-50/30 dark:from-[#111828] dark:to-gray-800/30">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-12 right-0 w-96 h-96 bg-green-200 dark:bg-green-800 rounded-full blur-3xl"></div>
            <div class="absolute bottom-14 left-0 w-96 h-96 bg-blue-200 dark:bg-blue-800 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-6 text-gray-900 dark:text-white">
                    Pesan Kesan Student Kami
                </h2>
                <p class="text-gray-600 dark:text-gray-300 text-lg">
                    Temukan bagaimana UKM LAOS telah membantu ribuan siswa mencapai tujuan karir mereka
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($reviews as $review)
                    <!-- Testimonial Card 1 -->
                    <div
                        class="group bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-50 dark:from-green-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>

                        <div class="relative">
                            <div class="flex items-center mb-6">
                                <div class="relative">
                                    <div
                                        class="absolute inset-0 bg-green-200 dark:bg-green-700 rounded-full blur group-hover:bg-green-300 dark:group-hover:bg-green-600 transition-colors duration-300">
                                    </div>
                                    <img src="{{ $review->student->avatar_url ? asset('storage/' . $review->student->avatar_url) : "https://ui-avatars.com/api/?name={$review->student->name}" }}"
                                        alt="Avatar"
                                        class="relative w-14 h-14 rounded-full border-4 border-white dark:border-gray-700 shadow-lg group-hover:scale-105 transition-transform duration-300" />
                                </div>
                                <div class="ml-4">
                                    <h3
                                        class="font-bold text-gray-900 dark:text-white group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">
                                        {{ $review->student->name }}</h3>
                                    <p class="text-green-500 dark:text-green-400">
                                        {{ $review->student->custom_fields['job'] ?? 'Software Developer' }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-1 mb-4">
                                @for ($i = 0; $i < $review->rating; $i++)
                                    <img src="{{ asset('assets/laos-course/img/star.svg') }}" alt="star"
                                        class="w-5 h-5">
                                @endfor
                            </div>

                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                "{{ $review->komentar }}"
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-24 relative overflow-hidden bg-white dark:bg-gray-900">
        <div class="absolute inset-0">
            <div class="absolute top-0 right-0 w-96 h-96 bg-green-100/20 dark:bg-green-900/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-100/20 dark:bg-blue-900/10 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-900 dark:text-white">
                    Pertanyaan yang Sering Diajukan
                </h2>
                <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300">
                    Dapatkan jawaban cepat untuk pertanyaan umum tentang kursus dan proses pembelajaran kami
                </p>
            </div>

            <div class="max-w-4xl mx-auto space-y-4">
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700">
                    <button class="faq-toggle w-full flex justify-between items-center p-6 text-left group"
                        data-target="faq-content-1">
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 mt-1 mr-4 p-2 bg-green-100 dark:bg-green-900 rounded-lg transition-colors duration-300 group-hover:bg-green-200 dark:group-hover:bg-green-800">
                                <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h3
                                class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">
                                Apakah kursus di UKM LAOS berbayar?
                            </h3>
                        </div>
                        <svg class="w-6 h-6 text-gray-400 dark:text-gray-500 faq-arrow collapsed" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="faq-content-1" class="faq-content collapsed px-6 pb-0 ml-14">
                        <div class="prose dark:prose-invert max-w-none pt-2 pb-6">
                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                Apa saja kursus yang tersedia?<br>
                                Kami menyediakan berbagai jalur pembelajaran di bidang teknologi dan digital kreatif,
                                seperti:
                            </p>
                            <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 pl-0">
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 mt-1 mr-2 text-green-500 dark:text-green-400">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 dark:text-gray-300">Programming (HTML, CSS, JavaScript,
                                        Python)</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 mt-1 mr-2 text-green-500 dark:text-green-400">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 dark:text-gray-300">Cyber Security (CTF, OSINT, Ethical
                                        Hacking)</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 mt-1 mr-2 text-green-500 dark:text-green-400">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 dark:text-gray-300">UI/UX Design (Wireframing, Prototyping,
                                        Figma)</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 mt-1 mr-2 text-green-500 dark:text-green-400">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 dark:text-gray-300">Digital Marketing (SEO, Social
                                        Media)</span>
                                </li>
                            </ul>
                            <div
                                class="mt-6 p-4 bg-green-50 dark:bg-green-900/20 rounded-lg border border-green-100 dark:border-green-800">
                                <p class="text-gray-600 dark:text-gray-300">
                                    <span class="font-semibold text-green-600 dark:text-green-400">Update Terkini:</span>
                                    Kursus-kursus ini terus dikembangkan dan di-update sesuai tren industri dan kebutuhan
                                    anggota.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700">
                    <button class="faq-toggle w-full flex justify-between items-center p-6 text-left group"
                        data-target="faq-content-2">
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 mt-1 mr-4 p-2 bg-blue-100 dark:bg-blue-900 rounded-lg transition-colors duration-300 group-hover:bg-blue-200 dark:group-hover:bg-blue-800">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h3
                                class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                Apakah bisa ikut lebih dari satu kursus?
                            </h3>
                        </div>
                        <svg class="w-6 h-6 text-gray-400 dark:text-gray-500 faq-arrow collapsed" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="faq-content-2" class="faq-content collapsed px-6 pb-0 ml-14">
                        <div class="prose dark:prose-invert max-w-none pt-2 pb-6">
                            <div class="flex items-start mb-4">
                                <div class="flex-shrink-0 mt-1 mr-3 text-blue-500 dark:text-blue-400">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-600 dark:text-gray-300 font-medium">
                                        Ya, Anda bisa mengikuti lebih dari satu kursus sekaligus. Kami mendorong anggota
                                        untuk eksplorasi berbagai bidang.
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1 mr-3 text-blue-500 dark:text-blue-400">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-600 dark:text-gray-300 font-medium">
                                        Kursus ini sangat cocok untuk pemula karena materi disusun secara bertahap dari
                                        dasar hingga menengah.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700">
                    <button class="faq-toggle w-full flex justify-between items-center p-6 text-left group"
                        data-target="faq-content-3">
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 mt-1 mr-4 p-2 bg-purple-100 dark:bg-purple-900 rounded-lg transition-colors duration-300 group-hover:bg-purple-200 dark:group-hover:bg-purple-800">
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h3
                                class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">
                                Berapa lama durasi tiap kursus?
                            </h3>
                        </div>
                        <svg class="w-6 h-6 text-gray-400 dark:text-gray-500 faq-arrow collapsed" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="faq-content-3" class="faq-content collapsed px-6 pb-0 ml-14">
                        <div class="prose dark:prose-invert max-w-none pt-2 pb-6">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div
                                    class="p-4 bg-gradient-to-br from-purple-50 to-white dark:from-purple-900/20 dark:to-gray-800 rounded-lg border border-purple-100 dark:border-purple-800">
                                    <h4 class="font-semibold text-purple-600 dark:text-purple-400 mb-2">Durasi Kursus</h4>
                                    <p class="text-gray-600 dark:text-gray-300">
                                        Durasi kursus bervariasi tergantung kompleksitas materi, rata-rata 4-8 minggu per
                                        kursus dengan intensitas belajar 5-10 jam per minggu.
                                    </p>
                                </div>
                                <div
                                    class="p-4 bg-gradient-to-br from-green-50 to-white dark:from-green-900/20 dark:to-gray-800 rounded-lg border border-green-100 dark:border-green-800">
                                    <h4 class="font-semibold text-green-600 dark:text-green-400 mb-2">Sertifikat</h4>
                                    <p class="text-gray-600 dark:text-gray-300">
                                        Ya, peserta yang menyelesaikan kursus akan mendapatkan sertifikat penyelesaian yang
                                        bisa digunakan untuk portofolio dan dilengkapi dengan ID verifikasi.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section
        class="py-24 bg-gradient-to-b from-white to-green-50/30 dark:from-[#151E2D] dark:to-gray-800/30 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <!-- Image Side -->
                <div class="relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-green-200 to-blue-200 dark:from-green-900 dark:to-blue-900 rounded-3xl transform -rotate-6 transition-colors duration-300">
                    </div>
                    <img src="{{ asset('assets/laos-course/img/subscription-now-image.png') }}" alt="Start Learning"
                        class="relative rounded-3xl shadow-xl w-full h-auto" />
                </div>

                <!-- Content Side -->
                <div class="space-y-8">
                    <h2
                        class="text-4xl font-bold leading-tight text-gray-900 dark:text-white transition-colors duration-300">
                        Siap Memulai Perjalanan Belajar Anda bersama UKM LAOS?
                    </h2>

                    <!-- Features List -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-green-100 dark:bg-green-900 transition-colors duration-300">
                                <svg class="w-6 h-6 text-green-500 dark:text-green-400" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="text-lg text-gray-700 dark:text-gray-300 transition-colors duration-300">Akses
                                seumur hidup untuk semua materi kursus</span>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-green-100 dark:bg-green-900 transition-colors duration-300">
                                <svg class="w-6 h-6 text-green-500 dark:text-green-400" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="text-lg text-gray-700 dark:text-gray-300 transition-colors duration-300">"Belajar
                                secara fleksibel</span>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-green-100 dark:bg-green-900 transition-colors duration-300">
                                <svg class="w-6 h-6 text-green-500 dark:text-green-400" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                </svg>
                            </div>
                            <span class="text-lg text-gray-700 dark:text-gray-300 transition-colors duration-300">Dukungan
                                mentor ahli</span>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <button
                        class="px-8 py-4 bg-green-500 dark:bg-green-600 text-white rounded-full hover:bg-green-600 dark:hover:bg-green-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl font-medium flex items-center group">
                        Mulai Sekarang
                        <svg class="ml-2 w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
