<script setup>
import {onMounted, ref} from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import TextInput from "@/Components/TextInput.vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import {useForm, usePage} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    title: '',
    description: '',
    patient_relation: '',
    medical_condition: '',
    urgency_level: '',
    total_estimated_cost: '',
    total_donated_amount: '0',
    expired_at: '',
});

const formSubmitted = ref(false);

const page = usePage();

onMounted(() => {
    const flash = page.props.flash || {};
    if (flash.success) {
        formSubmitted.value = true;
        setTimeout(() => {
            formSubmitted.value = false;
        }, 2000);
    }
});

const patientRelationOptions = [
    { value: 'self', text: 'Yo mismo' },
    { value: 'family', text: 'Familiar' },
    { value: 'friend', text: 'Amigo' },
    { value: 'other', text: 'Otro' },
];

const urgencyLevelOptions = [
    { value: 'low', text: 'Baja' },
    { value: 'medium', text: 'Media' },
    { value: 'high', text: 'Alta' },
    { value: 'urgent', text: 'Urgente' },
];

const submit = () => {
    form.clearErrors();

    form.post(route('medical-cases.store'));
};
</script>

<template>
    <AppLayout title="Crear Caso Médico">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Caso Médico
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-6">
                    <form @submit.prevent="submit">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Información del Caso</h3>

                            <!-- Title -->
                            <div class="mb-4">
                                <InputLabel for="title" value="Título del caso" />
                                <TextInput
                                    id="title"
                                    v-model="form.title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <InputError :message="form.errors.title" class="mt-2" />
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <InputLabel for="description" value="Descripción del caso" />
                                <textarea
                                    id="description"
                                    v-model="form.description"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    rows="4"
                                    required
                                ></textarea>
                                <InputError :message="form.errors.description" class="mt-2" />
                            </div>

                            <!-- Patient Relation -->
                            <div class="mb-4">
                                <InputLabel for="patient_relation" value="Relación con el paciente" />
                                <select
                                    id="patient_relation"
                                    v-model="form.patient_relation"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    required
                                >
                                    <option value="" disabled>Selecciona una opción</option>
                                    <option v-for="option in patientRelationOptions" :key="option.value" :value="option.value">
                                        {{ option.text }}
                                    </option>
                                </select>
                                <InputError :message="form.errors.patient_relation" class="mt-2" />
                            </div>

                            <!-- Medical Condition -->
                            <div class="mb-4">
                                <InputLabel for="medical_condition" value="Condición médica" />
                                <TextInput
                                    id="medical_condition"
                                    v-model="form.medical_condition"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <InputError :message="form.errors.medical_condition" class="mt-2" />
                            </div>

                            <!-- Urgency Level -->
                            <div class="mb-4">
                                <InputLabel for="urgency_level" value="Nivel de urgencia" />
                                <select
                                    id="urgency_level"
                                    v-model="form.urgency_level"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    required
                                >
                                    <option value="" disabled>Selecciona una opción</option>
                                    <option v-for="option in urgencyLevelOptions" :key="option.value" :value="option.value">
                                        {{ option.text }}
                                    </option>
                                </select>
                                <InputError :message="form.errors.urgency_level" class="mt-2" />
                            </div>

                            <!-- Total Estimated Cost -->
                            <div class="mb-4">
                                <InputLabel for="total_estimated_cost" value="Costo total estimado" />
                                <TextInput
                                    id="total_estimated_cost"
                                    v-model="form.total_estimated_cost"
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <InputError :message="form.errors.total_estimated_cost" class="mt-2" />
                            </div>

                            <!-- Expiration Date -->
                            <div class="mb-4">
                                <InputLabel for="expired_at" value="Fecha límite de recaudación" />
                                <TextInput
                                    id="expired_at"
                                    v-model="form.expired_at"
                                    type="date"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <InputError :message="form.errors.expired_at" class="mt-2" />
                            </div>

                            <!-- Form Actions -->
                            <div class="flex items-center justify-end pt-6 border-t border-gray-200">
                                <ActionMessage :on="formSubmitted" class="mr-3">
                                    ¡Caso médico registrado exitosamente!
                                </ActionMessage>

                                <PrimaryButton
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                    type="submit"
                                >
                                    Registrar Caso
                                </PrimaryButton>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
