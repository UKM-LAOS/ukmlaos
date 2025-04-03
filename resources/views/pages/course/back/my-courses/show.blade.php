<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ ucwords($currentLesson->judul) }} - {{ $currentChapter->judul }}
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

        * {
            font-family: "Poppins", sans-serif;
        }

        /* Optimize transitions for better performance */
        .transition-optimized {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Gradient backgrounds with reduced opacity for better text readability */
        .bg-content-light {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(240, 255, 244, 0.9), rgba(240, 249, 255, 0.85));
        }

        .bg-content-dark {
            background: linear-gradient(135deg, rgba(31, 41, 55, 0.98), rgba(31, 41, 55, 0.95), rgba(31, 41, 55, 0.98));
        }

        /* Decorative elements with better positioning */
        .decorative-blob {
            border-radius: 50%;
            filter: blur(20px);
            position: absolute;
            z-index: 0;
        }
    </style>
    <!-- Preload dark mode script to prevent FOUC (Flash of Unstyled Content) -->
    <script>
        // Check dark mode preference immediately
        if (localStorage.getItem('color-theme') === 'dark' ||
            (localStorage.getItem('color-theme') === null &&
                window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>

<body class="bg-gray-50 dark:bg-gray-900 transition-optimized">
    <!-- Main container with full width and height -->
    <div id="courseContainer" class="relative h-screen w-screen overflow-hidden flex">
        <!-- Content section (full screen by default) -->
        <div id="videoSection" class="flex-grow h-full transition-optimized overflow-auto">
            <div class="h-full bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="p-0 h-full">
                    <!-- Content area - Show video or text based on content type -->
                    @if ($currentLesson->tipe_konten === 'video')
                        <div class="relative h-full w-full">
                            @if ($currentLesson->youtube_url && $videoId)
                                <iframe src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&rel=0"
                                    class="absolute top-0 left-0 w-full h-full border-0" title="Course video"
                                    loading="lazy" allowfullscreen></iframe>
                            @else
                                <div class="flex items-center justify-center h-full">
                                    <div
                                        class="bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-200 p-4 rounded">
                                        No video available</div>
                                </div>
                            @endif
                        </div>
                    @else
                        <!-- Text content display with optimized background elements -->
                        <div
                            class="relative p-6 md:p-8 lg:p-10 h-full overflow-y-auto dark:bg-content-dark transition-optimized">
                            <!-- Optimized background decorative elements -->
                            <div
                                class="decorative-blob top-20 right-10 w-32 h-32 bg-gradient-to-br from-green-200 to-green-300 dark:from-green-900 dark:to-green-800 opacity-20">
                            </div>
                            <div
                                class="decorative-blob top-40 left-5 w-24 h-24 bg-gradient-to-tr from-blue-200 to-green-200 dark:from-blue-900 dark:to-green-900 opacity-15">
                            </div>
                            <div
                                class="decorative-blob bottom-24 right-20 w-40 h-40 bg-gradient-to-bl from-green-100 to-blue-100 dark:from-green-900 dark:to-blue-900 opacity-20">
                            </div>
                            <div
                                class="decorative-blob bottom-40 left-16 w-28 h-28 bg-gradient-to-tr from-yellow-100 to-green-100 dark:from-yellow-900 dark:to-green-900 opacity-15">
                            </div>

                            <!-- Content wrapper with higher z-index to ensure content visibility -->
                            <div class="relative z-10">
                                <div
                                    class="mb-8 pb-6 border-b border-green-100 dark:border-green-900 bg-white dark:bg-gray-800 bg-opacity-80 dark:bg-opacity-90 p-5 rounded-xl shadow-sm backdrop-blur-sm">
                                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-100 mb-3">
                                        {{ $currentLesson->judul }}
                                    </h1>
                                    <div class="flex flex-wrap items-center text-sm text-gray-500 dark:text-gray-400">
                                        <span class="flex items-center mr-3 mb-2 sm:mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                                            </svg>
                                            Chapter: {{ $currentChapter->judul }}
                                        </span>
                                        <span
                                            class="hidden sm:block w-1.5 h-1.5 bg-gray-400 dark:bg-gray-500 rounded-full mx-3"></span>
                                        <span class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                            Reading Material
                                        </span>
                                    </div>
                                </div>

                                <div
                                    class="bg-white dark:bg-gray-800 bg-opacity-80 dark:bg-opacity-80 p-5 rounded-xl shadow-sm text-gray-600 dark:text-gray-100 transition-optimized backdrop-blur-sm prose dark:prose-invert max-w-none border-green-100 dark:border-green-900 border-b-2 mt-5">
                                    {!! $currentLesson->konten !!}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Floating control buttons -->
        <div class="fixed top-24 right-5 z-50 flex flex-col gap-3">
            <!-- Dark mode toggle button -->
            <button id="darkModeToggle"
                class="bg-white dark:bg-gray-800 bg-opacity-90 border border-gray-200 dark:border-gray-700 rounded-full w-10 h-10 flex items-center justify-center cursor-pointer shadow-md transition-optimized hover:bg-gray-100 dark:hover:bg-gray-700">
                <!-- Sun icon (visible in light mode) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700 dark:hidden" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <!-- Moon icon (visible in dark mode) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200 hidden dark:block" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>

            <!-- Sidebar toggle button -->
            <button id="sidebarToggle"
                class="bg-white dark:bg-gray-800 bg-opacity-90 border border-gray-200 dark:border-gray-700 rounded-full w-10 h-10 flex items-center justify-center cursor-pointer shadow-md transition-optimized hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700 dark:text-gray-200" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Lessons sidebar (hidden by default) -->
        <div id="lessonSidebar"
            class="w-0 h-full overflow-y-auto transition-optimized bg-white dark:bg-gray-800 shadow-lg border-l border-gray-100 dark:border-gray-700">
            <!-- Header with back button -->
            <div class="sticky top-0 z-10 bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 p-4">
                <a href="{{ route('course.dashboard.my-courses.index') }}"
                    class="group flex items-center justify-center gap-2 bg-gradient-to-r from-green-500 to-green-600 text-white py-3 px-4 rounded-lg shadow-sm hover:shadow-md transition-optimized">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 transition-transform group-hover:-translate-x-1" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span class="font-medium">Back to Dashboard</span>
                </a>
            </div>

            <!-- Chapters and lessons -->
            <div class="h-full">
                <div class="p-0">
                    @foreach ($chapters as $chapter)
                        <div class="border-b border-gray-100 dark:border-gray-700 chapter-container">
                            <button type="button"
                                class="chapter-toggle flex items-center justify-between w-full p-4 transition-colors duration-200 hover:bg-gray-50 dark:hover:bg-gray-700 {{ $chapter['id'] == $currentChapter->id ? 'bg-green-50 dark:bg-green-900/30' : '' }}">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex-shrink-0 w-8 h-8 rounded-full bg-{{ $chapter['id'] == $currentChapter->id ? 'green' : 'gray' }}-100 dark:bg-{{ $chapter['id'] == $currentChapter->id ? 'green' : 'gray' }}-800 flex items-center justify-center">
                                        <span
                                            class="text-{{ $chapter['id'] == $currentChapter->id ? 'green' : 'gray' }}-600 dark:text-{{ $chapter['id'] == $currentChapter->id ? 'green' : 'gray' }}-400 font-medium">{{ $loop->iteration }}</span>
                                    </div>
                                    <span class="text-left">
                                        <span
                                            class="block font-medium text-lg leading-tight dark:text-white">{{ $chapter['judul'] }}</span>
                                        <span
                                            class="block text-sm text-gray-500 dark:text-gray-400">{{ $chapter['course_chapter_lessons_count'] }}
                                            Materi</span>
                                    </span>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="chapter-arrow h-5 w-5 text-gray-500 dark:text-gray-400 transition-transform duration-200 {{ $chapter['id'] == $currentChapter->id ? 'rotate-90' : '' }}"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                            <div
                                class="chapter-content {{ $chapter['id'] == $currentChapter->id ? 'block' : 'hidden' }} border-t border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                                <ul class="py-2 px-4">
                                    @foreach ($chapter['courseChapterLessons'] as $index => $item)
                                        <li class="mb-3 last:mb-0">
                                            <a href="{{ route('course.dashboard.my-courses.watch', ['slug' => $course->slug, 'chapterId' => $chapter['id'], 'lessonId' => $item['id']]) }}"
                                                class="flex items-start gap-3 p-2 rounded-lg {{ $item['id'] == $currentLesson->id ? 'bg-green-100 dark:bg-green-900/40' : 'hover:bg-gray-100 dark:hover:bg-gray-700/70' }} transition-colors duration-200">
                                                <!-- Status icon -->
                                                @if ($item['is_done'])
                                                    <span class="flex-shrink-0 mt-0.5 text-green-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            viewBox="0 0 24 24" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                @elseif($item['id'] == $currentLesson->id)
                                                    <span class="flex-shrink-0 mt-0.5 text-green-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2.5">
                                                            <circle cx="12" cy="12" r="10"
                                                                fill="rgba(34, 197, 94, 0.2)" />
                                                            <circle cx="12" cy="12" r="3"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                @else
                                                    <span
                                                        class="flex-shrink-0 mt-0.5 text-gray-300 dark:text-gray-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <circle cx="12" cy="12" r="10"
                                                                stroke-width="2" />
                                                        </svg>
                                                    </span>
                                                @endif

                                                <!-- Lesson content -->
                                                <div class="flex-1">
                                                    <div
                                                        class="{{ $item['id'] == $currentLesson->id ? 'text-green-700 dark:text-green-400' : 'text-gray-700 dark:text-gray-300' }} font-medium">
                                                        {{ $index + 1 }}. {{ $item['judul'] }}
                                                    </div>
                                                    <div class="flex items-center gap-2 mt-1">
                                                        <!-- Content type indicator -->
                                                        @if ($item['tipe_konten'] === 'video')
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4 w-4 text-gray-400" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                            </svg>
                                                            <span
                                                                class="text-xs text-gray-500 dark:text-gray-400">Video</span>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4 w-4 text-gray-400" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                            </svg>
                                                            <span
                                                                class="text-xs text-gray-500 dark:text-gray-400">Reading</span>
                                                        @endif
                                                        <span
                                                            class="w-1 h-1 bg-gray-300 dark:bg-gray-600 rounded-full mx-1"></span>
                                                        <span class="text-xs text-gray-500 dark:text-gray-400">
                                                            {{ $item['is_done'] ? 'Selesai Dipelajari' : 'Belum Dipelajari' }}
                                                        </span>
                                                    </div>
                                                </div>

                                                @if ($item['id'] == $currentLesson->id)
                                                    <span
                                                        class="flex-shrink-0 bg-green-500 text-white text-xs font-medium px-2 py-0.5 rounded">
                                                        Current
                                                    </span>
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery js -->
    <script src="{{ asset('laos-course/back/assets/js/jquery-3.7.1.min.js') }}"></script>
    <!-- Phosphor Js -->
    <script src="{{ asset('laos-course/back/assets/js/phosphor-icon.js') }}"></script>

    <!-- Optimized JavaScript for interactions -->
    <script>
        $(document).ready(function() {
            // Dark mode toggle functionality
            $('#darkModeToggle').on('click', function() {
                const isDarkMode = $('html').hasClass('dark');

                if (isDarkMode) {
                    // Switch to light mode
                    $('html').removeClass('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    // Switch to dark mode
                    $('html').addClass('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            });

            // Sidebar toggle functionality with smooth transitions
            $('#sidebarToggle').on('click', function() {
                const $sidebar = $('#lessonSidebar');
                const $videoSection = $('#videoSection');
                const $toggleBtn = $(this);

                if ($sidebar.hasClass('w-0')) {
                    // Show sidebar
                    $sidebar.removeClass('w-0').addClass('w-1/3');
                    $videoSection.addClass('w-2/3');
                    $toggleBtn.addClass('transform translate-x-[-30%]');
                } else {
                    // Hide sidebar
                    $sidebar.removeClass('w-1/3').addClass('w-0');
                    $videoSection.removeClass('w-2/3');
                    $toggleBtn.removeClass('transform translate-x-[-30%]');
                }
            });

            // Chapter accordion functionality using jQuery
            $('.chapter-toggle').on('click', function() {
                const $container = $(this).closest('.chapter-container');
                const $content = $container.find('.chapter-content');
                const $arrow = $(this).find('.chapter-arrow');

                // Toggle visibility with animation
                if ($content.hasClass('hidden')) {
                    // Show content with slide animation
                    $content.removeClass('hidden').hide().slideDown(200);
                    $arrow.addClass('rotate-90');
                } else {
                    // Hide content with slide animation
                    $content.slideUp(200, function() {
                        $(this).addClass('hidden').css('display', '');
                    });
                    $arrow.removeClass('rotate-90');
                }
            });

            // Initialize tooltips or any other components if needed
            // Example: $('.tooltip').tooltip();
        });
    </script>
</body>

</html>
