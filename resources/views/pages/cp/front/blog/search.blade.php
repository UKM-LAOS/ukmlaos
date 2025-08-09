@extends('layouts.cp.front')

@section('content')
    <section class="py-12 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto mt-12 px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    Hasil Pencarian: "{{ $query }}"
                </h1>
                <p class="text-gray-600 dark:text-gray-300">
                    Ditemukan {{ $articles->total() }} artikel
                </p>
            </div>

            <div class="max-w-md mb-8">
                <form action="{{ route('cp.blog.search') }}" method="GET" class="relative">
                    <input type="text" name="q" value="{{ $query }}" placeholder="Cari artikel..."
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-full bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                    <button type="submit"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-green-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>

            @if ($articles->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($articles as $article)
                        <div
                            class="bg-gray-100 dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="h-48 overflow-hidden">
                                <img src="{{ $article->featured_image_thumb }}" alt="{{ $article->judul }}"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="p-6">
                                <div class="flex items-center mb-2">
                                    <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                        {{ $article->category_label }}
                                    </span>
                                    @if ($article->divisi)
                                        <span class="ml-2 text-xs text-gray-500">{{ $article->divisi->nama }}</span>
                                    @endif
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                                    <a href="{{ route('cp.blog.show', $article->slug) }}"
                                        class="hover:text-green-600 transition-colors duration-300">
                                        {{ $article->judul }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $article->excerpt }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        @if ($article->author)
                                            {{ $article->author->name }}:
                                        @endif
                                        {{ $article->formatted_date }}
                                    </div>
                                    <a href="{{ route('cp.blog.show', $article->slug) }}"
                                        class="text-green-600 hover:text-green-800 text-sm font-medium">
                                        Baca →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $articles->appends(['q' => $query])->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Tidak ditemukan hasil</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Tidak ada artikel yang cocok dengan pencarian "{{ $query }}".
                    </p>
                    <div class="mt-6">
                        <a href="{{ route('cp.blog.index') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            Kembali ke Blog
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
