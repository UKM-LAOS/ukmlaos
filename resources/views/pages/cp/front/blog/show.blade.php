@extends('layouts.cp.front')

@section('content')
    <article class="py-12 bg-white dark:bg-gray-900">
        <div class="max-w-4xl mx-auto mt-12 px-4 sm:px-6 lg:px-8">
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm text-gray-500">
                    <li><a href="{{ route('cp.blog.index') }}" class="hover:text-green-600">Blog</a></li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-900 dark:text-white">{{ $article->judul }}</span>
                    </li>
                </ol>
            </nav>

            <header class="mb-8">
                <div class="flex items-center mb-4">
                    <span class="px-3 py-1 text-sm font-medium bg-green-100 text-green-800 rounded-full">
                        {{ $article->category_label }}
                    </span>
                    @if ($article->divisi)
                        <span class="ml-3 text-sm text-gray-500">{{ $article->divisi->nama }}</span>
                    @endif
                </div>

                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">{{ $article->judul }}</h1>

                <div class="flex items-center text-gray-500 dark:text-gray-400">
                    @if ($article->author)
                        <div class="flex items-center mr-6">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>{{ $article->author->name }}</span>
                        </div>
                    @endif

                    <div class="flex items-center mr-6">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>{{ $article->formatted_date }}</span>
                    </div>

                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd"
                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>{{ number_format($article->views) }} views</span>
                    </div>
                </div>
            </header>

            @if ($article->getFirstMedia('featured_image'))
                <div class="mb-8">
                    <img src="{{ $article->getFirstMedia('featured_image')->getUrl('large') }}" alt="{{ $article->judul }}"
                        class="w-full h-64 md:h-96 object-cover rounded-lg">
                </div>
            @endif

            <div class="prose prose-lg max-w-none dark:prose-invert">
                {!! $article->konten !!}
            </div>

            @if ($article->getMedia('gallery')->count() > 0)
                <div class="mt-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Galeri</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ($article->getMedia('gallery') as $media)
                            <img src="{{ $media->getUrl('thumb') }}" alt="Gallery image"
                                class="w-full h-32 object-cover rounded-lg cursor-pointer hover:opacity-75 transition-opacity"
                                onclick="openModal('{{ $media->getUrl() }}')">
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Bagikan posting ini :</h3>
                <div class="flex space-x-2">
                    <a href="https://wa.me/?text={{ urlencode($article->judul . ' - ' . request()->fullUrl()) }}"
                        target="_blank" class="text-green-500 hover:text-green-600 transition-colors">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488" />
                        </svg>
                    </a>

                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                        target="_blank" class="text-blue-600 hover:text-blue-700 transition-colors">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>

                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($article->judul) }}"
                        target="_blank" class="text-blue-800 hover:text-blue-900 transition-colors">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.278V9.176h3.413v1.561h.045c.473-.896 1.631-1.839 3.393-1.839 3.64 0 4.316 2.413 4.316 5.569v6.463zM5.617 7.032a2.016 2.016 0 01-2.01-2.013 2.016 2.016 0 012.01-2.013 2.014 2.014 0 012.01 2.013 2.014 2.014 0 01-2.01 2.013zm-.724 13.418H6.34v-11.88H4.893v11.88zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.454c.98 0 1.775-.773 1.775-1.729V1.729C24 .774 23.205 0 22.225 0z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="mt-12 pt-12 border-t border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Komentar</h3>

                @if ($article->comments->count() > 0)
                    <div class="space-y-6 mb-8">
                        @foreach ($article->comments as $comment)
                            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                                <div class="flex items-center mb-2">
                                    <div class="font-semibold text-gray-900 dark:text-white">{{ $comment->name }}</div>
                                    <span
                                        class="text-gray-500 dark:text-gray-400 text-sm ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-gray-700 dark:text-gray-300">{{ $comment->content }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 dark:text-gray-400 mb-8">Belum ada komentar. Jadilah yang pertama berkomentar!
                    </p>
                @endif

                <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow">
                    <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Tinggalkan Komentar</h4>
                    <form action="{{ route('cp.blog.comment', $article->slug) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama*</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:text-white"
                                    value="{{ old('name', auth()->check() ? auth()->user()->name : '') }}">
                            </div>
                            <div>
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email*</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:text-white"
                                    value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="content"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Komentar*</label>
                            <textarea id="content" name="content" rows="4" required
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:text-white">{{ old('content') }}</textarea>
                        </div>
                        <div class="flex items-center mb-4">
                            <input type="checkbox" id="remember" name="remember"
                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 dark:border-gray-600 rounded dark:bg-gray-800">
                            <label for="remember" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                                Simpan nama, email, dan situs web saya di browser ini untuk waktu berikutnya saya
                                berkomentar.
                            </label>
                        </div>
                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Kirim Komentar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </article>

    @if ($relatedArticles->count() > 0)
        <section class="py-12 bg-gray-50 dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-8">Artikel Terkait</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($relatedArticles as $related)
                        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md overflow-hidden">
                            <div class="h-48 overflow-hidden">
                                <img src="{{ $related->featured_image_thumb }}" alt="{{ $related->judul }}"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="p-6">
                                <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                    {{ $related->category_label }}
                                </span>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mt-2 mb-2">
                                    <a href="{{ route('cp.blog.show', $related->slug) }}"
                                        class="hover:text-green-600 transition-colors duration-300">
                                        {{ $related->judul }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">{{ $related->excerpt }}</p>
                                <div class="mt-4 text-xs text-gray-500">{{ $related->formatted_date }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="relative max-w-4xl max-h-full">
            <img id="modalImage" src="" alt="" class="max-w-full max-h-full object-contain">
            <button onclick="closeModal()"
                class="absolute top-4 right-4 text-white bg-black bg-opacity-50 rounded-full p-2 hover:bg-opacity-75">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    @push('scripts')
        <script>
            function openModal(imageSrc) {
                document.getElementById('modalImage').src = imageSrc;
                document.getElementById('imageModal').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('imageModal').classList.add('hidden');
            }

            document.getElementById('imageModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal();
                }
            });
        </script>
    @endpush
@endsection
