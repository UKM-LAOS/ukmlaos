<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Selamat Datang' }} - LAOS Course</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('laos-course/front/assets/css/style.css') }}">
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
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white dark:bg-gray-900 transition-colors duration-300">
    <!-- Modern Navbar -->
    @include('components.course.front.navbar')

    @yield('content')

    <!-- Footer -->
    @include('components.course.front.footer')

    {{-- @Toastr() --}}

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
        document.getElementById('theme-toggle')?.addEventListener('click', toggleDarkMode);
        document.getElementById('mobile-theme-toggle')?.addEventListener('click', toggleDarkMode);

        // Listen for system theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            if (!localStorage.getItem('color-theme')) {
                if (e.matches) {
                    document.documentElement.classList.add('dark');
                    updateDarkModeButtons(true);
                } else {
                    document.documentElement.classList.remove('dark');
                    updateDarkModeButtons(false);
                }
            }
        });

        // Initialize button states
        updateDarkModeButtons(document.documentElement.classList.contains('dark'));
        // Mobile menu functionality
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const closeMenu = document.getElementById('close-menu');

        function toggleMenu() {
            mobileMenu.classList.toggle('active');
            document.body.classList.toggle('overflow-hidden');
        }

        mobileMenuButton?.addEventListener('click', toggleMenu);
        closeMenu?.addEventListener('click', toggleMenu);

        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100,
        });
    </script>
    @Toastr()
    @stack('scripts')
</body>

</html>
