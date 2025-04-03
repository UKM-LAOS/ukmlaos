<aside id="sidebar"
    class="w-64 min-h-screen bg-white dark:bg-gray-800 shadow-lg transition-all duration-300 fixed z-50 -translate-x-full lg:translate-x-0">
    <!-- Logo -->
    <div class="px-6 py-[22px] flex items-center border-b border-gray-100 dark:border-gray-700">
        <div class="relative">
            <div
                class="absolute inset-0 bg-green-200 dark:bg-green-700 rounded-lg transform rotate-6 transition-all duration-300">
            </div>
            <div
                class="relative w-10 h-[5px] flex items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <img src="{{ asset('laos-course/front/assets/img/logo-laos.png') }}" alt="Logo Laos">
            </div>
        </div>
        <a href="{{ route('course.index') }}" class="ml-3 text-xl font-bold text-gray-900 dark:text-white">
            LAOS <span class="gradient-text">COURSE</span>
        </a>
        <button id="closeSidebar" class="ml-auto lg:hidden text-gray-500 dark:text-gray-400">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>
    </div>

    <!-- Sidebar Navigation -->
    <nav class="mt-6 px-4">
        <div class="mb-2 px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">
            Main Menu
        </div>
        @foreach ($menus as $menu)
            <a href="{{ route($menu['route']) }}"
                class="sidebar-item {{ request()->routeIs($menu['route']) ? 'active' : '' }}">
                {!! $menu['svg'] !!}
                <span>{{ $menu['title'] }}</span>
            </a>
        @endforeach

        <div class="border-t border-gray-100 dark:border-gray-700 my-6"></div>

        <!-- Settings Link -->
        <a href="{{ route('course.dashboard.settings.index') }}"
            class="sidebar-item {{ request()->routeIs('course.dashboard.settings.index') ? 'active' : '' }}"">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                    clip-rule="evenodd"></path>
            </svg>
            <span>Settings</span>
        </a>

        <!-- Logout Link -->
        <button type="button" onclick="logout()"
            class="sidebar-item text-red-500 hover:text-red-600 dark:text-red-400 dark:hover:text-red-300 w-full">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M3 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V4a1 1 0 00-1-1H3zm10 1h2v12h-2v-2.586l-4.293 4.293-1.414-1.414L11.586 12H9v-2h2.586l-4.293-4.293 1.414-1.414L13 8.586V4z"
                    clip-rule="evenodd"></path>
            </svg>
            <span>Logout</span>
        </button>
    </nav>

    <!-- Dark Mode Toggle -->
    <div class="absolute bottom-4 left-0 right-0 px-6">
        <button id="darkModeToggle"
            class="w-full flex items-center justify-between px-4 py-3 bg-gray-100 dark:bg-gray-700 rounded-lg transition-colors duration-300">
            <span class="text-gray-700 dark:text-gray-300 font-medium">Dark Mode</span>
            <div class="relative">
                <div class="w-10 h-5 bg-gray-300 dark:bg-gray-600 rounded-full"></div>
                <div
                    class="absolute top-0.5 left-0.5 w-4 h-4 bg-white dark:bg-green-400 rounded-full transform dark:translate-x-5 transition-transform duration-300">
                </div>
            </div>
        </button>
    </div>
</aside>

@push('scripts')
    <script>
        function logout() {
            $.ajax({
                url: `{{ route('course.dashboard.logout') }}`,
                method: 'POST',
                data: {
                    _token: `{{ csrf_token() }}`
                },
                success: function(response) {
                    if (response.status === 'success') {
                        window.location.href = `{{ route('course.login') }}`
                    } else {
                        toastr.error('Logout gagal. Silahkan coba lagi', 'Gagal')
                    }
                },
            })
        }
    </script>
@endpush
