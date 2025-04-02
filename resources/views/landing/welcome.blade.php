@extends('layout.master')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-b from-blue-50 to-white py-16 md:py-24">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-2/3">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Conectando necesidades médicas con donantes solidarios
                </h1>
                <p class="text-xl text-gray-600 mb-8">
                    ImpulsaLATAM facilita la donación directa de insumos, equipamiento y servicios médicos, conectando a personas con necesidades específicas con donantes en toda Latinoamérica.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-rose-400 hover:bg-rose-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-300 transition">
                        Explorar Casos
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-300 transition">
                        Crear Solicitud
                    </a>
                </div>
            </div>
            <div class="md:w-1/3">
                <div class="relative">
                    <div class="absolute inset-0 bg-blue-100 rounded-lg transform rotate-3"></div>
                    <div class="absolute inset-0 bg-teal-100 rounded-lg transform -rotate-3 opacity-70"></div>
                    <img src="{{ asset('img/logo.png') }}" alt="ImpulsaLATAM.org" class="relative rounded-lg shadow-lg w-full object-contain">
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="container mx-auto px-4 mt-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="text-3xl font-bold text-blue-600">950+</div>
                <div class="text-gray-600 mt-2">Solicitudes atendidas</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="text-3xl font-bold text-teal-500">12</div>
                <div class="text-gray-600 mt-2">Países en Latinoamérica</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="text-3xl font-bold text-purple-600">2,800+</div>
                <div class="text-gray-600 mt-2">Donantes activos</div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">¿Cómo funciona?</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Impulsa LATAM facilita un proceso transparente desde la solicitud hasta la recepción de donaciones médicas.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- First row: 3 cards -->
            <!-- Step 1 -->
            <div class="bg-blue-50 rounded-xl p-6 relative shadow-md hover:shadow-lg transition duration-300">
                <div class="absolute -top-4 -left-4 w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-lg">1</div>
                <div class="h-32 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Crear un caso</h3>
                <p class="text-gray-600">
                    Describe tus necesidades médicas y sube evidencia de documentación médica que verifique tu solicitud.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="bg-teal-50 rounded-xl p-6 relative shadow-md hover:shadow-lg transition duration-300">
                <div class="absolute -top-4 -left-4 w-12 h-12 rounded-full bg-teal-600 flex items-center justify-center text-white font-bold text-lg">2</div>
                <div class="h-32 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Donantes te encuentran</h3>
                <p class="text-gray-600">
                    Los casos verificados aparecen en nuestra plataforma donde donantes potenciales pueden encontrarlos.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="bg-purple-50 rounded-xl p-6 relative shadow-md hover:shadow-lg transition duration-300">
                <div class="absolute -top-4 -left-4 w-12 h-12 rounded-full bg-purple-600 flex items-center justify-center text-white font-bold text-lg">3</div>
                <div class="h-32 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Apoyo directo</h3>
                <p class="text-gray-600">
                    Los donantes se contactan directamente contigo para coordinar la donación de insumos o servicios.
                </p>
            </div>
        </div>

        <!-- Second row: 2 cards centered -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <!-- Step 4 -->
            <div class="bg-indigo-50 rounded-xl p-6 relative shadow-md hover:shadow-lg transition duration-300">
                <div class="absolute -top-4 -left-4 w-12 h-12 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold text-lg">4</div>
                <div class="h-32 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Verificar recibo</h3>
                <p class="text-gray-600">
                    Los donantes pueden subir recibos de las donaciones para actualizar el progreso de cumplimiento del caso.
                </p>
            </div>

            <!-- Step 5 -->
            <div class="bg-pink-50 rounded-xl p-6 relative shadow-md hover:shadow-lg transition duration-300">
                <div class="absolute -top-4 -left-4 w-12 h-12 rounded-full bg-pink-600 flex items-center justify-center text-white font-bold text-lg">5</div>
                <div class="h-32 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Aprobación</h3>
                <p class="text-gray-600">
                    Cuando se alcanzan los objetivos de donación, el caso se cierra automáticamente y se actualiza el impacto.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Cases Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Casos Destacados</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Estas son algunas solicitudes activas que necesitan tu apoyo.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Case 1 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                <div class="relative h-48 bg-blue-100">
                    <div class="absolute top-4 right-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">URGENTE</div>
                    <img src="https://images.unsplash.com/photo-1581056771107-24ca5f033842?q=80&w=2070" class="w-full h-full object-cover" alt="Medicamentos para tratamiento">
                </div>
                <div class="p-6">
                    <span class="inline-block text-xs font-semibold text-blue-600 bg-blue-100 px-2 py-1 rounded mb-3">Medicamentos</span>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Tratamiento para paciente con lupus</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        María necesita medicamentos específicos para su tratamiento de lupus durante los próximos 6 meses.
                    </p>

                    <div class="mb-4">
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-600">Progreso</span>
                            <span class="font-medium text-blue-600">45%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm text-gray-500">Lima, Perú</span>
                        </div>
                        <a href="#" class="text-blue-600 text-sm font-medium hover:underline">Ver detalles</a>
                    </div>
                </div>
            </div>

            <!-- Case 2 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                <div class="relative h-48 bg-teal-100">
                    <img src="https://images.unsplash.com/photo-1516841273335-e39b37888115?q=80&w=2070" class="w-full h-full object-cover" alt="Equipo médico">
                </div>
                <div class="p-6">
                    <span class="inline-block text-xs font-semibold text-teal-600 bg-teal-100 px-2 py-1 rounded mb-3">Equipamiento</span>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Silla de ruedas adaptada para niño</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        Carlos, de 8 años, necesita una silla de ruedas adaptada para continuar con sus actividades y rehabilitación.
                    </p>

                    <div class="mb-4">
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-600">Progreso</span>
                            <span class="font-medium text-teal-600">70%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-teal-600 h-2.5 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm text-gray-500">Bogotá, Colombia</span>
                        </div>
                        <a href="#" class="text-teal-600 text-sm font-medium hover:underline">Ver detalles</a>
                    </div>
                </div>
            </div>

            <!-- Case 3 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                <div class="relative h-48 bg-purple-100">
                    <img src="https://images.unsplash.com/photo-1631815588090-d4bfec5b9882?q=80&w=2067" class="w-full h-full object-cover" alt="Tratamiento médico">
                </div>
                <div class="p-6">
                    <span class="inline-block text-xs font-semibold text-purple-600 bg-purple-100 px-2 py-1 rounded mb-3">Servicios</span>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Terapia de rehabilitación post-accidente</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        Alberto necesita 20 sesiones de terapia física para recuperar la movilidad después de un accidente.
                    </p>

                    <div class="mb-4">
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-600">Progreso</span>
                            <span class="font-medium text-purple-600">25%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-purple-600 h-2.5 rounded-full" style="width: 25%"></div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm text-gray-500">Ciudad de México, México</span>
                        </div>
                        <a href="#" class="text-purple-600 text-sm font-medium hover:underline">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-10">
            <a href="#" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-rose-400 hover:bg-rose-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-300 transition">
                Ver todos los casos
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Lo que opina la comunidad</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Historias reales de personas que han experimentado el impacto de Impulsa LATAM.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-gray-50 p-8 rounded-xl relative">
                <div class="absolute -top-5 left-8 text-5xl text-blue-500">"</div>
                <p class="text-gray-600 mb-6 italic relative z-10">
                    Gracias a Impulsa LATAM, pudimos conseguir los medicamentos que mi hijo necesitaba para su tratamiento. La plataforma facilitó todo el proceso y conectamos con donantes increíbles.
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                        <span class="text-blue-600 font-bold">LM</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Laura Martínez</h4>
                        <p class="text-sm text-gray-500">Beneficiaria, Argentina</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-gray-50 p-8 rounded-xl relative">
                <div class="absolute -top-5 left-8 text-5xl text-teal-500">"</div>
                <p class="text-gray-600 mb-6 italic relative z-10">
                    Como donante, puedo ver exactamente cómo mi contribución ayuda a las personas. La transparencia de la plataforma me da tranquilidad y me mantiene motivado para seguir apoyando.
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center mr-4">
                        <span class="text-teal-600 font-bold">RV</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Roberto Vega</h4>
                        <p class="text-sm text-gray-500">Donante, Chile</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-gray-50 p-8 rounded-xl relative">
                <div class="absolute -top-5 left-8 text-5xl text-purple-500">"</div>
                <p class="text-gray-600 mb-6 italic relative z-10">
                    Nuestra clínica comunitaria ha podido recibir equipamiento médico esencial gracias a la red de donantes en Impulsa LATAM. Ha transformado nuestra capacidad de servir a nuestra comunidad.
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                        <span class="text-purple-600 font-bold">CS</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Dra. Carmen Santos</h4>
                        <p class="text-sm text-gray-500">Clínica Comunitaria, Colombia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
