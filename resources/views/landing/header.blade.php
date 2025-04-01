<!-- Header/Navbar -->
<header class="w-full bg-white shadow-sm">
    <div class="container mx-auto px-4 py-3 flex flex-col md:flex-row items-center justify-between">
        <div class="flex items-center gap-2 mb-4 md:mb-0">
            <a href="{{ url('/') }}" class="flex items-center">
                <span class="text-blue-600 text-3xl font-bold">Impulsa<span class="text-teal-500">LATAM</span></span>
            </a>
            <div class="text-xs text-gray-500 border-l pl-2 ml-2 border-gray-300">
                <span>donaciones.impulsalatam.org</span>
                <div class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Ciudad de México, México</span>
                </div>
            </div>
        </div>

        <nav class="flex items-center space-x-1 md:space-x-4">
            <a href="{{ url('/') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition {{ request()->is('/') ? 'bg-gray-100 text-blue-600' : '' }}">Inicio</a>
            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition">Explorar Casos</a>
            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition">Crear Solicitud</a>
            <a href="{{ route('about') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition {{ request()->is('acerca-de') ? 'bg-gray-100 text-blue-600' : '' }}">Acerca de</a>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="ml-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="ml-2 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                        Ingresar
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                            Registrarse
                        </a>
                    @endif
                @endauth
            @endif
        </nav>
    </div>
</header>