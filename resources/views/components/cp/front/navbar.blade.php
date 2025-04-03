<div id="navbar"
    class="w-full px-[20px] md:px-[78px] h-[56px] md:h-[79px] backdrop-blur-md flex justify-center items-center fixed top-0 z-50 shadow-md bg-opacity-60 transition-all duration-300">
    <div class="w-full flex justify-between items-center">
        <a href="/" class="flex gap-[10px] items-center">
            <img alt="Laos logo" src="{{ asset('laos-cp/logo.png') }}" class="w-[24px] md:w-[38px] h-[24px] md:h-[38px]" />
            <span class="font-bold text-white">UKM <span class="gradient-text">LAOS</span></span>
        </a>
        <!-- Desktop Menu -->
        <ul class="hidden md:flex gap-[30px] items-center text-body-sm-dekstop text-neutrals-dark-02">
            @foreach ($menus as $menu)
                <a href="{{ route($menu['route']) }}"
                    class="hover:text-green-500 hover:underline hover:decoration-yellow-400 transition-all duration-300 {{ Request::routeIs(isset($menu['active']) ? $menu['active'] : $menu['route']) ? 'text-green-500' : 'text-gray-400' }}">{{ $menu['title'] }}</a>
            @endforeach
            <button id="theme-toggle"
                class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors cursor-pointer">
                <!-- Sun icon for dark mode -->
                <svg class="w-6 h-6 hidden dark:block text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707">
                    </path>
                </svg>
                <!-- Moon icon for light mode -->
                <svg class="w-6 h-6 block dark:hidden text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                    </path>
                </svg>
            </button>
        </ul>



        <!-- Mobile Menu Button -->
        <div id="mobileMenuButton" class="md:hidden cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M3.04 0.5H6.42C7.83 0.5 8.96 1.65 8.96 3.061V6.47C8.96 7.89 7.83 9.03 6.42 9.03H3.04C1.64 9.03 0.5 7.89 0.5 6.47V3.061C0.5 1.65 1.64 0.5 3.04 0.5ZM3.04 11.9697H6.42C7.83 11.9697 8.96 13.1107 8.96 14.5307V17.9397C8.96 19.3497 7.83 20.4997 6.42 20.4997H3.04C1.64 20.4997 0.5 19.3497 0.5 17.9397V14.5307C0.5 13.1107 1.64 11.9697 3.04 11.9697ZM17.9601 0.5H14.5801C13.1701 0.5 12.0401 1.65 12.0401 3.061V6.47C12.0401 7.89 13.1701 9.03 14.5801 9.03H17.9601C19.3601 9.03 20.5001 7.89 20.5001 6.47V3.061C20.5001 1.65 19.3601 0.5 17.9601 0.5ZM14.5801 11.9697H17.9601C19.3601 11.9697 20.5001 13.1107 20.5001 14.5307V17.9397C20.5001 19.3497 19.3601 20.4997 17.9601 20.4997H14.5801C13.1701 20.4997 12.0401 19.3497 12.0401 17.9397V14.5307C12.0401 13.1107 13.1701 11.9697 14.5801 11.9697Z"
                    fill="#2DCC70" />
            </svg>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div id="mobileMenu"
        class="hidden fixed top-[56px] left-0 w-full h-screen bg-black bg-opacity-95 backdrop-blur-md z-40 md:hidden transition-all duration-300 transform -translate-y-1">
        <div class="flex flex-col items-center justify-center h-full">
            <ul class="flex flex-col items-center w-full py-8">
                @foreach ($menus as $menu)
                    <a href="{{ route($menu['route']) }}"
                        class="py-4 my-1 w-4/5 text-center text-lg font-medium border-b border-gray-800 hover:text-green-500 hover:border-green-500 transition-all duration-300 {{ Request::routeIs(isset($menu['active']) ? $menu['active'] : $menu['route']) ? 'text-green-500 border-green-500' : 'text-gray-400' }}">
                        {{ $menu['title'] }}
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        // Fungsi untuk navbar blur saat scroll
        const navbar = $('#navbar');
        const mobileMenu = $('#mobileMenu');

        $(window).scroll(function() {
            if ($(this).scrollTop() > 0) {
                navbar.addClass('bg-black backdrop-blur-md');
            } else {
                navbar.removeClass('bg-black backdrop-blur-md');
            }
        });

        // Fungsi untuk menu mobile interaktif
        $(document).ready(function() {
            $('#mobileMenuButton').click(function() {
                mobileMenu.toggleClass('hidden');
                $('body').toggleClass('overflow-hidden'); // Prevent scrolling when menu is open
            });

            // Menutup menu saat item diklik
            $('#mobileMenu a').click(function() {
                mobileMenu.addClass('hidden');
                $('body').removeClass('overflow-hidden');
            });

            // Menutup menu saat mengklik di luar menu
            $(document).click(function(event) {
                if (!$(event.target).closest('#mobileMenuButton').length &&
                    !$(event.target).closest('#mobileMenu').length &&
                    !mobileMenu.hasClass('hidden')) {
                    mobileMenu.addClass('hidden');
                    $('body').removeClass('overflow-hidden');
                }
            });

            // Mengatasi masalah ketika beralih dari mobile ke desktop
            function handleResize() {
                // Jika lebar viewport lebih dari breakpoint medium (md)
                if (window.innerWidth >= 768) {
                    // Pastikan menu mobile tersembunyi
                    mobileMenu.addClass('hidden');
                    $('body').removeClass('overflow-hidden');
                }
            }

            // Jalankan saat resize window
            $(window).resize(handleResize);

            // Jalankan saat halaman pertama kali dimuat
            handleResize();
        });
    </script>
@endpush
