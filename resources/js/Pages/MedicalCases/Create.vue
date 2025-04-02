<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import TextInput from "@/Components/TextInput.vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import { ExclamationCircleIcon } from '@heroicons/vue/24/solid';
import { useForm } from "@inertiajs/vue3";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    name: '',
    email: '',
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Caso Médico
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <FormSection>
                        <template #title>
                            Registro de Caso Médico
                        </template>

                        <template #description>
                            <div class="mt-4 bg-gray-50 p-4 rounded-md">
                                <p class="my-1 text-sm text-gray-500 font-medium">
                                    &bull; Asegurate de subir las evidencias necesarias para corroborar el caso médico.
                                </p>
                                <p class="my-1 text-sm text-gray-500 font-medium">
                                    &bull; De igual forma, asegurate de que la información proporcionada sea verídica.
                                </p>
                                <p class="my-1 text-sm text-gray-500 font-medium">
                                    &bull; De otra forma, tu cuenta podría ser suspendida por intento de fraude.
                                </p>
                            </div>

                            <p class="mt-2 bg-yellow-50 text-gray-800 p-4 rounded-md">
                                <ExclamationCircleIcon class="h-5 w-5 text-yellow-400 inline-block" />
                                Hay personas que realmente necesitan ayuda, no hagas que tu caso sea un obstáculo para ellos.
                            </p>
                        </template>

                        <template #form>
                            <!-- Name -->
                            <div class="col-span-6 sm:col-span-4">
                                <InputLabel for="name" value="Name" />
                                <TextInput
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autocomplete="name"
                                />
<!--                                <InputError :message="form.errors.name" class="mt-2" />-->
                            </div>

                            <!-- Email -->
                            <div class="col-span-6 sm:col-span-4">
                                <InputLabel for="email" value="Email" />
                                <TextInput
                                    id="email"
                                    type="email"
                                    class="mt-1 block w-full"
                                    required
                                    autocomplete="username"
                                />
<!--                                <InputError :message="form.errors.email" class="mt-2" />-->
                            </div>
                        </template>

                        <template #actions>
                            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                                Saved.
                            </ActionMessage>

                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Save
                            </PrimaryButton>
                        </template>
                    </FormSection>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
