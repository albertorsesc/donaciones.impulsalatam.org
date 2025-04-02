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
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-6">
                </div>
            </div>
        </div>
    </AppLayout>
</template>
