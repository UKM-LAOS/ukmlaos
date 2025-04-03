@extends('layouts.course.back')

@section('content')
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-5 md:p-8 shadow-lg relative overflow-hidden card-shine">
        <div
            class="absolute inset-0 bg-gradient-to-br from-green-50/90 dark:from-green-900/30 via-white/30 dark:via-gray-800/50 to-transparent">
        </div>

        <!-- Decorative elements -->
        <div class="absolute top-0 right-0 w-72 h-72 bg-green-200/30 dark:bg-green-900/30 rounded-full blur-3xl float">
        </div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-200/20 dark:bg-blue-900/20 rounded-full blur-3xl">
        </div>

        <!-- Abstract shapes -->
        <div class="absolute right-20 top-16 w-16 h-16 bg-green-400/10 dark:bg-green-500/10 rounded-full hidden md:block">
        </div>
        <div class="absolute left-24 bottom-8 w-12 h-12 bg-blue-400/10 dark:bg-blue-500/10 rounded-full hidden md:block">
        </div>
        <div class="absolute right-48 bottom-12 w-8 h-8 bg-green-300/20 dark:bg-green-600/20 rounded-full hidden md:block">
        </div>

        <div class="relative z-10">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-4 md:gap-6">
                <div class="relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-green-400 to-blue-500 dark:from-green-500 dark:to-blue-600 rounded-xl md:rounded-2xl transform rotate-6 transition-transform duration-500 hover:rotate-12 hover:scale-105">
                    </div>
                    <img src="{{ Auth::user()?->avatar_url ?? 'https://ui-avatars.com/api/?name=' . Auth::user()->name . '&background=16a34a&color=fff&bold=true&font-family=Poppins&size=128' }}"
                        alt="User" class="relative w-16 h-16 md:w-20 md:h-20 rounded-xl md:rounded-2xl shadow-lg">
                </div>

                <div>
                    <div class="flex items-center flex-wrap gap-2">
                        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                            Selamat Datang, <span class="gradient-text">{{ ucwords(Auth::user()->name) }}</span>
                        </h1>
                        <div class="p-1 bg-green-100 dark:bg-green-900/40 rounded-full">
                            <svg class="w-5 h-5 md:w-6 md:h-6 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 mt-2 text-base md:text-lg">
                        Mari belajar bersama dan tingkatkan kemampuanmu!
                    </p>
                    <div class="mt-2 flex items-center text-xs md:text-sm text-gray-400 dark:text-gray-500">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Last login: Today, {{ now()->format('H:i A') }}
                    </div>
                </div>
            </div>

            <div class="mt-6 md:mt-8 flex flex-col sm:flex-row flex-wrap gap-3 md:gap-4">
                <a href="{{ route('course.all') }}"
                    class="px-4 md:px-6 py-3 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-300 shadow-sm hover:shadow flex items-center justify-center md:justify-start gap-2 transform hover:translate-y-[-2px] w-full sm:w-auto">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    <span>Cari Kursus</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Line Chart for Learning Progress -->
    {{-- <div class="mt-8 bg-white dark:bg-gray-700 p-5 rounded-xl shadow-md border border-gray-100 dark:border-gray-600">
        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Your Learning Activity</h3>
        <div class="relative" style="height: 300px;">
            <!-- Chart container -->
            <canvas id="learningChart" class="w-full h-full"></canvas>
        </div>
    </div> --}}

    <!-- My Courses Section -->
    <div class="mt-8">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Kursus Terbaru Saya</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($myCourses as $course)
                @include('components.course.back.my-courses-card', [
                    'course' => $course->course,
                    'progress' => round(
                        ($course->course_student_progres_count / $course->course->courseChapterLessons->count()) *
                            100),
                    'currentLesson' => $course->courseStudentProgres->first(),
                ])
            @empty
                <div class="col-span-3">
                    <div
                        class="bg-white dark:bg-gray-700 p-5 rounded-xl shadow-md border border-gray-100 dark:border-gray-600 transition-all duration-300 hover:shadow-lg hover:translate-y-[-2px]">
                        <div class="flex items center justify-center">
                            <div class="text-center">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Belum ada kursus yang diambil
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300 mt-2">Mulai belajar sekarang juga!</p>
                                <a href="{{ route('course.all') }}"
                                    class="mt-4 px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 dark:from-green-600 dark:to-green-700 text-white rounded-lg hover:from-green-600 hover:to-green-700 dark:hover:from-green-700 dark:hover:to-green-800 transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center gap-2 transform hover:translate-y-[-2px]">
                                    {{-- <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12 7a1 1 0 10-2 0v4a1 1 0 002 0V7z"
                                            clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12z"
                                            clip-rule="evenodd"></path>
                                    </svg> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                    </svg>

                                    <span>Cari Kursus</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Initialize hover effects for dashboard cards
        function initDashboardCourseCards() {
            $('.course-card').each(function() {
                $(this).addClass('hover:translate-y-[-5px]').addClass('duration-300');
            });
        }

        // Create line chart for learning activity
        // function createLearningChart() {
        //     const ctx = document.getElementById('learningChart').getContext('2d');
        //     const chart = new Chart(ctx, {
        //         type: 'line',
        //         data: {
        //             labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        //             datasets: [{
        //                 label: 'Hours Spent Learning',
        //                 data: [2.5, 3.8, 1.2, 4.0, 3.5, 6.2, 4.8],
        //                 backgroundColor: 'rgba(34, 197, 94, 0.2)',
        //                 borderColor: 'rgba(34, 197, 94, 1)',
        //                 borderWidth: 2,
        //                 tension: 0.4,
        //                 pointBackgroundColor: 'rgba(34, 197, 94, 1)',
        //                 pointBorderColor: '#fff',
        //                 pointBorderWidth: 2,
        //                 pointRadius: 4,
        //                 pointHoverRadius: 6
        //             }]
        //         },
        //         options: {
        //             responsive: true,
        //             maintainAspectRatio: false,
        //             plugins: {
        //                 legend: {
        //                     display: true,
        //                     position: 'top',
        //                     labels: {
        //                         color: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151',
        //                         font: {
        //                             family: "'Poppins', sans-serif",
        //                             size: 12
        //                         }
        //                     }
        //                 },
        //                 tooltip: {
        //                     backgroundColor: document.documentElement.classList.contains('dark') ? '#374151' :
        //                         'rgba(255, 255, 255, 0.9)',
        //                     titleColor: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151',
        //                     bodyColor: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151',
        //                     borderColor: document.documentElement.classList.contains('dark') ? '#4b5563' :
        //                         '#e5e7eb',
        //                     borderWidth: 1,
        //                     padding: 12,
        //                     displayColors: false,
        //                     callbacks: {
        //                         label: function(context) {
        //                             return `${context.parsed.y} hours`;
        //                         }
        //                     }
        //                 }
        //             },
        //             scales: {
        //                 x: {
        //                     grid: {
        //                         color: document.documentElement.classList.contains('dark') ?
        //                             'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)',
        //                         borderColor: document.documentElement.classList.contains('dark') ?
        //                             'rgba(255, 255, 255, 0.2)' : 'rgba(0, 0, 0, 0.1)'
        //                     },
        //                     ticks: {
        //                         color: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151'
        //                     }
        //                 },
        //                 y: {
        //                     beginAtZero: true,
        //                     grid: {
        //                         color: document.documentElement.classList.contains('dark') ?
        //                             'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)',
        //                         borderColor: document.documentElement.classList.contains('dark') ?
        //                             'rgba(255, 255, 255, 0.2)' : 'rgba(0, 0, 0, 0.1)'
        //                     },
        //                     ticks: {
        //                         color: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151',
        //                         callback: function(value) {
        //                             return value + 'h';
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     });

        //     // Update chart colors on theme change
        //     const observer = new MutationObserver((mutations) => {
        //         mutations.forEach((mutation) => {
        //             if (mutation.attributeName === 'class') {
        //                 const isDark = document.documentElement.classList.contains('dark');
        //                 chart.options.plugins.legend.labels.color = isDark ? '#e5e7eb' : '#374151';
        //                 chart.options.plugins.tooltip.backgroundColor = isDark ? '#374151' :
        //                     'rgba(255, 255, 255, 0.9)';
        //                 chart.options.plugins.tooltip.titleColor = isDark ? '#e5e7eb' : '#374151';
        //                 chart.options.plugins.tooltip.bodyColor = isDark ? '#e5e7eb' : '#374151';
        //                 chart.options.plugins.tooltip.borderColor = isDark ? '#4b5563' : '#e5e7eb';
        //                 chart.options.scales.x.grid.color = isDark ? 'rgba(255, 255, 255, 0.1)' :
        //                     'rgba(0, 0, 0, 0.1)';
        //                 chart.options.scales.y.grid.color = isDark ? 'rgba(255, 255, 255, 0.1)' :
        //                     'rgba(0, 0, 0, 0.1)';
        //                 chart.options.scales.x.ticks.color = isDark ? '#e5e7eb' : '#374151';
        //                 chart.options.scales.y.ticks.color = isDark ? '#e5e7eb' : '#374151';
        //                 chart.update();
        //             }
        //         });
        //     });
        //     observer.observe(document.documentElement, {
        //         attributes: true
        //     });
        // }

        // Initialize effects on page load
        $(document).ready(function() {
            initDashboardCourseCards();
            // createLearningChart();
        });
    </script>
@endpush
