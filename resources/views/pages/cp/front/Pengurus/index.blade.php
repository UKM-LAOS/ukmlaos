@extends('layouts.cp.front')

@section('content')
    <section class="mt-16 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="mb-12">
                <h2
                    class=" text-4xl bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-500 dark:from-emerald-400 dark:to-green-300 font-bold">
                    Struktur Pengurus {{ $selectedPeriod }}
                </h2>
                <div class="mt-3">
                    <span class="inline-block h-1 w-20 rounded-full bg-emerald-500 dark:bg-emerald-400"></span>
                    <span class="inline-block h-1 w-8 rounded-full bg-emerald-300 dark:bg-emerald-300 mx-1"></span>
                    <span class="inline-block h-1 w-4 rounded-full bg-emerald-200 dark:bg-emerald-200"></span>
                </div>
                <p class="mt-6 max-w-2xltext-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                    Susunan Pengurus UKM LAOS Tahun Masa Bhakti {{ $selectedPeriod }}
                </p>

                {{-- Dropdown Pemilihan Periode --}}
                <div class="mt-8 flex justify-start" id="struktur-pengurus">
                    <div class="relative inline-block">
                        <select id="periodSelector" onchange="changePeriod()"
                            class="bg-white dark:bg-gray-800 border-2 border-green-300 dark:border-emerald-600 text-gray-700 dark:text-gray-300 px-6 py-3 pr-10 rounded-full focus:outline-none focus:border-green-500 dark:focus:border-emerald-400 focus:ring-2 focus:ring-green-200 dark:focus:ring-emerald-800 transition-all duration-200 cursor-pointer shadow-md hover:shadow-lg">
                            @foreach ($availablePeriods as $period)
                                <option value="{{ $period }}" {{ $period == $selectedPeriod ? 'selected' : '' }}>
                                    Periode {{ $period }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                            <svg class="w-4 h-4 text-green-500 dark:text-emerald-400" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mx-auto p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach ($pengurus as $p)
                        <div class="relative group">
                            <div
                                class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-emerald-600 rounded-3xl opacity-0 group-hover:opacity-60 transition duration-500 blur-md transform-gpu">
                            </div>

                            <div
                                class="relative h-full bg-white dark:bg-gray-800 rounded-3xl shadow-md transition-all duration-300 group-hover:-translate-y-2 flex flex-col overflow-hidden border border-gray-100 dark:border-gray-700 ">

                                <div class="relative bg-gradient-to-br from-emerald-500 to-green-400 h-32 p-4">
                                    <div class="relative flex items-center justify-center space-x-2 h-full">
                                        <div
                                            class="bg-white dark:bg-gray-900 w-10 h-10 rounded-xl flex items-center justify-center shadow-lg transform group-hover:rotate-12 transition duration-300">
                                            <img src="{{ asset('logo.png') }}" alt="Logo"
                                                class="w-6 h-6 object-contain">
                                        </div>
                                        <span class="text-white font-bold text-xl tracking-wider">UKM LAOS</span>
                                    </div>
                                </div>

                                <div class="relative px-6 -mt-7 flex-grow flex flex-col">
                                    <div class="relative flex justify-center">
                                        <div class="bg-white dark:bg-gray-900 p-1.5 rounded-2xl shadow-xl">
                                            <div class="relative overflow-hidden w-28 h-28 sm:w-32 sm:h-32 rounded-xl">
                                                <img src="{{ asset($p->foto) }}" alt="Foto {{ $p->nama }}"
                                                    loading="lazy"
                                                    class="w-full h-full object-cover transform-gpu transition duration-500 group-hover:scale-110">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mt-5">
                                        <h2 class="text-xl font-bold text-gray-800 dark:text-white">{{ $p->nama }}
                                        </h2>
                                        <p class="text-gray-500 dark:text-gray-400 mt-1 font-medium italic">
                                            {{ $p->jabatan }}</p>
                                    </div>

                                    <div class="flex justify-center items-center space-x-3 mt-auto pt-8 pb-6">
                                        @if (isset($p->sosmed['instagram']))
                                            <a href="{{ $p->sosmed['instagram'] }}" title="Instagram"
                                                class="w-9 h-9 rounded-full bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-400 flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1 hover:bg-gradient-to-br hover:from-pink-600 hover:to-orange-500 hover:text-white">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                                </svg>
                                            </a>
                                        @endif

                                        @if (isset($p->sosmed['github']))
                                            <a href="{{ $p->sosmed['github'] }}" title="GitHub"
                                                class="w-9 h-9 rounded-full bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-400 flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1 hover:bg-gray-900 hover:text-white">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
                                                </svg>
                                            </a>
                                        @endif

                                        @if (isset($p->sosmed['linkedin']))
                                            <a href="{{ $p->sosmed['linkedin'] }}" title="LinkedIn"
                                                class="w-9 h-9 rounded-full bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-400 flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1 hover:bg-blue-700 hover:text-white">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5V5c0-2.761-2.238-5-5-5zM8 19H5V8h3v11zM6.5 6.732c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764S7.466 6.732 6.5 6.732zM20 19h-3v-5.604c0-3.368-4-3.113-4 0V19h-3V8h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($pengurus->count() > 8)
                    <div
                        class="mt-12 w-full px-4 py-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
                        {{ $pengurus->links() }}
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection
