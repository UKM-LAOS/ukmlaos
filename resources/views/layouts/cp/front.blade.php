<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="{{ asset('assets/cp/logo.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('toastr/build/toastr.css') }}">
    <script>
        // Check if dark mode is enabled
        function isDarkMode() {
            return localStorage.getItem('color-theme') === 'dark' ||
                (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
        }

        // Apply initial theme
        if (isDarkMode()) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('toastr/build/toastr.min.js') }}"></script>
    <script>
        // Dark mode toggle functionality
        function toggleDarkMode() {
            // Get HTML root element
            const html = document.documentElement;

            // Toggle dark class
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
                // Update button states
                updateDarkModeButtons(false);
            } else {
                html.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
                // Update button states
                updateDarkModeButtons(true);
            }
        }

        // Update all dark mode toggle buttons
        function updateDarkModeButtons(isDark) {
            const darkIcons = document.querySelectorAll('.dark\\:block');
            const lightIcons = document.querySelectorAll('.block.dark\\:hidden');

            darkIcons.forEach(icon => {
                icon.style.display = isDark ? 'block' : 'none';
            });

            lightIcons.forEach(icon => {
                icon.style.display = isDark ? 'none' : 'block';
            });
        }

        // Add click listeners to both desktop and mobile toggle buttons
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('theme-toggle')?.addEventListener('click', toggleDarkMode);
            document.getElementById('mobile-theme-toggle')?.addEventListener('click', toggleDarkMode);

            // Mobile menu functionality
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMenu = document.getElementById('close-menu');
            const mobileBackdrop = document.getElementById('mobile-backdrop');

            function openMobileMenu() {
                if (!mobileMenu) return;
                mobileMenu.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
                setTimeout(() => {
                    const menuPanel = mobileMenu.querySelector('div:last-child');
                    if (menuPanel) {
                        menuPanel.classList.remove('translate-x-full');
                    }
                }, 10);
            }

            function closeMobileMenu() {
                if (!mobileMenu) return;
                const menuPanel = mobileMenu.querySelector('div:last-child');
                if (menuPanel) {
                    menuPanel.classList.add('translate-x-full');
                }
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }, 300);
            }

            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', openMobileMenu);
            }

            if (closeMenu) {
                closeMenu.addEventListener('click', closeMobileMenu);
            }

            if (mobileBackdrop) {
                mobileBackdrop.addEventListener('click', closeMobileMenu);
            }

            // Handle resize
            window.addEventListener('resize', () => {
                if (mobileMenu && window.innerWidth >= 768 && !mobileMenu.classList.contains('hidden')) {
                    closeMobileMenu();
                }
            });

            // Close mobile menu when clicking a link
            if (mobileMenu) {
                mobileMenu.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', closeMobileMenu);
                });
            }

            // Close mobile menu with Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && mobileMenu && !mobileMenu.classList.contains('hidden')) {
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
            updateDarkModeButtons(document.documentElement.classList.contains('dark'));
        });
    </script>
    @Toastr()
    @stack('scripts')
</body>

</html>
