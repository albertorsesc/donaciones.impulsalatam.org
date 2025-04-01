@extends('landing.layout.master')

@section('content')
<!-- Hero Section with Mission Statement -->
<section class="bg-gradient-to-b from-blue-50 to-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Nuestra Misión</h1>
            <div class="w-24 h-1 bg-blue-600 mx-auto mb-8"></div>
            <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                En <span class="text-blue-600 text-xl font-bold">Impulsa<span class="text-teal-500">LATAM</span></span>:
                <span class="text-rose-400 text-lg font-bold">Donaciones</span>, conectamos las necesidades médicas críticas con donantes solidarios a lo largo de Latinoamérica,
                facilitando la donación directa de insumos, equipamiento y servicios médicos para mejorar el acceso a la salud
                cuando más se necesita.
            </p>
            <div class="flex flex-wrap justify-center gap-4 mt-8">
                <div class="bg-white p-4 rounded-lg shadow-md flex items-center w-full sm:w-[calc(50%-1rem)] lg:w-40">
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
                <div class="bg-white p-4 rounded-lg shadow-md flex items-center w-full sm:w-[calc(50%-1rem)] lg:w-40">
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
                <div class="bg-white p-4 rounded-lg shadow-md flex items-center w-full sm:w-[calc(50%-1rem)] lg:w-40">
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
                        <span class="text-blue-600 text-base font-bold">Impulsa<span class="text-teal-500">LATAM</span></span>:
                        <span class="text-rose-400 text-base font-bold">Donaciones</span>
                        surge al observar las urgentes necesidades diarias de personas que
                        enfrentan barreras para acceder a la atención médica adecuada. Los hospitales a lo largo de
                        América Latina afrontan una severa escasez de recursos médicos que impacta a millones de personas
                        en toda la región.
                    </p>
                    <p class="text-gray-600 mb-4">
                        La visión es convertir a <span class="text-blue-600 text-base font-bold">Impulsa<span class="text-teal-500">LATAM</span></span>
                        en una iniciativa que unifique esfuerzos para
                        resolver nuestros propios desafíos a través de la colaboración entre personas con y sin
                        formación técnica, el sector privado y organizaciones, trabajando juntos para apoyar a quienes
                        más lo necesitan.
                    </p>
                    <p class="text-gray-600">
                        La misión de <span class="text-blue-600 text-base font-bold">Impulsa<span class="text-teal-500">LATAM</span></span>:
                        <span class="text-rose-400 text-base font-bold">Donaciones</span>
                        es crear un ecosistema de apoyo médico transparente, donde las
                        donaciones lleguen DIRECTAMENTE a sus destinatarios, eliminando intermediarios y
                        costos administrativos. Esta plataforma está diseñada para garantizar credibilidad y
                        transparencia en cada fase del proceso, funcionando exclusivamente como un puente entre
                        solicitantes y donantes, sin ningún tipo de intervención en las donaciones.
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
@endsection