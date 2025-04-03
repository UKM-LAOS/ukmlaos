@extends('layouts.course.back')

@section('content')
    <div class="mt-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Kursus Saya</h2>

            <!-- Search Input yang Lebih Baik -->
            <div class="mt-4 md:mt-0 w-full md:w-auto">
                <form action="{{ route('course.dashboard.my-courses.search') }}" method="GET" class="flex">
                    <div class="relative w-full md:w-80">
                        <input type="text" name="judul" placeholder="Cari kursus..." value="{{ request('search') }}"
                            class="w-full px-4 py-2 pr-10 rounded-lg border dark:border-gray-600 dark:bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500">
                        <button type="submit"
                            class="absolute inset-y-0 right-0 flex items-center px-3 dark:text-white text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($courses as $courseStudent)
                @include('components.course.back.my-courses-card', [
                    'course' => $courseStudent->course,
                    'progress' => round(
                        ($courseStudent->course_student_progres_count /
                            $courseStudent->course->courseChapterLessons->count()) *
                            100),
                    'currentLesson' => $courseStudent->courseStudentProgres->first(),
                ])
            @empty
                {{-- Empty State di tengah --}}
                <div class="col-span-3">
                    <div
                        class="flex flex-col items-center justify-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">Tidak ada kursus</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Kamu belum memiliki kursus yang diikuti.</p>
                    </div>
                </div>
            @endforelse

        </div>

        {{-- <!-- Pagination -->
        @if ($courses->hasPages())
            <div class="mt-6">
                {{ $courses->appends(request()->query())->links() }}
            </div>
        @endif --}}
    </div>
@endsection
