@extends('layouts.course.front')

@section('content')
    <main class="pt-32 pb-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Failed Card -->
            <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-lg border border-gray-200/50 dark:border-gray-700/50 rounded-2xl overflow-hidden transition duration-300 ease-in-out transform hover:scale-[1.01] shadow-xl"
                data-aos="fade-up">
                <div class="p-6 md:p-8 text-center">
                    <!-- Failed Payment SVG -->
                    <div class="flex justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 200 200"
                            class="text-red-500">
                            <circle cx="100" cy="100" r="90" fill="none" stroke="currentColor"
                                stroke-width="10" opacity="0.2" />
                            <circle cx="100" cy="100" r="90" fill="none" stroke="currentColor"
                                stroke-width="10" stroke-dasharray="565.48" stroke-dashoffset="565.48">
                                <animate attributeName="stroke-dashoffset" from="565.48" to="0" dur="2s"
                                    fill="freeze" />
                            </circle>
                            <path d="M70 70 L130 130 M130 70 L70 130" fill="none" stroke="currentColor" stroke-width="10"
                                stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="170"
                                stroke-dashoffset="170">
                                <animate attributeName="stroke-dashoffset" from="170" to="0" dur="1s"
                                    begin="0.8s" fill="freeze" />
                            </path>
                        </svg>
                    </div>

                    <h1
                        class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-red-600 mb-4">
                        Pembayaran Gagal</h1>

                    <p class="text-gray-600 dark:text-gray-300 mb-8 max-w-lg mx-auto">
                        Maaf, pembayaran Anda tidak dapat diproses. Silakan periksa detail pembayaran Anda dan coba lagi.
                    </p>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        {{-- <a href="#"
                            class="py-3 px-6 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl transition-colors font-medium flex items-center justify-center shadow-md transform hover:-translate-y-0.5 transition duration-300 hover:shadow-lg hover:shadow-red-500/20">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Coba Lagi
                        </a> --}}
                        <a href="{{ url()->previous() }}"
                            class="py-3 px-6 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-xl hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors font-medium flex items-center justify-center shadow-sm transform hover:-translate-y-0.5 transition duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Coba Lagi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
