<script setup>

import {ExclamationCircleIcon} from "@heroicons/vue/24/solid/index.js";
import Vue3Dropzone from "@jaxtheprime/vue3-dropzone";
import '@jaxtheprime/vue3-dropzone/dist/style.css'
import InputError from "@/Components/InputError.vue";
import {ref} from "vue";

const uploadedFiles = ref([]);
const files = ref([]); // For v-model with Vue3Dropzone
const previews = ref([]); // For preview images/files

// List of already uploaded documents (for edit mode)
const uploadedDocuments = ref([]);

// Dropzone configuration properties
const multiple = true;
const maxFileSize = 20; // 20MB
const maxFiles = 5; // Limit to 5 files
const accept = '.pdf,.jpg,.jpeg,.png';

// Handle file uploaded event from Vue3Dropzone
const handleFileUploaded = (file) => {
    // Prevent more than 5 files
    if (uploadedFiles.value.length >= 5) {
        alert('Máximo 5 documentos permitidos');
        return;
    }

    // Make sure file.file exists
    if (!file || !file.file) {
        console.error('Invalid file object received:', file);
        return;
    }

    // Check file type
    const acceptedTypes = [
        'application/pdf',
        'image/jpeg',
        'image/jpg',
        'image/png'
    ];

    if (!acceptedTypes.includes(file.file.type)) {
        alert('Tipo de archivo no permitido. Solo se aceptan PDF, JPG y PNG.');
        return;
    }

    // Check file size (20MB max)
    if (file.file.size > 20 * 1024 * 1024) {
        alert('El archivo es demasiado grande. El tamaño máximo es 20MB.');
        return;
    }

    // Add file to our tracked array with metadata
    uploadedFiles.value.push({
        file: file.file,
        is_public: false,
        id: file.id,
        src: file.src
    });

    // Add to previews if it's an image
    if (file.file.type.startsWith('image/')) {
        previews.value.push({
            id: file.id,
            src: file.src
        });
    }

    // Clear any previous document error
    if (form.errors.documents) {
        form.clearErrors('documents');
    }
};

// Handle file removed from dropzone
const handleFileRemoved = (file) => {
    // Ensure file object is valid
    if (!file || !file.id) {
        console.error('Invalid file object in handleFileRemoved:', file);
        return;
    }

    // Remove from uploadedFiles array
    const index = uploadedFiles.value.findIndex(item => item.id === file.id);
    if (index !== -1) {
        uploadedFiles.value.splice(index, 1);

        // Also remove from form data arrays
        updateFormFiles();
    }

    // Remove from previews array
    const previewIndex = previews.value.findIndex(preview => preview.id === file.id);
    if (previewIndex !== -1) {
        previews.value.splice(previewIndex, 1);
    }
};

// Handle error event from Vue3Dropzone
const handleError = (error) => {
    console.error('Dropzone error:', error);

    // Handle different error formats
    if (Array.isArray(error)) {
        // If error is an array of files
        const fileNames = error.map(file => {
            // Check if file is a File object or has a name property
            return file.name || (file.file && file.file.name) || 'Unknown file';
        }).join(', ');

        alert(`No se pudieron procesar los siguientes archivos: ${fileNames}`);

        // Manually process these files if needed
        error.forEach(file => {
            if (file instanceof File) {
                // If the error object contains direct File objects
                const fileData = {
                    file: file,
                    id: Date.now() + Math.random().toString(36).substring(2, 9),
                    src: file.type.startsWith('image/') ? URL.createObjectURL(file) : null
                };

                handleFileUploaded(fileData);
            }
        });

        return;
    }

    if (error && error.type) {
        if (error.type === 'file-too-large') {
            alert(`Los siguientes archivos son demasiado grandes: ${error.files.map(file => file.name).join(', ')}`);
        } else if (error.type === 'invalid-file-format') {
            alert(`Los siguientes archivos no tienen un formato permitido: ${error.files.map(file => file.name).join(', ')}`);
        } else if (error.type === 'max-files-exceeded') {
            alert('No puedes subir más de 5 archivos.');
        }
    } else {
        // Generic error
        alert('Error al procesar los archivos');
    }
};

// Update form data with current uploaded files
const updateFormFiles = () => {
    // Reset form arrays
    form.documents = [];
    form.document_is_public = [];

    // Make sure uploadedFiles has entries for all files
    while (uploadedFiles.value.length < files.value.length) {
        const index = uploadedFiles.value.length;
        uploadedFiles.value.push({
            file: files.value[index],
            is_public: false
        });
    }

    // Update with current uploadedFiles data
    uploadedFiles.value.forEach(item => {
        if (item && item.file) {
            form.documents.push(item.file);
            form.document_is_public.push(item.is_public);
        }
    });
};

// Set document public status for a specific file
const setDocumentPublic = (index, isPublic) => {
    uploadedFiles.value[index].is_public = isPublic;
    updateFormFiles();
};

// Validate before submitting
const validateDocuments = () => {
    if (files.value.length === 0) {
        form.setError('documents', 'Debes subir al menos un documento');
        return false;
    }

    // Make sure uploadedFiles is in sync with files
    updateFormFiles();

    return true;
};

