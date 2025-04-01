<!-- Header/Navbar -->
<header class="w-full bg-white shadow-sm">
    <div class="container mx-auto px-4 py-3 flex flex-col md:flex-row items-center justify-between">
        <div class="flex items-center w-full md:w-auto justify-between">
            <div class="flex items-center gap-2 max-w-[calc(100%-50px)]">
                <a href="{{ url('/') }}" class="flex items-center">
                    <span class="text-rose-500 text-2xl sm:text-3xl font-bold">Impulsa<span class="text-rose-400">LATAM</span></span>
                </a>
                <div class="text-xs text-gray-500 border-l pl-2 ml-2 border-gray-300 break-normal">
                    <span class="block">donaciones.impulsalatam.org</span>
                    <div class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>{{ $userLocation }}</span>
                    </div>
                </div>
            </div>

            <!-- Mobile menu button -->
            <button type="button" class="lg:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-rose-300" id="mobile-menu-button" aria-expanded="false">
                <span class="sr-only">Abrir menú principal</span>
                <!-- Icon when menu is closed -->
                <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" id="menu-icon-closed">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <!-- Icon when menu is open -->
                <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" id="menu-icon-open">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center justify-end space-x-2 xl:space-x-4 flex-wrap">
            <a href="{{ url('/') }}" class="px-2 xl:px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition {{ request()->is('/') ? 'bg-gray-100 text-rose-400' : '' }}">Inicio</a>
            <a href="#" class="px-2 xl:px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition">Explorar Casos</a>
            <a href="#" class="px-2 xl:px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition">Crear Solicitud</a>
            <a href="{{ route('about') }}" class="px-2 xl:px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition {{ request()->is('acerca-de') ? 'bg-gray-100 text-rose-400' : '' }}">Acerca de</a>

            <div class="flex flex-wrap items-center gap-2">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-3 xl:px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-rose-400 hover:bg-rose-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-300 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center px-3 xl:px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-300 transition">
                        Ingresar
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-flex items-center px-3 xl:px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-rose-400 hover:bg-rose-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-300 transition">
                            Registrarse
                        </a>
                    @endif
                @endauth
            @endif
            </div>
        </nav>
    </div>

    <!-- Mobile menu, show/hide based on menu state -->
    <div class="fixed inset-0 flex z-40 lg:hidden transform transition ease-in-out duration-300 -translate-x-full" id="mobile-menu">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity opacity-0" id="mobile-menu-overlay"></div>

        <!-- Slideover panel -->
        <div class="relative flex-1 flex flex-col max-w-xs w-full bg-white shadow-xl">
            <div class="pt-5 pb-4 px-4">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-rose-500 text-2xl font-bold">Impulsa<span class="text-rose-400">LATAM</span></span>
                    </div>
                    <button type="button" class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-rose-300" id="close-slideover-button">
                        <span class="sr-only">Cerrar menú</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6">
                    <nav class="flex flex-col space-y-1">
                        <a href="{{ url('/') }}" class="px-3 py-3 rounded-md text-base font-medium hover:bg-gray-100 transition {{ request()->is('/') ? 'bg-gray-100 text-rose-400' : 'text-gray-900' }}">Inicio</a>
                        <a href="#" class="px-3 py-3 rounded-md text-base font-medium hover:bg-gray-100 transition text-gray-900">Explorar Casos</a>
                        <a href="#" class="px-3 py-3 rounded-md text-base font-medium hover:bg-gray-100 transition text-gray-900">Crear Solicitud</a>
                        <a href="{{ route('about') }}" class="px-3 py-3 rounded-md text-base font-medium hover:bg-gray-100 transition {{ request()->is('acerca-de') ? 'bg-gray-100 text-rose-400' : 'text-gray-900' }}">Acerca de</a>
                    </nav>
                </div>
                <div class="mt-8 pt-4 border-t border-gray-200">
                    <div class="flex flex-col space-y-3">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="w-full flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-rose-400 hover:bg-rose-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-300 transition">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-300 transition">
                                    Ingresar
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-rose-400 hover:bg-rose-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-300 transition">
                                        Registrarse
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
        const closeSlideover = document.getElementById('close-slideover-button');
        const menuIconClosed = document.getElementById('menu-icon-closed');
        const menuIconOpen = document.getElementById('menu-icon-open');

        function openMenu() {
            // Show slideover
            mobileMenu.classList.remove('-translate-x-full');
            mobileMenu.classList.add('translate-x-0');

            // Show overlay
            mobileMenuOverlay.classList.remove('opacity-0');
            mobileMenuOverlay.classList.add('opacity-100');

            // Change icon
            menuIconClosed.classList.add('hidden');
            menuIconOpen.classList.remove('hidden');

            // Set aria-expanded
            mobileMenuButton.setAttribute('aria-expanded', 'true');

            // Prevent body scroll
            document.body.style.overflow = 'hidden';
        }

        function closeMenu() {
            // Hide slideover
            mobileMenu.classList.remove('translate-x-0');
            mobileMenu.classList.add('-translate-x-full');

            // Hide overlay
            mobileMenuOverlay.classList.remove('opacity-100');
            mobileMenuOverlay.classList.add('opacity-0');

            // Change icon
            menuIconOpen.classList.add('hidden');
            menuIconClosed.classList.remove('hidden');

            // Set aria-expanded
            mobileMenuButton.setAttribute('aria-expanded', 'false');

            // Allow body scroll
            document.body.style.overflow = 'auto';
        }

        mobileMenuButton.addEventListener('click', function() {
            if (mobileMenuButton.getAttribute('aria-expanded') === 'false') {
                openMenu();
            } else {
                closeMenu();
            }
        });

        closeSlideover.addEventListener('click', closeMenu);
        mobileMenuOverlay.addEventListener('click', closeMenu);

        // Close menu when the screen size becomes larger than lg breakpoint
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) { // 1024px is the lg breakpoint in Tailwind
                closeMenu();
            }
        });
    });
</script>