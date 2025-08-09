@extends('layouts.cp.front')

@section('content')
    <section class="relative h-[500px] overflow-hidden">
        <div class="flex h-full mt-16 transition-transform duration-500 ease-in-out" id="slider">
            @if ($popularArticles->count() > 0)
                @foreach ($popularArticles as $index => $article)
                    <div class="min-w-full h-full relative">
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                        <img src="{{ $article->featured_image_url }}" alt="{{ $article->judul }}"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="max-w-7xl px-4 sm:px-6 lg:px-8 text-white text-center">
                                <div class="mb-12">
                                    <p class="text-lg font-medium tracking-wide text-gray-200 uppercase mb-2">
                                        {{ $article->category_label }}
                                    </p>
                                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-4">
                                        {{ $article->judul }}
                                    </h1>
                                    <p class="text-base sm:text-lg text-gray-200 max-w-3xl mx-auto">
                                        {{ $article->excerpt }}
                                    </p>
                                    <div class="mt-6">
                                        <a href="{{ route('cp.blog.show', $article->slug) }}"
                                            class="inline-block px-6 py-3 bg-green-500 text-white rounded-full font-medium hover:bg-green-600 transition-colors duration-300">
                                            Baca Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="min-w-full h-full relative">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <img src="{{ asset('assets/cp/hero/hero.jpg') }}" alt="UKM LAOS Background"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="max-w-7xl px-4 sm:px-6 lg:px-8 text-white text-center">
                            <div class="mb-12">
                                <p class="text-lg font-medium tracking-wide text-gray-200 uppercase mb-2">Artikel terbaru
                                </p>
                                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-4">
                                    Cerita, Inovasi, dan Aksi dari UKM LAOS
                                </h1>
                                <p class="text-base sm:text-lg text-gray-200 max-w-3xl mx-auto">
                                    Ikuti perjalanan inspiratif, program kreatif, dan kisah penggerak perubahan dari
                                    berbagai kegiatan UKM LAOS.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        @if ($popularArticles->count() > 1)
            <div class="absolute bottom-8 left-0 right-0 flex justify-center space-x-2 z-10">
                @foreach ($popularArticles as $index => $article)
                    <button
                        class="w-3 h-3 {{ $index === 0 ? 'bg-white' : 'bg-gray-400' }} rounded-full cursor-pointer slider-dot"
                        data-slide="{{ $index }}"></button>
                @endforeach
            </div>
        @endif
    </section>

    <section class="py-12 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <div
                    class="inline-block px-6 py-2 border-2 border-gray-300 dark:border-gray-600 rounded-full text-gray-700 dark:text-gray-300 font-semibold mb-4">
                    BERITA
                </div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Temukan Berita Terbaru dari UKM LAOS</h2>
            </div>

            <div class="max-w-md mx-auto mb-8">
                <form action="{{ route('cp.blog.search') }}" method="GET" class="relative">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari artikel..."
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

            <div class="flex items-center justify-center relative my-8">
                <button
                    class="absolute left-0 -ml-12 p-2 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-300 category-scroll-left">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="flex space-x-4 overflow-x-auto whitespace-nowrap scroll-smooth py-2 px-10 no-scrollbar"
                    id="categoryFilter">
                    @foreach ($categories as $key => $label)
                        <a href="{{ $key === 'semua' ? route('cp.blog.index') : route('cp.blog.index', ['kategori' => $key]) }}"
                            class="flex-shrink-0 px-6 py-2 border border-gray-300 dark:border-gray-600 rounded-full font-medium transition-colors duration-300
                            {{ $activeKategori === $key ? 'bg-green-500 text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
                <button
                    class="absolute right-0 -mr-12 p-2 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-300 category-scroll-right">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10l-3.293-3.293a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            @if ($articles->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="articles-container">
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

                @if ($articles->hasMorePages())
                    <div class="text-center mt-12">
                        <button id="load-more-btn" data-next-page="{{ $articles->nextPageUrl() }}"
                            class="inline-block px-8 py-3 bg-green-500 text-white rounded-full font-medium hover:bg-green-600 transition-colors duration-300">
                            Muat Lebih Banyak
                        </button>
                    </div>
                @endif
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Tidak ada artikel</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        @if ($activeKategori !== 'semua')
                            Belum ada artikel untuk kategori
                            "{{ data_get($categories, $activeKategori, ucfirst((string) $activeKategori)) }}".
                        @else
                            Belum ada artikel yang dipublikasikan.
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </section>

    @push('scripts')
        <script>
            let currentSlide = 0;
            const slides = document.querySelectorAll('#slider > div');
            const dots = document.querySelectorAll('.slider-dot');
            const totalSlides = slides.length;

            if (totalSlides > 1) {
                function showSlide(index) {
                    const slider = document.getElementById('slider');
                    slider.style.transform = `translateX(-${index * 100}%)`;

                    dots.forEach((dot, i) => {
                        dot.classList.toggle('bg-white', i === index);
                        dot.classList.toggle('bg-gray-400', i !== index);
                    });
                }

                setInterval(() => {
                    currentSlide = (currentSlide + 1) % totalSlides;
                    showSlide(currentSlide);
                }, 5000);
            }

            const categoryFilter = document.getElementById('categoryFilter');
            document.querySelector('.category-scroll-left')?.addEventListener('click', () => {
                categoryFilter.scrollLeft -= 200;
            });

            document.querySelector('.category-scroll-right')?.addEventListener('click', () => {
                categoryFilter.scrollLeft += 200;
            });

            const loadMoreBtn = document.getElementById('load-more-btn');
            const articlesContainer = document.getElementById('articles-container');

            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', async () => {
                    const nextPageUrl = loadMoreBtn.getAttribute('data-next-page');
                    if (!nextPageUrl) return;

                    try {
                        const response = await fetch(nextPageUrl);
                        const data = await response.text();

                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = data;

                        const newArticles = tempDiv.querySelector('#articles-container').innerHTML;
                        articlesContainer.insertAdjacentHTML('beforeend', newArticles);

                        const newLoadMoreBtn = tempDiv.querySelector('#load-more-btn');
                        if (newLoadMoreBtn) {
                            loadMoreBtn.setAttribute('data-next-page', newLoadMoreBtn.getAttribute(
                                'data-next-page'));
                        } else {
                            loadMoreBtn.style.display = 'none';
                        }
                    } catch (error) {
                        console.error('Error loading more articles:', error);
                    }
                });
            }
        </script>
    @endpush
@endsection
