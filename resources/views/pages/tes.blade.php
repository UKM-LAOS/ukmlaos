<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        green: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        @layer utilities {
            .gradient-text {
                @apply text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-blue-500;
            }

            .sidebar-item {
                @apply flex items-center gap-3 px-4 py-3 text-gray-600 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-green-900/30 rounded-lg transition-all duration-300;
            }

            .sidebar-item.active {
                @apply bg-green-50 dark:bg-green-900/30 text-green-600 dark:text-green-400 font-medium;
            }

            .float {
                animation: float 6s ease-in-out infinite;
            }

            @keyframes float {
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-20px);
                }

                100% {
                    transform: translateY(0px);
                }
            }

            .card-shine {
                position: relative;
                overflow: hidden;
            }

            .card-shine::after {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.1) 50%, rgba(255, 255, 255, 0) 100%);
                transform: rotate(30deg);
                animation: shine 6s infinite linear;
            }

            @keyframes shine {
                from {
                    transform: translateX(-100%) rotate(30deg);
                }

                to {
                    transform: translateX(100%) rotate(30deg);
                }
            }

            .pulse {
                animation: pulse 2s infinite;
            }

            @keyframes pulse {
                0% {
                    box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4);
                }

                70% {
                    box-shadow: 0 0 0 10px rgba(34, 197, 94, 0);
                }

                100% {
                    box-shadow: 0 0 0 0 rgba(34, 197, 94, 0);
                }
            }

            /* Mobile sidebar animation */
            .sidebar-slide-in {
                animation: slide-in 0.3s forwards;
            }

            .sidebar-slide-out {
                animation: slide-out 0.3s forwards;
            }

            @keyframes slide-in {
                from {
                    transform: translateX(-100%);
                }

                to {
                    transform: translateX(0);
                }
            }

            @keyframes slide-out {
                from {
                    transform: translateX(0);
                }

                to {
                    transform: translateX(-100%);
                }
            }
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen font-poppins">
    <!-- Mobile Menu Overlay -->
    <div id="menuOverlay" class="fixed inset-0 bg-black/50 z-20 hidden transition-opacity duration-300"></div>

    <div class="flex">
        <!-- Mobile Header -->
        <header
            class="lg:hidden fixed top-0 left-0 right-0 bg-white dark:bg-gray-800 shadow-md p-4 z-10 flex justify-between items-center">
            <div class="flex items-center">
                <button id="mobileMenuToggle" class="mr-4 text-gray-600 dark:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div class="flex items-center">
                    <div class="relative">
                        <div
                            class="absolute inset-0 bg-green-200 dark:bg-green-700 rounded-lg transform rotate-6 transition-all duration-300">
                        </div>
                        <div
                            class="relative w-8 h-8 flex items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow-md">
                            <span class="text-green-500 dark:text-green-400 font-bold text-lg">L</span>
                        </div>
                    </div>
                    <h1 class="ml-2 text-lg font-bold text-gray-900 dark:text-white">
                        UKM <span class="gradient-text">LAOS</span>
                    </h1>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button
                    class="relative p-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                        </path>
                    </svg>
                    <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full pulse">3</span>
                </button>
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=16a34a&color=fff&bold=true&font-family=Poppins"
                        alt="User" class="w-8 h-8 rounded-full border-2 border-white dark:border-gray-700">
                </div>
            </div>
        </header>

        <!-- Sidebar -->
        <aside id="sidebar"
            class="w-64 min-h-screen bg-white dark:bg-gray-800 shadow-lg transition-all duration-300 fixed z-30 -translate-x-full lg:translate-x-0">
            <!-- Logo -->
            <div class="px-6 py-6 flex items-center border-b border-gray-100 dark:border-gray-700">
                <div class="relative">
                    <div
                        class="absolute inset-0 bg-green-200 dark:bg-green-700 rounded-lg transform rotate-6 transition-all duration-300">
                    </div>
                    <div
                        class="relative w-10 h-10 flex items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <span class="text-green-500 dark:text-green-400 font-bold text-xl">L</span>
                    </div>
                </div>
                <h1 class="ml-3 text-xl font-bold text-gray-900 dark:text-white">
                    UKM <span class="gradient-text">LAOS</span>
                </h1>
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
                <!-- Dashboard Link -->
                <a href="#" class="sidebar-item active">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z">
                        </path>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <!-- My Courses Link -->
                <a href="#" class="sidebar-item">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z">
                        </path>
                    </svg>
                    <span>Kursus Saya</span>
                </a>

                <!-- My Orders Link -->
                <a href="#" class="sidebar-item">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                        </path>
                    </svg>
                    <span>Pesanan Saya</span>
                </a>

                <div class="border-t border-gray-100 dark:border-gray-700 my-6"></div>

                <!-- Settings Link -->
                <a href="#" class="sidebar-item">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>Settings</span>
                </a>

                <!-- Logout Link -->
                <a href="#"
                    class="sidebar-item text-red-500 hover:text-red-600 dark:text-red-400 dark:hover:text-red-300">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V4a1 1 0 00-1-1H3zm10 1h2v12h-2v-2.586l-4.293 4.293-1.414-1.414L11.586 12H9v-2h2.586l-4.293-4.293 1.414-1.414L13 8.586V4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>Logout</span>
                </a>
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

        <!-- Main Content -->
        <main class="w-full lg:ml-64 min-h-screen pt-16 lg:pt-0">
            <!-- Top Bar (Desktop) -->
            <header class="hidden lg:flex bg-white dark:bg-gray-800 shadow-md p-4 justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Dashboard</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <button
                        class="relative p-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                        <span
                            class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full pulse">3</span>
                    </button>

                    <!-- User Menu -->
                    <div class="relative">
                        <button class="flex items-center space-x-3 focus:outline-none">
                            <div class="relative w-10 h-10">
                                <div
                                    class="absolute inset-0 bg-green-200 dark:bg-green-700 rounded-full blur-[2px] group-hover:bg-green-300 dark:group-hover:bg-green-600 transition-colors duration-300">
                                </div>
                                <img src="https://ui-avatars.com/api/?name=John+Doe&background=16a34a&color=fff&font-family=Poppins"
                                    alt="User"
                                    class="relative w-10 h-10 rounded-full border-2 border-white dark:border-gray-700">
                            </div>
                            <div class="hidden md:block text-left">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">John Doe</h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Student</p>
                            </div>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="p-4 md:p-6">
                <!-- Welcome Box -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl p-5 md:p-8 shadow-lg relative overflow-hidden card-shine">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-green-50/90 dark:from-green-900/30 via-white/30 dark:via-gray-800/50 to-transparent">
                    </div>

                    <!-- Decorative elements -->
                    <div
                        class="absolute top-0 right-0 w-72 h-72 bg-green-200/30 dark:bg-green-900/30 rounded-full blur-3xl float">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 w-64 h-64 bg-blue-200/20 dark:bg-blue-900/20 rounded-full blur-3xl">
                    </div>

                    <!-- Abstract shapes -->
                    <div
                        class="absolute right-20 top-16 w-16 h-16 bg-green-400/10 dark:bg-green-500/10 rounded-full hidden md:block">
                    </div>
                    <div
                        class="absolute left-24 bottom-8 w-12 h-12 bg-blue-400/10 dark:bg-blue-500/10 rounded-full hidden md:block">
                    </div>
                    <div
                        class="absolute right-48 bottom-12 w-8 h-8 bg-green-300/20 dark:bg-green-600/20 rounded-full hidden md:block">
                    </div>

                    <div class="relative z-10">
                        <div class="flex flex-col md:flex-row items-start md:items-center gap-4 md:gap-6">
                            <div class="relative">
                                <div
                                    class="absolute inset-0 bg-gradient-to-br from-green-400 to-blue-500 dark:from-green-500 dark:to-blue-600 rounded-xl md:rounded-2xl transform rotate-6 transition-transform duration-500 hover:rotate-12 hover:scale-105">
                                </div>
                                <img src="https://ui-avatars.com/api/?name=John+Doe&background=16a34a&color=fff&bold=true&font-family=Poppins&size=128"
                                    alt="User"
                                    class="relative w-16 h-16 md:w-20 md:h-20 rounded-xl md:rounded-2xl shadow-lg">
                            </div>

                            <div>
                                <div class="flex items-center flex-wrap gap-2">
                                    <h1
                                        class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                                        Welcome back, <span class="gradient-text">John Doe!</span>
                                    </h1>
                                    <div class="p-1 bg-green-100 dark:bg-green-900/40 rounded-full">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-green-500 dark:text-green-400"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 mt-2 text-base md:text-lg">
                                    It's good to see you again. Ready to continue your learning journey?
                                </p>
                                <div
                                    class="mt-2 flex items-center text-xs md:text-sm text-gray-400 dark:text-gray-500">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Last login: Today, 09:45 AM
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 md:mt-8 flex flex-col sm:flex-row flex-wrap gap-3 md:gap-4">
                            <button
                                class="px-4 md:px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 dark:from-green-600 dark:to-green-700 text-white rounded-lg hover:from-green-600 hover:to-green-700 dark:hover:from-green-700 dark:hover:to-green-800 transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center md:justify-start gap-2 transform hover:translate-y-[-2px] w-full sm:w-auto">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span>Continue Learning</span>
                            </button>

                            <button
                                class="px-4 md:px-6 py-3 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-300 shadow-sm hover:shadow flex items-center justify-center md:justify-start gap-2 transform hover:translate-y-[-2px] w-full sm:w-auto">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                                <span>Browse Courses</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Dark mode toggle functionality
        const darkModeToggle = document.getElementById('darkModeToggle');
        const html = document.documentElement;

        // Check for saved theme preference or use system preference
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }

        // Toggle dark mode
        darkModeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');

            // Save preference to localStorage
            if (html.classList.contains('dark')) {
                localStorage.theme = 'dark';
            } else {
                localStorage.theme = 'light';
            }
        });

        // Mobile menu functionality
        const sidebar = document.getElementById('sidebar');
        const menuOverlay = document.getElementById('menuOverlay');
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const closeSidebar = document.getElementById('closeSidebar');

        function openSidebar() {
            sidebar.classList.add('sidebar-slide-in');
            sidebar.classList.remove('-translate-x-full', 'sidebar-slide-out');
            menuOverlay.classList.remove('hidden');
            setTimeout(() => {
                menuOverlay.classList.remove('opacity-0');
            }, 10);
        }

        function closeSidebarMenu() {
            sidebar.classList.add('sidebar-slide-out');
            sidebar.classList.remove('sidebar-slide-in');
            menuOverlay.classList.add('opacity-0');
            setTimeout(() => {
                sidebar.classList.add('-translate-x-full');
                menuOverlay.classList.add('hidden');
            }, 300);
        }

        mobileMenuToggle.addEventListener('click', openSidebar);
        closeSidebar.addEventListener('click', closeSidebarMenu);
        menuOverlay.addEventListener('click', closeSidebarMenu);

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('sidebar-slide-in', 'sidebar-slide-out', '-translate-x-full');
                menuOverlay.classList.add('hidden');
            } else if (!sidebar.classList.contains('sidebar-slide-in')) {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
</body>

</html>