// Setup for custom preview rendering
const formatSize = (size) => {
    if (size < 1024) {
        return size + ' bytes';
    } else if (size < 1024 * 1024) {
        return (size / 1024).toFixed(2) + ' KB';
    } else {
        return (size / (1024 * 1024)).toFixed(2) + ' MB';
    }
};

// Process the document upload queue
const processDocumentQueue = () => {
    if (!uploadedDocuments.value.length) {
        alert('Por favor, crea primero el caso médico');
        return;
    }

    console.error('Esta función ya no es necesaria con la nueva implementación de Vue3Dropzone');
};

const onFileSuccess = (file, response) => {
    console.log('File uploaded successfully:', response);

    if (response?.document) {
        uploadedDocuments.value.push(response.document);
    } else {
        // Add a placeholder entry if document data is not returned
        const uploadedFile = uploadedFiles.value.find(f => f.file.name === file.name);
        uploadedDocuments.value.push({
            id: Date.now(), // Use timestamp as temporary ID
            is_public: uploadedFile?.is_public || false,
            file_name: file.name || 'Documento'
        });
    }

    setTimeout(() => {
        uploadedFiles.value = uploadedFiles.value.filter(f => f.file.name !== file.name);
    }, 2000);
};

const onFileError = (file, message) => {
    console.error('Upload error:', message);
    alert('Error al subir el archivo: ' + (message || 'Error desconocido'));
};

// Delete a document using Inertia router
const deleteDocument = (documentId) => {
    if (!confirm('¿Estás seguro de que deseas eliminar este documento?')) {
        return;
    }

    router.delete(route('medical-documents.destroy', { document: documentId }), {
        preserveScroll: true,
        onSuccess: () => {
            // Filter out the deleted document from the list
            uploadedDocuments.value = uploadedDocuments.value.filter(doc => doc.id !== documentId);
        },
        onError: (errors) => {
            alert('No se pudo eliminar el documento: ' + (errors.error || 'Error desconocido'));
        }
    });
};

// Add this new method to sync files with uploadedFiles
const processUploadedFile = (index, file, isPublic = null) => {
    // Make sure we have an entry in uploadedFiles for this file
    if (!uploadedFiles.value[index]) {
        uploadedFiles.value[index] = {
            file: file,
            is_public: false
        };
    }

    // Update is_public if provided
    if (isPublic !== null) {
        uploadedFiles.value[index].is_public = isPublic;
    }

    // Update form data
    updateFormFiles();
};

// Simplify file removal
const removeFile = (index) => {
    // Remove the file from both arrays
    files.value.splice(index, 1);
    uploadedFiles.value.splice(index, 1);

    // Update form data
    updateFormFiles();
};
</script>

<template>
    <div class="border-t pt-6 mt-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Documentos de Respaldo (Requeridos)</h3>
        <p class="mb-4 text-sm text-gray-600">
            Debes subir al menos un documento que respalde tu caso médico (máximo 5 documentos).
        </p>
        <InputError :message="form.errors.documents" class="mb-4" />

        <!-- Vue3-Dropzone -->
        <div class="mb-6">
            <Vue3Dropzone
                v-model="files"
                :multiple="true"
                :max-file-size="20"
                :max-files="5"
                :accept="'.pdf,.jpg,.jpeg,.png'"
            >
                <template #title>Subir documentos</template>
                <template #description>
                    Arrastra tus archivos aquí o haz clic para seleccionarlos. Máximo 5 archivos, 20MB cada uno.
                </template>
            </Vue3Dropzone>
        </div>

        <div v-if="files.length > 0" class="mt-4">
            <p class="mb-2 font-medium">Archivos seleccionados:</p>
            <div v-for="(file, index) in files" :key="index" class="flex items-center p-2 border rounded mb-2">
                <div v-if="file.type && file.type.startsWith('image/')" class="w-16 h-16 mr-2 overflow-hidden">
                    <img :src="URL.createObjectURL(file)" class="w-full h-full object-cover" />
                </div>
                <div v-else class="w-16 h-16 mr-2 bg-gray-100 flex items-center justify-center">
                    <ExclamationCircleIcon class="h-8 w-8 text-gray-400" />
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium">{{ file.name }}</p>
                    <p class="text-xs text-gray-500">{{ formatSize(file.size) }}</p>

                    <!-- Is Public -->
                    <div class="mt-2">
                        <label class="flex items-center">
                            <input
                                type="checkbox"
                                :checked="uploadedFiles[index]?.is_public"
                                @change="e => processUploadedFile(index, file, e.target.checked)"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            />
                            <span class="ml-2 text-sm text-gray-600">Documento público</span>
                        </label>
                    </div>
                </div>
                <button
                    type="button"
                    @click="removeFile(index)"
                    class="text-red-500 hover:text-red-700"
                >
                    Eliminar
                </button>
            </div>
        </div>

        <div v-if="form.processing">
            <div class="flex items-center">
                <p class="mr-3 text-sm text-gray-600">Subiendo archivos...</p>
                <div class="bg-gray-200 rounded-full h-2.5 w-40">
                    <div
                        class="bg-blue-600 h-2.5 rounded-full"
                        :style="{ width: form.progress ? `${form.progress.percentage}%` : '0%' }"
                    ></div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
