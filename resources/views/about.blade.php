<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Acerca de | Impulsa LATAM</title>
        <meta name="description" content="Conoce más sobre la plataforma de donaciones directas de insumos médicos en Latinoamérica">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700|instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                /* Paste minimal TailwindCSS here */
                @layer base {
                    body {font-family: 'Figtree', sans-serif;}
                }
            </style>
        @endif
    </head>
    <body class="bg-gray-50 text-gray-800 min-h-screen">
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
                    <a href="{{ url('/') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition">Inicio</a>
                    <a href="#" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition">Explorar Casos</a>
                    <a href="#" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition">Crear Solicitud</a>
                    <a href="{{ route('about') }}" class="px-3 py-2 rounded-md text-sm font-medium bg-gray-100 text-blue-600 transition">Acerca de</a>

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

        <!-- Hero Section with Mission Statement -->
        <section class="bg-gradient-to-b from-blue-50 to-white py-20">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto text-center">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Nuestra Misión</h1>
                    <div class="w-24 h-1 bg-blue-600 mx-auto mb-8"></div>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                        En Impulsa LATAM, conectamos las necesidades médicas críticas con donantes comprometidos a lo largo de Latinoamérica,
                        facilitando la donación directa de insumos, equipamiento y servicios médicos para mejorar el acceso a la salud
                        cuando más se necesita.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4 mt-8">
                        <div class="bg-white p-4 rounded-lg shadow-md flex items-center w-40">
                            <div class="bg-blue-100 p-3 rounded-full mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <span class="block text-sm text-gray-500">Casos Ayudados</span>
                                <span class="font-bold text-blue-600">950+</span>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md flex items-center w-40">
                            <div class="bg-teal-100 p-3 rounded-full mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <span class="block text-sm text-gray-500">Países</span>
                                <span class="font-bold text-teal-600">12</span>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md flex items-center w-40">
                            <div class="bg-purple-100 p-3 rounded-full mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <span class="block text-sm text-gray-500">Donantes</span>
                                <span class="font-bold text-purple-600">2,800+</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Us Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-5xl mx-auto">
                    <div class="flex flex-col md:flex-row items-center gap-12 mb-16">
                        <div class="md:w-1/2">
                            <h2 class="text-3xl font-bold text-gray-900 mb-6">Nuestra Historia</h2>
                            <p class="text-gray-600 mb-4">
                                Impulsa LATAM nació en 2020 como respuesta a la crisis sanitaria que afectó a Latinoamérica,
                                cuando observamos cómo las necesidades médicas urgentes no encontraban soluciones rápidas y
                                efectivas debido a la burocracia y la falta de canales directos.
                            </p>
                            <p class="text-gray-600 mb-4">
                                Lo que comenzó como un pequeño proyecto para conectar donantes con pacientes necesitados en
                                Ciudad de México se ha convertido en una plataforma regional que ha ayudado a miles de personas
                                en 12 países de Latinoamérica.
                            </p>
                            <p class="text-gray-600">
                                Nuestra misión es crear un ecosistema de apoyo médico transparente, donde las donaciones lleguen
                                directamente a quienes las necesitan sin intermediarios ni costos administrativos excesivos.
                            </p>
                        </div>
                        <div class="md:w-1/2 mt-8 md:mt-0">
                            <div class="relative">
                                <div class="absolute inset-0 bg-blue-100 rounded-lg transform rotate-3"></div>
                                <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?q=80&w=2070" alt="Equipo de Impulsa LATAM" class="relative rounded-lg shadow-lg w-full">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row-reverse items-center gap-12">
                        <div class="md:w-1/2">
                            <h2 class="text-3xl font-bold text-gray-900 mb-6">Nuestros Valores</h2>
                            <div class="space-y-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-xl font-bold text-gray-900">Transparencia</h3>
                                        <p class="text-gray-600">Cada donación es rastreable y verificable, permitiendo a donantes y receptores seguir todo el proceso.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 h-10 w-10 bg-teal-100 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-xl font-bold text-gray-900">Comunidad</h3>
                                        <p class="text-gray-600">Creemos en el poder de la conexión directa entre personas, construyendo redes de apoyo duraderas.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 h-10 w-10 bg-purple-100 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-xl font-bold text-gray-900">Confianza</h3>
                                        <p class="text-gray-600">Nuestro sistema de verificación garantiza que los recursos lleguen a quienes realmente los necesitan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-1/2 mt-8 md:mt-0">
                            <div class="relative">
                                <div class="absolute inset-0 bg-teal-100 rounded-lg transform -rotate-3"></div>
                                <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?q=80&w=2070" alt="Trabajo comunitario" class="relative rounded-lg shadow-lg w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team section will be added next -->

    </body>
</html>