<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import TextInput from "@/Components/TextInput.vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
</script>

<template>
    <AppLayout title="Crear Caso Médico">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mis Casos Médicos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 mb-6">
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
                </div>
            </div>
        </div>
    </AppLayout>
</template>
