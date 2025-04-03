@props(['course', 'currentLesson', 'progress' => 0])

<div class="course-card bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border border-gray-200/50 dark:border-gray-700/50 rounded-2xl overflow-hidden transform transition-all hover:shadow-lg"
    data-aos="fade-up" data-youtube-url="{{ $course->courseChapterLessons[0]->youtube_url ?? '#' }}">
    <div class="relative">
        <img src="{{ $course->getFirstMediaUrl('course-thumbnail') }}" alt="{{ $course->judul }}"
            class="w-full h-40 sm:h-48 object-cover">

        <!-- Status badge -->
        <div class="absolute top-3 right-3">
            <span
                class="px-2 py-1 text-xs font-medium rounded-lg 
                {{ $progress == 0
                    ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300'
                    : ($progress == 100
                        ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300'
                        : 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300') }}">
                {{ $progress == 0 ? 'Belum Dimulai' : ($progress == 100 ? 'Selesai' : 'Sedang Belajar') }}
            </span>
        </div>
    </div>

    <div class="p-4 sm:p-6">
        <div class="flex flex-wrap items-center justify-between mb-3">
            <span
                class="px-3 py-1 bg-green-100/50 dark:bg-green-900/50 text-green-600 dark:text-green-400 rounded-xl text-xs sm:text-sm font-medium backdrop-blur-sm">
                {{ ucwords(str_replace('-', ' ', $course->kategori->value)) }}
            </span>
            <div class="flex items-center space-x-2 text-gray-600 dark:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-xs">{{ $progress }}% selesai</span>
            </div>
        </div>

        <a href="{{ route('course.dashboard.my-courses.show', $course->slug) }}"
            class="text-lg font-bold text-gray-900 dark:text-white block mb-2 hover:text-green-500 dark:hover:text-green-400 transition-colors">
            {{ $course->judul }}
        </a>

        <div class="flex items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                {{ $course->courseMentors->count() }} Mentor
            </span>
        </div>

        <!-- Last accessed chapter/lesson info -->
        <div class="mb-4 border-l-2 border-green-500 pl-3">
            <p class="text-xs text-gray-500 dark:text-gray-400">Terakhir belajar:</p>
            <p class="text-sm text-gray-700 dark:text-gray-300 truncate">
                {{ empty($currentLesson) ? 'Belum Memulai' : $currentLesson->courseChapterLesson->judul }}
            </p>
        </div>

        <!-- Continue learning button -->
        <div class="flex justify-between items-center mt-2">
            <a href="{{ $progress > 0 && isset($lastLessonUrl) ? $lastLessonUrl : route('course.dashboard.my-courses.show', $course->slug) }}"
                class="w-full py-2 px-4 bg-green-500 hover:bg-green-600 text-white text-center rounded-xl font-medium text-sm transition-colors flex items-center justify-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $progress > 0 ? 'Lanjutkan Belajar' : 'Mulai Belajar' }}</span>
            </a>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        // Initialize hover effects for dashboard cards
        function initDashboardCourseCards() {
            $('.course-card').each(function() {
                $(this).addClass('hover:translate-y-[-5px]').addClass('duration-300');
            });
        }

        // Initialize effects on page load
        $(document).ready(function() {
            initDashboardCourseCards();
        });
    </script>
@endpush
