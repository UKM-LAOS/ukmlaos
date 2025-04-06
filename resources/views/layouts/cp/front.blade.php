<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="{{ asset('laos-cp/logo.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('toastr/build/toastr.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        // Check if dark mode is enabled
        function isDarkMode() {
            return localStorage.getItem('color-theme') === 'dark' ||
                (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
        }

        // Apply initial theme
        $(function() {
            if (isDarkMode()) {
                $('html').addClass('dark');
            } else {
                $('html').removeClass('dark');
            }
        });
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }

        .gradient-text {
            @apply bg-clip-text text-transparent bg-gradient-to-r from-green-500 to-blue-500;
        }
    </style>
    <title>{{ $title }} | UKM LAOS</title>
</head>

<body class="bg-white dark:bg-gray-900 transition-colors duration-300">
    <!-- start navbar -->
    @NavbarCP()
    <!-- end navbar -->
    @yield('content')
    <!-- start footer -->
    @FooterCP()
    <!-- end footer -->

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Initialize Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('toastr/build/toastr.min.js') }}"></script>
    <script>
        function toggleChildren(event) {
            event.preventDefault();
            const $submenu = $(event.currentTarget).next();
            if ($submenu.length) {
                $submenu.toggleClass('hidden');
                // arrow rotasi 180 derajat
                const $arrow = $(event.currentTarget).find('svg');
                if ($arrow.length) {
                    $arrow.toggleClass('rotate-180');
                    $arrow.addClass('transition-transform duration-300');
                }
            }
        }
        $(function() {
            // Dark mode toggle functionality
            function toggleDarkMode() {
                // Toggle dark class
                if ($('html').hasClass('dark')) {
                    $('html').removeClass('dark');
                    localStorage.setItem('color-theme', 'light');
                    // Update button states
                    updateDarkModeButtons(false);
                } else {
                    $('html').addClass('dark');
                    localStorage.setItem('color-theme', 'dark');
                    // Update button states
                    updateDarkModeButtons(true);
                }
            }

            // Update all dark mode toggle buttons
            function updateDarkModeButtons(isDark) {
                $('.dark\\:block').each(function() {
                    $(this).css('display', isDark ? 'block' : 'none');
                });

                $('.block.dark\\:hidden').each(function() {
                    $(this).css('display', isDark ? 'none' : 'block');
                });
            }



            // Add click listeners to toggle buttons
            $('#theme-toggle').on('click', toggleDarkMode);
            $('#mobile-theme-toggle').on('click', toggleDarkMode);

            // Mobile menu functionality
            const $mobileMenu = $('#mobile-menu');
            const $mobileMenuButton = $('#mobile-menu-button');
            const $closeMenu = $('#close-menu');
            const $mobileBackdrop = $('#mobile-backdrop');

            function openMobileMenu() {
                if (!$mobileMenu.length) return;
                $mobileMenu.removeClass('hidden');
                $('body').addClass('overflow-hidden');
                setTimeout(() => {
                    const $menuPanel = $mobileMenu.find('div:last-child');
                    if ($menuPanel.length) {
                        $menuPanel.removeClass('translate-x-full');
                    }
                }, 10);
            }

            function closeMobileMenu() {
                if (!$mobileMenu.length) return;
                const $menuPanel = $mobileMenu.find('div:last-child');
                if ($menuPanel.length) {
                    $menuPanel.addClass('translate-x-full');
                }
                setTimeout(() => {
                    $mobileMenu.addClass('hidden');
                    $('body').removeClass('overflow-hidden');
                }, 300);
            }

            if ($mobileMenuButton.length) {
                $mobileMenuButton.on('click', openMobileMenu);
            }

            if ($closeMenu.length) {
                $closeMenu.on('click', closeMobileMenu);
            }

            if ($mobileBackdrop.length) {
                $mobileBackdrop.on('click', closeMobileMenu);
            }

            // Handle resize
            $(window).on('resize', function() {
                if ($mobileMenu.length && $(window).width() >= 768 && !$mobileMenu.hasClass('hidden')) {
                    closeMobileMenu();
                }
            });

            // Close mobile menu when clicking a link
            if ($mobileMenu.length) {
                $mobileMenu.find('a').on('click', closeMobileMenu);
            }

            // Close mobile menu with Escape key
            $(document).on('keydown', function(e) {
                if (e.key === 'Escape' && $mobileMenu.length && !$mobileMenu.hasClass('hidden')) {
                    closeMobileMenu();
                }
            });

            // Initialize Swiper
            const swiper = new Swiper('.mySwiper', {
                slidesPerView: 1, // Default for mobile
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
                // Responsive breakpoints
                breakpoints: {
                    // >= 640px (sm)
                    640: {
                        slidesPerView: 2, // Tablet view
                        spaceBetween: 20,
                    },
                    // >= 1024px (lg)
                    1024: {
                        slidesPerView: 3, // Desktop view
                        spaceBetween: 30,
                    }
                }
            });

            // Initialize button states
            updateDarkModeButtons($('html').hasClass('dark'));
        });
    </script>
    @Toastr()
    @stack('scripts')
</body>

</html>
