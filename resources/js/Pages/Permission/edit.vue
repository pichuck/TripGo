<template>
    <DashboardLayout>
        <!-- Back Button -->
        <div class="mb-4 flex justify-end">
            <a
                href="/admin/permission"
                class="border-1 rounded-full border-black px-4 py-2 text-black"
            >
                Back
            </a>
        </div>

        <!-- Edit Permission Form -->
        <div class="container mx-auto">
            <div class="card mx-auto w-full max-w-lg rounded-lg bg-white p-6">
                <div class="card-header mb-6 flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Edit Permission</h2>
                </div>

                <div class="card-body">
                    <form @submit.prevent="submitForm">
                        <!-- Name Field -->
                        <div class="mb-4">
                            <label
                                for="name"
                                class="mb-2 block text-sm text-gray-400"
                                >Name</label
                            >
                            <input
                                id="name"
                                v-model="form.name"
                                type="text"
                                class="block w-full rounded-sm border-gray-200 px-4 py-3 text-sm focus:border-blue-600 focus:ring-0"
                                required
                            />
                        </div>

                        <!-- Display Name Field -->
                        <div class="mb-4">
                            <label
                                for="display_name"
                                class="mb-2 block text-sm text-gray-400"
                                >Display Name</label
                            >
                            <input
                                id="display_name"
                                v-model="form.display_name"
                                type="text"
                                class="block w-full rounded-sm border-gray-200 px-4 py-3 text-sm focus:border-blue-600 focus:ring-0"
                                required
                            />
                        </div>

                        <!-- Description Field -->
                        <div class="mb-4">
                            <label
                                for="description"
                                class="mb-2 block text-sm text-gray-400"
                                >Description</label
                            >
                            <input
                                id="description"
                                v-model="form.description"
                                type="text"
                                class="block w-full rounded-sm border-gray-200 px-4 py-3 text-sm focus:border-blue-600 focus:ring-0"
                                required
                            />
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-6 flex justify-end">
                            <button
                                type="submit"
                                class="border-1 rounded-full border-black px-4 py-2 text-black"
                            >
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>

<script setup>
import { ref } from 'vue';
import DashboardLayout from '@/Layouts/DashboardLayouts.vue';
import { Inertia } from '@inertiajs/inertia';

// Props passed from Laravel via Inertia.js
const props = defineProps({
    permission: Object, // Permission data to prefill the form
});

// Initialize the form data with the permission's existing data
const form = ref({
    name: props.permission.name,
    display_name: props.permission.display_name,
    description: props.permission.description,
});

// Submit the form to update the permission
const submitForm = () => {
    Inertia.put(`/admin/permission/${props.permission.id}`, form.value); // PUT request to update the permission
};
</script>
