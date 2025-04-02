<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Impulsa LATAM | ImpulsaLatam.org</title>
        <meta name="description" content="Plataforma de donaciones directas de insumos médicos en Latinoamérica">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700|instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                /* TailwindCSS styles */
            </style>
        @endif
    </head>
    <body class="bg-gray-50 text-gray-800 min-h-screen">
        <!-- Header/Navbar -->
        @include('landing.header')

        @yield('content')

        <!-- Footer -->
        @include('landing.footer')
    </body>
</html>
