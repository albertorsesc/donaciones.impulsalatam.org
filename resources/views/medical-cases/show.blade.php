@extends('layout.master')

@section('title', 'Caso Médico - ' . $medicalCase->title)

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Header Section with Status Badge -->
            <div class="relative bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-8 text-white">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-2xl font-bold">{{ $medicalCase->title }}</h1>
                        <p class="mt-2 text-blue-100">Creado: {{ $medicalCase->created_at->format('d/m/Y') }}</p>
                    </div>

                    <div>
                        @php
                            $statusColors = [
                                'draft' => 'bg-gray-500',
                                'pending_review' => 'bg-yellow-500',
                                'active' => 'bg-green-500',
                                'completed' => 'bg-blue-500',
                                'rejected' => 'bg-red-500',
                            ];
                            $statusColor = $statusColors[$medicalCase->status->value] ?? 'bg-gray-500';
                        @endphp
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusColor }} text-white">
                            {{ ucfirst(str_replace('_', ' ', $medicalCase->status->value)) }}
                        </span>

                        @php
                            $urgencyColors = [
                                'low' => 'bg-blue-100 text-blue-800',
                                'medium' => 'bg-yellow-100 text-yellow-800',
                                'high' => 'bg-orange-100 text-orange-800',
                                'urgent' => 'bg-red-100 text-red-800',
                            ];
                            $urgencyColor = $urgencyColors[$medicalCase->urgency_level->value] ?? 'bg-gray-100 text-gray-800';
                        @endphp
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $urgencyColor }} mt-2">
                            Urgencia: {{ ucfirst($medicalCase->urgency_level->value) }}
                        </span>
                    </div>
                </div>

                <!-- Progress bar for funding -->
                <div class="mt-6">
                    <div class="flex justify-between text-sm mb-1">
                        <span>Progreso de financiamiento</span>
                        <span>{{ number_format(($medicalCase->total_donated_amount / max($medicalCase->total_estimated_cost, 1)) * 100, 0) }}%</span>
                    </div>
                    <div class="h-4 bg-blue-200 rounded-full overflow-hidden">
                        <div class="h-full bg-green-400 rounded-full" style="width: {{ min(($medicalCase->total_donated_amount / max($medicalCase->total_estimated_cost, 1)) * 100, 100) }}%"></div>
                    </div>
                    <div class="flex justify-between text-sm mt-1">
                        <span>{{ number_format($medicalCase->total_donated_amount, 2) }} USD recaudados</span>
                        <span>Meta: {{ number_format($medicalCase->total_estimated_cost, 2) }} USD</span>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="p-6">
                <!-- Description Section -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Descripción del caso</h2>
                    <div class="prose max-w-none">
                        <p class="text-gray-700">{{ $medicalCase->description }}</p>
                    </div>
                </div>

                <!-- Details Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-medium text-gray-900 mb-3">Información del caso</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-gray-500 w-40">Condición médica:</span>
                                <span class="font-medium text-gray-900">{{ $medicalCase->medical_condition }}</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-gray-500 w-40">Relación con paciente:</span>
                                <span class="font-medium text-gray-900">{{ ucfirst($medicalCase->patient_relation->value) }}</span>
                            </li>
                            @if($medicalCase->completed_at)
                            <li class="flex items-start">
                                <span class="text-gray-500 w-40">Completado el:</span>
                                <span class="font-medium text-gray-900">{{ $medicalCase->completed_at->format('d/m/Y') }}</span>
                            </li>
                            @endif
                            @if($medicalCase->expired_at)
                            <li class="flex items-start">
                                <span class="text-gray-500 w-40">Expira el:</span>
                                <span class="font-medium text-gray-900">{{ $medicalCase->expired_at->format('d/m/Y') }}</span>
                            </li>
                            @endif
                            @if($medicalCase->status->value === 'rejected' && $medicalCase->rejection_reason)
                            <li class="flex items-start">
                                <span class="text-gray-500 w-40">Motivo de rechazo:</span>
                                <span class="font-medium text-red-600">{{ $medicalCase->rejection_reason }}</span>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <!-- Documents Section -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Documentos médicos</h2>

                    @if($medicalCase->documents->isEmpty())
                        <div class="bg-gray-50 p-6 rounded-lg text-center">
                            <p class="text-gray-500">No hay documentos asociados a este caso médico.</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($medicalCase->documents as $document)
                                @if($document->is_public)
                                    <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                                        <div class="p-4">
                                            <div class="flex items-center gap-2 mb-2">
                                                @php
                                                    // Determine icon based on mime type
                                                    $icon = 'document-text';
                                                    if (str_contains($document->file_mime, 'image')) {
                                                        $icon = 'photograph';
                                                    } elseif (str_contains($document->file_mime, 'pdf')) {
                                                        $icon = 'document';
                                                    }
                                                @endphp
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                </svg>
                                                <span class="font-medium text-gray-900 truncate" title="{{ $document->file_name }}">
                                                    {{ $document->file_name }}
                                                </span>
                                            </div>
                                            <div class="text-sm text-gray-500 mb-3">
                                                {{ round($document->file_size / 1024) }} KB
                                            </div>

                                            @php
                                                $verificationColors = [
                                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                                    'verified' => 'bg-green-100 text-green-800',
                                                    'rejected' => 'bg-red-100 text-red-800',
                                                ];
                                                $verificationColor = $verificationColors[$document->verification_status->value] ?? 'bg-gray-100 text-gray-800';
                                            @endphp
                                            <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium {{ $verificationColor }}">
                                                {{ ucfirst($document->verification_status->value) }}
                                            </span>

                                            <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="mt-3 inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-500">
                                                <span>Ver documento</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Call to Action -->
                @if($medicalCase->status->value === 'active')
                    <div class="bg-blue-50 p-6 rounded-lg text-center">
                        <h3 class="text-lg font-semibold text-blue-800 mb-2">¿Quieres ayudar a este caso médico?</h3>
                        <p class="text-blue-600 mb-4">Tu donación puede hacer una gran diferencia en la vida de esta persona.</p>
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                            Donar ahora
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
