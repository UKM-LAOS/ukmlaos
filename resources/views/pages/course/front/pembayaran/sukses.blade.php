@extends('layouts.course.front')

@section('content')
    <main class="pt-32 pb-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Card -->
            <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-lg border border-gray-200/50 dark:border-gray-700/50 rounded-2xl overflow-hidden transition duration-300 ease-in-out transform hover:scale-[1.01] shadow-xl"
                data-aos="fade-up">
                <div class="p-6 md:p-8 text-center">
                    <!-- Success SVG -->
                    <div class="flex justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 200 200"
                            class="text-green-500" color="green">
                            <circle cx="100" cy="100" r="90" fill="none" stroke="currentColor"
                                stroke-width="10" opacity="0.2" />
                            <circle cx="100" cy="100" r="90" fill="none" stroke="currentColor"
                                stroke-width="10" stroke-dasharray="565.48" stroke-dashoffset="565.48">
                                <animate attributeName="stroke-dashoffset" from="565.48" to="0" dur="2s"
                                    fill="freeze" />
                            </circle>
                            <path d="M70 100 L90 120 L130 80" fill="none" stroke="currentColor" stroke-width="10"
                                stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="100"
                                stroke-dashoffset="100">
                                <animate attributeName="stroke-dashoffset" from="100" to="0" dur="1s"
                                    begin="0.8s" fill="freeze" />
                            </path>
                        </svg>
                    </div>

                    <h1
                        class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-green-600 mb-4">
                        Pembayaran Berhasil!</h1>

                    <p class="text-gray-600 dark:text-gray-300 mb-8 max-w-lg mx-auto">
                        Terima kasih atas pembayaran Anda. Akses ke kursus telah diberikan dan Anda dapat mulai belajar
                        sekarang.
                    </p>

                    <!-- Transaction Details -->
                    {{-- <div class="mb-8">
                        <div class="space-y-4 bg-gray-50 dark:bg-gray-700/30 p-6 rounded-xl max-w-md mx-auto">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700 dark:text-gray-300">ID Transaksi</span>
                                <span
                                    class="font-medium text-gray-900 dark:text-white">{{ $transaction->id ?? 'TRX-' . time() }}</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-700 dark:text-gray-300">Kursus</span>
                                <span
                                    class="font-medium text-gray-900 dark:text-white">{{ $course->nama ?? 'Nama Kursus' }}</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-700 dark:text-gray-300">Tanggal</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ date('d M Y, H:i') }}</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-700 dark:text-gray-300">Metode Pembayaran</span>
                                <span
                                    class="font-medium text-gray-900 dark:text-white">{{ $transaction->payment_method ?? 'Transfer Bank' }}</span>
                            </div>

                            <div
                                class="pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-between items-center">
                                <span class="text-lg font-semibold text-gray-900 dark:text-white">Total Pembayaran</span>
                                <span class="text-xl font-bold text-green-600 dark:text-green-500">
                                    {{ isset($course->harga) ? 'Rp' . number_format($course->harga + 275000, 0, ',', '.') : 'Rp2.775.000' }}
                                </span>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('course.dashboard.index') }}"
                            class="py-3 px-6 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl transition-colors font-medium flex items-center justify-center shadow-md transform hover:-translate-y-0.5 transition duration-300 hover:shadow-lg hover:shadow-green-500/20">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Dashboard Saya
                        </a>
                        <a href="#"
                            class="py-3 px-6 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-xl hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors font-medium flex items-center justify-center shadow-sm transform hover:-translate-y-0.5 transition duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            Mulai Belajar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
